<?php
include('include/config.php');
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login_admin.php");
    exit;
}

if (isset($_POST['submit'])) {
    $think = $_POST['think'];
    $sql = "INSERT INTO addThink (think) VALUES ('$think')";
    if (mysqli_query($connect, $sql)) {
        echo "New record created successfully !";
    } else {
        echo "Error: " . $sql . "
            " . mysqli_error($connect);
    }
}

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $sql = "INSERT INTO addproductname (name) VALUES ('$name')";
    if (mysqli_query($connect, $sql)) {
        echo "New record created successfully !";
    } else {
        echo "Error: " . $sql . "
            " . mysqli_error($connect);
    }
}


?>


<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock Menegeman</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="style/pag1.css">
    <link rel="stylesheet" href="style/dist/all.css">
    <link rel="stylesheet" href="style/dist/styles.css">

</head>

<body style="font-family:'Times New Roman', 'khmer os battambang';">
    <?php include('include/Header.php'); ?>
    <div class="clear-fix"></div>


     <!-- <form action="" method="POST">
    <input type="text" name = "think" vlaue="" style="font-family:'Times New Roman', 'khmer os battambang';border: 1px solid green ;">
                        
    <input type="text" name="think" value="khmer1" style="border:2px solid yellow;">
    <input type="submit" name="submit" value="khmer2" >
     <button  type="submit" name="submit" style="border: 1px solid green ; background-color: aquamarine;font-family:'Times New Roman', 'khmer os battambang';">យល់ព្រម</button>
                    
                    </form> -->
                    <table style="border: 2px solid green; font-family:'Times New Roman', 'khmer os battambang';">
                        <!-- <tr style=" background-color:aquamarine" >
                            <th>ខ្នាត</th>
                            <th>លុប</th>
                        </tr> -->
                        

                        
                        
                        
                    </table>
                    
                </div> 
     <div class='flex flex-1  flex-col md:flex-row lg:flex-row mx-2'>
        <div class="mb-2 mx-2 border-solid border-gray-300  rounded border shadow-sm w-full md:w-1/2 lg:w-1/2" style=" border: 2px solid khaki;">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-300 border-b" style=" background-color:khaki">
                បន្ថែមឯកតា
            </div>
            <div class="p-3">
                <button data-modal='think' class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    បន្ថែមឯកតា
                </button>
            </div>
            <table style="font-family:'poppins','khmer os battambang';">
                <tr>
                    <th>ឯកតា</th>
                </tr>
                <?php
                $showthink = "SELECT * FROM addthink";
                $showthink_run = mysqli_query($connect, $showthink);
                while ($row = $showthink_run->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo "$row[think]"; ?></td>
                    </tr>

                <?php } ?>
            </table>

        </div>
        <div class="mb-2 mx-2 border-solid border-gray-300  rounded border shadow-sm w-full md:w-1/2 lg:w-1/2" style=" border: 2px solid green;">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-300 border-b" style=" background-color:greenyellow;">
                បន្ថែមឈ្មោះសម្ភារ
            </div>
            <div class="p-3">
                <button data-modal='name' class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    បន្ថែមឈ្មោះសម្ភារ
                </button>
            </div>
            <table style="font-family:'poppins','khmer os battambang';">
                <tr>
                    <th>ឈ្មោះសម្ភារ</th>
                </tr>
                <?php
                $showthink = "SELECT name FROM addproductname";
                $showthink_run = mysqli_query($connect, $showthink);
                while ($row = $showthink_run->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo "$row[name]"; ?></td>
                    </tr>

                <?php } ?>
            </table>

        </div>



        <div id='think' class="modal-wrapper">
            <div class="overlay close-modal"></div>
            <div class="modal modal-centered">
                <div class="modal-content shadow-lg p-5">
                    <div class="border-b p-2 pb-3 pt-0 mb-4">

                    </div>
                    <!-- Modal content -->
                    <form method="POST" id='form_id' class="w-full" style="font-family:'Times New Roman', 'khmer os battambang';">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                    ឯកតា
                                </label><small>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" id="grid-first-name" type="text" placeholder="" name="think" value=""></small>
                            </div>



                            <div class="mt-5">
                                <button class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounde' type="submit" value="submit" name="submit"> រក្សាទុក</button>
                                <button class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                                    បដិសេធ
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

        <div id='name' class="modal-wrapper"> 
            <div class="overlay close-modal"></div>
            <div class="modal modal-centered">
                <div class="modal-content shadow-lg p-5">
                    <div class="border-b p-2 pb-3 pt-0 mb-4">

                    </div>
                    <!-- Modal content -->
                    <form method="POST" id='form_id' class="w-full" style="font-family:'Times New Roman', 'khmer os battambang';">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                    ឈ្មោះសម្ភារ
                                </label><small>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" id="grid-first-name" type="text" placeholder="" name="name" value=""></small>
                            </div>



                            <div class="mt-5">
                                <button class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounde' type="save" value="save" name="save"> រក្សាទុក</button>
                                <button class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                                    បដិសេធ
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>




            <script src="style/main.js"></script>

</body>

</html>