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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      submit
    </title>
  <body>
      <link href="../css/popup.css" rel="stylesheet" >
    </head>
      
<div class="container">
<button type="submit" class="btn" onclick="openpopup()">Proceed to checkout</button>
<div class="popup" id="popup">
<img src="../Image/other.png" >
<h2>Thank You!</h2>
<p>Your details has been successfully submited.Thanks! </p>
<button type="button" onclick="closepopup()"><a href="../html/dashboard.php" >OK</a></button>

</div>
</div>

<script>
  let popup=document.getElementById("popup");

  function openpopup(){
    popup.classList.add("open-popup");
  }
  
  function closepopup(){
    popup.classList.remove("open-popup");
  }
  
</script>
       </body>
       </html>
  