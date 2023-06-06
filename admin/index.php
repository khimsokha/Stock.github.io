<?php
include('include/config.php');
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('include/Head.php');?>


</head>

<body>
    <?php
    include('include/Header.php');
    
    ?>

    <!-- <h1>Hi<b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1> -->
    <div class="top_dashboard">
        <div class="do" >
            <br><br>
            <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2" style="font-family: 'Times New Roman', Times, serif, 'khmer os battambang';">
                <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
                    <div class="p-4 flex flex-col">
                        <a href="ListInStock.php" class="no-underline text-white text-2xl">
                            <?php echo $connect->query("SELECT * FROM `itproduct` WHERE place = 'in stock'")->num_rows; ?>
                        </a>
                        <a href="ListInStock.php" class="no-underline text-white text-lg">
                            សម្ភារក្នុងស្តុក
                        </a>
                    </div>
                </div>


                <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                    <div class="p-4 flex flex-col">
                        <a href="ListUse.php" class="no-underline text-white text-2xl">
                            <?php echo $connect->query("SELECT * FROM `itproduct` WHERE place != 'in stock'")->num_rows; ?>
                        </a>
                        <a href="ListUse.php" class="no-underline text-white text-lg">
                            សម្ភារដកប្រើ
                        </a>
                    </div>
                </div>

                <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
                    <div class="p-4 flex flex-col">
                        <a href="ListBorrow.php" class="no-underline text-white text-2xl">
                            <?php echo $connect->query("SELECT * FROM `listborrow` WHERE STATUS = 1")->num_rows; ?>
                        </a>
                        <a href="ListBorrow.php" class="no-underline text-white text-lg">
                            ការខ្ចី
                        </a>
                    </div>
                </div>
                <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
                    <div class="p-4 flex flex-col">
                        <a href="#" class="no-underline text-white text-2xl">
                            0
                        </a>
                        <a href="#" class="no-underline text-white text-lg">
                            សម្ភារខូច
                        </a>
                    </div>
                </div>

            </div>
            <div style=" margin:20px;  width:45% ; float:left">
                <img src="img/01.png" >
                
            </div>
            <div style=" margin:20px;  width:45%; float:right; align-items:center;">
                <img src="img/02.png"  >
                
            </div>
        </div>
        
    </div>
    <div style=" height:100px; width:100%; float: right; ">
        <?php include('include/footer.php') ?>
    </div>

</body>

</html>