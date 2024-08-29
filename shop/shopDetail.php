<?php
  
  //To get login admin
  session_start();
  
  //to connect database
  include('../db/connection.php');
  include('../function/function.php');

  if(isset($_GET['id']))
  {
      $id=$_GET['id'];
      $gameid=$id;
      $gameData = detail($id,'game','gameid');
      $gamePhoto = $gameData['photo'];
      $gameName = $gameData['gameName'];
      $aboutGame = $gameData['aboutGame'];
      $link = $gameData['link'];
  };
  
  if(isset($_GET['action']) && $_GET['action']=='buy'){
    if (!isset($_SESSION['userEmail'])) {
        header("Location:../login.php");
      }else{
        $price=$_GET['price'];
        $product =$_GET['amount'];
        $id=$_GET['id'];
        $userid=$_SESSION['userid'];
        $unitName=$_GET['unitName'];

        $fee = ($price *5)/100;


        $userBalance = pointcheck('wallet',$userid,'mmk');
        if($userBalance+1000+$fee>$price){
            updatePoint($price,$userid,'wallet','mmk','minus');
            if(totalNumberUsingUserId($unitName,'wallet','pointName',$userid)){
                updatePoint($product,$userid,'wallet',$unitName,'plus');
                transactionG($userid,$gameid,$product,$fee,'buy');

                header("Location:../user/userWallet.php");
            }else{
                $userData=detail($userid,'user','userid');
                $userName = $userData['username'];
                addWalletRow($userid,$userName,$unitName);
                updatePoint($product,$userid,'wallet',$unitName,'plus');
                transactionG($userid,$gameid,$product,$fee,'buy');

                header("Location:../user/userWallet.php");
            }
        }else{
            echo"<script>window.alert('Insufficient Balance')</script>";
        }
      }
  };


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <!-- Css link -->
    <link rel="stylesheet" href="../css/sheetDesign.css">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="../css/loginSytle.css"> -->

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />

    <title>Shop Detail</title>


</head>
<body>

    <!-- MDB -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js" defer ></script>
    -->
    <?php include("header.php") ?>

   
        
    <div class="pt-5 mt-4">
        <div class="carousel-inner rounded-5 shadow-4-strong" style="height:60vh;position:relative">
            <div class="carousel-item active m-auto" data-bs-interval="10000" style="position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);">
                <img src="<?php echo $gamePhoto ?>" class="d-block w-100" />
            </div>
        </div>
        <div class="word text-light mx-4 mt-2">
            <h3 class="fs-3 fw-bold"><?php echo $gameName ?></h3>
            <p class="mt-2">
            <?php echo $aboutGame ?>
            <a class="" href="<?php echo $link ?>">Official Site --></a>
            </p>
            
        </div> 
        <div class="word mx-4 mt-5">
            <h2 class="text-light">Products</h2>
            <hr class="pt-1 bg-light"/>
        </div>

     <div class="shop-list p-5">

        <div class="row m-auto align-items-start">

            <?php

                global $conn;
                $query = "SELECT * from `unit` WHERE `gameid`='$id'";
                $go_query = mysqli_query($conn,$query);

                while($row = mysqli_fetch_array($go_query)){
                    $unitid=$row['unitid'];
                    $photo = $row['photo'];
                    $unitName = $row['unitName'];
                    $product = $row['product'];
                    $price = $row['price'];
                    echo"
                    <div class='card align-item-start col-lg-4 col-md-6 col-sm-12 m-auto mt-3' style='width:12rem; bg-color:dark;'>
                    <div class='img-wrapper pt-3'>
                                <img src='{$photo}' class='rounded ratio ratio-1x1' alt='Product Image'>
                                
                                <div class=''>
                                      <h3 class='fs-4'>{$unitName}</h3>
                                      <p> {$product} - {$price}ks</p>
                                      <a href='shopDetail.php?action=buy&id={$id}&unitName={$unitName}&amount={$product}&price={$price}' class='align-item-start btn btn-success w-80 m-3'>Buy</a>
                                </div>
                    </div>
                </div>
                    "; 
                }
            ?>


        </div>

    </div>
            
    </div>
        <!-- <div class="mx-4">
            <div class="card" style="width: 13rem;">
            <div class="card-img-top">
                <img src="../images/shop/twilightpass.jpeg" alt="..." class="w-100 rounded-top">
            </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text w-100">10000 Diamonds - 1000ks</p>
                <a href="#" class="btn btn-primary">Buy</a>
              </div>
            </div>
            
        </div> -->
        <!-- dull background for modal box -->
        <!-- <div class="backdrop"></div> -->

        <!-- modal box -->
        <!-- <div class="modalBox"  id="modalBox">
            <div class="bg-white p-4 border rounded-6">
                <h4 class="password">Please Enter Your Password</h4>
                <p><
                ?php echo $product?> = <
                ?php echo $price?></p>
                <a href="./shopDetail.php?action=buyNow&passow" class="btn btn-primary">Buy Now</a>
            </div>

        </div>
    </div> -->


    <?php
        include("./footer.php");
    ?>
</body>
</html>