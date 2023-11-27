<?php
// Check if the form is submitted and the file is uploaded
if (isset($_POST['upload']) && isset($_FILES['profile-picture'])) {
  $file = $_FILES['profile-picture'];

  // Check for errors during file upload
  if ($file['error'] === UPLOAD_ERR_OK) {
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];

    // Move the uploaded file to the desired folder
    $destination = 'image_folder/' . $fileName;
    move_uploaded_file($fileTmpName, $destination);

    // Save the image file name in the database
    // Replace this with your actual code to interact with the database
    $dbHost = 'your_db_host';
    $dbName = 'your_db_name';
    $dbUser = 'your_db_user';
    $dbPass = 'your_db_password';

    $connection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $stmt = $connection->prepare("INSERT INTO users (profile_picture) VALUES (:fileName)");
    $stmt->bindParam(':fileName', $fileName);
    $stmt->execute();

    // Redirect or display a success message
    header("Location: profile.php");
    exit;
  } else {
    // Handle file upload error
    echo "File upload error: " . $file['error'];
  }
}
?>
