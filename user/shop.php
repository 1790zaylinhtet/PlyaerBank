<?php
  
  //To get login admin
  session_start();
  

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

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js" defer ></script>
    <?php include("header.php");?>

    <!-- wallper session  -->
    <div class="container w-100 mt-5 pt-5" >
            <div class="row rounded-5 shadow-4-strong" style="height:60vh;position:relative">
                <div class="col-12 m-auto" style="position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);">
                    <img src="../images/mlbb.jpg" class="d-block w-100"
                    alt="Sunset Over the City" />
                </div>
            </div>
    </div>
    <!-- wallpaper session end -->
</body>
</html>