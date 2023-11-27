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
  <head><title>BiLlmE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/1st.css">
    <link rel="stylesheet" href="../css/billdetails.css">
        <script src="https://kit.fontawesome.com/72c3a6627b.js" crossorigin="anonymous"></script>
        <script src="../js/popup.js"></script>
    <title>BiLlmE</title>
     

<meta charset="UTF-8 "/>
<header>
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
<body>
<form action="popup.php" method="Post">
	<div class="container">
		<div class="left">
			
			<form action="popup.php" method="Post">

              
		<div class="center">
			<h3>PAYMENT</h3>
			
				<br>Accepted Card: <br>
				<img src="../Image/master.jpeg" width="100">
				<img src="../Image/visa.png" width="50">
				<br><br>

				Credit card number:
			    <input type="text" name="cardno" placeholder="Enter card number" maxlength="19" >
                
                <script>//javascript alert box
                alert("Confirm your Payment!!");
                </script>
						<br><br>
				Exp month:
				<input type="text"  placeholder="Enter Month">
				<div id="zip">
					<label>
						<br><br>Exp year:
						<select>
							<option>Choose Year..</option>
							<option>2022</option>
							<option>2023</option>
							<option>2024</option>
							<option>2025</option>
						</select>
					</label>
						
					<label>CVV:</label>
					<input type="text"  placeholder="CVV">
                      <br>Amount Rs:<br>
                    <input type="text" placeholder="Amount">
     
				</div>
               <br><br> <input type="submit" name="submit" value="Proceed to checkout" >
             
		</div> 
        </div>
			</form>
	
    

    
   
<div class="footerDesign">

    <div class="custom-shape-divider-bottom-1684689648">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                class="shape-fill">
            </path>
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