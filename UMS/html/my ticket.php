<?php session_start(); ?>

<?php 
/*database coonnection*/
require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php 
   
// Checking if the user is logged in
    if (!isset($_SESSION['User_ID'])) {

        
       
        header('Location: login.php');
 }

 
?>

<?php
$userID = $_SESSION['User_ID'];
//connect user and inquiry table
$ticket_list = '';
$query = "SELECT i.* FROM inquiries AS i
JOIN User AS u ON i.Email = u.Email
WHERE u.UserID = '$userID'";
$ContactUs = mysqli_query($connection, $query);

?>




<html>
    <head>
        <link rel="stylesheet" href="../css/my ticket.css ">
        <link rel="stylesheet" href="../css/inquiry.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <tital>
        </tital>
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
    <body class="calc_form">
    <div  >

    <span class="boththama1">My Tikets</span>
    <button class="boththama" ><a href="billme.php"> Submit Ticket</button></a>

</div>
    <img src="">
    <table>
        <thead>
        <tr>
            <th>Inquiry_ID</th>
            <th>subject </th>
            <th>Categary</th>
            <th>Date Created </th>
            <th>Edit</th>
            <th>Delete</th>
            
        </tr>
        </thead>

        <tbody>
            <?php

if ($ContactUs) {
    while ($inquiry = mysqli_fetch_assoc($ContactUs)) {
        

        $inq_id=$inquiry['Inquiry_ID'];
        $inq_sub=$inquiry['Usr_Subject'];
        $inq_cat=$inquiry['categary'];
        $inq_crtdate=$inquiry['CrtDate'];

?>

        <tr>
            <td><?php echo $inq_id ?></td>
            <td><?php echo $inq_sub ?></td>
            <td><?php echo $inq_cat?></td>
            <td><?php echo $inq_crtdate ?></td>
            <td><button class="btn" id="update"><a href="update-inq.php? updateid=<?php echo $inq_id ?>">Update</button></a><br> </td>
            <td> <button class="btn" id="delete"><a href="delete-inq.php? deleteid=<?php echo $inq_id; ?>">Delete</button></a><br></td>
        </tr>
    <?php }

     ?> </tbody>  <?php
 } else {
     echo "Database query failed.";
 }

?>
       
    </table>
    
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
</html>
