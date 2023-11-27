
<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['User_ID'])) {
		header('Location: login.php');
	}
   
    $errors =array ();
    $first_na='';
    $uEmail='';
    $uPass ='';
    $last_na='';
    $udob='';
    $uage='';
    $uconc='';
   
    if (isset($_POST['delete'])) {
    if(isset($_SESSION['User_ID'])){
   
	
		// getting the user information
		$user= mysqli_real_escape_string($connection, $_SESSION['User_ID']);
        
        
        $query = "DELETE FROM User WHERE UserID = '$user'";
    
		$result_set = mysqli_query($connection, $query);
        
   
        if (!$result_set) {
            echo "Error: " . mysqli_error($connection);
        } else {
            // Process the result set
            
        }
        

		if ($result_set) {
		  	if (mysqli_num_rows($result_set) == 1) {
			
		 	} else {
		 		// user not found
		 		header('Location: users.php?err=user_not_found');	
		 	}
		 } else {
		 	// query unsuccessful
		 	header('Location: users.php?err=query_failed');
        }
    }
}

?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Account Settings </title>
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/adm_styles .css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
</head>

<body class="adm_body" >
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

                    <div class="adm_propic">
                        <img src="../Image/<?php echo $_SESSION['ProPic']?>" alt="Avatar" class="adm_avatar">
                    </div>
                    <a class="adm_tab-active" href="./profileTabshow.php">
                        <i class="fa fa-user"></i>
                    </a>
                    
                    <a class="adm_tab" href="./privacyTabshow.php">
                            <i class="fa fa-archive"></i>
                    </a>
                    <a  class="adm_tab" href="./settingTabshow.php">
                        <i class="fa fa-cog"></i>
                    </a>  
                </nav>
            </div>
            <div class="adm_rightbox">

                    <div class="adm_Profile_tabshow">
                    <form action=settingTabshow.php method ="POST" onsubmit="return validateForm(event)" >
                            <h1>Account Deactivation</h1>
                            <h2>Delete my Account</h2>
                            <input type="checkbox" class="adm_check" name="rule5" id ="rule5" value="rule_5" >
                            <label class="adm_check">I agree:</br>Consequences of Account Deletion</br>
                                Deleting your account will result in the permanent removal of all your account information, including personal data, settings, and any associated content. This action is irreversible and cannot be undone. Please ensure that you have backed up any data or content you wish to retain before proceeding with the account deletion.</label></br>
                            <h2>Your Devices</h2>
                            <button class="adm_butn" name="delete">Delete</button>
                        </form>
                    </div>  
            </div>
        </div>
        <script>
function validateForm(event) {
    var rule5 = document.getElementById("rule5");

    if (!rule5.checked) {
        event.preventDefault(); // Prevent form submission
        alert("Please agree to the consequences of account deletion.");
        return false;
    }

    rule5.checked = false; // Uncheck the checkbox after form submission if desired

    return true;
}
</script>

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