<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php
  $user ='';
 if (null==($_SESSION['User_ID'])) {
     header('Location: login.php');
 }
else{

       $user= $_SESSION['User_ID'];
       $query = "SELECT * FROM User WHERE UserID = '$user' LIMIT 1";
       $result_set = mysqli_query($connection, $query);

       if ($result_set) {

        if (mysqli_num_rows($result_set) == 1) {
         $result = mysqli_fetch_assoc($result_set);
          $first_na=$result['F_Name'];
          $uEmail=$result['Email'];
          $uPass =$result['UPassword'];
          $last_na=$result['L_Name'];
          $udob=$result['Date_of_Birth'];
          $uage=$result['Age'];
          $uconc=$result['Contact_Number'];

       } else {
           // user not found
           header('Location: users.php?err=user_not_found');	
       }
   } else {
       // query unsuccessful
       header('Location: users.php?err=query_failed');
   }
       
 	   
}
     if (isset($_POST['submitBtn'])) {

        $User =$_SESSION['User_ID'];
 
	
		$first_na =$_POST['first_names'];
        $last_names= $_POST['last_names'];
        $dob= $_POST['dob'];
        $ages=$_POST['ages'] ;
        $cont_no=$_POST['cont_no'] ;
        $uEmail=$_POST['emails'] ;
        $uPass=$_POST['passcode'] ;
    
        //gettting the details of the file that upload
        $fileName=$_FILES['image']['name'];
        $fileType=$_FILES['image']['type'];
        $fileSize=$_FILES['image']['size'];

        //temporary file names=to store file
        $tempName=$_FILES['image']['tmp_name'];

        //upload to directory
        $uploadTo='../Image/';

        //checking file type
        if($fileType =='image/jpeg' || $fileType== 'image/png' || $fileType =='image/jpg'){
                

        
            //to move the uploaded file to specific loaction
             $fileUpLoaded= move_uploaded_file($tempName,$uploadTo.$fileName);

             echo $fileUpLoaded;
        }

    
		// checking required fields
        $req_fields = array('first_names','last_names','dob','ages','cont_no','emails','passcode');

        foreach ($req_fields as $field){
            if (empty(trim($_POST[$field]))){
                $errors[] = $field.' is required';
            }
        }
		

		// checking max length 
        $max_len_fields = array('first_names'=>50,'last_names'=>100,'ages'=>4,'cont_no'=>20,'emails'=>200,'passcode'=>200);

         foreach ($max_len_fields as $field=>$max_len){
         if (strlen(trim($_POST[$field]))>$max_len){
             $errors[] = $field.'must be less than'.$max_len.'characters';
            }
         }
	

		if (empty($errors)) {
	 		// no errors found... adding new record
       $first_na=mysqli_real_escape_string($connection,$_POST['first_names']);         
       $last_names=mysqli_real_escape_string($connection,$_POST['last_names']);
       $dob=mysqli_real_escape_string($connection,$_POST['dob']);
       $ages=mysqli_real_escape_string($connection,$_POST['ages']);
       $cont_no=mysqli_real_escape_string($connection,$_POST['cont_no']);
       $uEmail=mysqli_real_escape_string($connection,$_POST['emails'] );
       $uPass=mysqli_real_escape_string($connection,$_POST['passcode']);
            
			// email address is already sanitized
			 
            
			$query = "UPDATE User
            SET F_Name = '$first_na',L_Name ='$last_names',Email='$uEmail',Date_of_Birth='$dob',Age='$ages',Contact_number='$cont_no',UPassword= '$uPass',ProfilePicture='$fileName'
            WHERE UserID = '$User'";

            

            
			

			$result = mysqli_query($connection, $query);
            if (!$result) {
                echo "Error: " . mysqli_error($connection);
                
            } else {
                
            }

			if ($result) {
			 	// query successful... redirecting to users page
		 header('Location: dashboard.php?user_added=true');
		 } else {
		 	$errors[] = 'Failed to add the new record.';
		 }


	}
        // Handle profile picture upload
    if (isset($_FILES['profile_picture'])) {
        $file = $_FILES['profile_picture'];

        // Check if there was no file upload error
        if ($file['error'] === UPLOAD_ERR_OK) {
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_size = $file['size'];
            $file_type = $file['type'];

            // Move the uploaded file to a desired location
            $target_dir = "/path/to/upload/directory/";
            $target_file = $target_dir . $file_name;
           

            // Move the uploaded file to the desired location
            if (move_uploaded_file($file_tmp, $target_file)) {
                // File upload successful
                $avatar = $file_name;
            } else {
                // File upload failed
                // Handle the error
                $errors[] = 'Failed to upload the profile picture.';
            }
        } else {
            // File upload error occurred
            // Handle the error
            $errors[] = 'An error occurred during the profile picture upload.';
        }
    }
}
    




?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/adm_styles .css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
	<title>Account Settings </title>
    <link rel="stylesheet" href="../css/profile.css">
    
</head>

<body class="adm_body">
<header>
    <h2 class="logo">BilLmE</h2>     
            <nav class="main">
           
           <a href="../html/dashboard.php">Dashboard</a>
           <a href="Reminderhome.php">Events</a>
           <a href="Billing_home.php">Billing</a>
           <a href="finance1st.php">Budget Planner</a>
           <a href="inquiry.php">Tickets</a>
           <a href="../html/profileTabshow.php"><img class="adm_ava" src="../Image/<?php echo $_SESSION['ProPic']?>" > </a>
   
   </nav>
    </header>

    <section>
        <div class="adm_container">
            <div class="adm_leftbox">

                <nav class="adm_nav">
                    <?php
                    
                    $user =$_SESSION['User_ID'];
                    $query ="SELECT ProfilePicture FROM User WHERE UserID ='$user' LIMIT 1";
                    $result_set = mysqli_query($connection,$query);
                    

                    if($result_set){
                       $result = mysqli_fetch_assoc($result_set);
                       $ProfilePic=$result['ProfilePicture']; 
                       $_SESSION['ProPic']=$ProfilePic;
                    }
                    
                    ?>

                    <div class="adm_propic">
                        <img src=" ../Image/<?php echo $ProfilePic; ?>" alt="Avatar" class="adm_avatar">
                    </div>
                    <a class="adm_tab-active" href="./profileTabshow.php">
                        <i class="fa fa-user"></i>
                    </a>
                    
                    <a  class="adm_tab" href="./privacyTabshow.php">
                            <i class="fa fa-archive"></i>
                    </a>
                    <a class="adm_tab" href="./settingTabshow.php">
                        <i class="fa fa-cog"></i>
                    </a>  
                </nav>
            </div>
            <div class="adm_rightbox">
                    <div class="adm_Profile_tabshow">
                    <form action=profileTabshow.php method ="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                            <h1>Personal Information</h1>
                            <h2 class="adm_h2">First Name</h2>
                            <input type="text" class="adm_input" id="first_name" name="first_names"  value="<?php echo $first_na; ?>">
                            <h2 class="adm_h2">Last Name</h2>
                            <input type="text" class="adm_input" name="last_names" value="<?php echo $last_na; ?>">
                            <h2 class="adm_h2">Date of Birth</h2>
                            <input type="date" class="adm_input" name="dob" value="<?php echo $udob; ?>">
                            <h2 class="adm_h2">Age</h2>
                            <input type="number" class="adm_input" name="ages" value="<?php echo $uage; ?>">
                            <h2 class="adm_h2">Contact Number</h2>
                            <input type="text" class="adm_input" id="contact_number" name="cont_no" value="<?php echo $uconc; ?>">
                            <h2 class="adm_h2">Email</h2>
                            <input type="text" class="adm_input" name="emails" value="<?php echo $uEmail; ?>">
                            <h2 class="adm_h2">Password</h2>
                            <input type="password" class="adm_input" name="passcode"  value="<?php echo $uPass; ?>">
                            </br></br>
                            <p>Add your Profile Picture</p>
                            
                                <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">  
                                    <input type="submit" id="adm_myFile" class="adm_file" name="submitBtn" >
                            
                        </form>
                            <script>
                                    function validateForm() {
                                    // Get form field values
                                    var firstName = document.getElementById("first_name").value;
                                    var contactNumber = document.getElementById("contact_number").value;

                                    // Perform validation
                                    if (firstName == "") {
                                        alert("Please enter your first name");
                                        return false;
                                    }
                                    if (contactNumber == "") {
                                        alert("Please enter your contact number");
                                        return false;
                                    }
                                    return true;
                                }
                            </script>
                </div>
                    
                   
            </div>
        </div>
    </section> 
    <div class="footerDesign">
    
        <div class="custom-shape-divider-bottom-1684689648">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                    class="shape-fill"></path>
            </svg>
        </div>
        </div>
      
       <!-- footer -->
        <footer class="footer">
            <div class="dash_container">
                <div class="row">
                    <div class="footer-col">
                        <h4>BilLmE</h4>
                        <ul>
                            <li><a href="#">about us</a></li>
                            <li><a href="#">our services</a></li>
                            <li><a href="#">privacy policy</a></li>
                            
                        </ul>
                    </div>
                  
                   
                    <div class="footer-col">
                        <h4>follow us</h4>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="footer-col">
                        <h4>Contact us</h4>
                        <div class="call-links">
                            <div class="call">
                            <p>email: support@billme.com</p>
                            <p>Tel:0332255950</p>
                            <p>Mobile:0701260526</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
       
</body>
</html>