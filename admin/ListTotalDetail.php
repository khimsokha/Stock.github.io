<?php
    include('include/config.php');
    session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login_admin.php");
    exit;
}

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(!isset($_GET['name'])){
            header("location: ?ref=".$_SERVER["PHP_SELF"]);
            exit;
        }
            $name = $_GET['name'];
            $sql = "SELECT * FROM itproduct WHERE name= '$name' ";
            $sql_run = mysqli_query($connect, $sql);
            $row = $sql_run->fetch_assoc();
     
            
        
        
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
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
        }
        #Detail{
            font-family: 'khmer os battambang';
            border: 1px solid black;
        
        width: 25%;
        }
        </style>
</head>
<body>
<?php include('include/Header.php');?>
        <div class="dashboard">
            <?php include('include/Top-dashboard.php'); ?>
            <div class="search-and-title">
                <h3>បញ្ជីសម្ភារសរុប / <?php echo $row['name'];?></h3></div>
                <div class="clear-fix"></div>
                    <div class="dasble" >
                        <h4 style="font-family:'khmer os battambang'">ស្ថានភាព</h4>
                        <table id="Detail">
                            <tr>
                               
                                <td bgcolor="paleGreen">    ល្អ                 <?php echo $connect->query("SELECT status FROM `itproduct` WHERE name = '$name' AND status='ល្អ' ")->num_rows;?></td>
                               
                                <td bgcolor="khaki">     មធ្យម               <?php echo $connect->query("SELECT status FROM `itproduct` WHERE name = '$name' AND status='មធ្យម' ")->num_rows;?></td>
                                
                                <td bgcolor="orange">      អន់              <?php echo $connect->query("SELECT status FROM `itproduct` WHERE name = '$name' AND status='អន់' ")->num_rows;?></td>
                              
                                <td bgcolor="crimson">        ខូច            <?php echo $connect->query("SELECT status FROM `itproduct` WHERE name = '$name' AND status='ខូច' ")->num_rows;?></td>
                            </tr>
                        </table><hr><br>

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
                        <!-- <th class="head">បរិមាណ</th> -->
                        <!-- <th class="head">តម្លៃរាយ</th> -->
                        <th class="head">តម្លៃ</th>
                        <th class="head">ស្ថានភាព</th>
                        <th class="head">កាលបរិច្ឆេទចូល</th>
                        <th class="head">ទីកន្លែង</th>
                        <th class="head">រូបភាព</th>
                       
                    </tr>
                            <?php
                                $i=1;
                                $sql = "SELECT * FROM itproduct WHERE name = '$name' ";
                                $sql1 = "SELECT count(status) FROM itproduct WHERE name='$name' AND status ='ល្អ' ";
                                
                                $result = $connect->query($sql);
                                $result1 = $connect->query($sql1);
                                while($row = $result1->fetch_assoc()){ }

                                if(!$result){
                                    die("Error Get Data");
                                }

                                while($row = $result->fetch_assoc()){ 
                            
                            ?>
                            <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo "$row[code]" ?></td>
                            <td><?php echo "$row[name]" ?></td>
                            <td><?php echo "$row[how]" ?></td>
                            <!-- <td><?php echo "$row[account]" ?></td> -->
                            <td><?php echo "$row[saccount]" ?></td>
                            <td><?php echo "$row[model]" ?></td>
                            <td><?php echo "$row[country]" ?></td>
                            <td><?php echo "$row[think]" ?></td>
                            <!-- <td><?php echo "$row[quantity]" ?></td> -->
                            <!-- <td><?php echo "$row[retail_price]" ?>  $</td> -->
                            <td><?php echo "$row[total_price]" ?> ៛</td>
                            <td><?php echo "$row[status]" ?></td>
                            <td><?php echo "$row[date]" ?></td>
                            <td><?php echo "$row[place]" ?></td>
                            <td><img src="./img/<?php echo "$row[picture]"; ?>" width="40px" ;height="auto"></td>
                           
                            <?php

                         }

                        ?>
    
                    </table>


        </div>
    </div>
    

</body>
</html>