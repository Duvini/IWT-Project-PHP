<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php 
   
// Checking if the user is logged in
    if (!isset($_SESSION['User_ID'])) {

        
       
        header('Location: login.php');
 }

 
?> 

<?php
// start the session
session_start();
// $ContactUs = mysqli_query($connection, $query);



?>

<?php

if(isset($_GET['deleteid'])){
    $cid=$_GET['deleteid'];
    echo $cid;
    $deletecareer="DELETE FROM `inquiries` WHERE `Inquiry_ID`='$cid'";
    
    
    $result=mysqli_query($connection,$deletecareer);
    if($result){
        header("Location:my ticket.php");}
}
?>