<?php
include_once("includes/functions.php");
$isLogged =isLogged();
        if($isLogged ==3){
            header("Location:index.php "); 
        }

//1) Connect to DB SERVER 
$clink;
//2) GET uid value from URL
$AdsID = $_GET['ADS-ID'];

//3) SEND SQL query -> DELETE
$result = mysqli_query($clink,"	DELETE FROM advertisments WHERE AdsID=$AdsID ") or die("Cannot execute SQL - ".mysqli_error($clink));
$successes[] = 'ADS has been successfully Edit ';
$_SESSION['successes']=$successes ;

//4) Receive & Process result
header("Location: profile.php"); 



?>