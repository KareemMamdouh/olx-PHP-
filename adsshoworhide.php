<?php
include_once("includes/functions.php");
?>
<?php
showandhide('advertisments','AdsID',$_GET['ADS-ID']);
header("Location: ".$_SERVER['HTTP_REFERER']); 

	?>