<?php
session_start();
include_once("includes/config.php");

################################################# DB CONNECTION
/**
* connect to DB server - If not connection - die + message
* @return conectionLink
*/
function dbConnect(){
	global $dbHost,$dbUser,$dbPass,$dbName;
	
	$clink = @mysqli_connect($dbHost,$dbUser,$dbPass,$dbName) or die("Connection Failed");
	return $clink ;
}
$clink = dbConnect();
################################################# Header
function drawHeader($s=0){

	
	ECHO "
	<header class='header'>
    <div class='container'>
        <a href='index.php' ><img href='index.php' src='assets/img/olx.png'></a>";
		if(isLogged() == 1){
			logout();
			myaccount();
			echoaddadslog($s);
			echo "<div class='container'>";

			if(isset($_SESSION['errors']) and count($_SESSION['errors'])){
				$errors = implode("<br>",$_SESSION['errors']);
				outputMessage($errors,'danger');
			}
			
			//Show success messages  if exists
			if(isset($_SESSION['successes']) and count($_SESSION['successes'])){
				$successes = implode("<br>",$_SESSION['successes']);
				outputMessage($successes);
			}
			//Remove errors & successes from session 
			unset($_SESSION['errors']);
			unset($_SESSION['successes']);



			
			echo "</div>";
			
		}else if(isLogged() == 2){
			logout();

			ECHO "<a  href='controlAccountsUsers.php' ><button type='button' class='btn btnuserlogn' name='submitlogin'>
			Admin control Panel
			</button></a>
			</header>";
		}else{
			echologinform();
			echoRegisterform();
			echoaddadsnolog();
			echo "<div class='container'>";

					if(isset($_SESSION['errors']) and count($_SESSION['errors'])){
						$errors = implode("<br>",$_SESSION['errors']);
						outputMessage($errors,'danger');
					}
					
					//Show success messages  if exists
					if(isset($_SESSION['successes']) and count($_SESSION['successes'])){
						$successes = implode("<br>",$_SESSION['successes']);
						outputMessage($successes);
					}
					//Remove errors & successes from session 
					unset($_SESSION['errors']);
					unset($_SESSION['successes']);
					//Show error messages  if exists
					if(isset($_SESSION['errorsLogin']) and count($_SESSION['errorsLogin'])){
						$errors = implode("<br>",$_SESSION['errorsLogin']);
						outputMessage($errors,'danger');
						unset($_SESSION['errorsLogin']);}
			}
			echo "</div>";

		}



#################################################  buttons

function echologinform (){
	ECHO "          
	<button type='button' class='btn btnuserlogn'data-toggle='modal' data-target='#myModal' >
	login
	</button>

	<div class='modal' id='myModal'>
			<div class='modal-dialog'>
				<div class='modal-content LogIn'>
					<div class='modal-header'>
						<h4 class='modal-title'>Login</h4>
						<button type='button' class='close' data-dismiss='modal'>&times;</button>
					</div>
					<div class='modal-body'>
						<div class='col-12 float-left'>
							<form action='login.php' method='POST'>
								<div class='form-group'>
									<label for='usr'>Email:</label>
									<input type='text' class='form-control'  placeholder='Your Email' name='usernamelogin'>
									<label for='pwd'>Password:</label>
									<input type='password' class='form-control'  placeholder='password' name='passwordlogin'>
								</div>
								<button type='submit' class='btn '>Log In</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	";  
}

function echoRegisterform() {
	echo "	
	<button type='button' class='btn btnuserlogn' data-toggle='modal' data-target='#myModal1' name='submitlogin'>
	signup
	</button>
		<!-- The Modal Register -->
	<div class='modal' id='myModal1'>
		<div class='modal-dialog'>
			<div class='modal-content Register'>
				<!-- Modal Header -->
				<div class='modal-header'>
						<h2>Register</h2>
	
					<button type='button' class='close' data-dismiss='modal'>&times;</button>
				</div>
				<!-- Modal body -->
				<div class='modal-body'>

					<form class='form-horizontal' action='signupsave.php' method='POST'>

					
						<div class='form-group'>
							<label class='control-label col-sm-5' >Name</label>
							<div class='col-sm-12'>
								<input type='text' class='form-control' placeholder='Name' name='UserName'>
							</div>
						</div>
						<div class='form-group'>
							<label class='control-label col-sm-5' >Email:</label>
							<div class='col-sm-12'>
								<input type='email' class='form-control'  placeholder='Your Email' name='Email'>
							</div>
						</div>
						<div class='form-group'>
							<label class='control-label col-sm-5' >Password:</label>
							<div class='col-sm-12'>
								<input type='password' class='form-control'  placeholder='password' name='Password'>
							</div>
						</div>
						<div class='form-group'>
							<label class='control-label col-sm-5' for='pwd'>Confirm password:</label>
							<div class='col-sm-12'>
								<input type='password' class='form-control'  placeholder='Confirm password' name='ConfirmPassword'>
							</div>
						</div>
						<div class='form-group'>
							<label class='control-label col-sm-5' for='pwd'>Phone Number</label>
							<div class='col-sm-12'>
								<input type='text' class='form-control'  placeholder='Phone Number' name='Phone'>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-12'>
							<label>City</label>
							<select class='form-control' onchange='getareas(this.value)' name='city'> ";
									$cities=getAllCities();
									for($i=0;$i<sizeof($cities);$i++)
									{
										echo " <option value='{$cities[$i][0]}'>{$cities[$i][1]}</option>";
									}
									echo"
							</select>
							</div>
						</div>
						<div class='form-group' >
							<div class='col-sm-12'>
							<label>Area</label>
							<select id='areaDiv'  name='areas' class='form-control' >";
									$areas=getCityAreas(1);
									for($i=0;$i<sizeof($areas);$i++)
									{
										echo " <option value='{$areas[$i][0]}'>{$areas[$i][1]}</option>";
									}
								echo"
							</select>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-12'>
								<select class='form-control' name='type'>
								<option value='1'>Male</option>
								<option value='2'>Femael</option>
								</select>
							</div>
						</div>
						
						<div class='form-group'>
							<div class='col-sm-offset-3 col-sm-12'>
								<button type='submit' name='submitRegister' class='btn btn-default'>Submit</button>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	</div> ";
}

function echoaddadslog($s){
	if ($s==0){
	echo "</header>
	<div class='container control'>
	<a   class='btn btn-lg btn-block addads ' href='createads.php'>+ Place an Ad</a></div>";
	}else {
	echo "</header>";
	}
}

function echoaddadsnolog(){
	echo "</header>
	<div class='container control'>
	<a   class='btn btn-lg btn-block addads ' href='' data-toggle='modal' data-target='#myModal'>+ Place an Ad</a>
	</div>
	";
}

function myaccount(){
	echo "
	<a  href='profile.php' ><button type='button' class='btn btnuserlogn'  name='submitlogin'>
	";
	echo $_SESSION['usernamelogin'];
	echo"</button></a>";
}

function logout(){
	echo "<a  href='logout.php' ><button type='button' class='btn btnuserlogn' name='submitlogin'>
	logout
	</button></a>";
}

################################################# select city and area
function getAllCities(){
    $cities=[];
    global $clink;
    $result=mysqli_query($clink,"SELECT cityID, cityName FROM cities ");
    while($row=mysqli_fetch_row($result))
    {
        $cities[]=$row;
    }
    return $cities; 
}
function getCityAreas($cityID){
    $areas=[];
    global $clink;
	$result=mysqli_query($clink,"SELECT areaID, areaName FROM areas WHERE cityID=$cityID");
    while($row=mysqli_fetch_row($result))
    {
        $areas[]=$row;
    }
    return $areas;
}



################################################# Test user is logged or not 
/**
* Check if there is a logged in user or not
*/
function isLogged(){
	if(isset($_SESSION['LOGGEDIN'])){
		//Logged in user
		return 1 ;
	}else if (isset($_SESSION['admin'])) {
		//Logged in  by admin
		return 2 ;
	}
	else{
		//NOT Logged in 
		return 3 ;
	}
}



################################################# get comments 

function getcomments(){
	global $AdsID ;
	global $clink ;
	global $comments ;
	$resultcomments=mysqli_query($clink,"SELECT users.UserName, comments.Date, comments.Details , comments.UserID ,comments.Status,comments.commentID
	from users , comments 
	WHERE comments.AdsID=$AdsID 
	and users.UserID=comments.UserID");
	while($rowcomments = mysqli_fetch_assoc($resultcomments)){
				$comments[] = $rowcomments;
			}return $comments;
	
}

function showandhide($table,$where,$value) {
	global $clink ;
	$result = mysqli_query($clink ,"SELECT Status from $table where $where={$value}");
	$row = mysqli_fetch_array($result);
	if($row['Status'] == 1 ){
		$result1 = mysqli_query($clink,"UPDATE $table set Status='0' WHERE $where = '$value'") or die("Cannot execute SQL - ".mysqli_error($clink));
		return $result1;
	}else {
		$result2 = mysqli_query($clink,"UPDATE $table set Status='1' WHERE $where = '$value'") or die("Cannot execute SQL - ".mysqli_error($clink));
		return $result2;

	}
}

################################################# output messages

function outputMessage($message='',$type='success'){
	ECHO "<div class='alert alert-{$type}'>{$message}</div>";
}
?>