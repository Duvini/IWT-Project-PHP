<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php
// Checking if the user is logged in
if (!isset($_SESSION['Staff_ID'])) {
    header('Location: login.php');
    
}
?>
<?php

if(isset($_GET['updateid'])){
    $cid=$_GET['updateid'];
    $deletecareer="SELECT * FROM `inquiries` WHERE `Inquiry_ID`='$cid'";
    
    $result=mysqli_query($connection,$deletecareer);
 
    ?>
    <?php
    while($inquiry=mysqli_fetch_assoc($result)){
      
        $inq_id=$inquiry['Inquiry_ID'];
        $inq_fname=$inquiry['full_Name'];
        $inq_email=$inquiry['Email'];
        $inq_sub=$inquiry['Usr_Subject'];
        $inq_msg=$inquiry['Messages'];
        $inq_crtdate=$inquiry['CrtDate'];
}}
?>

<!-- <?php 
if(isset($_POST['submit'])){

    $Names=$_POST['name'];
    $emails=$_POST['Email'];
    $subjects=$_POST['Subject'];
    $categors=$_POST['mcategory'];
    $messages=$_POST['In_Messages'];
    $CrtDates=$_POST['crDate'];

    $query=" UPDATE `inquiries` SET `full_Name`='$Names',`Email`='$emails',`Usr_Subject`='$subjects',`categary`='$categors',`Messages`='$messages',`CrtDate`='$CrtDates' WHERE `Inquiry_ID`='$inq_id'";

    // $query = "INSERT INTO inquiries (full_Name, Email, Usr_Subject,categary, Messages, CrtDate) 
    // VALUES ('$Names', '$emails', '$subjects','$categors','$messages', '$CrtDates')";

    mysqli_query($connection,$query);


    if($query){
        header("Location: my ticket.php");}
      

}
?> -->

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/my ticket.css ">
        <link rel="stylesheet" href="../css/inquiry.css">
        <link rel="stylesheet" href="../css/inq_billme.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class=form_body>
    
    <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            <td></td>
        
        <h2 class= conc_topic>
            <img src="../Image/BP1.png" alt="photo2" style="width:60px;height:60px;">
            Customer Support
        </h2>

        <form action=""method="post">


           <p>Name </p> 
           <input type="text" class="input" name="name" value="<?php echo $inq_fname ?>" disabled>
           
           <p>Email</p>
            <input type ="email" class="input" name="Email" value="<?php echo $inq_email ?>"disabled>
           
           
           <P> Subject</P>
            <input type="text" class="input" name="Subject" value="<?php echo $inq_sub ?>"disabled>
                
            <div id="zip">
               
            <!-- <P name= "Category"> </P> -->
          <br>
          
          
          <label >category </label>
            <select name="mcategory"disabled> 
                <option value="Billing">Billing</option>    
                <option value= "planner">Planner</option>
                <option value="Other">Other</option>
            </select>
          
        <div>
            <br>
        <label >Date </label>
        <input type="Date" class="input" name="crDate" value="<?php echo $inq_crtdate ?>"disabled>

            <br><br>
           <label >Message </label>
           <br>
           <textarea rows="4" cols="60" class="input" name="In_Messages"disabled>
           <?php echo $inq_msg ?>
           </textarea>
           <br>
           
          
            
           <div class="check">
            <br>    
            <input type="checkbox" name="check" disabled>
            <lable id="im"> I'm not a robot </lable>
           </div>


           <br>
           
           <div class="button">
           <span><a href="inquiey Dash copy.php">   << Back to Inquiry list</a></span>
           </div>

             </form>
            
    </body>
</html>