<?php
include('include/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }
    

    $id = $_GET['id'];
    $sql = "SELECT * FROM itproduct WHERE id= $id";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
    $code = $row['code'];
    $name = $row['name'];
    $status = $row['status'];
}

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $code_id = $id;
    $borrowDepartment = $_POST['borrowDepartment'];
    $borrowSkill = $_POST['borrowSkill'];
    $borrowName = $_POST['borrowName'];
    $borrowStatus = $_POST['borrowStatus'];
    $borrowDate = $_POST['borrowDate'];

    $sql_insert = "INSERT INTO listborrow (code_id, borrowDepartment, borrowSkill, borrowName, borrowStatus, borrowDate)
                VALUES ('$code_id', '$borrowDepartment', '$borrowSkill', '$borrowName', '$borrowStatus', '$borrowDate')";
    
    $insert_run = mysqli_query($connect, $sql_insert);

    if($insert_run == true){
        $update = "UPDATE itproduct SET BORROW = 1 WHERE id = '". $id ."'";
        $update_run =  mysqli_query($connect, $update);
        if($update_run == TRUE){
            header("location: it_thing.php");
            exit();
        }
    }else{
        echo "not work";
    }
    // if (mysqli_query($connect, $sql)) {
    //     echo "New record created successfully !";
    // } else {
    //     echo "Error: " . $sql . "
    //             " . mysqli_error($connect);
    // }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ការខ្ចី</title>
    <link rel="stylesheet" href="style/formBorrow.css">
    <link rel="icon" href="img/logo.png">
</head>

<body>
    <div class="box">
        <div class="form">
            <h2>សម្ភារខ្ចី</h2>
            <form action="" method="POST">
                <div class="control-form">
                    <div class="inline-form">
                        <label for="">លេខកូដ</label>
                        <input type="text" name="code" placeholder="" list="code-list" value="<?php echo $code; ?>">
                        

                    </div>
                    <div class="inline-form">
                        <label for="">ឈ្មោះសម្ភារ</label>
                        <input type="text" name="name" placeholder="ឈ្មោះសម្ភារ" value="<?php echo $name; ?>">
                    </div>
                    <!-- <div class="inline-form">
                        <label for="">អនុគណនី</label>
                        <input list="title"> <br>
                        <datalist  id="title">
                            <option > 60055</option>
                            <option >60051</option>
                            <option > 60052</option>
                            <option >60053</option>
                            
                        </datalist>
                    </div> -->
                    <div class="inline-form">
                        <label for="">ដេប៉ាតឺម៉ង់</label>
                        <input list="Department" name="borrowDepartment"> <br>
                        <datalist id="Department">
                            <option>ដេប៉ាតឺម៉ង់វិទ្យាសាស្រ្ដកុំព្យូទ័រ</option>
                            <option>ដេប៉ាតឺម៉ង់វិទ្យាសាស្រ្ដសត្វ</option>
                            <option>ដេប៉ាតឺម៉ង់វិទ្យាសាស្រ្ដអាហារ</option>
                            <option>ដេប៉ាតឺម៉ង់អគ្គិសនី</option>
                            <option>ដេប៉ាតឺម៉ង់វិទ្យាសាស្រ្ដដំណាំ</option>

                        </datalist>
                    </div>

                    <div class="inline-form">
                        <label for="">ជំនាញ</label>
                        <input list="skill" placeholder="" name="borrowSkill"> <br>
                        <datalist id="skill">
                            <option>បច្ចេកវិទ្យាកុំព្យូទ័រ</option>
                            <option>វិទ្យាសាស្រ្ដសត្វ</option>
                            <option>បច្ចេកវិទ្យាអាហារ</option>
                            <option>ការដំឡើងប្រព័ន្ធអគ្គិសនី</option>
                            <option>វិទ្យាសាស្រ្ដដំណាំ</option>

                        </datalist>
                    </div>
                    <div class="inline-form">
                        <label for="">ឈ្មោះអ្នកខ្ចី</label>
                        <input type="text" name="borrowName" value="">

                    </div>




                    <div class="inline-form">
                        <label for="">ស្ថានភាពពេលខ្ចី</label>
                        <input list="dbtext" name="borrowStatus" value="<?php echo $status; ?>"> <br>
                        <datalist id="dbtext">
                            <option>ល្អ</option>
                            <option>មធ្យម</option>
                            <option>អន់</option>
                            <option>ខូច</option>
                        </datalist>
                    </div>
                    <div class="inline-form">
                        <label for=""> កាលបរិច្ឆេទខ្ចី</label>
                        <input type="date" name="borrowDate" id="">
                    </div>


                    <div class="clear-fix"></div>
                    <div class="button">
                        <!-- <input type="submit" name="submit" value="យល់ព្រម">
                            <input type="reset" name="reset" id="" value="បដិសេដ"> -->

                        <button class="left" type="reset">បដិសេដ</button>
                        <button class="right" type="submit" name="submit">យល់ព្រម</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>