<?php require_once('C:\xampp\htdocs\BilLmE\php\connection.php'); ?>


<!DOCTYPE html>
<html lang="eng">
    <title>Add new user</title>
    <link rel ="stylesheet" href="../css/Bills.css">
    <head>
    </head>
    <body class= ums>
        <div class=Bill_ums>
            <div class="appname">Bill Management System</div>
            <div class="Loggedin">Welcome  <a href="logout.php">Log Out</a></div>
        </div>
        <main>
        <h1> Add new user<span><a href="users.php">< Back to user List</a></span></h1>
        <form action="add-user.php" method="post" class="userform">
            <p>
                <Label for="">First Name:</label>
                <input type="text" name="First_Name"> </P>
              <P>
              <Label for="">Email:</label>
                <input type="text" name="Email"> </P> 
                <P>
              <Label for="">&nbsp;</label>
                <button type="submit" name="submit">Save</button> </P> 
</table>
        </main>  
    </body>
</html>
    </body>
</html>