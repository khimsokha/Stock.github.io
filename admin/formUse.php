<?php
    include('include/config.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET['id'])){
        header("location: index.php");
        exit;
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM itproduct WHERE id= $id";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
    $code=$row['code'];
                $name=$row['name'];
    
                $saccount=$row['saccount'];

    
                $status=$row['status'];
                
}             

if(isset($_POST['submit'])){ 
        
        $id =$_GET['id'];
        $code=$_POST['code'];
        $name=$_POST['name'];
        $saccount=$_POST['saccount'];
        $status=$_POST['status'];
        $date_use =$_POST['date_use'];
        $place_use =$_POST['place_use'];
    

                               
        //   19/05/20023                      
    $sql_insert = "INSERT INTO listtaketouse (code, name, saccount, status, date_use, place_use)
    VALUES('$code', '$name', '$saccount', '$status', '$date_use', '$place_use')"; 
    $insert_run = mysqli_query($connect, $sql_insert);
    if($insert_run == true){
        $update = "UPDATE itproduct SET place = '$place_use' WHERE id = '". $id ."'";
        $update_run =  mysqli_query($connect, $update);
        if($update_run == TRUE){
            header("location: it_thing.php");
            exit();
        }
    }else{
        echo "not work";
    }
}

// $update = " UPDATE itproduct SET place = '$place_use', status='$status', date_use='$date_use' WHERE id= '". $id. "'";

// //$result = $connect->query($sql);  


// if (mysqli_query($connect, $sql)) {
//     echo "ការដកប្រើទទួលបានជោគជ័យ !" . mysqli_error($connect);
//     header("location: ?ref=".$_SERVER["PHP_SELF"]);
//     exit();
// } else {
//     echo "Error: " . $sql . "
//     " . mysqli_error($connect);
// }
// mysqli_close($connect);                 
  
// }       



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ដកយកប្រើ</title>
    <link rel="stylesheet" href="style/formUse.css">
    <link rel="icon" href="img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Angkor&family=Dangrek&family=Koulen&display=swap" rel="stylesheet">
</head>
<body>
    
<div class="box">
        <div class="form">
            <h2>ដកសម្ភារប្រើ</h2>
            <form action="" method="POST">
                <div class="control-form">
                    <div class="inline-form">
                            <label for="">លេខកូដ</label>
                            <input type="text" name="code" placeholder="" list="code-list" value="<?php echo $code;?>">
                            
                                <!-- <datalist id="code-list">
                                        <?php
                                            $sql = "SELECT code FROM itproduct ";
                                            $result = $connect->query($sql);
                                            if(!$result){
                                                    die("Error Get Data");
                                                }
                                            while($row = $result->fetch_assoc()){?> 
                                            <option value="<?php echo $row['code'] ?>">
                                            <?php } ?>    
                                </datalist>  -->


                    </div>
                    
                    <div class="inline-form">
                            <label for="">ឈ្មោះសម្ភារ:</label>
                            <input type="text" name="name" placeholder="ឈ្មោះសម្ភារ:" list="name-list"  value="<?php echo $name;?>">
                            <datalist id="name-list">
                                        <!-- <?php
                                            $sql = "SELECT name FROM itproduct ";
                                            $result = $connect->query($sql);
                                            if(!$result){
                                                    die("Error Get Data");
                                                }
                                            while($row = $result->fetch_assoc()){?> 
                                            <option value="<?php echo $row['name'] ?>">
                                            <?php } ?>     -->
                            </datalist> 
                    </div>
                    <div class="inline-form">
                        <label for="">អនុគណនី</label>
                        <input list="title" name="saccount" value="<?php echo $saccount;?>"> <br>
                        <datalist  id="title">
                            <option > 60055</option>
                            <option >60051</option>
                            <option > 60053</option>
                            <option >60052</option>
                            
                        </datalist>
                    </div>

                    <div class="inline-form">
                            <label for="">ស្ថានភាព</label>
                            <input list="dbtext" name="status" value="<?php echo $status;?>"> <br>
                            <datalist  id="dbtext">
                                <option >ល្អ</option>
                                <option >មធ្យម</option>
                                <option >អន់</option>
                                <option >ខូច</option>
                            </datalist>
                    </div>
                    <div class="inline-form">
                            <label for="" > កាលបរិច្ឆេទដកប្រើ</label>
                            <input type="date" name="date_use" id="" value="">
                    </div>
                    <div class="inline-form">
                            <label for="">កន្លែងប្រើប្រាស់</label>
                            <input list="dbuse" name="place_use"> <br>
                            <datalist  id="dbuse">
                                <option >com.lab1</option>
                                <option >com.lab2</option>
                                <option >com.media</option>
                                <option >office</option>
                                <option >in stock</option>
                            </datalist>
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