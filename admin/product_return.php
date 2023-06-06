<?php
include('include/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }
    

    $id = $_GET['id'];
    $sql = "SELECT * FROM listborrow WHERE id= $id";
    
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
    $code_id = $row['code_id'];
    $borrowName = $row['borrowName'];
    $borrowStatus = $row['borrowStatus'];
    $sql1 = "SELECT itproduct.code, itproduct.name, listborrow.code_id
            FROM itproduct, listborrow
            WHERE itproduct.id= $code_id ";
    $result = $connect->query($sql1);
    $row = $result->fetch_assoc();
    $tem_code = $row['code'];
    $tem_name = $row['name'];

}

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    
    $code_id = $id;
    $returnName = $_POST['returnName'];
    $returnStatus = $_POST['returnStatus'];
    $returnDate = $_POST['returnDate'];
    $codereturn = $_POST['code'];
    
    $update = " UPDATE listborrow SET returnName = '$returnName', returnStatus='$returnStatus', returnDate='$returnDate', STATUS = 0
                WHERE id = $id"; 
    $update_run = mysqli_query($connect, $update);
    if($update_run == true){
        $thingreturn = "UPDATE itproduct SET BORROW = 0 WHERE code = $codereturn ";
        $thingreturn_run = mysqli_query($connect, $thingreturn);
        if($thingreturn_run == true){
            header('location: ListBorrow.php');
            exit();
        }
    
        else{
                echo "not work";
        }
        }

    

    // if (mysqli_query($connect, $update)) {
    //     echo "ការសងជោគជ័យ !";
    // } else {
    //     echo "Error: " . $sql . "
    //             " . mysqli_error($connect);
     //}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>សងសម្ភារ</title>
    <link rel="stylesheet" href="style/formBorrow.css">
    <link rel="icon" href="img/logo.png">
</head>
<?php echo $tem_code.$code_id.$id;?>
<body>
    <div class="box">
        <div class="form">
            <h2>សងសម្ភារ</h2>
            <form action="" method="POST">
                <div class="control-form">
                    <div class="inline-form">
                        <label for="">លេខកូដ</label>
                        <input type="text" name="code" placeholder="" list="code-list" value="<?php echo $tem_code; ?>">
                        

                    </div>
                    <div class="inline-form">
                        <label for="">ឈ្មោះសម្ភារ</label>
                        <input type="text" name="name" placeholder="ឈ្មោះសម្ភារ" value="<?php echo $tem_name; ?>">
                    </div>
                
                    <div class="inline-form">
                        <label for="">ឈ្មោះអ្នកសង</label>
                        <input type="text" name="returnName" value="<?php echo $borrowName;?>">

                    </div>




                    <div class="inline-form">
                        <label for="">ស្ថានភាពសង</label>
                        <input list="dbtext" name="returnStatus" value="<?php echo $borrowStatus; ?>"> <br>
                        <datalist id="dbtext">
                            <option>ល្អ</option>
                            <option>មធ្យម</option>
                            <option>អន់</option>
                            <option>ខូច</option>
                        </datalist>
                    </div>
                    <div class="inline-form">
                        <label for=""> កាលបរិច្ឆេទសង</label>
                        <input type="date" name="returnDate" id="">
                    </div>


                    <div class="clear-fix"></div>
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