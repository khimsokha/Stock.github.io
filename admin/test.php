<?php
include('include/config.php');
$sql= " SELECT * FROM itproduct ";
$result = $connect->query($sql);
                                
                                if(!$result){
                                    die("Error Get Data");
                                }

                                while($row = $result->fetch_assoc()){ 
                            
echo "$row[id]";echo"$row[name]";echo"$row[date]<br>"; }
?>
<?php 
                    echo $connect->query("SELECT * FROM `itproduct`")->num_rows;
                    echo $connect->query("SELECT * FROM `itproduct`")->num_rows;

                   

?>
                <table style=" float:right; font-family:'Time New Roman', khmer os battambang; line-height: 10px; font-size:88%;">
    <tr>
        <th bgcolor="green10">soka</th>
        <th bgcolor="green10">hell</th>
    </tr>
    <td bgcolor="green10">
        hsejdd
    </td>
    <td bgcolor="green10">dhedkd</td>
</table>

<div id='centeredFormModal' class="modal-wrapper">
    <div class="overlay close-modal"></div>
    <div class="modal modal-centered">
        <div class="modal-content shadow-lg p-5">
            <div class="border-b p-2 pb-3 pt-0 mb-4">
               <div class="flex justify-between items-center">
                    Modal header
                    <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
               </div>
            </div>
            <!-- Modal content -->
            <form id='form_id' class="w-full">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                            First Name
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                            id="grid-first-name" type="text" placeholder="Jane">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-last-name">
                            Last Name
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                            id="grid-last-name" type="text" placeholder="Doe">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-password">
                            Password
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                            id="grid-password" type="password" placeholder="******************">
                        <p class="text-grey-dark text-xs italic">Make it as long and as crazy as
                            you'd like</p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-city">
                            City
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                            id="grid-city" type="text" placeholder="Albuquerque">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                            State
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="grid-state">
                                <option>New Mexico</option>
                                <option>Missouri</option>
                                <option>Texas</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-zip">
                            Zip
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                            id="grid-zip" type="text" placeholder="90210">
                    </div>
                </div>

                <div class="mt-5">
                    <button class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'> Submit </button>
                    <span class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                        Close
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    include("config.php");
    if(isset($_POST['login'])){
       $username = mysqli_real_escape_string($conn, $_POST['username']);
       $password = mysqli_real_escape_string($conn, $_POST['password']);

       $login = "SELECT * FROM student_register WHERE Student_English = '". $username ."' AND Password = '". $password ."'";
       $login_run = mysqli_query($conn, $login);

       if(mysqli_num_rows($login_run) > 0){
            $data_login = mysqli_fetch_assoc($login_run);
            $_SESSION['stuName'] = $data_login['Student_English'];
            $_SESSION['stuPassword'] = $data_login['Password'];

            // header("location: page1_st.php");
            //     exit();
            if($username == $_SESSION['stuName']  && $password == $_SESSION['stuPassword']){
                header("location: page1_st.php");
                exit();
            }
       }else{
            $_SESSION['login_not_done'] = "Login are avarlible";
       }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student login</title>
    <link rel="stylesheet" href="../Student/css/stylestudent.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>

<body>
    <div class="container-login">
        <form action="" method="post">
            <section>
                <div class="part_logo">
                    <div class="logo_school">
                        <img src="imges/logoschool.png" alt="">
                    </div>
                    <div class="wright_school">
                        <h4 class="Kh">វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ</h4>
                        <p class="En">Kampong Speu Institute of Technology</p>
                        <div class="line">

                        </div>
                    </div>
                </div>
                <form action="" method="POST">
                    <p class = "ml-3">
                        <?php
                            if(isset($_SESSION['login_not_done'])){
                                echo $_SESSION['login_not_done'];
                                unset($_SESSION['login_not_done']);
                            }
                        ?>

                    </p>
                    <div class="form-group">
                        <label for="id2" class="control-label">ឈ្មោះសិស្ស</label>
                        <input type="text" name="username" id="id2" class="from-control">
                    </div>
                    <div class="form-group">
                        <label for="id2" class="control-label">លេខសម្ងាត់</label>
                        <input type="password" name="password" id="id2" class="from-control1">
                    </div>
                    <div class="form-group">
                        <div class="button-signup-userlo">
                            <div class="button-sign">
                                <button type="submit" name="login" class="from-control-submit"><i
                                            class="fa-solid fa-right-to-bracket"></i>ចូលគណនី</button>
                            </div>
                            
                        </div>
                       
                    </div>

                    <div class="form-group">
                        
                        <a class="forgot-password register" href="login_user.php">ចុះឈ្មោះ</a>
                    </div>
                </form>

            </section>
        </form>
    </div>
</body>

</html>
<?php
   
?>