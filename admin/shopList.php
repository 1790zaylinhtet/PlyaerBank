<?php



// session_start();

    //to connect database
    include("../db/connection.php");
    //functions
    include("../function/function.php");
    if(isset($_GET['action'])&& $_GET['action']=='del')
    {
        $id=$_GET['id'];
        delete($id,'game','gameid');
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

    <!-- Css -->
    <link rel="stylesheet" href="../css/sheetDesign.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />

    <title>Shop List</title>

</head>
<body>
   
    <?php include('./adminHeader.php')?>
    
    <div class="container my-5 py-5">
        <div class="viewboxes text-center ">


            <?php 
                $dataQuery = dataList('game','created_at');
                while($row = mysqli_fetch_array($dataQuery)){
                    $gameid= $row['gameid'];
                    $gameName= $row['gameName'];
                    $gamePhoto =$row['photo'];
                    echo "
                    <div  class='viewbox shadow-2-strong mx-2' style='background-image:url({$gamePhoto});background-size: cover;background-position: center; background-repeat: no-repeat;'>
                    <a href='gameDetail.php' class='text-light fs-5 rounded px-5 py-2' style=' background-color: rgba(0, 0, 0, 0.629);'>
                        {$gameName}
                    </a>
                    <div class='d-flex gap-3 mt-3 justify-content-center'>
                        <a class='btn bg-danger' href='shopList.php?action=del&id={$gameid}'>Delete</a>
                    </div>
                </div>
                    ";
                }
            ?>
            <!-- <div  class="viewbox shadow-2-strong mx-2" style="background-image:url('../images/mlbb.jpg');background-size: cover;background-position: center; background-repeat: no-repeat;">
                <a href="gameDetail.php" class="text-light fs-5 rounded px-5 py-2" style=" background-color: rgba(0, 0, 0, 0.629);">
                    Mobile Legend
                </a>
                <div class="d-flex gap-3 mt-3 justify-content-center">
                    <a class="btn bg-success">Update</a>
                    <a class="btn bg-danger">Delete</a>
                </div>
            </div>
            <a class='btn bg-success' href='shopUpdate.php?action=update&id={$gameid}'>Update</a>

            < -->


        </div>
    </div>
    
</body>
</html>