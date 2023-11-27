<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); 
   
   if(isset($_POST['sign_in']))
    {
        $new_user=$_POST['new_fname'];
        $new_Uemail=$_POST['new_email'];
        $new_pwd=$_POST['new_pass'];
        $con_pwd=$_POST['con_pass'];
        $S_errors ='';

        if(!empty($new_user)&& !empty($new_pwd)&& !empty( $con_pwd)){
        //checking if email re-entered
        
        $query="SELECT * FROM User WHERE Email ='$new_Uemail' LIMIT 1";
        echo $query;
        
        $result_set=mysqli_query($connection,$query);

            if ($result_set){
                    
                    if(mysqli_num_rows($result_set)>=1){
                    $S_errors[] ='User already exist';
                    }
                    else{
                        if($new_pwd==$con_pwd){
                            //insert database  
                            $query = "INSERT INTO User (F_Name, Email, UPassword, is_deleted,ProfilePicture) VALUES ('$new_user', '$new_Uemail', '$con_pwd', 0,'profile.png')";
        
                            $result=mysqli_query($connection,$query);

                            
                            
                            if($result){
                                //successful 
                                header('Location: login.php?user_added=true');
                                
                            
                            }else{
                                $S_errors[]= 'failed to add new record';
                            }
        
                        }else{
                            $S_errors[] ='Passwords are not matching';
                        }
                    }

                }

           
        }
    }
      
?>


<?php
    // Check for form submission
    if (isset($_POST['submit'])) {

        $errors = array();

        // Check if the username and password have been entered
        if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 
        ) {
            $errors[] = 'Username is Missing/Invalid';
        }
        if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 
        ) {
            $errors[] = 'Password is Missing/Invalid';
        }

        // Check errors in the form
        if (empty($errors)) {
            // Save username and password into variables
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);

              
            // Prepare database query for User table
            $query = "SELECT * FROM User
                        WHERE Email='{$email}'
                        AND UPassword ='{$password}'
                        LIMIT 1";
           
            $result_set = mysqli_query($connection, $query);
            if (!$result_set) {
                echo "User Query: " . $query; // Debug statement
                die("User Database query failed: " . mysqli_error($connection));
            }

            // Query successful for User table
            if (mysqli_num_rows($result_set) == 1) {
                // Valid user found
                $Usertb = mysqli_fetch_assoc($result_set);
                $_SESSION['User_ID'] = $Usertb['UserID'];
                $_SESSION['first_name'] = $Usertb['F_Name'];

                $query = "UPDATE User SET last_login = DATE(NOW())";
                $query .= "WHERE UserID =  '{$_SESSION['User_ID']}' LIMIT 1";

                $result_set = mysqli_query($connection, $query);

                if(!$result_set){
                    die("Database query failed.".mysqli_error($connection));
                }
                header('Location: dashboard.php');
              
            }

            // Prepare database query for Staff table
            $query = "SELECT * FROM Staff
                        WHERE sEmail='{$email}'
                        AND SPassword ='{$password}'
                        LIMIT 1";
            
            $result_set = mysqli_query($connection, $query);
            if (!$result_set) {
                echo "Staff Query: " . $query; // Debug statement
                die("Staff Database query failed: " . mysqli_error($connection));
            }

            // Query successful for Staff table
            if (mysqli_num_rows($result_set) == 1) {
                // Valid staff found
                $Staff = mysqli_fetch_assoc($result_set);
                $_SESSION['Staff_ID'] = $Staff['StaffID'];
                
                $_SESSION['sfirst_name'] = $Staff['sF_Name'];
                
                $query = "UPDATE Staff SET slast_login = DATE(NOW()) ";
                $query .= "WHERE StaffID =  '{$_SESSION['Staff_ID']}' LIMIT 1 ";
                echo $query;

                $result_set = mysqli_query($connection, $query);
                echo $result_set;

                if(!$result_set){
                    die('Query Error: ' . mysqli_error($connection));
                    
                }
                if ( $_POST['remember'] != NULL) {
                    // Checkbox is checked
                    if($Staff['Staff_Type']=='Admin'){
                    header('Location: users.php');
                    }
                    if($Staff['Staff_Type']=='Billing Manager'){
                        header('Location: Bills.php');
                        }
                    if($Staff['Staff_Type']=='Inquiry Manager'){
                        header('Location: inquiey Dash copy.php');
                        }
                    
                }
            }

            $errors[] = 'Invalid Username or Password';
        }
    }
?>



<!DOCTYPE html>
<html>
 
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
         
</head>
 
<body>
    <header>
        <h1 class="heading">BiLlmE</h1>
        <h3 class="title">Sliding Login & Registration Form</h3>
    </header>
 
  
    <div class="container">
 
        <!-- upper button section to select
             the login or signup form -->
        <div class="slider"></div>
        <div class="btn">
            <button class="login">Login</button>
            <button class="signup">Signup</button>
        </div>
 
        <!-- Form section that contains the
             login and the signup form -->
        <div class="form-section">
 
            <!-- login form -->
            <div class="login-box">
                <form class=adm_f12 action="login.php" method= "post" > 
                <?php
                    if (isset($errors) && !empty($errors)) {
                        echo '<p class="adm_log">';
                        foreach ($errors as $error) {
                            echo $error . '<br>';
                        }
                        echo '</p>';
                    }
                ?>
                <?php
                    if(isset($_GET['logout'])){
                        echo '<p class=adm_info>You have Succesfully logged out!</p>';
                    }
                ?>
                <input type="email" class="in_log" name="email" placeholder="youremail@email.com">
                <input type="password" class="in_log" name="password" placeholder="password"></br></br>
                <input type="checkbox" id="checkbox" name="remember" class="in_log">
                 <label for="checkbox" class="adm_stf" name ="remember">I am a Staff Member</label>   
                <div class="submit">
                <input type="submit" id="adm_login" class="adm_login" name="submit" value="Login">
                </div>
                </form>
               
            </div>
 
            <!-- signup form -->
        <div class="signup-box">

            <form class=adm_f2 action="login.php" method= "post" > 
           
            <?php
                    if (isset($S_errors) && !empty($S_errors)) {
                        echo '<p class="adm_log">';
                        foreach ($S_errors as $error) {
                            echo $error . '<br>';
                        }
                        echo '</p>';
                    }
                ?>
                
                <input type="text" class="in_log" name="new_fname" placeholder="Enter your name" required>
                <input type="email"class="in_log" name="new_email" placeholder="youremail@email.com" required>
                <input type="password" class="in_log" name="new_pass" placeholder="password" required>
                <input type="password" class="in_log" name="con_pass" placeholder="Confirm password" required>
                <div class="submit">
                <input type="submit" id="adm_login" class="adm_login" name= "sign_in" value="SignIn"  onclick="showAlert()"required>
                </div>
            </form>
            <script>
             function showAlert() {
            alert("You have Sucessfully Registered!");
        }
        </script>
        </div>
        </div>
    </div>
    
</body>
<script> 
//"signup" and "login" actions when clicked
//select first element suits to css selector
let signup = document.querySelector(".signup");
let login = document.querySelector(".login");
let slider = document.querySelector(".slider");
let formSection = document.querySelector(".form-section");
 
signup.addEventListener("click", () => {
    slider.classList.add("moveslider");
    formSection.classList.add("form-section-move");
}
);
 
login.addEventListener("click", () => {
    slider.classList.remove("moveslider");
    formSection.classList.remove("form-section-move");
}
);
</script>
</html>

<?php mysqli_close($connection);?>
