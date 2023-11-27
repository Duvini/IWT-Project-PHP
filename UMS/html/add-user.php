<?php session_start(); ?>
<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/ums/php/connection.php'); ?>
<?php
//validation of the form
 $errors =array ();

    $first_na ='';
    $last_na= '';
    $stfEmail= '';
    $stfType= '';
    $stfPwd= '';

    if (isset($_POST['submit'])){

        $first_na =$_POST['first_na'];
        $last_na= $_POST['last_na'];
        $stfEmail= $_POST['stfEmail'];
        $stfType=$_POST['stfType'] ;
        $stfPwd= $_POST['stfPwd'];

        //checking required fields

        $req_fields = array('first_na','last_na','stfEmail','stfType','stfPwd');

        foreach ($req_fields as $field){
            if (empty(trim($_POST[$field]))){
                $errors[] = $field.' is required';
            }
        }
        //checking the max length set correctly
        $max_len_fields = array('first_na' => 50,'last_na'=>100,'stfEmail'=>200,'stfType'=>100,'stfPwd'=>200);

        foreach ($max_len_fields as $field=>$max_len){
            if (strlen(trim($_POST[$field]))>$max_len){
                $errors[] = $field.'must be less than'.$max_len.'characters';
            }
        }
        //checking if email re-entered
        $stfEmail=mysqli_real_escape_string($connection,$_POST['stfEmail']);
        $query="SELECT * FROM Staff WHERE sEmail ='{$stfEmail}'LIMIT 1";
        $result_set=mysqli_query($connection,$query);
        if ($result_set){
            if(mysqli_num_rows($result_set)==1){
                $errors[] ='Email adress already exist';
            }
        }
        if(empty($errors)){
            //add the new input
            $first_na=mysqli_real_escape_string($connection,$_POST['first_na']);
            $last_na=mysqli_real_escape_string($connection,$_POST['last_na']);
            $stfType=mysqli_real_escape_string($connection,$_POST['stfType']);
            $stfPwd=mysqli_real_escape_string($connection,$_POST['stfPwd']);

            $query= "INSERT INTO Staff (sF_Name,sL_Name,sEmail,Staff_Type,sPassword,sis_deleted)";
            $query.= "VALUES ('{$first_na}', '{$last_na}' ,'{$stfEmail}','{$stfType}','{$stfPwd}',0)";

            $result=mysqli_query($connection,$query);
            
            if($result){
                //successful 
                header('Location: users.php?user_added=true');
            
            }else{
                $errors[]= 'failed to add new record';
            }
        }
    
    }
?>

<!DOCTYPE html>
<html>
    <title>Add New Staff Member</title>
    <link rel ="stylesheet" href="../css/ums.css">
    <head>
    </head>
    <body class= ums>
        <div class=adm_ums>
            <div class="appname">User Management System</div>
            <div class="Loggedin">Welcome <?php echo $_SESSION ['sfirst_name'];?>! <a href="logout.php">Log Out</a></div>
        </div>
        <main>
        <h1> Add new Staff Member<span><a href="users.php">   << Back to Staff list</a></span></h1>
            
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
            <form action= add-user.php method ="POST" class="staffForm">
            <p class="p_stf">
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
                    <label for ="stfPwd">Set Password:</label>
                    <input type="password" name="stfPwd" name="stfPwd"> 
                </p>
                <p class="p_stf">
                    <label for ="submit">&nbsp;</label>
                    <button type="submit" name="submit"> Save </button>
                </p>
            </form>
        </main>
        
    </body>
</html>