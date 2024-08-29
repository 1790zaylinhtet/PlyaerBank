<?php

date_default_timezone_set("Asia/Yangon");

//ueser registration function
function addregister()
{
    //varabies
    global $conn;
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $nrcNumber=$_POST['nrcNumber'];
    $dateOfBirth=$_POST['dateOfBirth'];
    $address=$_POST['address'];
    $photo = $_FILES['photo']['name'];
    $tmpName = $_FILES['photo']['tmp_name'];

    $targetFile = "../images/userPhoto/".$photo;
    move_uploaded_file($tmpName,$targetFile);

    //error check
    $checkError = 1;

    //validation
    if(strlen($username)<5)
        {
            echo "<script>window.alert('User Name need to be longer.')</script>";
            $checkError=0;
        }

    if (!(preg_match('/[!@#$%^&*()_+\-=\[\]{};:\'"\\|,.<>\/?]/', $password)))
        {
            echo "<script>window.alert('Password is invalid | Password must contain at least one special character')</script>";
            $checkError=0;
        } 
    else if(strlen($password)<8)
        {
            echo "<script>window.alert('Password need to be longer')</script>";
            $checkError=0;
        }

    if($password != $cpassword)
        {
            echo "<script>window.alert('Did not match password.')</scirpt>";
            $checkError=0;
        }
        
    if (!(filter_var($email,FILTER_VALIDATE_EMAIL))) 
        {
            echo "<script>window.alert('The email is invalid')</script>";
            $checkError=0;
        }

    if (!(checkString($nrcNumber)))
        {
            echo "<script>window.alert('The NRC number is invalid')</script>";
            $checkError=0;
        }
    
    //add user to database  
    if($checkError)
    {
        $query="select * from user where username='$username' and email='$email'";
        $check_query=mysqli_query($conn,$query);
        $count=mysqli_num_rows($check_query);
        if($count>0)
            {
                echo"<script>window.alert('Already exist')</script>";
            }
            else
            {    
                $hashvalue=md5($password);          
                $query="INSERT INTO `user`(`username`,`photo`, `email`, `phone`, `password`, `nrcNumber`, `dateOfBirth`, `address`,`status`) VALUES ('$username','$photo','$email','$phone','$hashvalue','$nrcNumber','$dateOfBirth','$address','active')";
                $go_query=mysqli_query($conn,$query);
                if(!$go_query)
                    {
                        die("QUERY FAILED".mysqli_error($conn));
                    }else{
                        $lastUserInfo = detail($username,"user","username");
                        $id = $lastUserInfo['userid'];
                        addWalletRow($id,$username,'mmk');
                        echo"<script>window.alert('Registration Success')</script>";

                    }
            }    
    }
    
}   

function addWalletRow($id,$username,$pointName) {
    global $conn;
    $query = "INSERT INTO wallet(userid,username,pointName,amount) VALUES($id,'$username','$pointName',0)";
    $queryResult = mysqli_query($conn,$query);
}

//total User check function
function total($tableName){

    global $conn;
    $query="select * from $tableName";
    $go_query=mysqli_query($conn,$query);

    return (mysqli_num_rows($go_query));

}

//new users check
function newUserCheck($isDaily = true){

    global $conn;
    if($isDaily)
        {
            $check = date("Y-m-d");
            $query = "SELECT * FROM `user` WHERE `created_at` LIKE '$check%%'";
            $go_query=mysqli_query($conn,$query);
            
            return (mysqli_num_rows($go_query));
        }
    else{

        $check = date("Y-m");
        $query = "SELECT * FROM `user` WHERE `created_at` LIKE '$check%%'";
        $go_query=mysqli_query($conn,$query);
        
        return (mysqli_num_rows($go_query));
        }

}

//totalNumber from database
function totalNumber($key,$tableName,$columnName){

    global $conn;
    $query = "SELECT * from `$tableName` WHERE `$columnName`='$key'";
    $go_query = mysqli_query($conn,$query);
    return(mysqli_num_rows($go_query));
}

function totalNumberUsingUserId($key,$tableName,$columnName, $userId){

    global $conn;
    $query = "SELECT * from `$tableName` WHERE `$columnName`='$key' AND userid=$userId";
    $go_query = mysqli_query($conn,$query);
    return(mysqli_num_rows($go_query));
}

//active users check
function userStatusCheck($status='active'){

    global $conn;
    $query="SELECT count(*) as `total` from `user` WHERE `status` LIKE '$status%%'";
    $go_query=mysqli_fetch_array(mysqli_query($conn,$query));
    $count=$go_query['total'];

    return $count;

}

//viewer check
function viewerCheck(){

    global $conn;
    $query = mysqli_query($conn,"SELECT * FROM view");
    $visitorCount = mysqli_fetch_array($query)['visitorCount'];
    ++$visitorCount;
    $updateQuery = mysqli_query($conn,"UPDATE view SET visitorCount=$visitorCount");
    $query = mysqli_query($conn,"SELECT * FROM view");
    $visitorCount = mysqli_fetch_array($query)['visitorCount'];
    return  ($visitorCount);
    
}

//data list from database function
function dataList($tableName,$orderColumn){

    global $conn;
    $query = "SELECT * from `$tableName` order by $orderColumn DESC";
    $go_query=mysqli_query($conn,$query);

    return ($go_query);

}

//row detail 
function detail($key,$tableName,$columnName){

    global $conn;
    $query = "SELECT * from `$tableName` WHERE `$columnName`='$key'";
    $go_query = mysqli_query($conn,$query);
    
    return(mysqli_fetch_array($go_query));
}

//delete fumction
function delete($key,$tableName,$columnName){

    global $conn;
    $query = "DELETE from `$tableName` WHERE `$columnName`='$key'";
    $go_query=mysqli_query($conn,$query);

}

//ban function
function banActivate($key,$tableName,$columnName){

    global $conn;

    $selectQuery = "SELECT * from `$tableName` WHERE `$columnName`='$key'";
    $get_query = mysqli_query($conn,$selectQuery);
    $status = mysqli_fetch_array($get_query)['status'];

    if($status == 'active'){
        $query = "UPDATE `$tableName` set `status`='disable' where `$columnName` ='$key'";
        $go_query = mysqli_query($conn,$query);
    }else{
        $query = "UPDATE `$tableName` set `status`='active' where `$columnName`='$key'";
        $go_query= mysqli_query($conn,$query);
    }


}
//admin or user check
function adminOrUser($email){
    
    if(totalNumber($email,'admin','email')){
        return ("admin");
    }
    return("user");

}
//Usser_login
function userLogin($data){
    $email = $data['email'];
    $password = $data['password'];
    $noUncryptPass = $password;
    $password = md5($password);

    if(totalNumber($email,'user','email'))
    {
      $userDetail =detail($email,'user','email');
      if($password == $userDetail['password'])
        {
          session_start();
          $_SESSION['noUncryptPass'] = $noUncryptPass;
          $_SESSION['userid'] = $userDetail['userid'];
          $_SESSION['userEmail'] = $userDetail['email'];
          $_SESSION['userPassword'] = $userDetail['password'];
          $_SESSION['username'] = $userDetail['username'];
          $_SESSION['phone'] = $userDetail['phone'];
          $_SESSION['nrcNumber'] = $userDetail['nrcNumber'];
          $_SESSION['dateOfBirth'] = $userDetail['dateOfBirth'];
          $_SESSION['address'] = $userDetail['address'];
          $_SESSION['created_at'] = $userDetail['created_at'];
          $_SESSION['updated_at'] = $userDetail['updated_at'];
          $_SESSION['status'] = $userDetail['status'];
          $_SESSION['userPhoto'] = $userDetail['photo'];

          header('Location: index.php');
          
        }else
        {
          echo"<script>window.alert('Wrong Password')</script>";
        }
    }else
    {
      echo"<script>window.alert('email not found')</script>";
    }
}

//admin_login
function adminLogin($data){

    global $a;

    $email=$data['email'];
    $password=$data['password'];
    $password=md5($password);

      if(totalNumber($email,'admin','email'))
        {
          $adminDetail =detail($email,'admin','email');
          if($password == $adminDetail['password'])
            {
              session_start();
              $_SESSION['adminEmail'] = $adminDetail['email'];
              $_SESSION['adminPassword'] = $adminDetail['password'];
              $_SESSION['adminPhoto'] = $adminDetail['photo'];
              $_SESSION['adminid'] = $adminDetail['adminid'];
              $_SESSION['adminName'] = $adminDetail['adminName'];
              $_SESSION['keycode'] = $adminDetail['keycode'];
              $_SESSION['phone'] = $adminDetail['phone'];
              $_SESSION['role']= $adminDetail['role'];
              $_SESSION['status']= $adminDetail['status'];
              


                // header('Location:mainpage.php');
                $a=false;
            

          
            }else
            {
              echo"<script>window.alert('Wrong Password')</script>";
            }
        }else
        {
          echo"<script>window.alert('email not found')</script>";
        }
}

//sumAllColumn
function sumColumn($tableName,$sumColumnName,$keyColumnName){
    
    global $conn;
    $time=date("Y-m-d");
    $query="SELECT sum('$sumColumnName') as 'total' from `$tableName` WHERE `$keyColumnName` LIKE '$time%%'";
    $go_query=mysqli_fetch_array(mysqli_query($conn,$query));
    $total=$go_query['total'];

    return($total);

}

// admin_register
function admin_register($data){

    global $conn;
    $adminEmail = $data['adminEmail'];
    $adminName = $data['adminName'];
    $adminPassword = $data['adminPassword'];
    $cPassword = $data['cPassword'];
    $phone = $data['adminPhone'];
    $photo = $data['imgPath'];

    $array = [
        "error" =>"",
        "check"=>"",
        "key"=>"",
        "queryFail"=>""
    ];

    //error check
    $checkError = 1;

    //validation
    if(strlen($adminName)<5)
        {
            $errorName = "User Name need to be longer.";
            $array['error']=$array['error'].$errorName."\n";
            $checkError=0;
        }

    if (!(preg_match('/[!@#$%^&*()_+\-=\[\]{};:\'"\\|,.<>\/?]/', $adminPassword)))
        {
            $errorPassword = "Password is invalid | Password must contain at least one special character";
            $array['error']=$array['error'].$errorPassword."\n";
            $checkError=0;
        } 
    else if(strlen($adminPassword)<8)
        {
            $errorPassLength = "Password must be at leat 8 ";
            $array['error']=$array['error'].$errorPassLength."\n";
            $checkError=0;
        }

    if($adminPassword != $cPassword)
        {
            $errorCPassword ="Did not match password";
            $array['error']=$array['error'].$errorCPassword."\n";
            $checkError=0;
        }
        
    if (!(filter_var($adminEmail,FILTER_VALIDATE_EMAIL))) 
        {
            $errorEmail = "Email is invalid";
            $array['error']=$array['error'].$errorEmail."\n";
            $checkError=0;
        }

    //add admin to database  
    if($checkError)
    {

        $query="select * from admin where adminName='$adminName' and email='$adminEmail'";
        $check_query=mysqli_query($conn,$query);
        $count=mysqli_num_rows($check_query);
        if($count>0)
            {
                $check ="already exist";
                $array['check']=$check;
                echo json_encode($array);
            }
            else
            {   

                $hashvalue=md5($adminPassword);
                $key=generateKey();
                
                $query="INSERT INTO `admin`(`adminName`,`photo`,`email`,`password`,`keycode`,`phone`,`role`,`status`) VALUES ('$adminName','$photo','$adminEmail','$hashvalue','$key','$phone',1,'active')";
                $go_query=mysqli_query($conn,$query);
                if(!$go_query)
                    {

                        die("QUERY FAILED".mysqli_error($conn));
                        $array['queryFail']="queryFail";
                        echo json_encode($array);

                    }else{

                        $array['key']=$key;
                        echo json_encode($array);

                    }
            }    
    }else{
        echo json_encode($array);
    }

}

function cashIn($data){
    $array=[
        "error"=>"",
        "success"=>""
    ];
    global $conn;

    $img = $data['img'];
    $transcionId = $data['transcionId'];
    $amount = $data['amount'];
    $id = $data['id'];

    $query = "INSERT INTO `cashIn`(`userid`,`screenshot`,`amount`,`transcionId`,`status`) VALUES ('$id','$img','$amount','$transcionId','pending')";
    $go_query = mysqli_query($conn,$query);
    if(!$go_query){
        die("QUERY FAILED".mysqli_error($conn));
        $array['queryFail']="queryFail";
        $array['error']="Query Error";
        echo json_encode($array);
    }else{
        $array['success']="success cash in";
        echo json_encode($array);
    }

}

function cashOut($amount,$accountName,$accountNumber,$id){

    global $conn;
    $query = "INSERT INTO `cashOut`(`userid`,`amount`,`accountName`,`accountNumber`) VALUES ('$id','$amount','$accountName','$accountNumber')";
    $go_query = mysqli_query($conn,$query);

    if(!$go_query){
        die("QUERY FAILED".mysqli_error($conn));
    } else {
        updatePoint($amount,$id,'wallet','mmk','minus');
    }


}

function add_unit($data){

    global $conn;
    $array = [
        "error" =>"",
        "success"=>"",
        "queryFail"=>""
    ];
    $photo = $data['imgPath'];
    $gameid = $data['gameid'];
    $product = $data['product'];
    $price = $data['price'];
    $unitName =$data['unitName'];
    
    $query = "INSERT INTO `unit`(`unitName`,`gameid`,`product`,`price`,`photo`) VALUES ('$unitName','$gameid','$product','$price','$photo')";
    $go_query = mysqli_query($conn,$query);

    if(!$go_query){
        die("QUERY FAILED".mysqli_error($conn));
        $array['queryFail']='Database Error'."\n";
        echo json_encode($array);
    } else {
        $array['success']="Add Unit Successfully"."\n";
        echo json_encode($array);    }

}
//private function
function checkString($inputString){

    $containsNumber = preg_match('/[0-9]/', $inputString);
    $containsAlphabet = preg_match('/[a-zA-Z]/', $inputString);
    $containsSpecialChar = preg_match('/[^a-zA-Z0-9]/', $inputString);

    if($containsNumber && $containsAlphabet && $containsSpecialChar )
        {
            return true;
        }
        return false;  
}

//Search from database
function search($key,$tableName,$columnName){

    global $conn;
    $query = "SELECT * from `$tableName` WHERE $columnName LIKE '%%$key%%'";
    $go_query = mysqli_query($conn,$query);

    return ($go_query);

}

//key generate function
function generateKey($i=5){
    $specialChars=['!','@','#','$','%','^','&','?','*'];

    $new = array_merge(range('a','z'),range('A','Z'),range(0,9),$specialChars);
    shuffle($new);

    $key = substr(implode($new),0,$i);

    return($key);

}

//update table function
function edit($tableName,$columnName,$key,$id){
    // var_dump('hellos', $tableName,$columnName,$key,$id);
    global $conn;
    $idCol = $tableName."id";
    $query = "UPDATE `$tableName` SET `$columnName`='$key' WHERE `$idCol`='$id'";
    $go_query = mysqli_query($conn,$query);
}

//cash in 

function updatePoint($amount,$userid,$tableName,$pointName,$plusOrMinus){

    global $conn;
    $query = "SELECT * from `$tableName` WHERE `userid`='$userid' AND `pointName`='$pointName'";
    $go_query = mysqli_query($conn,$query);

    $userData = mysqli_fetch_array($go_query);

    $currentAmount = $userData['amount'];

    if($plusOrMinus == 'plus'){
        $updateAmount = $currentAmount + $amount;
    }else{
        $updateAmount = $currentAmount - $amount;
    }

    $query = "UPDATE `$tableName` SET `amount`='$updateAmount' WHERE `userid`='$userid' AND `pointName`='$pointName'";
    $go_query = mysqli_query($conn,$query);

}

function transactionC($sender,$receiver,$amount,$pointName,$description=NULL){

    global $conn;
    $query="INSERT INTO `transitionctoc`(`senderid`, `receiverid`, `pointName`, `amount`, `description`) VALUES ('$sender','$receiver','$pointName','$amount','$description')";
    $go_query = mysqli_query($conn,$query);

}
function transactionG($userid,$gameid,$amount,$fee,$description){

    global $conn;
    $query="INSERT INTO `transitionctog`(`userid`,`gameid`,`amount`,`fee`,`description`) VALUES ('$userid','$gameid','$amount','$fee','$description')";
    $go_query = mysqli_query($conn,$query);

}

function pointcheck($tableName,$userid,$pointName){

    global $conn;
    $query = "SELECT * from `$tableName` WHERE `userid`='$userid' AND `pointName`='$pointName'";
    $go_query = mysqli_query($conn,$query);
    $userData = mysqli_fetch_array($go_query);
    $currentAmount = $userData['amount'];

    return $currentAmount;
}
?>