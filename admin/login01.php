<?php
    
    
                    
    //require_once('db/test.php');
    include('include/config.php');

?>
  <?php


      if(isset($_POST['login']))
      {
          $username = $_POST['username'];
          $password = $_POST['password'];
        //   $passwords= mysqli_real_escape_string($connect, $_POST['password']);
        //   $password = password_hash($passwords, PASSWORD_DEFAULT);
          $login ="SELECT * FROM userlist WHERE staffusername = '".$username."' AND staffpassword= '".$password."'";
          $login_run=mysqli_query($connect,$login);
          
          if(mysqli_num_rows($login_run) > 0){
            $data_login = mysqli_fetch_assoc($login_run);
            $_SESSION['staffusername'] = $data_login['staffusername'];
            $_SESSION['staffpassword'] = $data_login['staffpassword'];

            if($username == $_SESSION['staffusername']  && $password == $_SESSION['staffpassword']){
    
                header("location: index.php");
                exit();
            }
            }else{
                    $_SESSION['login_not_done'] = "បរាជ័យ";
            }


        //   while($row = $result->fetch_assoc()){
        //   echo "$row[staffusername]";}
        //   echo $staffusername."<br>".$staffpassword;
        //   if($result == TRUE){
        //         if(mysqli_num_rows($result) > 0){
        //             $row=mysqli_fetch_assoc($result);
        //             echo "$row[staffusername]";

        //             if($row['staffusername']==$staffusername && $row['staffpassword']==$staffpassword)
        //             {echo $staffusername."<br>".$staffpassword;
        //                 $_SESSION['id'] = $row['id'];
        //                 $_SESSION['id'] = $row['staffusername'];
        //                 $_SESSION['id'] = $row['staffpassword'];
        //                 $_SESSION['login-done'] = "Login is successfully.";
        //                 header("location:index.php");
                        
        //             }
        //         }else{
        //             $_SESSION['not-login'] = "Can not login.";
        //         }
        //   }
      }
    
    
    
    
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="icon" href="img/logo1.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Moul&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hanuman&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bayon&family=Hanuman&display=swap" rel="stylesheet">
</head>
<body>
    <div class="center">
       <div class="box">
           <div class="box1">
              <div class="img">
                    <img src="img/logo1.jpg" alt="" width="100%" height="100%">
              </div>
           </div>
           <div class="box2">
            <!-- <h2>សូមស្វាគមន៍មកកាន់ប្រព័ន្ធគ្រប់គ្រងសម្ភារៈ</h2> -->
                    <div class="box3">
                        <h3>សូមស្វាគមន៍មកកាន់ប្រព័ន្ធគ្រប់គ្រងសម្ភារៈ</h3>
                        <div class="box-form">
                                <form action="" method = "POST">
                                
                                    <table>Username</table>
                                    <input type="text" name="username" placeholder="Usernam" autocomplete="off"> <br>
                                    <table>Password</table>
                                    <input type="password" name="password" placeholder="Password" autocomplete="off">
                                    <button id="btn1" type="submit" name = "login">Login</button>
                                </form>
                                <?php
                                    if(isset($_SESSION['login_not_done'])){
                                        echo $_SESSION['login_not_done'];
                                        unset($_SESSION['login_not_done']);
                                    }
                                ?>
                                
                                    

                        </div>

                    </div>



           
        </div>
       </div>
        
    </div>
</body>
</html>