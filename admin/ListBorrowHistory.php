<?php include('include/config.php')?>

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
        </style>
</head>
<body>
    <?php include('include/Header.php');?>
        <div class="dashboard">
            <?php include('include/Top-borrowDashboard.php'); ?> 
            <div class="search-and-title">
                <h3>បញ្ជីខ្ចី / ប្រវត្តិការខ្ចី</h3></div>
                <div class="clear-fix"></div>
                    <div class="dasble">
        
                        <table id="customers">
                            <tr font-family='khmer os battambang'>
                                <th class="head" rowspan="2">ល.រ</th>
                                <th class="head" rowspan="2">លេខកូដសម្ភារ</th>
                                <th class="head" rowspan="2">ឈ្មោះសម្ភារ</th>
                                <th class="head" rowspan="2">ដេប៉ាតឺម៉ង់</th>
                                <th class="head" rowspan="2">ជំនាញ</th>
                                <th class="head" colspan="3">ពេលខ្ចី</th>
                                <th class="head" colspan="3">ពេលសង</th>
                                <th class="head" rowspan="2">លុប</th>
                            </tr>
                            <tr>
                                <!-- <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th> -->
                                <th class="head">ឈ្មោះអ្នកខ្ចី</th>
                                <th class="head">ស្ថានភាពពេលខ្ចី</th>
                                <th class="head">កាលបរិច្ឆេទខ្ចី</th>
                                <th class="head">ឈ្មោះអ្នកសង</th>
                                <th class="head">ស្ថានភាពពេលសង</th>
                                <th class="head">កាលបរិច្ឆេទសង</th>
                                

                            </tr>
                            <?php
                                $i = 1;
                                $sql = "SELECT itproduct.code, itproduct.name, listborrow.borrowDepartment, listborrow.borrowSkill, listborrow.borrowName, listborrow.borrowStatus, listborrow.borrowDate, listborrow.id, listborrow.STATUS,
                                listborrow.returnName, listborrow.returnStatus, listborrow.returnDate
                                FROM itproduct, listborrow
                                WHERE listborrow.code_id = itproduct.id AND listborrow.STATUS = 0
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
                                <td><?php echo "$row[returnName]"?></td>
                                <td><?php echo "$row[returnStatus]"?></td>
                                
                                <td><?php echo "$row[returnDate]"?></td>
                                
        
                                <td>
                                    <a href="./deletBorrowHistory.php?id=<?php echo $row['id'];?>" 
                                    style='text-decoration:none;color:white; background-color: blue; border-radius:3px; width:100%;'>លុប</a>
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