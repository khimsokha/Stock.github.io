<?php
include('include/config.php');



if(isset($_POST['submit'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $staffusername = $_POST['staffusername'];
        $pass = $_POST['staffpassword'];
        // $staffpassword = mysqli_real_escape_string($connect, $_POST['staffpassword']);
        // $password = password_hash($staffpassword, PASSWORD_DEFAULT);
        // echo $password;
        // $descript = password_verify($staffpassword, $password);
        // echo $descript;
        $userType = $_POST['userType'];
        $email = $_POST['email'];
        $phoneNum = $_POST['phoneNum'];
        if($firstName=="" || $lastName=="" ||$staffusername=="" || $pass =="" || $userType=="" || $email=="" || $phoneNum=="" ){
                echo"
                        <script>
                                alert('សូមបំពេញគ្រប់ប្រអប់');
                        </script>
                 ";
        }else{
                $sql = "INSERT INTO userlist (firstName,lastName,staffusername,staffpassword,userType,email,phoneNum)
                        VALUES('$firstName','$lastName','$staffusername','$pass','$userType','$email','$phoneNum')";
               
                if (mysqli_query($connect, $sql)) {
                        echo "ការបន្ថែមជោគជ័យ !";
                } else {
                        echo "Error: " . $sql . " " . mysqli_error($connect);
                }
                mysqli_close($connect);
                header('location: index.php');
                exit;
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>បញ្ជូលស្ដុក</title>
    <link rel="stylesheet" href="style/06form.css">
    <link rel="icon" href="img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Dangrek&family=Koulen&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="box">
        <div class="form">
            <h2>បន្ថែម User</h2>
            <form  method="POST" action="" enctype="multipart/form-data">
                <div class= "control-form">

                    <div class="inline-form">
                            <label for="">នាមត្រកូល</label>
                            <input type="text" name="firstName" placeholder="" value="">
                    </div>
                    
                    <div class="inline-form">
                            <label for="">នាមខ្លួន</label>
                            <input type="text" name="lastName" placeholder="" value="">
                    </div>
                    <div class="inline-form">
                            <label for="">Username</label> 
                            <input type="text" name="staffusername" placeholder="" value="">
                    </div>
                    <div class="inline-form">
                            <label for="">Password</label>
                            <input type="password" name="staffpassword" placeholder="" value="">
                    </div>
                    <div class="inline-form">
                            <label for="">User Type</label>
                            <input type="text" name="userType" placeholder="" value="">
                    </div>
                    <div class="inline-form">
                            <label for="">Email</label>
                            <input type="email" name="email" placeholder="" value="">
                    </div>
                    <div class="inline-form">
                            <label for="">លេខទូរសព្ទ</label>
                            <input type="text" name="phoneNum" placeholder="" value="">
                    </div>
                    
                     
                            
                   
                    <div class="button">
                            
                           
                            <button class="left" type="reset">បដិសេដ</button>
                            <button class="right" type="submit" name="submit">យល់ព្រម</button>
                    </div>
                </div>
            </form>
                

        </div>
    </div>
</body>
</html>