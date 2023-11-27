<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>
<?php
     
	// checking if a user is logged in
	if (!isset($_SESSION['Staff_ID'])) {
		header('Location: index.php');
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
        
	    $query = "SELECT * FROM Staff WHERE StaffID = '$Staff_ID' LIMIT 1";
        
        

		$result_set = mysqli_query($connection, $query);
        

        if (!$result_set) {
            echo "Error: " . mysqli_error($connection);
            // You can also log the error or handle it in a different way
        } else {
            // Process the result set
            // ...
        }
        

		if ($result_set) {
		  	if (mysqli_num_rows($result_set) == 1) {
			$result = mysqli_fetch_assoc($result_set);
		  		$first_na=$result['sF_Name'];
                $last_na= $result['sL_Name'];
                $stfEmail=$result['sEmail'];
                $stfType= $result['Staff_Type'];
                
		 	} else {
		 		// user not found
		 		header('Location: users.php?err=user_not_found');	
		 	}
		 } else {
		 	// query unsuccessful
		 	header('Location: users.php?err=query_failed');
		 }
    }

    
   //user details update.
	if (isset($_POST['submit'])) {

        $Staff_ID = mysqli_real_escape_string($connection, $_POST['Staff_ID']);
	
		$first_na =$_POST['first_na'];
        $last_na= $_POST['last_na'];
        $stfEmail= $_POST['stfEmail'];
        $stfType=$_POST['stfType'] ;
       
    
		// checking required fields
        $req_fields = array('first_na','last_na','stfEmail','stfType');

        foreach ($req_fields as $field){
            if (empty(trim($_POST[$field]))){
                $errors[] = $field.' is required';
            }
        }
		

		// checking max length 
        $max_len_fields = array('first_na' => 50,'last_na'=>100,'stfEmail'=>200,'stfType'=>100);

        foreach ($max_len_fields as $field=>$max_len){
            if (strlen(trim($_POST[$field]))>$max_len){
                $errors[] = $field.'must be less than'.$max_len.'characters';
            }
        }
	

		if (empty($errors)) {
			// no errors found... adding new record
            $first_na=mysqli_real_escape_string($connection,$_POST['first_na']);
            $last_na=mysqli_real_escape_string($connection,$_POST['last_na']);
            $stfType=mysqli_real_escape_string($connection,$_POST['stfType']);
            
			// email address is already sanitized
			 
            
			$query = "UPDATE Staff
            SET sF_Name = '$first_na',sL_Name ='$last_na',sEmail='$stfEmail',Staff_Type='$stfType'
            WHERE StaffID = '$Staff_ID'";
            
			

			$result = mysqli_query($connection, $query);
            

			if ($result) {
			 	// query successful... redirecting to users page
			 	header('Location: users.php?user_added=true');
			 } else {
			 	$errors[] = 'Failed to add the new record.';
			 }


		}

    }
    //end here

?>

<!DOCTYPE html>
<html lang="eng">
    <title>View / Modify Staff Member</title>
    <link rel ="stylesheet" href="../css/ums.css">
    <head>
    </head>
    <body class= ums>
        <div class=adm_ums>
            <div class="appname">User Management System</div>
            <div class="Loggedin">Welcome <?php echo $_SESSION ['sfirst_name'];?>! <a href="logout.php">Log Out</a></div>
        </div>
        <main>
        <h1> View/Modify Staff Member<span><a href="users.php">   << Back to Staff list</a></span></h1>
            
            <?php
                if(!empty($errors)){
                    echo '<dive class="errmsg">';
                    echo '<b>There were error(s) on your form</b>';
                    echo '<br>';
                    foreach ($errors as $error){
                        echo $error.'<br>';
                    }
                    echo '</div>';
                }
            ?>
            <form action=modify-user.php method ="POST" class="staffForm" >
                <p class="p_stf">
                <input type="hidden" name="Staff_ID" value="<?php echo $Staff_ID; ?>">
                    <label for ="first_na">First Name:</label>
                    <input type="text" name="first_na" id="first_na" value="<?php echo $first_na; ?>"> 
                </p>
                <p class="p_stf">
                    <label for ="last_na">Last Name:</label>
                    <input type="text" name="last_na" id="last_na" value="<?php echo $last_na ;?>"> 
                </p>
                <p class="p_stf">
                    <label for ="stfEmail">Email:</label>
                    <input type="email" name="stfEmail" id="stfEmail" value="<?php echo $stfEmail ;?>"> 
                </p>
                <p class="p_stf">
                    <label for ="stfType">Employee Type:</label>
                    <input type="text" name="stfType" id="stfType" value="<?php echo $stfType; ?>">
                </p>
                
                <p class="p_stf">
                    <label for ="submit">&nbsp;</label>
                    <button type="submit" name="submit"> Save </button>
                </p>
            </form>
        </main>
        
    </body>
</html>