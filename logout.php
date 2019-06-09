<?php
SESSION_START();
SESSION_DESTROY();
ECHO "<div style='color:green;text-align:center;'>logged out successfuly</div>";
header("location:index.php");
?>