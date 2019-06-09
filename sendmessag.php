<?php
include_once("includes/functions.php");
$isLogged =isLogged();
        if($isLogged ==3){
            header("Location:index.php "); 
		}//receive form data 
$textarea 	= $_POST['textarea'];
$date = date("y-m-d h:i:s");
$AdsID = $_POST['AdsID'];
$UserID = $_SESSION['loggedInUserId'];
$OwnerAdsID =    $_POST['UserID']       ;
//1) Connect to DB SERVER 
//2) SELECT DB NAME 
$clink ;

//3) SEND SQL query 
$result = mysqli_query($clink,"INSERT INTO `chat` (`ChatID`, `AdsID`, `OwnerAdsID`, `Message`,`UserAccountID`, `Date`) VALUES
(NULL, '$AdsID', '$OwnerAdsID', '$textarea', '$UserID', '$date')") or die("Cannot execute SQL - ".mysqli_error($clink));

// ECHO 'comment  has been successfully saved <br>';
// header("refresh:2;url=index.php");
header("Location: ".$_SERVER['HTTP_REFERER']); 



?>