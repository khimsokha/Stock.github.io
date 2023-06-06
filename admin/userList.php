<?php
include('include/config.php');
session_start();


// print_r($_SESSION);
//     echo "<br>";

   
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login_admin.php");
    exit;
}else{
if($_SESSION["userType"] != 'admin'){
    header("location: index.php");
    exit;
}}
    
?>

<!-- staffusernama: samnang
staffpassword: 123 
username: sokhaa
password : 123
-->
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

</head>

<body>
    <?php include('include/Header.php'); ?>
    <div class="alltb">
        <div class="btn">
            <a href="addUser.php">បន្ថែមថ្មី</a>
        </div>
    </div>
    <div class="blltb">
        <h3>User List</h3>
        <div class="dasble">
            <table id="userList">
            
                <tr>
                    <th>ល.រ</th>
                    <th>ឈ្មោះ</th>
                    <th>Username</th>
                    <th>User Type</th>
                    <th>Email</th>
                    <th>លេខទូរសព្ទ</th>
                    <th>សកម្មភាព</th>
                </tr>
                <?php
                $i=1;
                $sql="SELECT * FROM userlist ";
                $result = $connect->query($sql);
                if(!$result){
                    die("ERROR GET DATA");
                }
                while($row = $result->fetch_assoc()){
                    ?>
                    <tr>
                        <td ><?php echo $i++;?></td>
                        <td><?php echo "$row[firstName]"." "."$row[lastName]"?></td>
                        <td><?php echo "$row[username]"?></td>
                        <td><?php echo "$row[userType]"?></td>
                        <td><?php echo "$row[email]"?></td>
                        <td><?php echo "$row[phoneNum]"?></td>
                        <td>
                            <a href="./formUse.php?id=<?php echo $row['id'];?>" id="bt_edit">Edit</a>
                            <?php
                                 if($_SESSION["userType"] === 'admin'){
                            ?>
                                <a href="./formBorrow.php?id=<?php echo $row['id'];?>" id="bt_delet">Delet</a>
                            <?php
                                }elseif($_SESSION["userType"] === 'staff'){
                                    echo "you are staff";
                            ?>
                               
                               <!-- <a href="./formBorrow.php?id=<?php echo $row['id'];?>" id="bt_delet">Delet</a> -->
                            <?php
                                }
                                else{
                                    echo "No delete";
                                }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>


    </div>

</body>

</html>