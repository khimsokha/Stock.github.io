<?php
 include('include/config.php');
 include('include/session_admin.php');

 //pagination
    // Get the total number of records from our table .
        $total_pages = $connect->query('SELECT * FROM itproduct WHERE saccount = 60051')->num_rows;

    // Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

    // Number of results to show on each page.
        $num_results_on_page = 5;

        if ($stmt = $connect->prepare('SELECT * FROM itproduct WHERE saccount = 60051 ORDER BY name LIMIT ?,?')) {
            // Calculate the page to get the results we need from our table.
            $calc_page = ($page - 1) * $num_results_on_page;
            $stmt->bind_param('ii', $calc_page, $num_results_on_page);
            $stmt->execute(); 
            // Get the results...
            $result = $stmt->get_result();
    // $num_results_on_page=5;
    //          $total_record = $connect->query("SELECT * FROM `itproduct` WHERE saccount = 60055")->num_rows;
                
    //             $total_pages = ceil($total_record / $num_results_on_page);

    //         if(isset($_GET['page'])){
    //             $page = $_GET['page'];
    //         }else{
    //             $page =1;
    //         }
            
    //         $start_from = ($page -1)*5;
    //         $sql = "SELECT * FROM itproduct WHERE saccount= 60051 Limit $start_from, $num_results_on_page";
    //         $result = $connect->query($sql);
            
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
    <link href="https://fonts.googleapis.com/css2?family=Bokor&family=Siemreap&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/tablestyle.css"> -->
    <?php
    include('include/Head.php');
    
    ?>
</head>
<body>
    <?php include('include/Header.php');?>
    
   
    <div class='dashboard'>
        <?php include('include/Top-dashboard.php'); ?>
        <div class="search-and-title">
                <h3>សម្ភារមិនមែនជាព័ត៍មានវិទ្យា</h3></div>
    
    <div class="dasble">
        <!-- <div class="do">
        <button><a href="06form.php" class="button">បញ្ចូលសម្ភារ</a></button>
        <a href="06form.php"> <input type="button" name="Add"></a>
        </div> -->
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
                <th class="head">តម្លៃសរុប</th>
                <th class="head">ស្ថានភាព</th>
                <th class="head">កាលបរិច្ឆេទ</th>
                <th class="head">ទីកន្លែង</th>
                <th class="head">រូបភាព</th>
                <th class="head">កែសម្រួល</th>
            </tr>
            <?php
                $i=1;
                // $sql = "SELECT * FROM itproduct WHERE saccount= 60051 Limit $start_from, $num_results_on_page";
                // $result = $connect->query($sql);

                if(!$result){
                    die("Error Get Data");
                }

                while($row = $result->fetch_assoc()){
                       
                        ?>
                            <tr>
                                <td><?php echo $i++ ;?></td>
                                <td><?php echo "$row[code]"?></td>
                                <td><?php echo "$row[name]"?></td>
                                <td><?php echo "$row[how]"?></td>
                                <!-- <td><?php echo "$row[account]"?></td> -->
                                <td><?php echo "$row[saccount]"?></td>
                                <td><?php echo "$row[model]"?></td>
                                <td><?php echo "$row[country]"?></td>
                                <td><?php echo "$row[think]"?></td>
                                <!-- <td><?php echo "$row[quantity]"?></td> -->
                                <!-- <td><?php echo "$row[retail_price]"?>  $</td> -->
                                <td><?php echo "$row[total_price]"?>  $</td>
                                <td><?php echo "$row[status]"?></td>
                                <td><?php echo "$row[date]"?></td>
                                <td><?php 
                                if ($row['BORROW'] == 1 ) echo "គេខ្ចី";
                                else echo "$row[place]";?></td>
                                <td><img src="./img/<?php echo "$row[picture]";?>" width="40px" ;height="auto"></td>
                                
                               <td align="center">
                               <?php include('include/td_action.php');?>
                               </td>


                                
                            </tr>
                            <?php
                     }

                    ?>
 
                </table>
                <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
                <ul class="pagination">
                    <?php if ($page > 1): ?>
                    <li class="prev"><a href="nonit_thing.php?page=<?php echo $page-1 ?>">Prev</a></li>
                    <?php endif; ?>
    
                    <?php if ($page > 3): ?>
                    <li class="start"><a href="nonit_thing.php?page=1">1</a></li>
                    <li class="dots">...</li>
                    <?php endif; ?>
    
                    <?php if ($page-2 > 0): ?><li class="page"><a href="nonit_thing.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
                    <?php if ($page-1 > 0): ?><li class="page"><a href="nonit_thing.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>
    
                    <li class="currentpage"><a href="nonit_thing.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>
    
                    <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="nonit_thing.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
                    <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="nonit_thing.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>
                        <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
                    <li class="dots">...</li>
                    <li class="end"><a href="nonit_thing.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
                    <?php endif; ?>

                    <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
                    <li class="next"><a href="nonit_thing.php?page=<?php echo $page+1 ?>">Next</a></li>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
                </div>


    </div>
    
    

</body>
</html>
        <?php } ?>