<?php
include('include/config.php');

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login_admin.php");
    exit;
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock Menegeman</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="style/pag1.css">
    <link rel="stylesheet" href="style/userList.css">
    <link rel="stylesheet" href="/style/bootstrap.min.css">
    <link rel="stylesheet" href="style/profilestyle.css">
    <style>
        #first{
            text-align: left;
        }
    </style>

</head>

<body>
    <?php include('include/Header.php'); ?>
    
    <div class="sidenav">
    <div class="profile">
            <img src="../../shopping cart/images/food-3.png" alt="" width="100" height="100">

            <div class="name">
            <?php echo htmlspecialchars($_SESSION["username"]); ?>
            </div>
            
        </div>
    </div>
    
    <!-- <div class="blltb"> -->
       
        <!-- <div class="dasble"> -->
       
        

        
    </div>
    <!-- End -->

    <!-- Main -->
    <div class="main">
        <h2>profile</h2>
        <div class="card">
            <div class="card-body">
                <!-- <i class="fa fa-pen fa-xs edit"></i> -->
               
                <?php
                $i=1;
                $sql="SELECT * FROM userlist WHERE username ='".$_SESSION['username']."'";
                $result = $connect->query($sql);
                if(!$result){
                    die("ERROR GET DATA");
                }
                while($row = $result->fetch_assoc()){
                    ?>
                    <table id="first">
                    <tbody>
                        <tr align="left">
                            <td align="left">ឈ្មោះ</td>
                            <td>:</td>
                            <td><?php echo "$row[firstName]"." "."$row[lastName]"?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><?php echo "$row[username]"?></td>
                        </tr>
                        <tr>
                            <td>User Type</td>
                            <td>:</td>
                            <td><?php echo "$row[userType]"?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo "$row[email]"?></td>
                        </tr>
                        <tr>
                            <td>លេខទូរសព្ទ</td>
                            <td>:</td>
                            <td><?php echo "$row[phoneNum]"?></td>
                        </tr>
                        
                        
                        
                    </tbody>
                    </table>

                    <?php } ?>
                
            </div>
        </div>
            
        </div>


    </div>

</body>

</html>