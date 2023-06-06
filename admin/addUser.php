<?php
session_start();
// Include config file
include('include/config.php');

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login_admin.php");
    exit;
}
if($_SESSION["userType"] !== 'admin'){
    header("location: index.php");
    exit;
}

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userType = $_POST['userType'];
    $email = $_POST['email'];
    $phoneNum = $_POST['phoneNum'];

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM userlist WHERE username = ? ";

        if ($stmt = mysqli_prepare($connect, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement

        //  $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $sql = "INSERT INTO userlist (firstName,lastName,username,password,userType,email,phoneNum)
                        VALUES('$firstName','$lastName',?,?,'$userType','$email','$phoneNum')";

        //  if(mysqli_query($connect, $sql )){
        //     echo "Good";
        //  }

        if ($stmt = mysqli_prepare($connect, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: index.php");
            } else {
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
    <title>បញ្ជូលស្ដុក</title>
    <link rel="stylesheet" href="style/06form.css">
    <link rel="icon" href="img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Dangrek&family=Koulen&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="box">
        <div class="form">
            <h2>បន្ថែម Staff</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="control-form">
                    <div class="inline-form">
                        <label for="">នាមត្រកូល</label>
                        <input type="text" name="firstName" placeholder="" value="">
                    </div>

                    <div class="inline-form">
                        <label for="">នាមខ្លួន</label>
                        <input type="text" name="lastName" placeholder="" value="">
                    </div>


                    <div class="inline-form">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                    <div class="inline-form">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="inline-form">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="inline-form">
                        <label for="">User Type</label>
                        <select name="userType">
                            <option value="admin">Staff</option>
                            <option value="staff">Admin</option>
                        </select>
                        <!-- <input type="text" name="userType" placeholder="" value=""> -->
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



                <!-- <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div> -->
            </form>
        </div>
    </div>
</body>

</html>