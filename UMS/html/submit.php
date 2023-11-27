<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php 
   
// Checking if the user is logged in
    if (!isset($_SESSION['User_ID'])) {

        
       
        header('Location: login.php');
 }

 


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
    $sql = "INSERT INTO eventdata (Event, Description, StreetName1, StreetName2, StreetName3, City, State, ZipCode, Country, Date, file) VALUES ('$event', '$description', '$strname1', '$strname2', '$strname3', '$city', '$state', '$zipcode', '$country', '$eventday', '$fileBlob')";

    if (!mysqli_query($connection, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
      }
} else {
    echo "Error uploading file";
}

mysqli_close($connection);
?>
<!DOCTYPE html>
<html>
<head>
  <title>page2</title>
  <link href="../css/web2.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
</head>
<body>
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
<div>
  
  <div class="web2-container">
    <div class="web2-mac-book-air2">

      <input type="button" value="Add on event" class="web2-rectangle13" onclick="window.location.href = 'web.php';">

      <input type="date" id="birthday" name="birthday" class="web2-rectangle14">

<textarea id="description" name="description" rows="4" cols="50" class="web2-rectangle16">
<?php

?>
</textarea>

<script>
  var birthdayInput = document.getElementById('birthday');
  var descriptionTextarea = document.getElementById('description');

  // Add event listener to the date input
  birthdayInput.addEventListener('input', function() {
    var selectedDate = birthdayInput.value;

    // Fetch data from the server using AJAX or any other method
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var eventData = xhr.responseText; // Assuming the response is a plain text
          descriptionTextarea.value = eventData;
        } else {
          // Handle error case
          console.error('Error:', xhr.status);
        }
      }
    };

    xhr.open('GET', 'getdata.php?selectedDate=' + selectedDate, true);
    xhr.send();
  });
</script>

      <div class="rectangle"></div>
      <textarea id="description" name="description" rows="4" cols="50" class="web2-rectangle15">
<?php 
 require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php');
$currentDate = date('Y-m-d');
$SQL = "SELECT Event FROM eventdata WHERE Date = '$currentDate'";
$exeSQL = mysqli_query($connection, $SQL) or die(mysqli_error($connection));

while ($row = mysqli_fetch_assoc($exeSQL)) {
    echo $row['Event'] . "\n"; // Display the value of 'Event' column for each row
}
?>
</textarea>
      <div class="rectangle2"></div>
      <span class="web2-text"><span id="currentDate"></span></span>
      
      <span class="web2-text2"><span id="displayDate">Select date</span></span>

      <script>
  // Get the date input element
  var dateInput = document.getElementById('birthday');
  
  // Get the span element for displaying the date
  var displaySpan = document.getElementById('displayDate');
  
  // Listen for changes in the date input
  dateInput.addEventListener('change', function() {
    // Get the selected date value
    var selectedDate = dateInput.value;
    
    // Convert the selected date to a JavaScript Date object
    var dateObj = new Date(selectedDate);
    
    // Format the date to display as "dd th MMM"
    var options = { day: 'numeric', month: 'long' };
    var formattedDate = dateObj.toLocaleDateString('en-US', options);
    
    // Update the content of the span element
    displaySpan.textContent = formattedDate;
  });
</script>

<script>
  // Get the span element for displaying the current date
  var currentDateSpan = document.getElementById('currentDate');
  
  // Function to update the current date display
  function updateCurrentDateDisplay() {
    var today = new Date();
    var options = { day: 'numeric', month: 'long' };
    var formattedDate = today.toLocaleDateString('en-US', options);
    currentDateSpan.textContent = formattedDate;
  }
  
  // Set initial value when the page loads
  updateCurrentDateDisplay();
</script>
 
       <div id="calendar"></div>
<script>
  // Get the calendar element
var calendarElement = document.getElementById('calendar');

// Generate the calendar
function generateCalendar() {
  var today = new Date();
  var currentYear = today.getFullYear();
  var currentMonth = today.getMonth();
  var currentDate = today.getDate();

  var firstDayOfMonth = new Date(currentYear, currentMonth, 1);
  var lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0);
  var totalDays = lastDayOfMonth.getDate();

  var calendarHTML = '<table>' +
    '<thead>' +
    '<tr>' +
    '<th colspan="7">' + firstDayOfMonth.toLocaleString('default', { month: 'long', year: 'numeric' }) + '</th>' +
    '</tr>' +
    '<tr>' +
    '<th>Sun</th>' +
    '<th>Mon</th>' +
    '<th>Tue</th>' +
    '<th>Wed</th>' +
    '<th>Thu</th>' +
    '<th>Fri</th>' +
    '<th>Sat</th>' +
    '</tr>' +
    '</thead>' +
    '<tbody>';

  var dayCount = 1;
  var dayHTML = '';

  for (var i = 0; i < 6; i++) {
    dayHTML += '<tr>';

    for (var j = 0; j < 7; j++) {
      if ((i === 0 && j < firstDayOfMonth.getDay()) || dayCount > totalDays) {
        dayHTML += '<td></td>';
      } else {
        var classNames = '';
        if (currentYear === today.getFullYear() && currentMonth === today.getMonth() && dayCount === currentDate) {
          classNames = 'today';
        }
        dayHTML += '<td class="' + classNames + '">' + dayCount + '</td>';
        dayCount++;
      }
    }

    dayHTML += '</tr>';
    if (dayCount > totalDays) {
      break;
    }
  }

  calendarHTML += dayHTML;
  calendarHTML += '</tbody></table>';

  calendarElement.innerHTML = calendarHTML;
}

// Call the generateCalendar function
generateCalendar();
  
    
</script>
    </div>
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
</html>
