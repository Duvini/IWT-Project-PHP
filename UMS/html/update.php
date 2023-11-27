<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>
<?php

if (isset($_POST['update'])) {
    // Code for handling the Update button click
    $selectedDate = $_POST['selectedDate'];
    $event = $_POST['event'];
    $description = $_POST['description'];
    $strname1 = $_POST['strname1'];
    $strname2 = $_POST['strname2'];
    $strname3 = $_POST['strname3'];
    //remaining street names
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $country = isset($_POST['country']) ? $_POST['country'] : '';

    $eventday = $_POST['eventday'];

    // Check if a file is uploaded
    if (isset($_FILES['myFile']) && $_FILES['myFile']['error'] === UPLOAD_ERR_OK) {
        $fileData = file_get_contents($_FILES['myFile']['tmp_name']);
        $fileBlob = mysqli_real_escape_string($connection, $fileData);

        $sql = "UPDATE eventdata SET Description = '$description', StreetName1 = '$strname1', StreetName2 = '$strname2', StreetName3 = '$strname3', City = '$city', State = '$state', ZipCode = '$zipcode', Country = '$country', Date='$eventday' WHERE Event = '$event' AND Date = '$selectedDate'";

        if (mysqli_query($connection, $sql)) {
            echo "<p><b></b></p>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    } else {
        echo "Error uploading file";
    }
} elseif (isset($_POST['delete'])) {
    // Code for handling the Delete button click
    $selectedDate = $_POST['selectedDate'];
    $event = $_POST['event'];

    $sql = "DELETE FROM eventdata WHERE Event = '$event' AND Date = '$selectedDate'";

    if (mysqli_query($connection, $sql)) {
        echo "<p><b></b></p>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
    
    <head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/billme.css">

        
        <title>BiLlmE</title>
        <link rel="icon" type="image/png" href="../Image/bilme.png">   
    </head>
    <body class="body_dash">
        <header>
            <h2 class="logo">BilLmE</h2>
            <nav class="main">
            
                    <a href="../html/dashboard.php">Dashboard</a>
                    <a href="Reminderhome.php">Events</a>
                    <a href="Billing_home.php">Billing</a>
                    <a href="#">Budget Planner</a>
                    <a href="#">Tickets</a>
                    <a href="../html/profileTabshow.php"><img class="adm_ava" src="../Image/<?php echo $_SESSION['ProPic']?>" > </a>
            
            </nav>

        </header>

        <div  class="homeImg">
            <img src="./eventmanager.png" alt="" class="paymentImg" >
        </div>
         
        <div class="homeTopic">
          
           
          <h1>
            Online Billing &<br>Event Reminder
          </h1>
           
         </div>

        <div class="homeDescription">
            <p>
			Welcome to our Event Creation Web Page!

Are you ready to bring your event ideas to life? Look no further! Our event creation web page is your one-stop destination for designing and crafting extraordinary events. Whether you're organizing a corporate gathering, a themed party, a community festival, or a special occasion, we have the tools and resources to make it an unforgettable experience.
       
            </p>
            
            
        </div>
        <div class="getStart">
		
    <button class="button-17" role="button" onclick="location.href='web2.php'">Get Start</button>
        </div>
            


  <div class="footerDesign">
    
    <div class="custom-shape-divider-bottom-1684689648">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                class="shape-fill"></path>
        </svg>
    </div>
    </div>
  
   <!-- footer -->
    <footer class="footer">
        <div class="dash_container">
            <div class="row">
                <div class="footer-col">
                    <h4>BilLmE</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                        
                    </ul>
                </div>
              
               
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                </div>
                
                    <div class="footer-col">
                        <h4>Contact us</h4>
                        <div class="call-links">
                            <div class="call">
                            <h5>email: support@billme.com</h5>
                            <h5>Tel:0332255950</h5>
                            <h5>Mobile:0701260526</h5>
                            </div>
                        </div>
                    </div>
                
            </div>
           
        </div>
        </div>
    </footer>
   
    </body>
       
    <script src="./home.js"></script>
</html>