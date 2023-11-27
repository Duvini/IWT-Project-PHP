<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>

<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['Staff_ID'])) {
		header('Location: login.php');
	}

    $errors =array ();
    $first_na ='';
    $last_na= '';
    $stfEmail= '';
    $stfType= '';
    $stfPwd='';
    $Staff_ID='';
   
    
    if(isset($_GET['User_ID'])){
   

	
		// getting the user information
		$Staff_ID= mysqli_real_escape_string($connection, $_GET['User_ID']);
        
        $query = "DELETE FROM Staff WHERE StaffID = '$Staff_ID'";
        
        

		$result_set = mysqli_query($connection, $query);
        

        if (!$result_set) {
            echo "Error: " . mysqli_error($connection);
        } else {
        }
        

		if ($result_set) {
		  	if (mysqli_num_rows($result_set) == 1) {
			
		 	} else {
		 		// user not found
		 		header('Location: users.php?err=user_not_found');	
		 	}
		 } else {
		 	// query unsuccessful
		 	header('Location: users.php?err=query_failed');
		 }
    }
	



?>
