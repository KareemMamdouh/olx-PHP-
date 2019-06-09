<?php
include_once("includes/functions.php");
?>
<?php
    $ReceivedUserName = trim(strtolower($_POST['UserName']));    
    $ReceivedEmail = trim(strtolower($_POST['Email'])); 
    $ReceivedPassword = trim(strtolower($_POST['Password']));   
    $ReceivedConfirmPassword = trim($_POST['ConfirmPassword']);   
    $ReceivedPhone = trim($_POST['Phone']);
    $Receivedtype = trim(strtolower($_POST['type']));
    $Receivedareas = trim($_POST['areas']);   
    $errors = [];
    $successes = [];

//Validate for Password 
if($ReceivedPassword != $ReceivedConfirmPassword){
        $errors[] = 'Password and confirm donot match';
}
if ($ReceivedUserName == "" ||  
$ReceivedEmail == "" ||             
$ReceivedPassword == "" ||        
$ReceivedConfirmPassword == "" ||   
$ReceivedPhone == "" ||  
$Receivedtype == "" ||           
$Receivedareas == ""  ){
    $errors[] = 'Please Fill In All Data';
}
//Validate for data 

//Check for user 
//Connect to DB [done from file functions]
//Seledct all users with the same data

$result = mysqli_query($clink, "SELECT * from users WHERE  Phone='{$ReceivedPhone}' ") or die(mysqli_error($clink));
if(mysqli_num_rows($result)>0){
    //DB found a user with this Phone
    $errors[] = 'Phone is not available, Please try a different one';
}
$result = mysqli_query($clink, "SELECT * from users WHERE  Email='{$ReceivedEmail}' ") or die(mysqli_error($clink));
if(mysqli_num_rows($result)>0){
    //DB found a user with this Email
    $errors[] = 'Email is not available, Please try a different one';
}
if (count($errors) == 0){

    $qq = "INSERT INTO `users` (`UserID`, `UserName`, `Email`, `Password`, `Phone`, `type`, `Status`,`areaID`) VALUES
	(NULL, '$ReceivedUserName', '$ReceivedEmail', '$ReceivedPassword', '$ReceivedPhone',  '$Receivedtype', 1 , '$Receivedareas')";
    $successes[] = 'User data has been successfully saved';
    $result = mysqli_query($clink, $qq ) or die (mysqli_error($ch));
    header("Location: ".$_SERVER['HTTP_REFERER']); 
}  else {
        $errors[] = "Please Follow The Instructions";
        header("Location: ".$_SERVER['HTTP_REFERER']); 
    } 
    //Add errors & success messages to the session to be displayed on the other pae	
    $_SESSION['errors']=$errors ;
    $_SESSION['successes']=$successes ;

	?>