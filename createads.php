<?php
include_once("includes/functions.php");
$isLogged =isLogged();
        if($isLogged ==3){
            header("Location:index.php "); 
        }
?>
<!DOCTYPE html>
<head>
<title>links</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
</head>
<body>
<header class="header">
<?php
drawHeader(1);

?>
<section class="commercial-asd container">

    <h2>Place an Ad</h2>
    <form action="addads.php" method="post" enctype="multipart/form-data">
    <input class="kolo" type="text" name="ProTitle" placeholder="Title" alt="wating"title="Pleaes write Your Title" require >
    <textarea placeholder="Detalis" name="ProDetalis" id="my-input" class="form-control " rows="5"></textarea>
    <input class="kolo" type="text" name="Proprice" placeholder="price" alt="wating"title="Pleaes write Your price" require>
    <input class="kolo" type="file" name="image" >
        <select class="kolo" name="Maincategory">
        <?php
        $resultcategories=mysqli_query($clink,"SELECT CategoryID , CategoryName FROM categories");
        while ($rowcategories=mysqli_fetch_assoc($resultcategories)){
            echo "<option value='{$rowcategories['CategoryID']}'>{$rowcategories['CategoryName']}</option>";
        }
        
        ?>
        </select>
    <input class="btn" type="submit" value="save" >
    </form>

    
</section>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>