<?php
include_once("includes/functions.php");
$isLogged =isLogged();
        if($isLogged ==3){
            header("Location:index.php "); 
        }?>
<!DOCTYPE html>
<head>
<title>links</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
</head>
<body>
<header class="header">
<?php
drawHeader(1);

?>
<section class="commercial-asd container">
        <?php

        //1) GET uid value from URL
        $AdsID = $_GET['ADS-ID'];


        //2) Connect to DB SERVER 
        $clink;

        //3) SEND SQL query -> SELECT
        $result = mysqli_query($clink,"	SELECT * FROM advertisments WHERE AdsID=$AdsID 	") or die("Cannot execute SQL - ".mysqli_error($clink));


        $row = mysqli_fetch_assoc($result);


        //4) Show edit form + insert data into the fields

        ?>
    <h2>Place an Ad</h2>
    <form action="editsaveads.php" method="post" enctype="multipart/form-data">
    <input class="kolo" type="text" name="ProTitle" placeholder="Title" alt="wating"title="Pleaes write Your Title" value="<?php ECHO $row['Title']; ?>"  >
    <input  class="kolo" placeholder="<?php ECHO $row['Details']; ?>" name="ProDetalis" class="form-control " rows="5" value="<?php ECHO $row['Details']; ?>"  > 
    <!-- <textarea placeholder="Detalis" name="ProDetalis" id="my-input" class="form-control " rows="5"></textarea> -->
    <input class="kolo" type="text" name="Proprice" placeholder="price" alt="wating"title="Pleaes write Your price" value="<?php ECHO $row['Price']; ?>"  >
    <input class="kolo" type="file" name="image"  >
    <?php 
        if($row['Image'] !== ''){
        echo "<img  src='assets/img/{$row['Image']}' style='width:100px;'/> <br>";
        } 
    ?>
    
        <select class="kolo" name="Maincategory" value="<?php ECHO $row['CategoryID']; ?>">
            <?php
            $resultcategories=mysqli_query($clink,"SELECT CategoryID , CategoryName FROM categories");
            while ($rowcategories=mysqli_fetch_assoc($resultcategories)){
                echo "<option  value='{$rowcategories['CategoryID']}'>{$rowcategories['CategoryName']}</option>";
            }
            
            ?>
        </select>
        <input type="hidden" name="AdsID" value="<?php echo $AdsID ?>">
    <input class="btn" type="submit" value="save" >
    </form>
    <a class="btn" href="deleteads.php?ADS-ID=<?php echo $AdsID?>" style="color:#fff;background-color:red;">Delete</a>

    
</section>





<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>