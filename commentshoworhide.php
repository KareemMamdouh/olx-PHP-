<?php
include_once("includes/functions.php");
?>
<?php
showandhide('comments','commentID',$_GET['comment-ID']);
header("Location: ".$_SERVER['HTTP_REFERER']); 

	?>