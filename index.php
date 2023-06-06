<?php

//username: Teacher
//password: Teacher

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    header("location: admin/index.php");
    exit;
}
 
// Include config file
    include('admin/include/config.php');
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password, userType FROM userlist WHERE username = ?";
        
        if($stmt = mysqli_prepare($connect, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $userType);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username; 
                            $_SESSION['userType'] = $userType;

                            
                            
                            
                            // Redirect user to welcome page
                            header("location: admin/index.php");
                            // if($userType == 'admin'){
                            // header("location: index.php");}
                            // else  header("location:test.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($connect);
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="admin/style/login.css">
    <link rel="icon" href="admin/img/logo1.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Moul&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hanuman&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bayon&family=Hanuman&display=swap" rel="stylesheet">
</head>
<body>
    <div class="center">
       <div class="box">
           <div class="box1">
              <div class="img">
                    <img src="admin/img/logo1.jpg" alt="" width="100%" height="100%">
              </div>
           </div>
           <div class="box2">
           <h4>សូមស្វាគមន៍<br>មកកាន់ប្រព័ន្ធគ្រប់គ្រងសម្ភារៈ</h4>
            <!-- <h2>សូមស្វាគមន៍មកកាន់ប្រព័ន្ធគ្រប់គ្រងសម្ភារៈ</h2> -->
                    <div class="box3" style="font-family:'khmer os battambang'">
                        
                        <div class="box-form">
    
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <table>Username</table>   
        <!-- <div class="form-group"> -->
                <!-- <label>Username</label> -->
                <input type="text" name="username" class=" <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class=""><?php echo $username_err; ?></span>
            <!-- </div>    
            <div class="form-group"> -->
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" style="background-color: none">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            <!-- </div> -->
            <!-- <div class="form-group"> --><br><br>
                <input type="submit" class="btn btn-primary" value="Login" style="background-color: green">
            <!-- </div> -->
        </form>
        </div>

                    </div>



           
        </div>
       </div>
        
    </div>
</body>
</html>
    