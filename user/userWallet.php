<?php
  
  //To get login admin
  session_start();
  include('../function/function.php');
  include('../db/connection.php'); 

  $userName = $_SESSION['username'];

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

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />

    <title>User Wallet</title>

</head>
<body>
    <?php
        include('header.php');
    ?>
    <!-- MDB -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js" defer ></script> -->
  
    <!-- user wallet session -->
    <div class="container mx-5 my-5 pt-5">
        <div class="img-wrapper mt-5 d-flex align-items-center">
            <img src="../images/userPhoto/<?php echo $_SESSION['userPhoto']?>" height="120" alt="" class=" rounded" />      
            <div class="profile-name text-light ms-4">
                <h3><?php echo $_SESSION['username'];?></h3>
            </div>      
        </div>
        <div class="pt-1 bg-light mt-5"></div>
        <div class="point-wrapper mt-5">
                <?php
                global $conn;
                $query = "SELECT * from `wallet` WHERE `username`='$userName'";
                $go_query = mysqli_query($conn,$query);
                while($userWallet=mysqli_fetch_array($go_query)){
                    $pointName =$userWallet['pointName'];
                    $amount =$userWallet['amount'];
                    echo"
                    <div class='d-flex  mb-3 w-25 me-2'>
                        <div class='logo-wrapper w-50'>
                            <div class='logo text-light fs-3 '>{$pointName}</div>
                        </div>
                        <div class='fs-3 text-light mx-3'>-</div>
                        <div class='amount fs-3 text-light'>{$amount}</div>
                    </div>
                    ";
                }
                ?>
        </div>
        <div class="button-wrapper text-light mt-5">
            <a href="./cashIn.php" class="btn text-light btn-success me-3">Cash In</a>
            <a href="./cashOut.php" class="btn text-light btn-success mx-3">Cash Out</a>
            <a href="./withDraw.php" class="btn text-light btn-success mx-3">Withdraw</a>
            <a href="./transfer.php" class="btn text-light btn-success mx-3">transfer</a>
        </div>
    </div>
    <!-- user walllet session end -->
<?php include("../footer.php")
?>
</body>
</html>