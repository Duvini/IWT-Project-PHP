<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Account Settings </title>
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/adm_styles .css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
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
                    
                    <div class="adm_propic">
                        <img src="../Image/<?php echo $_SESSION['ProPic']?>" alt="Avatar" class="adm_avatar">
                    </div>
                    <a class="adm_tab-active" href="./profileTabshow.php">
                        <i class="fa fa-user"></i>
                    </a>
                    
                    <a class="adm_tab" href="./privacyTabshow.php">
                            <i class="fa fa-archive"></i>
                    </a>
                    <a class="adm_tab" href="./settingTabshow.php">
                        <i class="fa fa-cog"></i>
                    </a>  
                </nav>
            </div>
            <div class="adm_rightbox">
                    <div class="adm_Profile_tabshow">
                        <form>
                            <h1>Privacy Settings</h1>
                            <h2>Manage Email Notification</h2>
                            <input type="checkbox" class="adm_check" name="rule1" value="rule_1">
                            <label class="adm_check">Declutter your inbox:</br>
                                Discover strategies to eliminate email overload and create a clutter-free workspace.</label></br>
                                <input type="checkbox" class="adm_check" name="rule2" value="rule_2">
                            <label class="adm_check">Prioritize important messages:</br>
                                Learn techniques to identify and prioritize critical emails, ensuring you never miss an important communication.</label>
                            </br></br>
                            
                            <h2>Terms of User</h2>
                            <input type="checkbox" class="adm_check" name="rule3" value="rule_3">
                            <label class="adm_check">Use of Website:</br>
                               I agree to use our website only for lawful purposes and in a manner that does not infringe or restrict the rights of others. I am solely responsible for any content you post or transmit through my website, and I must not engage in any activity that may cause harm or interfere with the functioning of our website.</label></br>
                            <button class="adm_butn" onclick="handleFormSubmit(event)">Save Changes</button>
                        </form>
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
<script>
        function handleFormSubmit(event) {
            event.preventDefault();
            var rule1 = document.querySelector('input[name="rule1"]').checked;
            var rule2 = document.querySelector('input[name="rule2"]').checked;
            var rule3 = document.querySelector('input[name="rule3"]').checked;
            if (rule1 || rule2 || rule3) {
                alert('Changes saved successfully!');
            } else {
                alert('Please select at least one option before saving.');
            }
        }
    </script>
</html>