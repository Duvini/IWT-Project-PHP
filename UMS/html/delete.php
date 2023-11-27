<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php

$selectedDate = $_POST['selectedDate']; // Retrieve the selected date
$eventName = $_POST['event']; // Retrieve the event name

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $query = "DELETE FROM eventdata WHERE Date = '$selectedDate' AND Event = '$eventName'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        if (mysqli_affected_rows($connec) > 0) {
            echo "Event deleted successfully.";
        } else {
            echo "Event not found. No rows deleted.";
        }
    } else {
        echo "Failed to execute the deletion query: " . mysqli_error($connection);
    }
}
?>

