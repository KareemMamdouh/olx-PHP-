<?php
include_once("includes/functions.php");
$isLogged =isLogged();
        if($isLogged ==3){
            header("Location:index.php "); 
		}
//receive form data 
$Title 	= $_POST['ProTitle'];
$Detalis= $_POST['ProDetalis'];
$price 	= $_POST['Proprice'];
$Maincategory 	= $_POST['Maincategory'];
$UserID = $_SESSION['loggedInUserId'];
$date = date("y-m-d");
// Connect to DB SERVER 
$errors = [];
$successes = [];
//$image 	= $_POST['image']; // receive file name ONLY
$fileFinalName = '';
if($_FILES['image']['name']){
	$fileName 		= $_FILES['image']['name'];
	$fileType 		= $_FILES['image']['type'];
	$fileTmpName 	= $_FILES['image']['tmp_name'];
	$fileError 		= $_FILES['image']['error'];
	$fileSize 		= $_FILES['image']['size'];
	$fileFinalName = time().rand().'_'.$fileName ;
	//Move uploaded file from tmp directory to assets/images/products 
	move_uploaded_file($fileTmpName,"assets/img/{$fileFinalName}");
	}
	if (is_numeric($price)) { 
		echo ""; 
	  } else{$errors[] = 'Please write the price correct' ; 
	} 
	if ( 	$Title == "" || 
			$Detalis == "" ||
			$price == "" ||
			$Maincategory == "" ||
			$fileFinalName == ""  ){
			$errors[] = 'Please Fill In All Data';
			}
			
//1) Connect to DB SERVER 
//2) SELECT DB NAME 
$ch = @mysqli_connect("localhost",'root','','olx') or die("Connection Failure");

//3) SEND SQL query 
if (count($errors) == 0){
$result = mysqli_query($ch,"INSERT INTO `advertisments` (`AdsID`, `Date`, `Status`, `Details`, `Price`, `Image`, `Title`,
`UserID`, `CategoryID`) VALUES (NULL, '$date', '1', '$Detalis', '$price', '$fileFinalName', '$Title', '$UserID', '$Maincategory');
") or die("Cannot execute SQL - ".mysqli_error($ch));
$successes[] = 'ADS has been successfully saved ';
header("Location: profile.php"); 
}  else {
	$errors[] = "Please Follow The Instructions";
	header("Location: ".$_SERVER['HTTP_REFERER']); 
} 


//Add errors & success messages to the session to be displayed on the other pae	
$_SESSION['errors']=$errors ;
$_SESSION['successes']=$successes ;

?>