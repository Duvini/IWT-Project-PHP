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
                <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="../css/adm_styles .css"/>
                <link rel="stylesheet" href="../css/dashboard.css"/>
                <title>BiLlmE</title>
                <link rel="icon" type="image/png" href="../Image/bilme.png"/>   
            </head>
        <body onload="displayGreeting()" class="body_dash">
        <header class="adm_head">
            <h2 class="logo">BilLmE</h2>
            <nav class="main">
            
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
                   
                    <a href="../html/dashboard.php" class="active">Dashboard</a>
                    <a href="./Reminderhome.php">Events</a>
                    <a href="./Billing_home.php">Billing</a>
                    <a href="finance1st.php">Budget Planner</a>
                    <a href="inquiry.php">Tickets</a>
                    <a href="../html/profileTabshow.php"><img class="adm_ava" src="../Image/<?php echo $_SESSION['ProPic']?>" > </a>
                    <a class= "prof_log" href="logout.php"><img class="adm_avas" src="../Image/signout.png" ></i></a>
                
            
            </nav>
            
            </header>
            
            </header>
                        <script>
                                function displayGreeting() {
                                    var currentTime = new Date();
                                    var currentHour = currentTime.getHours();

                                    var greeting;

                                    if (currentHour < 12) {
                                        greeting = "Good morning!";
                                    } else if (currentHour < 15) {
                                        greeting = "Good afternoon!";
                                    } else {
                                        greeting = "Good evening!";
                                    }

                                    document.getElementById("greeting").innerHTML = greeting;
                                }
                        </script>


                <div  class="main-container">
                    <h1 id="greeting"  class="greeting"></h1>
                    Welcome <?php echo $_SESSION['first_name'];?>!
                </div>
                <div class=para>
                        <p class=adm_dash533>We are thrilled to have you join our community, where
                             staying organized and never missing important deadlines 
                             is our top priority. With our user-friendly platform, 
                             managing your bills and keeping track of upcoming events 
                             has never been easier.Our goal is to simplify your life by
                             providing a reliable and efficient tool that keeps you informed 
                             and in control. With our intuitive interface and customizable 
                             options, you can tailor the experience to suit your specific needs.
                             Join us today and experience the peace of mind that comes with never 
                             forgetting a bill or event again. We're here to make your life 
                             simpler and more organized. Should you have any questions or need 
                             assistance, our dedicated support team is just a click away.

</P>    
                </div>
                <div  class="hommg">
            <img src="../Image/dash_adm_img.png" alt="" class="adm_123Img_" >
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