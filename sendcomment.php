<?php
include_once("includes/functions.php");
$isLogged =isLogged();
        if($isLogged ==3){
            header("Location:index.php "); 
		}//receive form data 
$textarea 	= $_POST['textarea'];
$date = date("y-m-d");
$AdsID = $_POST['AdsID'];
if(isLogged() == 1){
    $UserID = $_SESSION['loggedInUserId'];
}else if(isLogged() == 2){
    $UserID =0;
}else{
    header("Location:index.php "); 
}

if (empty(trim($textarea))){
    header("Location: ".$_SERVER['HTTP_REFERER']); 

}else{
//1) Connect to DB SERVER 
//2) SELECT DB NAME 
$clink ;

//3) SEND SQL query 
$result = mysqli_query($clink,"INSERT INTO `comments` (`commentID`, `Date`, `Status`, `Details`, `UserID`, `AdsID`) VALUES
(NULL, '$date', '1', '$textarea', '$UserID', '$AdsID')") or die("Cannot execute SQL - ".mysqli_error($clink));

//4) Receive & Process result


// ECHO 'comment  has been successfully saved <br>';
// header("refresh:2;url=index.php");
header("Location: ".$_SERVER['HTTP_REFERER']); 
}


?>