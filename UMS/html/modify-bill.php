<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php
// Checking if the user is logged in
if (!isset($_SESSION['Staff_ID'])) {
    header('Location: login.php');
    
}
?>

<?php
$php_errormsg = array();
$b_type = '';
$name = '';
$email = '';
$Billno = '';

if(isset($_GET['Bills_no'])){


    $Billno = mysqli_real_escape_string($connection, $_GET['Bills_no']);
   
    $query = "SELECT * FROM mobilepayment WHERE Bill_no ='$Billno' LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if (!$result_set) {
        echo "Error: " . mysqli_error($connection);
        // handle the error
    } else {
        if (mysqli_num_rows($result_set) == 1) {
            $result = mysqli_fetch_assoc($result_set);
            $b_type = $result['Bill_Type'];
            $name = $result['Ful_Name'];
            $email = $result['Email'];
            $address=$result['addresss'];
            $city=$result['city'];
            $state=$result['states'];
        } else {
            // user not found
            header('Location: Bills.php?err=user_not_found');
            exit();
        }
    }
}


?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Bill Dashboard</title>
    <link rel="stylesheet" href="../css/Bills.css">
    <link rel="stylesheet" href="../css/mobile payement.css">
</head>
<body class="ums">
<div class="Bill_ums">
    <div class="appname">Bill Management System</div>
    <div class="Loggedin">Welcome <?php echo $_SESSION ['sfirst_name'];?>! <a href="logout.php">Log Out</a></div>
</div>
<main>
    <h1>Bill Management</h1>
    <table class="masterlist">
        <?php
        if (!empty($errors)) {
            echo '<div class="errmsg">';
            echo '<b>There were error(s) on your form</b>';
            echo '<br>';
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
            echo '</div>';
        }
        ?>

        <form action="modify-bill.php" method="POST">

         <input type="hidden" name="Bill_no" value="<?php echo $Bilno?>" disabled>
            <select name="b_type" disabled>
                <option <?php if ($b_type == 'Mobile') echo 'selected'; ?>>Mobile</option>
                <option <?php if ($b_type == 'Utilities') echo 'selected'; ?>>Utilities</option>
                <option <?php if ($b_type == 'Internet') echo 'selected'; ?>>Internet</option>
                <option <?php if ($b_type == 'Television') echo 'selected'; ?>>Television</option>
                <option <?php if ($b_type == 'Insurance') echo 'selected'; ?>>Insurance</option>
                <option <?php if ($b_type == 'Wallate') echo 'selected'; ?>>Wallate</option>
                <option <?php if ($b_type == 'Other') echo 'selected'; ?>>Other</option>
            </select>
            <select name="service_provider" disabled>
                <option>SLT-Mobitel</option>
                <option>Dialog</option>
                <option>Airtel</option>
                <option>Ceylon Electricity Board</option>
                <option>National Water Supply & Drainage Board</option>
                <option>LECO</option>
                <option>SLT-PEOTV</option>
                <option>Dialog-Television</option>
                <option>AIA</option>
                <option>Ceylinco</option>
                <option>Cash App</option>
                <option>NiKi Event-Planner</option>
                <option>Glamour Event-Planner</option>
            </select>
            <br>
            Full name:
            <input type="text" name="name" placeholder="Enter name" value="<?php echo $name; ?>"disabled>
            Email:
            <input type="text" name="email" placeholder="Enter email" value="<?php echo $email; ?>"disabled>
            Address:
            <input type="text" name="address" placeholder="Enter address" value="<?php echo $address; ?>"disabled>
            City:
            <input type="text" name="city" placeholder="Enter City" value="<?php echo $city; ?>"disabled>
            <div id="zip">
                <label>
                    State:
                    <select name="state" disabled>
                        <option>Choose State..</option>
                        <option <?php if ($state == 'Galle') echo 'selected'; ?>>Galle</option>
                        <option <?php if ($state == 'Colombo') echo 'selected'; ?>>Colombo</option>
                        <option <?php if ($state == 'Kandy') echo 'selected'; ?>>Kandy</option>
                        <option <?php if ($state == 'Jaffna') echo 'selected'; ?>>Jaffna</option>
                        <option <?php if ($state == 'Anuradhapura') echo 'selected'; ?>>Anuradhapura</option>
                        <option <?php if ($state == 'Trincomalee') echo 'selected'; ?>>Trincomalee</option>
                        <option <?php if ($state == 'Batticaloa') echo 'selected'; ?>>Batticaloa</option>
                        <option <?php if ($state == 'Kilinochchi') echo 'selected'; ?>>Kilinochchi</option>
                        <option <?php if ($state == 'Kurunegala') echo 'selected'; ?>>Kurunegala</option>
                        <option <?php if ($state == 'Mannar') echo 'selected'; ?>>Mannar</option>
                        <option <?php if ($state == 'Matale') echo 'selected'; ?>>Matale</option>
                        <option <?php if ($state == 'Matara') echo 'selected'; ?>>Matara</option>
                        <option <?php if ($state == 'Badulla') echo 'selected'; ?>>Badulla</option>
                        <option <?php if ($state == 'Dehiwala') echo 'selected'; ?>>Dehiwala</option>
                        <option <?php if ($state == 'Hambantota') echo 'selected'; ?>>Hambantota</option>
                        <option <?php if ($state == 'Kalutara') echo 'selected'; ?>>Kalutara</option>
                    </select>
                </label>
               
            </div>
            <label></label>
            <span><a href="Bills.php">   << Back to Payment list</a></span>
        </form>
    </table>
</main>
</body>
</html>
