<?php
  
  //To get login admin
  session_start();
  // header('Content-Type: application/json');
  // session_start();
  $isAdminLoggedIn = false;
  if ( isset($_SESSION['adminEmail'])) {
    $isAdminLoggedIn = true;
  }

  if(!($isAdminLoggedIn)){
    header("Location:../login.php");
  }
  


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

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />

    <title>Admin Main Board</title>

</head>
<body>

  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js" defer ></script>
  
  <!-- Navbar -->
  <nav class="Nav navbar navbar-expand-lg fixed-top">

    <!-- Container wrapper -->
    <div class="container">
      
        <!-- Left links -->
        <ul class="roboto-serif-regular navbar-nav me-auto mb-2 mb-lg-0 " id="unactive-text" >
          <li class="nav-item">
            <!-- to connect homepage for userside -->
            <a href="../index.php">
              <div class="roboto-serif-bold textColor d-flex align-items-center mt-2 mt-lg-0 fs-2 navbar-brand text-light">
                <img src="https://i.ibb.co/dQbH8m3/game11.png" height="40" alt="game icon" class="gameicon" />
                  Admin Control Panel
              </div>
            </a>
          </li>
          <!-- you can add more link here -->
        </ul>
        <!-- Left links -->

        <!-- Right elements -->
        <div class="d-flex align-items-center" id="unactive-text">
          <!-- you can add more link here -->
          <div class="roboto-serif-bold textColor d-flex align-items-center  mt-lg-0 fs-2 navbar-brand text-light rounded-circle">
            <!-- to connect admin acount detail -->
            <a href="./adminDetail.php"><img src="https://i.ibb.co/mCrXjmZ/122442587-783026758912618-238755159588701890-n.jpg" height="35" alt="" class=" rounded-circle" /></a>
          </div>

        <div class="dropdown" id="active-text">
            <a
              data-mdb-dropdown-init
              class="roboto-serif-regular text-reset me-3 dropdown-toggle hidden-arrow"
              href="mainpage.php"
              id="navbarDropdownMenuLink"
              role="button"
              aria-expanded="false">
              <i class="fas fa-bars fa-2x" style="color:white;"></i>
            </a>

            <ul
              class="roboto-serif-regular dropdown-menu dropdown-menu-end"
              aria-labelledby="navbarDropdownMenuLink" >

              <li><a class="dropdown-item  align-items-center" href="./adminDashboard.php">Main board</a></li>
              <li><a class="dropdown-item  align-items-center" href="./userlist.php">User list</a></li>
              <li><a class="dropdown-item  align-items-center" href="./userCashIn.php">User Cash In</a></li>
              <li><a class="dropdown-item  align-items-center" href="adminList.php">Admin list</a></li>
              <li><a class="dropdown-item  align-items-center" href="refillpage.php">Refill Points</a></li>
              <li><a class="dropdown-item  align-items-center" href="./newProduct.php">Add Product</a></li>
              <li><a class="dropdown-item  align-items-center" href="./adminLogout.php"><div class="btn btn-danger">LOGOUT</div></a></li>

              <!-- <li><a class="nav-link p-4 position-relative" data-mdb-ripple-init data-mdb-ripple-unbound="true" href="message.php">Messages
                  <span class="position-absolute translate-middle badge rounded-pill bg-secondary" style="top:35px ; left:120px">
                    20 
                  </span></a>
              </li> -->
              <!-- you can add more link here -->
            </ul>
          </div>
          
        </div>
      <!-- Right elements -->

    </div>
    <!-- Container wrapper -->
    
  </nav>
  <!-- Navbar -->
    
</body>
</html>