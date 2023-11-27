<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php
// Checking if the user is logged in
if (!isset($_SESSION['Staff_ID'])) {
    header('Location: login.php');
    
}

$user_list = '';

// Getting the list of staff members
$query = "SELECT * FROM Staff WHERE sis_deleted = 0 ORDER BY sF_Name";
$staff = mysqli_query($connection, $query);

if ($staff) {
    while ($user = mysqli_fetch_assoc($staff)) {
        $user_list .= "<tr>";
        $user_list .= "<td>{$user['StaffID']}</td>";
        $user_list .= "<td>{$user['sF_Name']}</td>";
        $user_list .= "<td>{$user['sL_Name']}</td>";
        $user_list .= "<td>{$user['sEmail']}</td>";
        $user_list .= "<td>{$user['Staff_Type']}</td>";
        $user_list .= "<td>{$user['slast_login']}</td>";
        $user_list .= "<td> <a href=\"modify-user.php?User_ID={$user['StaffID']}\">Edit</a></td>";
        $user_list .= "<td> <a href=\"delete-user.php?User_ID={$user['StaffID']}\">Delete</a></td>";
        $user_list .= "</tr>";
    }
} else {
    echo "Database query failed."; 
}

?>
<!DOCTYPE html>
<html lang="eng">
    <title>Admin Dashboard</title>
    <link rel ="stylesheet" href="../css/ums.css">
    <head>
    </head>
    <body class= ums>
        <div class=adm_ums>
            <div class="appname">User Management System</div>
            <div class="Loggedin">Welcome <?php echo $_SESSION ['sfirst_name'];?>! <a href="logout.php">Log Out</a></div>
        </div>
        <main>
        <h1> Staff Members<span><a href="add-user.php"> + Add New</a></span></h1>
        <table class="masterlist">
            <tr>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Postion</th>
                <th>Last Loggedin</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php echo $user_list;?>
        </table>
        </main>  
    </body>
</html>