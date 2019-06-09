<?php

include_once("includes/functions.php");
$isLogged =isLogged();
        if($isLogged ==3){
            header("Location:index.php "); 
        }
//receive form data 
$ProTitle    	= $_POST['ProTitle'];
$ProDetalis     = $_POST['ProDetalis'];
$Proprice       = $_POST['Proprice'];
$AdsID = $_POST['AdsID'];
$Maincategory = $_POST['Maincategory'];
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
	$clink;
	move_uploaded_file($fileTmpName,"assets/img/{$fileFinalName}");
	//Get the old image name/path and delete it - FROM DB
	$result = mysqli_query($clink ,"SELECT Image from advertisments where AdsID={$AdsID}");
	$row = mysqli_fetch_array($result);
	$oldImage = $row['Image'];
	@unlink("assets/img/{$oldImage}");

	//Update the DB
	}
// Connect to DB SERVER 
$errors = [];
$successes = [];
if (is_numeric($Proprice)) { 
	echo ""; 
  } else{$errors[] = 'Please write the price correct' ; 
} 
if ( 	$ProTitle == "" || 
		$ProDetalis == "" ||
		$Proprice == "" ||
		$Maincategory == "" ||
		$fileFinalName == ""  ){
		$errors[] = 'Please Fill In All Data';
		}

//3) SEND SQL query 
if (count($errors) == 0){
$result = mysqli_query($clink,"UPDATE advertisments set Details='$ProDetalis',Price='$Proprice',Image='$fileFinalName' , Title='$ProTitle' , CategoryID='$Maincategory' WHERE AdsID = '$AdsID'") or die("Cannot execute SQL - ".mysqli_error($clink));
$successes[] = 'ADS has been successfully Edit';
header("Location:profile.php");

}  else {
	$errors[] = "Please Follow The Instructions";
	header("Location: ".$_SERVER['HTTP_REFERER']);


} 
    //Add errors & success messages to the session to be displayed on the other pae	
    $_SESSION['errors']=$errors ;
    $_SESSION['successes']=$successes ;





?>