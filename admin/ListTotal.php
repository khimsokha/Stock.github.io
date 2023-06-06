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
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock Menegeman</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="style/pag1.css">
    <link rel="stylesheet" href="style/tablestyle.css">
    <link rel="stylesheet" href="/style/bootstrap.min.css"> -->
    <?php include('include/Head.php');?>
    <style>
        
        </style>
</head>
<body>
    <?php include('include/Header.php');?>
        <div class="dashboard">
            <?php include('include/Top-dashboard.php'); ?>
            <div class="search-and-title">
                <h3>បញ្ជីសម្ភារសរុប</h3></div>
                <div class="clear-fix"></div>
                    <div class="dasble" >
        
                        <table id="customers">
                            <tr font-family='khmer os battambang'>
                                <th class="head">ល.រ</th>
                                
                                <th class="head">ឈ្មោះសម្ភារ</th>
                                
                                
                                <th class="head">អនុគណនី</th>
                                
                                <th class="head">ឯកតា</th>
                                <th class="head">បរិមាណ</th>
                                <th class="head">តម្លៃរាយ</th>
                                <th class="head">តម្លៃសរុប</th>
                               
                                <th class="head">លម្អិត</th>
                            
                            </tr>
                            <?php
                                $i=1;
                                $sql = "SELECT id, name, saccount, think, count(name) AS Amount,retail_price FROM itproduct
                                GROUP BY name 
                                ORDER BY saccount" ;
                                
                                $result = $connect->query($sql);
                                
                                if(!$result){
                                    die("Error Get Data");
                                }

                                while($row = $result->fetch_assoc()){ 
                            
                            ?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                
                                <td><?php echo "$row[name]"?></td>
                        
                        
                                <td><?php echo "$row[saccount]"?></td>
                        
                                <td><?php echo "$row[think]"?></td>
                                <td><?php echo "$row[Amount]"?></td>
                                <td><?php echo "$row[retail_price]"?></td>
                                <td><?php echo $row['retail_price']*$row['Amount'];?></td>
                                
                               
                                <td align="center"><a href="./ListTotalDetail.php?name=<?php echo $row['name'];?>">ចុច</a></td>


                                
                            </tr>
                            <?php

                         }

                        ?>
    
                    </table>


        </div>
    </div>
   
    
    

</body>
</html>