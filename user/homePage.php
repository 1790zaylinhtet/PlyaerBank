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

    <title>Player Bank</title>

</head>
<body>

    <!-- MDB -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js" defer ></script>
    -->
    <?php include("./header.php") ?>
    <!-- Carousel wrapper -->
    <div class="container-overflow ">
        <div id="carouselMaterialStyle" class="carousel slide carousel-fade" data-mdb-ride="carousel" data-mdb-carousel-init>

                <!-- Inner -->
            <div class="carousel-inner container-fluid" style="height:70svh; position:relative;">
                <!-- Single item --> 
                <div class="carousel-item active m-auto" data-bs-interval="1000" style="position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);">
                    <img src="../images/mlbb.jpg" class="d-block w-100"
                    alt="Sunset Over the City" />
                </div>

                <!-- Single item -->
                <div class="carousel-item m-auto" data-bs-interval="1000" style="position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);">
                    <img src="../images/pubg.jpeg" class="d-block w-100"
                    alt="Canyon at Nigh" />
                </div>

                <!-- Single item -->
                <div class="carousel-item m-auto" data-bs-interval="1000" style="position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);">
                    <img src="../images/dota2.jpg" class="d-block w-100"
                    alt="Cliff Above a Stormy Sea" />
                </div>
            </div>
            <!-- Inner -->

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
    </div>
    <!-- Carousel wrapper -->

    <!-- advertise session -->
    <div class="container-fluid my-5">
        <div class="row p-auto mx-3">
            <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
                <img src="../images/gameBundle.png" class="w-75" alt="">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-light d-flex align-items-center">
                <div class="word">
                    <h3 class="fs-1 fw-bold">Every Player Need</h3>
                    <h3 class="fs-1 fw-bold">A Player Bank....</h3>
                    <p class="mt-4">Enjoy the seemless experiance by creating an account for purchasing varieties of digital game's currancy in ONE place anytime you want!</p>
                    <a href="./register.php" class="btn p-3 btn-primary mt-3"data-mdb-ripple-init>Creat Your Own</a>
                </div> 
            </div>
        </div>
    </div>
    <!-- advertise session end -->
  
    <!-- shops session -->
    <div class="container-fluid">
        <div class="word mx-3">
            <h2 class="text-light">Recently Added</h2>
            <hr class="pt-1 bg-light"/>
        </div>
        <div class="shop-list m-5">
            <div class="row m-auto align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="img-wrapper pt-3">
                        <a href="">
                            <img src="../images/game/pubg.jpg" alt="" class="rounded ratio ratio-1x1">
                        </a>
                    </div>
                    <div class="btn btn-success mt-1 w-100 text-center"data-mdb-ripple-init>check now</div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="img-wrapper pt-3">
                        <a href="">
                            <img src="../images/game/csgo.png" alt="" class="rounded ratio ratio-1x1">
                        </a>
                    </div>
                    <div class="btn  btn-success mt-1 w-100 text-center"data-mdb-ripple-init>check now</div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="img-wrapper pt-3">
                        <a href="">
                            <img src="../images/game/mobileLegend.jpg" alt="" class="rounded ratio ratio-1x1">
                        </a>
                    </div>
                    <div class="btn  btn-success mt-1 w-100 text-center"data-mdb-ripple-init>check now</div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="img-wrapper pt-3">
                        <a href="">
                            <img src="../images/game/dota2.png" alt="" class="rounded ratio ratio-1x1">
                        </a>
                    </div>
                    <div class="btn btn-success mt-1 w-100 text-center"data-mdb-ripple-init>check now</div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop session end -->

    <!-- game session -->
    <div class="container-fluid">
        <div class="word mx-3">
            <h2 class="text-light">Let's play to earn</h2>
            <hr class="pt-1 bg-light"/>
        </div>
        <div class="game1 my-5">
            <div class="row p-auto mx-3">
                <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                    <img src="../images/gameBundle.png" class="w-75" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 text-light d-flex align-items-center">
                    <div class="word">
                        <h3 class="fs-1 fw-bold">Play To Win</h3>
                        <span class="text-success">5 win 10 point </span>
                        <p class="mt-3">Play stress free games to gain real rewards for purchasement on site.</p>
                        <a href="../games/gameList.php" class="btn p-3 btn-success mt-4"data-mdb-ripple-init>Play Now</a>
                    </div> 
                </div>
            </div>
        </div>
        <div class="game2 my-5">
            <div class="row p-auto mx-3">
                <div class="col-md-5 text-light d-flex align-items-center">
                    <div class="word">
                        <h3 class="fs-1 fw-bold">Tic Tac Toe</h3>
                        <span class="text-success">1 win 1 point </span>
                        <p class="mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis amet a dignissimos? Nisi, incidunt minus! Placeat nemo totam mollitia dolor magni cumque quasi inventore sed!</p>
                        <a class="btn p-3 btn-success mt-4"data-mdb-ripple-init>Creat Your Own</a>
                    </div> 
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                    <img src="../images/gameBundle.png" class="w-75" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- game session end -->

    <!-- wallet adv session -->
    <div class="container-overflow text-center bg-image" style=" background-image: url('../images/backimg.jpg');width:100%;">
        <div class="wallet-adv-wrapper" style="backdrop-filter: brightness(40%);height:100%">
            <!-- <div class="img">
                <img src="https://i.ibb.co/dQbH8m3/game11.png" height="50" alt="game icon" class="gameicon" />
                </div> -->
            <div class="word-and-feature p-3">
                <h3 class="fs-4 text-light">Let's start 
                    <a href="" class="text-success">| CASH IN |</a>
                    <a href="" class="text-success">CASH OUT |</a>
                    <a href="" class="text-success">TRANSFER |</a>
                    <a href="" class="text-success">SAVING |</a>
                    NOW!!!
                </h3>
                <p class="w-75 text-light m-auto">
                    Lorem ipsum dolor sit amet consectetur Impedit ab pariatur laborum dicta, accusamus excepturi alias necessitatibus corrupti laudantium soluta, molestiae, explicabo nostrum voluptatibus commodi.uta, molestiae, explicabo nostrum voluptatibus commodi.uta, molestiae, explicabo nostrum voluptatibus commodi.
                </p>
                <a href="../login.php"><div class="btn btn-success my-2 text-center"data-mdb-ripple-init>LOGIN NOW</div></a>
            </div>
            
        </div>
    </div>
    <!-- wallet adv session end -->

    <?php
        include("../footer.php");
    ?>
</body>
</html>