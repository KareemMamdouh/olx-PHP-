<?php
include_once("includes/functions.php");
$cid=$_GET['cid'];
$areas=getCityAreas($cid);
echo "
<div class='form-group' id='areaDiv'>
<label for='exampleFormControlSelect1'>Area</label>
<select class='from-control' id='exampleFormControlSelect1' name='areas' >";
for($i=0;$i<sizeof($areas);$i++){
    echo "<option value='{$areas[$i][0]}'>{$areas[$i][1]}</option>";
}
    echo"</select>
        </div>";

	?>