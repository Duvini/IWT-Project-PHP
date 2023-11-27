<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php
// Checking if the user is logged in
if (!isset($_SESSION['Staff_ID'])) {
    header('Location: login.php');
    
}
?>

<?php


$ticket_list = '';
$query = "SELECT * FROM  inquiries ";
$ContactUs = mysqli_query($connection, $query);






?>
<!DOCTYPE html>
<html lang="eng">
    <title>inquiry manager Dashboard</title>
    <link rel ="stylesheet" href="../css/inquiey Dash.css"> 
    <head>
    <div class=adm_ums>
            <div class="appname">Inquiry Management System</div>
            <div class="Loggedin">Welcome <?php echo $_SESSION ['sfirst_name'];?>! <a href="logout.php">Log Out</a></div>
        </div>
    </head>
    
    <body class= ums>
      
        <main>
        <h1> Inquiry Management</h1>
        <table class="masterlist" >
            <thead>
            <tr>
                <th>Refarance number</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Date Created</th>
                <th>View</th>
            </tr>
            </thead>

            <tbody>
            <?php

if ($ContactUs) {
    while ($inquiry = mysqli_fetch_assoc($ContactUs)) {
        

        $inq_id=$inquiry['Inquiry_ID'];
        $inq_fname=$inquiry['full_Name'];
        $inq_email=$inquiry['Email'];
        $inq_sub=$inquiry['Usr_Subject'];
        $inq_crtdate=$inquiry['CrtDate'];

?>

        <tr>
            <td><?php echo $inq_id ?></td>
            <td><?php echo $inq_fname ?></td>
            <td><?php echo $inq_email ?></td>
            <td><?php echo $inq_sub ?></td>
            <td><?php echo $inq_crtdate ?></td>
            <td><button class="btn" id="update"><a href="update1-inq.php? updateid=<?php echo $inq_id ?>">View</button></a><br> </td>
            
        </tr>
    <?php }

     ?> </tbody>  <?php
 } else {
     echo "Database query failed.";
 }

?>

            
            
        </table>
        </main>  
 </body>
</html>