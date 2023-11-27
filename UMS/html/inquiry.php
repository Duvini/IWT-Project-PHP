<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php 
   
// Checking if the user is logged in
    if (!isset($_SESSION['User_ID'])) {

        
       
        header('Location: login.php');
 }

 
?>

<!DOCTYPE html>
<html>
    
    <head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/inquiry.css">
        
        <title>BiLlmE</title>
        <link rel="icon" type="image/png" href="../Image/bilme.png">   
    </head>
    <body class="body_ticket">
       
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

        <div  class="homeImg">
            <img src="../Image/tp1.png" alt="" class="paymentImg" >
        </div>
         
        <div class="homeTopic">
          
           
          <h1>
           Tickets
          </h1>
           
         </div>

        <div class="homeDescription">
            <p class="intro_inq">
                Step into the future of organization and efficiency with our cutting-edge digital
                platform! Experience the convenience of paying your bills online, effortlessly 
                managing your events, and setting helpful reminders to ensure each occasion in 
                your life is an absolute triumph. We bring the power of organization right to 
                your fingertips, allowing you to take charge of your life in the most meaningful 
                and efficient way possible.
            </p>
            
            
        </div>
        <div class="getStart">
    <button class="button-17" role="button"> <a style="text-decoration:none" href="../html/my ticket.php" class="tick_btn">Create Ticket</a></button>
   
        </div>
           

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
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                </div>
                
                    <div class="footer-col">
                        <h4>Contact us</h4>
                        <div class="call-links">
                            <div class="call">
                            <h5>email: support@billme.com</h5>
                            <h5>Tel:0332255950</h5>
                            <h5>Mobile:0701260526</h5>
                            </div>
                        </div>
                    </div>
                
            </div>
           
        </div>
        </div>
    </footer>
   
    </body>
       
    <script src="./home.js"></script>
</html>