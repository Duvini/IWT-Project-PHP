<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php 
   
// Checking if the user is logged in
    if (!isset($_SESSION['User_ID'])) {

        
       
        header('Location: login.php');

 }

 
?>
<?php

if (isset($_POST["submit"])) {
    $income = $_POST['income'];
    $expense = $_POST['expenses'];
    $spendlimit = $_POST['spendlimit'];

    $query = "INSERT INTO tb_budget (income, expense, spendlimit) 
              VALUES ('$income', '$expense', '$spendlimit')";
    mysqli_query($connection, $query);
    echo "<script> alert('Data Inserted Successfully'); </script>";
}

// Retrieve budget data
$query = "SELECT income, expense, spendlimit FROM tb_budget";
$result = mysqli_query($connection, $query);

// Create arrays to store data
$incomeData = array();
$expenseData = array();
$spendLimitData = array();

// Fetch data from the result set
while ($row = mysqli_fetch_assoc($result)) {
    $incomeData[] = $row['income'];
    $expenseData[] = $row['expense'];
    $spendLimitData[] = $row['spendlimit'];
}

// Free the result set
mysqli_free_result($result);

// Close the database connection
mysqli_close($connection);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Budget Plan</title>
    <link rel="stylesheet" type="text/css" href="test.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Budget Plan</h1>
        <form id="budgetForm" method="POST" action="">
            <label for="income">Income:</label><br>
            <input type="text" id="income" name="income" required><br><br>
            <label for="expenses">Expenses:</label><br>
            <input type="text" id="expenses" name="expenses" required><br><br>
            <label for="spendLimit">Spending Limit:</label><br>
            <input type="text" id="spendlimit" name="spendlimit" required><br><br>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <canvas id="budgetChart"></canvas>

    <script>
        // Retrieve the canvas element
        var ctx = document.getElementById('budgetChart').getContext('2d');

        // Create the chart
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Income',
                    borderColor: 'green',
                    data: <?php echo json_encode($incomeData); ?>
                }, {
                    label: 'Expense',
                    borderColor: 'red',
                    data: <?php echo json_encode($expenseData); ?>
                }, {
                    label: 'Spending Limit',
                    borderColor: 'blue',
                    data: <?php echo json_encode($spendLimitData); ?>
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>



