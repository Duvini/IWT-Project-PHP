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
  <head>
        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/1st.css">
    <script src="https://kit.fontawesome.com/72c3a6627b.js" crossorigin="anonymous"></script> 
    <link rel="icon" type="image/png" href="../Image/bilme.png"/>  
    <title>BiLlmE</title>
     
</head>
<meta charset="UTF-8 "/>
<body>
  <header>
      <h2 class="logo">BilLmE</h2>
      <nav class="main">
            
                   
                    <a href="../html/dashboard.php">Dashboard</a>
                    <a href="Reminderhome.php">Events</a>
                    <a href="Billing_home.php">Billing</a>
                    <a href="#">Budget Planner</a>
                    <a href="inquiry.php">Tickets</a>
                    <a href="../html/profileTabshow.php"><img class="adm_ava" src="../Image/<?php echo $_SESSION['ProPic']?>" > </a>
            
            </nav>

    
  
    </header>

  </header>

  <div  class="homeImg">
      <img src="../Image/billingHomepage.png" alt="" class="paymentImg" >
  </div>
   
  <div class="homeTopic">
    
     
    <h1 class="topic">
       Billing
    </h1>
     
   </div>

  <div class="homeDescription">
    <p>
        Our billing page is designed to simplify the process of managing and paying your bills. 
        With our user-friendly platform, you can easily keep track of all your bills in one place 
        and ensure that you never miss a payment deadline.
        We understand that dealing with bills can be stressful and time-consuming. 
        That's why we've developed a streamlined system that automates many of the tasks 
        involved in bill management, allowing you to focus on more important things in your life.
        implify your financial management with our comprehensive billing services. 
        We understand the challenges of managing multiple bills and staying on top of payment deadlines. 
        
      </p>
      
      
  </div>

    <button  class="button-17"><a href="../html/mobile_payment.php"> Create</button></a>
 
      
  
    
 <div class="block">

      <a href="#" class="active"><i class="fa fa-phone fa-4x" aria-hidden="true"></i></a>
      <a href="#" class="active"><i class="fa fa-tint fa-4x" aria-hidden="true"></i></a>
      <a href="#" class="active"><i class="fa fa-internet-explorer fa-4x" aria-hidden="true"></i></a>
      <a href="#" class="active"> <i class="fa fa-television fa-4x" aria-hidden="true"></i></a>
      <a href="#" class="active"><i class="fa fa-shield fa-4x" aria-hidden="true"></i></a>
      <a href="#" class="active"><i class="fa fa-credit-card fa-4x" aria-hidden="true"></i></a>
      <a href="#" class="active"><i class="fa fa-list fa-4x" aria-hidden="true"></i></a>
      
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

<footer>
<footer class="footer">
  <div class="container">
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