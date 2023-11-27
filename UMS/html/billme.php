<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php 
   
// Checking if the user is logged in
    if (!isset($_SESSION['User_ID'])) {

        
       
        header('Location: login.php');

 }

 
?>

<?php 
if(isset($_POST['submit'])){

    $Names=$_POST['name'];
    $emails=$_POST['Email'];
    $subjects=$_POST['Subject'];
    $categors=$_POST['mcategory'];
    $messages=$_POST['In_Messages'];
    $CrtDates=$_POST['crDate'];


    
if(empty($errors)){
    //add the new input
    $Names=mysqli_real_escape_string($connection,$_POST['name']);
    $emails=mysqli_real_escape_string($connection,$_POST['Email']);
    $subjects=mysqli_real_escape_string($connection,$_POST['Subject']);
    $categors=mysqli_real_escape_string($connection,$_POST['mcategory']);
    $messages= mysqli_real_escape_string($connection, $_POST['In_Messages']);
    $CrtDates= mysqli_real_escape_string($connection, $_POST['crDate']);
}
  
$query = "INSERT INTO inquiries (full_Name, Email, Usr_Subject,categary, Messages, CrtDate) 
VALUES ('$Names', '$emails', '$subjects','$categors','$messages', '$CrtDates')";

$result=mysqli_query($connection,$query);

// if($result){
//     //successful 
//     header('Location: my ticket.php?user_added=true');

// }else{
//     $errors[]= 'failed to add new record';
// }
    if ($result) {
        echo "<script>alert('Form submitted successfully!');</script>";
        header('Location: my ticket.php?user_added=true');
    } else {
        echo "<script>alert('Form submission failed. Please try again.');</script>";
    }
     

}
?>



<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/inq_billme.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/inquiry.css">
    </head>
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
    <body class=form_body>
    
        
        <h2 class= conc_topic>
            <img src="../Image/BP1.png" alt="photo2" style="width:60px;height:60px;">
            Customer Support
        </h2>

        <form action="billme.php"method="post">


           <p>Name </p> 
           <input type="text" class="input" name="name">
           
           <p>Email</p>
            <input type ="email" class="input" name="Email">
           
           
           <P> Subject</P>
            <input type="text" class="input" name="Subject">
                
            <div id="zip">
               
            <!-- <P name= "Category"> </P> -->
          <br>
          
          <label >category </label>
            <select name="mcategory"> 
                <option value="Billing">Billing</option>    
                <option value= "planner">Planner</option>
                <option value="Other">Other</option>
            </select>

        <div>
            <br>
        <label >Date </label>
        <input type="Date" class="input" name="crDate">

            <br><br>
           <label >Message </label>
           <br>
           <textarea rows="4" cols="60" class="input" name="In_Messages">
           </textarea>
           <br>
           
          
            
           <div class="check">
            <br>    
            <input type="checkbox" name="check" >
            <lable id="im"> I'm not a robot </lable>
           </div>

           <br>
           
           <div class="button">
            <input type="Submit" class="submit" name="submit" value="Submit">
            <input type="reset"class="submit" value="cancel">
           </div>

             </form>
            <div class="footerDesign">
    
            <div class="custom-shape-divider-bottom-1684689648">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                class="shape-fill"></path>
            </svg>
            </div>
            </div>
        </div>
        <!-- footer -->
        <footer class="tick_footer">
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
                
            
           
        </footer>
    </body>
</html>



