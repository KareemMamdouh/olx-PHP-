<?php
include_once("includes/functions.php");



?>
<!DOCTYPE html>
<head>
<title>links</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="assets/css/pageads.css"/>

<script>

    function getareas(cid){
        $(document).ready(function(){
            $.get("getAreas.php?cid="+cid, function(data, status){
                $("#areaDiv").html(data);
            });
        });
    }

</script>
</head>
<body>

<?php
drawHeader();
?>

<section class="ads">
        <?php
        // get id ads to get information ads
        $AdsID = $_GET['ADS-ID'];
        $clink;
        $resultADS=mysqli_query($clink,"SELECT Date,Details,Price,Image,Status,Title,CategoryID,UserID FROM advertisments WHERE AdsID=$AdsID");
        $rowADS=mysqli_fetch_assoc($resultADS);
        $UserID = $rowADS['UserID'];
        // admin only can to visit this page
        if ($rowADS['Status'] == 0 && isLogged() !== 2 ){
            header('location:index.php');
        }
        ######################### get information user by UserID owner ADS
        $resultuser=mysqli_query($clink,"SELECT UserName,Email,Phone,areaID FROM users WHERE UserID=$UserID");
        $rowuser=mysqli_fetch_assoc($resultuser);
        ######################### get name area  by areasID
        $areaID = $rowuser['areaID']; 
        $resultareas=mysqli_query($clink,"SELECT areaName,cityID FROM areas WHERE areaID=$areaID");
        $rowareas=mysqli_fetch_assoc($resultareas);
        ######################### get name city by cityID
        $cityID = $rowareas['cityID']; 
        $resultcity=mysqli_query($clink,"SELECT cityName FROM cities WHERE cityID=$cityID");
        $rowcity=mysqli_fetch_assoc($resultcity);
        ####################################################################################
        ########################## get name categories ID
        $CategoryID = $rowADS['CategoryID'];
        $resultCategory=mysqli_query($clink,"SELECT CategoryName FROM categories WHERE CategoryID=$CategoryID");
        $rowCategory=mysqli_fetch_assoc($resultCategory);
        #############################################################################  get name report user ID
        $AdsID ; 
        $resultreport=mysqli_query($clink,"SELECT UserID FROM report WHERE AdsID=$AdsID");
        $rowreport=mysqli_fetch_assoc($resultreport);
        ?>
        <div class="container">
            <hr>
                
            <div class="card">
                    <div class="row">
                        <aside class="col-sm-5 border-right">
                            <div class="text-center "> <a href="#"><img src='assets/img/<?php echo $rowADS['Image'];?>'></a></div>
                            <hr>
                            <div class=" pl-5">
                                <dl class="param param-feature">
                                    <dt>user name</dt>
                                    <dd><?php echo $rowuser['UserName'];?></dd>
                                </dl>  <!-- item-property-hor .// -->
                                <dl class="param param-feature">
                                    <dt>Email </dt>
                                    <dd><?php echo $rowuser['Email'];?></dd>
                                </dl>  <!-- item-property-hor .// -->
                                <dl class="param param-feature">
                                    <dt>phone</dt>
                                    <dd><?php echo $rowuser['Phone'];?></dd>
                            </dl>  <!-- item-property-hor .// -->
                            </dl>  <!-- item-property-hor .// -->
                            <dl class="param param-feature">
                                <dt>Address</dt>
                                <dd><?php echo $rowcity['cityName'] ." , ".$rowareas['areaName'];?></dd>
                            </dl>  <!-- item-property-hor .// -->
                            </div> <!-- card-body.// -->
                        </aside>
                        <aside class="col-sm-7">
                            <article class="card-body p-5">
                                <h3 class="title mb-3"><?php echo $rowADS['Title'];?></h3>
                            <dl class="item-property">
                                <dt>Description</dt>
                                    <dd><p><?php echo $rowADS['Details'];?></p></dd>
                            </dl>
                            <dl class="param param-feature">
                                <dt>price</dt>
                                <dd><?php echo $rowADS['Price'];?></dd>
                            <dl class="param param-feature">
                                <dt>date</dt>
                                <dd><?php echo $rowADS['Date'];?></dd>
                            </dl>  <!-- item-property-hor .// -->
                            <dl class="param param-feature">
                                <dt>category</dt>
                                <dd><?php echo $rowCategory['CategoryName'];?></dd>
                            </dl>  <!-- item-property-hor .// -->
                            <hr>

                                <?php 

                                if (isLogged() == 1 && $_SESSION['loggedInUserId'] !== $rowreport['UserID'] ){
                                    if(isset($_SESSION['loggedInUserId']) AND $_SESSION['loggedInUserId'] !== $rowADS['UserID']) {
                                        echo '<a href="" class="btn btn-lg btn-danger text-uppercase float-right" data-toggle="modal" data-target="#myModal2">Report</a>';
                                    }
                                    echo "
                                    <div class='modal' id='myModal2'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content LogIn'>
                                                    <div class='modal-header'>
                                                        <h4 class='modal-title'>Report</h4>
                                                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <div class='col-12 float-left'>
                                                            <form action='Report.php' method='POST'>
                                                                <div class='form-group'>
                                                                    <textarea placeholder='Detalis' name='Detalis' id='my-input' class='form-control ' rows='5'></textarea>
                                                                    <input type='hidden' name='AdsID' value='$AdsID'>
                                                                </div>
                                                                <button type='submit' class='btn btn-lg btn-danger text-uppercase float-right'>send</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                }else if (isLogged() == 3 ){
                                echo "
                                <a href='' class='btn btn-lg btn-danger text-uppercase float-right' data-toggle='modal' data-target='#myModal'>Report</a>";
                            }else{
                                echo "";
                            }?>
                                <?php 
                                if ($rowADS['Status'] == 1 &&(isLogged() == 2) ){
                                    echo "<br><a href='adsshoworhide.php?ADS-ID={$AdsID}' class='btn btn-danger mt-2 float-right' >Hide<a>";
                                }else if  ($rowADS['Status'] == 0 &&(isLogged() == 2) ) {
                                    echo "<br><a href='adsshoworhide.php?ADS-ID={$AdsID}' class='btn btn-primary mt-2 ' >Show<a>";

                                }
                                ?>
                            </article> <!-- card-body.// -->
                    </aside> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- card.// -->
        </div>
            <!--container.//-->

</section>
<section class="comment">

<div class="container px-5">
        <?php 
        // $resultcomments=mysqli_query($clink,"SELECT users.UserName, comments.Date, comments.Details , comments.UserID
        //                                             from users , comments 
        //                                             WHERE comments.AdsID=$AdsID 
        //                                             and users.UserID=comments.UserID");
        
        // while($rowcomments = mysqli_fetch_assoc($resultcomments)){
        // echo "<div class='card'>
        //     <div class='card-header'>{$rowcomments['UserName']}</div>
        //     <div class='card-body'>{$rowcomments['Details']}</div>
        //     <div class='card-footer text-right'>{$rowcomments['Date']}</div>
        // </div>";
        // used function
        echo "<div class='listcomments '>";
        $comments = getcomments(); 
        for($i=0;$i<@sizeof($comments);$i++)
                    {if($comments[$i]['Status'] == 1 ){
                        echo "
                        <div class='p-1' >

                        <div class='card '>
                        <div class='card-header pt-1 pb-1'>    
                            <img src='assets/img/user.jpg'> <span class='float-right pt-4'>{$comments[$i]['Date']}</span>
                        {$comments[$i]['UserName']}</div>
                        <div class='card-body pt-2 pb-2 '>{$comments[$i]['Details']}</div>
                        </div>
                        "; 
                        // show button
                        if ($comments[$i]['Status'] == 1 &&(isLogged() == 2) ){
                            echo "<a href='commentshoworhide.php?comment-ID={$comments[$i]['commentID']}' class='btn btn-danger mt-2' >Hide<a>";
                        }
                        echo "</div> ";
                    } else if (isLogged() == 2){
                        echo "
                        <div class='p-1 ' >

                        <div class='card overright'>
                        <div class='card-header pt-1 pb-1'>    
                            <img src='assets/img/user.jpg'> <span class='float-right pt-4'>{$comments[$i]['Date']}</span>
                        {$comments[$i]['UserName']}</div>
                        <div class='card-body pt-2 pb-2'>{$comments[$i]['Details']}</div>
                        </div>
                        "; 
                        // show button 
                            if ($comments[$i]['Status'] == 0 &&(isLogged() == 2) ){
                            echo "<a href='commentshoworhide.php?comment-ID={$comments[$i]['commentID']}' class='btn btn-primary mt-2 ' >Show<a>";
                        }
                        echo "</div> ";
                    }else{
                        echo "";
                    }

		}
        ?> 
        </div>
    <form action="sendcomment.php"  method='POST'>
            <div class="form-group" >
                <label >comments</label>
                <input type="hidden" name="AdsID" value="<?php echo $AdsID ?>" >
                <textarea class="form-control" name="textarea"  rows="3"></textarea>
                <input 
                <?php $isLogged =isLogged();
                if($isLogged ==1 || $isLogged ==2){
                    echo "type='submit' class='btn btn-primary float-right 'value='send'  ";
                }else {
                    echo "class='btn btn-primary float-right mb-5' data-toggle='modal' data-target='#myModal' value='send' name='submitlogin'";
                }
                ?> >
            </div>
    </form>
</div>

</section>

<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>