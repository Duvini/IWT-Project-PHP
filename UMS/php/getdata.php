
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>
<?php
$selectedDate = $_GET['selectedDate']; // Retrieve the selectedDate parameter from the GET request
$SQL = "SELECT Event FROM eventdata WHERE Date = '$selectedDate'";
$exeSQL = mysqli_query($connection, $SQL) or die(mysqli_error($connection));

while ($row = mysqli_fetch_assoc($exeSQL)) {
    echo $row['Event'] . "\n"; // Display the value of the 'Event' column for each row
}
?>
