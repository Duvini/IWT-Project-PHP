<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php
// Checking if the user is logged in
if (!isset($_SESSION['Staff_ID'])) {
    header('Location: login.php');
    
}

$bill_list = '';
$query = "SELECT * FROM  mobilepayment ";
$mobilepayment = mysqli_query($connection, $query);

 if ($mobilepayment) {
    while ($bill = mysqli_fetch_assoc($mobilepayment)) {
        $bill_list .= "<tr>";
         $bill_list .= "<td>{$bill['Bill_no']}</td>";         
         $bill_list .= "<td>{$bill['Bill_Type']}</td>";         
         $bill_list .= "<td>{$bill['Ful_Name']}</td>"; 
         $bill_list .= "<td> <a href=\"modify-bill.php?Bills_no={$bill['Bill_no']}\">View</a></td>";
         $bill_list .= "<td> <a href=\"delete-bill.php?Bills_no={$bill['Bill_no']}\">Delete</a></td>";
         $bill_list .= "</tr>";

         $_SESSION['bilNo']=$bill['Bill_no'];
     }
 } else {
     echo "Database query failed.";
 }



 ?>
<!DOCTYPE html>
<html lang="eng">
    <title>Bill Dashboard</title>
    <link rel ="stylesheet" href="../css/Bills.css">
    <head>
    </head>
    <body class= ums>
        <div class=Bill_ums>
            <div class="appname">Bill Management System</div>
            <div class="Loggedin">Welcome <?php echo $_SESSION ['sfirst_name'];?>! <a href="logout.php">Log Out</a></div>
            
        </div>
        <main>
        <h1> Bill Management</h1>
        <table class="masterlist">
            <tr>
                <th>Bill_no</th>
                <th>Bill_type</th>
                <th>Name</th>
                <th>View</th>
                <th>Delete</th>
            </tr>
            <?php echo $bill_list; ?>

        </table>
        </main>  
    </body>
</html>
    </body>
</html>