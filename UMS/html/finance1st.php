<?php session_start(); ?>
<!DOCTYPE html>
<html>
    
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/fin_dash.css">
        <title>BiLlmE</title>
        <link rel="icon" type="image/png" href="../Image/bilme.png">   
    </head>
    <body class="body_dash">
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
            <img src="../Image/budget.png" alt="" class="paymentImg" >
        </div>
         
        <div class="homeTopic">
          
           
          <h1>
            Budget Planner
          </h1>
           
         </div>

        <div class="homeDescription">
            <p>
                Our budget planner is a user-friendly tool designed to help you take control of your finances. 
                With its simple and intuitive interface, you can easily track your income, expenses, and savings goals. 
                The planner allows you to create budgets, categorize your expenses, and monitor your spending patterns. 
                It also provides helpful visualizations and reports to give you a clear overview of your financial situation. 
                Whether you're saving for a vacation, paying off debt, or simply aiming to better manage your money, our budget planner is here to simplify the process and guide you towards financial success.
            </p>
            
            
        </div>
        <div class="getStart">
    <button class="button-17" role="button"><a href="../html/test.php"> Create Budget</button></a>
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
       
    <script src="./home.js"></script>
</html>