<?php include('include/config.php');

session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login_admin.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock Menegeman</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="style/pag1.css">
    <link rel="stylesheet" href="/style/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Angkor&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Siemreap&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Odor+Mean+Chey&family=Siemreap&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Siemreap&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bokor&family=Siemreap&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="style/tablestyle.css">
 

   <style>
       
        #open{
            text-align: center;
            padding: 0 20px;
        }
        </style>
</head>
<body>
    <?php include('include/Header.php');?>
        <div class="dashboard">
            <?php include('include/Top-borrowDashboard.php'); ?>
            <div class="search-and-title">
                <h3>បញ្ជីខ្ចី</h3></div>
                <div class="clear-fix"></div>
                    <div class="dasble">
        
                        <table id="customers">
                            <tr font-family='khmer os battambang'>
                                <th class="head">ល.រ</th>
                                <th class="head">លេខកូដសម្ភារ</th>
                                <th class="head">ឈ្មោះសម្ភារ</th>
                                <th class="head">ដេប៉ាតឺម៉ង់</th>
                                <th class="head">ជំនាញ</th>
                                <th class="head">ឈ្មោះអ្នកខ្ចី</th>
                                <th class="head">ស្ថានភាពពេលខ្ចី</th>
                                <th class="head">កាលបរិច្ឆេទខ្ចី</th>
                                <th class="head">សង</th>
                            </tr>
                            <?php
                                $i = 1;
                                $sql = "SELECT itproduct.code, itproduct.name, listborrow.borrowDepartment, listborrow.borrowSkill, listborrow.borrowName, listborrow.borrowStatus, listborrow.borrowDate, listborrow.id, listborrow.STATUS
                                FROM itproduct, listborrow
                                WHERE listborrow.code_id = itproduct.id AND listborrow.STATUS = 1
                                ORDER BY listborrow.id ";
                                //$sql = "SELECT * FROM listborrow ";
                                $result = $connect->query($sql);
                                
                                if(!$result){
                                    die("Error Get Data");
                                }

                                while($row = $result->fetch_assoc()){ 
                            
                            ?>
                            <tr>
                                <td><?php echo $i++?></td>
                                <td><?php echo "$row[code]"?></td>
                                <td><?php echo "$row[name]"?></td>
                                <td><?php echo "$row[borrowDepartment]"?></td>
                                <td><?php echo "$row[borrowSkill]"?></td>
                                <td><?php echo "$row[borrowName]"?></td>
                                <td><?php echo "$row[borrowStatus]"?></td>
                                <td><?php echo "$row[borrowDate]"?></td>
                                
        
                                <td>
                                    <a href="./product_return.php?id=<?php echo $row['id'];?>" 
                                    style='text-decoration:none;color:white; background-color: blue; border-radius:3px; width:100%;'>ចុច</a>
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