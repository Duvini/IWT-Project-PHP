<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php 
   
// Checking if the user is logged in
    if (!isset($_SESSION['User_ID'])) {

        
       
        header('Location: login.php');
 }

 
?>
<!DOCTYPE html>
<html>
<head>
    <title>BiLlmE</title>
    <link rel="icon" type="image/png" href="../Image/bilme.png">  
    <link href="../css/web3.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
<script src="script.js"></script>
</head>
<body class="body_dash">
<header>
    <h2 class="logo">BilLmE</h2>     
            <nav class="main">
           
           <a href="../html/dashboard.php">Dashboard</a>
           <a href="Reminderhome.php">Events</a>
           <a href="Billing_home.php">Billing</a>
           <a href="finance1st.php">Budget Planner</a>
           <a href="inquiry.php">Tickets</a>
           <a href="../html/profileTabshow.php"><img class="adm_ava" src="../Image/<?php echo $_SESSION['ProPic']?>"> </a>
   
   </nav>
    </header>

        

  <!-- <div> -->
  <!-- <link href="mac-book-air4.css" rel="stylesheet" /> -->
  <div class="mac-book-air4-container">
    <div class="mac-book-air4-mac-book-air1">
      <span class="mac-book-air4-text"><span>Event</span></span>
      <!-- <span class="mac-book-air4-text02"><span>Ex: Maya’s wedding</span></span> -->
      <span class="mac-book-air4-text04"><span>Street Number</span></span>
      <span class="mac-book-air4-text06"><span>Street Name</span></span>
      <span class="mac-book-air4-text08"><span>Street Name</span></span>
      <span class="mac-book-air4-text10"><span>City</span></span>
      <span class="mac-book-air4-text12"><span>Postal/Zip code</span></span>
      <span class="mac-book-air4-text14"><span>Select Country</span></span>
      <span class="mac-book-air4-text16"><span>State/Province</span></span>
      <span class="mac-book-air4-text18"><span>Description</span></span>
      <span class="mac-book-air4-text20"><span>Location</span></span>
      <span class="mac-book-air4-text22"><span>Event Documents</span></span>
      <span class="mac-book-air4-text24"><span>Date</span></span>
      <span class="mac-book-air4-text26"><span>Save Reminder</span></span>
      
      <?php 
  $SQL = "SELECT Event FROM eventdata WHERE Date = '$selectedDate'";
  $exeSQL = mysqli_query($connection, $SQL) or die(mysqli_error($connection));

  $events = array();
  while ($row = mysqli_fetch_assoc($exeSQL)) {
    $event = $row['Event'];
    $events[] = $event;
  }
?>
<?php
  echo "<form method='post' action='update.php' enctype=multipart/form-data>";
  echo "<input type=text id=name name=name class=mac-book-air4-rectangle1 placeholder=Ex: Mayas Wedding>";

  echo "<select id=event name=event class=mac-book-air4-rectangle1 >";
  echo "<option value= disabled selected>Select an event</option>";
    
  foreach ($events as $event) {
        echo "<option value='$event'>$event</option>";
      }
    
      echo "</select>";


    echo "<input type='hidden' name='selectedDate' value='$selectedDate'>";
    echo "<textarea id=description name=description rows=4 cols=50 class=mac-book-air4-rectangle2 placeholder=Description required></textarea>";

    echo "<input type=text id=strname1 name=strname1 class=mac-book-air4-rectangle3 placeholder=Street name 1 required>";
    echo "<input type=text id=strname2 name=strname2 class=mac-book-air4-rectangle4 placeholder=Street name 2>";
    echo "<input type=text id=strname3 name=strname3 class=mac-book-air4-rectangle5 placeholder=Street name>";

    echo "<input type=text id=city name=city class=mac-book-air4-rectangle6 placeholder=city required>";

    echo "<input type=text id=state name=state class=mac-book-air4-rectangle7 placeholder=State / Province required>";

    echo "<input type=text id=zipcode name=zipcode class=mac-book-air4-rectangle8 placeholder=Postal / Zip code required>";

    echo "<select id=country name=country class=mac-book-air4-rectangle9 required>";
    echo '<option value="" disabled selected>Select a country</option>';
    echo '<option value="usa">United States</option>';
    echo '<option value="canada">Canada</option>';
    echo '<option value="uk">United Kingdom</option>';
    echo '<option value="SL">Sri Lanka</option>';
    echo "</select>";

    echo "<div class=drop-zone>";
    echo "<span class=drop-zone__prompt>Drop file here or click to upload</span>";
    echo "<input type=file id=myFile name=myFile class=drop-zone__input required>";
    echo "</div>";
    echo "<script src=script.js></script>";

    echo "<input type=date id=eventday name=eventday class=mac-book-air4-rectangle11 required>";

    echo "<input type='submit' name='update' value='Update' class='my-button'>";
    echo "<input type='submit' name='delete' value='Delete' class='my-button1' formnovalidate>";
    
    
    echo "<label class=switch><input class=slide type=checkbox><span class=slider round></span></label>";
    
      //<!-- <input type="button" value="Clear" class="my-button"> -->
      echo "</form>"
    
    ?>   


<!-- buttons -->
      <!-- <button class="mac-book-air4-frame1"><span class="mac-book-air4-text30">Submit</span></button> -->

      

    </div>
  </div>
<!-- </div> -->
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
</html>