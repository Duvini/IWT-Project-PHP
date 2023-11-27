<?php session_start(); ?>

<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php 
   
// Checking if the user is logged in
    if (!isset($_SESSION['User_ID'])) {

        
       
        header('Location: login.php');
 }

 
?>
<?php

if(isset($_GET['updateid'])){
    $_SESSION['cid']=$_GET['updateid'];
    
    }

?>

<!-- <?php 
if(isset($_POST['submit'])){

    $id=$_SESSION['cid'];
    $Names = $_POST['name'];
    $emails = $_POST['Email'];
    $subjects = $_POST['Subject'];
    $categors = $_POST['mcategory'];
    $messages = $_POST['In_Messages'];
    $CrtDates = $_POST['crDate'];

    $query = "UPDATE inquiries SET full_Name='$Names', Email='$emails', Usr_Subject='$subjects', categary='$categors', Messages='$messages', CrtDate='$CrtDates' WHERE Inquiry_ID='$id'";

    
    $_SESSION['q']=$query;
    $result = mysqli_query($connection, $query);

    if($result){
        header("Location: my ticket.php");
    }else{
        $_SESSION['r']=mysqli_error($connection);
    }
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

        <?php
        $cid=$_SESSION['cid'];
       
        $deletecareer="SELECT * FROM `inquiries` WHERE `Inquiry_ID`='$cid'";
        
        $result=mysqli_query($connection,$deletecareer);
     
        
        while($inquiry=mysqli_fetch_assoc($result)){
          
            $inq_id=$inquiry['Inquiry_ID'];
            $inq_fname=$inquiry['full_Name'];
            $inq_email=$inquiry['Email'];
            $inq_sub=$inquiry['Usr_Subject'];
            $inq_msg=$inquiry['Messages'];
            $inq_crtdate=$inquiry['CrtDate'];
    }

        
        ?>

        <form action="update-inq.php" method="POST">

         <input type="hidden" name="inq_ID" value="<?php echo $_GET['updateid'];?> ">

           <p>Name </p> 
           <input type="text" class="input" name="name" value="<?php echo $inq_fname ?>">
           
           <p>Email</p>
            <input type ="email" class="input" name="Email" value="<?php echo $inq_email ?>">
           
           
           <P> Subject</P>
            <input type="text" class="input" name="Subject" value="<?php echo $inq_sub ?>">
                
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
        <input type="Date" class="input" name="crDate" value="<?php echo $inq_crtdate ?>">

            <br><br>
           <label >Message </label>
           <br>
           <textarea rows="4" cols="60" class="input" name="In_Messages">
           <?php echo $inq_msg ?>
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
            
    </body>
</html>



