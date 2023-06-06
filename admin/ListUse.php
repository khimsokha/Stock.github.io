<?php
 $host = "localhost";
 $username = "root";
 $password = "";
 $db = "comtechstock";

 $connect = new mysqli($host, $username, $password, $db);
 if($connect->connect_error){
    die("Error Connect to DB".$connect->connect_error);
 }

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
    <!-- <meta charset="UTF-8">
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
    <link href="https://fonts.googleapis.com/css2?family=Bokor&family=Siemreap&display=swap" rel="stylesheet"> -->
    <?php include('include/Head.php');?>

    <style>
        .button {
            background-color: #4CAF50;
            border: none;
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline;
            font-size: 16px;
            margin: 2px 2px;
            cursor: pointer;
            font-family: 'Angkor', cursive;
            
            }
        #customers {
        font-family: 'khmer os battambang';
        border-collapse: collapse;
        width: 100%;
        z-index: -999;
        }

        #customers td, #customers th {
        border: 1px solid #000;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        /* #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: yellow;
        } */
        </style>
</head>
<body>
    <?php include('include/Header.php');?>
        <div class="dashboard">
            <?php include('include/Top-dashboard.php'); ?>
            <div class="search-and-title">
                <h3>បញ្ជីប្រើប្រាស់</h3></div>
                <div class="clear-fix"></div>
                    <div class="dasble" >
        
                        <table id="customers">
                            <tr font-family='khmer os battambang'>
                                <th class="head">ល.រ</th>
                                <th class="head">លេខកូដ</th>
                                <th class="head">ឈ្មោះសម្ភារ</th>
                                <th class="head">លក្ខណៈបច្ចេកទេស</th>
                                <!-- <th class="head">គណនី</th> -->
                                <th class="head">អនុគណនី</th>
                                <th class="head">ម៉ាក</th>
                                <th class="head">ប្រទេសផលិត</th>
                                <th class="head">ឯកតា</th>
                                <!-- <th class="head">បរិមាណ</th>
                                <th class="head">តម្លៃរាយ</th>
                                <th class="head">តម្លៃសរុប</th> -->
                                <th class="head">ស្ថានភាព</th>
                                <th class="head">កាលបរិច្ឆេទចូល</th>
                                <th class="head">កាលបរិច្ឆេទដកប្រើ</th>
                                <th class="head">ទីកន្លែងប្រើ</th>
                                <th class="head">រូបភាព</th>
                                <!-- <th class="head">កែសម្រួល</th> -->
                            </tr>
                            <?php
                                $i=1;
                                // $sql = "SELECT * FROM itproduct WHERE place= 'com.lab1' or place='com.lab2' or place='com.media' or place='office' ";
                                $sql = "SELECT * FROM itproduct WHERE place != 'in stock' ";
                                $result = $connect->query($sql);
                                
                                if(!$result){
                                    die("Error Get Data");
                                }

                                while($row = $result->fetch_assoc()){ 
                            
                            ?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo "$row[code]"?></td>
                                <td><?php echo "$row[name]"?></td>
                                <td><?php echo "$row[how]"?></td>
                                <!-- <td><?php echo "$row[account]"?></td> -->
                                <td><?php echo "$row[saccount]"?></td>
                                <td><?php echo "$row[model]"?></td>
                                <td><?php echo "$row[country]"?></td>
                                <td><?php echo "$row[think]"?></td>
                                <!-- <td><?php echo "$row[quantity]"?></td>
                                <td><?php echo "$row[retail_price]"?></td>
                                <td><?php echo "$row[total_price]"?></td> -->
                                <td><?php echo "$row[status]"?></td>
                                <td><?php echo "$row[date]"?></td>
                                <td><?php 
                                    if( $row['date_use'] == null) echo "$row[date]";
                                    else echo"$row[date_use]";
                                ?></td>
                                <!-- <td><?php echo "$row[date_use]"?></td> -->
                                <td><?php 
                                if ($row['BORROW'] == 1 ) echo "គេខ្ចី";
                                else echo "$row[place]";?>
                                </td>
                                <td><img src="./img/<?php echo "$row[picture]";?>" width="40px" ;height="auto"></td>
                                <!-- <td>
                                    <button class='edit'><a href="./product_edit.php?id=<?php echo $row['id'];?>" style='text-decoration:none;color:white;'>Edit</a></button>
                                    <button class='delet'><a href="./product_delet.php?id=<?php echo $row['id'];?>" style='text-decoration:none;color:white;'>Delet</a></button>
                                </td> -->


                                
                            </tr>
                            <?php

                         }

                        ?>
    
                    </table>


        </div>
    </div>
   
    
    

</body>
</html>