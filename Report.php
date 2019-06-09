<?php
include_once("includes/functions.php");
$isLogged =isLogged();
        if($isLogged ==1){
            header("Location:index.php "); 
		}
$AdsID = $_POST['AdsID'];
$Detalis = $_POST['Detalis'];
$UserID = $_SESSION['loggedInUserId'];
$Date = date("y-m-d");

//1) Connect to DB SERVER 
//3) SEND SQL query 
$result = mysqli_query($clink,"INSERT INTO `report` (`UserID`, `AdsID`, `details`, `Date`) 
VALUES ($UserID, '$AdsID', '$Detalis', '$Date' );
") or die("Cannot execute SQL - ".mysqli_error($clink));
$successes[] = 'The Report was send';
$_SESSION['successes']=$successes ;
//4) Receive & Report result
header("Location: ".$_SERVER['HTTP_REFERER']); 

?>