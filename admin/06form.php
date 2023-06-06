<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "comtechstock";



$connect = new mysqli($host, $username, $password, $db);
if ($connect->connect_error) {
        die("Error Connect to DB" . $connect->connect_error);
}

//  $conn=mysqli_connect($host,$username,$password,"$db");
// if(!$conn){
//    die('Could not Connect My Sql:') .mysqli_connect_error();
// }


if (isset($_POST['submit'])) {
        $picture = $_FILES["picture"]["name"];
        $tempname = $_FILES["picture"]["tmp_name"];
        $folder = "./img/" . $picture;


        // if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $code = $_POST['code'];
        $name = $_POST['name'];
        $how = $_POST['how'];
        $account = $_POST['account'];
        $saccount = $_POST['saccount'];
        $model = $_POST['model'];
        $country = $_POST['country'];
        $think = $_POST['think'];
        $quantity = $_POST['quantity'];
        $retail_price = $_POST['retail_price'];
        // $total_price=$_POST['total_price'];
        $total_price = $quantity * $retail_price;

        $status = $_POST['status'];
        $date = $_POST['date'];
        $place = $_POST['place'];
        // $picture=$_POST['picture']; 



        if ($code == "" || $name == "" || $account == "" || $saccount == "" || $retail_price == "" || $status == "" || $date == "" || $quantity == "" || $place == "") {
                echo "
                                                <script>
                                                        alert('សូមបំពេញគ្រប់ប្រអប់');
                                                </script>
                                        
                                        ";
        } else {
                $sql = "INSERT INTO itproduct (code,name,how,account,saccount,model,country,think,quantity,retail_price,total_price,status,date,place,picture)
                VALUES('$code','$name','$how','$account','$saccount','$model','$country','$think','$quantity','$retail_price','$total_price','$status','$date','$place','$picture' ) ";
                //   $result = $connect->query($sql);

                // if(!$result){
                //     die("Error add Data");
                // }
                if (mysqli_query($connect, $sql)) {
                        echo "New record created successfully !";
                        // header("location:nonit_thing.php");
                } else {
                        echo "Error: " . $sql . "
                                " . mysqli_error($connect);
                }
                mysqli_close($connect);

                // Now let's move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $folder)) {
                        echo "<h3> Image uploaded successfully!</h3>";
                } else {
                        echo "<h3> Failed to upload image!</h3>";
                }
                //header("location: ?ref=".$_SERVER["PHP_SELF"]);
               
        }
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        // exit;
}


// header('location: index.php');
// exit;
//}
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
                        <h2>បញ្ជូលសម្ភារ</h2>
                        <form METHOD="POST" action="" multipart="form/data" enctype="multipart/form-data">
                                <div class="control-form">
                                        <div class="inline-form">
                                                <label for="">លេខកូដ</label>
                                                <input type="text" name="code" placeholder="" value="" required>
                                        </div>

                                        <div class="inline-form">
                                                <label for="">ឈ្មោះសម្ភារ</label>
                                                <!-- <input type="text" name="name" placeholder="ឈ្មោះសម្ភារ:" value=""> -->
                                                <select name="name" id="" value="" required>
                                                        <option value="">---ជ្រើសរើស---</option>
                                                        <?php
                                                        $showname = "SELECT * FROM addproductname";
                                                        $showname_run = mysqli_query($connect, $showname);
                                                        while ($row = $showname_run->fetch_assoc()) {
                                                        ?>

                                                                <option value="<?php echo "$row[name]" ?>"><?php echo "$row[name]" ?></option>

                                                        <?php } ?>
                                                </select>

                                        </div>
                                        <div class="inline-form">
                                                <label for="">លក្ខណ:បច្ចេកទេស</label>
                                                <input type="text" name="how" placeholder="លក្ខណ:បច្ចេកទេស" value="" required>
                                        </div>
                                        <div class="inline-form">
                                                <label for="">គណនី</label>
                                                <input type="text" name="account" placeholder="6005" value="6005">
                                        </div>
                                        <div class="inline-form">
                                                <label for="">អនុគណនី</label>
                                                <select name="saccount" required>
                                                        <option value="">---ជ្រើសរើស---</option>
                                                        <option value="60051">60051</option>
                                                        <option value="60052">60052</option>
                                                        <option value="60053">60053</option>
                                                        <option value="60055">60055</option>
                                                </select>
                                        </div>
                                        <div class="inline-form">
                                                <label for="">ម៉ាក</label>
                                                <input type="text" name="model" placeholder="ម៉ាក" value="">
                                        </div>
                                        <div class="inline-form">
                                                <label for="">ប្រទេសផលិត</label>
                                                <input type="text" name="country" placeholder="ប្រទេសផលិត" value="">
                                        </div>
                                        <div class="inline-form">
                                                <label for="">ឯកតា</label>
                                                <input list="think" name="think"> <br>
                                                <datalist id="think">
                                                        <?php
                                                        $showthink = "SELECT * FROM addthink";
                                                        $showthink_run = mysqli_query($connect, $showthink);
                                                        while ($row = $showthink_run->fetch_assoc()) {
                                                        ?>
                                                                <option value="<?php echo "$row[think]" ?>">

                                                                <?php } ?>

                                                </datalist>
                                        </div>
                                        <div class="inline-form">
                                                <label for="">បរិមាណ</label>
                                                <input type="text" name="quantity" placeholder="បរិមាណ" value="1" required>
                                        </div>
                                        <div class="inline-form">
                                                <label for="">តម្លៃ <small>(គិតជារៀល)</small></label>
                                                <input type="text" name="retail_price" placeholder="តម្លៃរាយ" value="" required>
                                        </div>
                                        <!-- <div class="inline-form">
                            <label for="">តម្លៃសរុប</label> 
                            <input type="text" name="total_price" placeholder="តម្លៃសរុប" value="">
                    </div> -->
                                        <div class="inline-form">
                                                <label for="">ស្ថានភាព</label><br>

                                                <select name="status" id="" class="" required><br>
                                                        <option value="ល្អ">ល្អ</option>
                                                        <option value="មធ្យម">មធ្យម</option>
                                                        <option value="អន់">អន់</option>
                                                        <option value="ខូច">ខូច</option>
                                                </select>

                                        </div>
                                        <div class="inline-form">
                                                <label for=""> កាលបរិច្ឆេទចូល</label>
                                                <input type="date" name="date" id="" value="" required>
                                        </div>
                                        <div class="inline-form">
                                                <label for="">កន្លែងប្រើប្រាស់</label><br>
                                                <select name="place" id="" class="inline-forms" required>

                                                        <option value="">---ជ្រើសរើស---</option>
                                                        <option value="com.lab1">com.lab1</option>
                                                        <option value="com.lab2">com.lab2</option>
                                                        <option value="com.media">com.media</option>
                                                        <option value="office">office</option>
                                                        <option value="in stock">in stock</option>

                                                </select>
                                        </div>
                                        <div class="clear-fix"></div>
                                        <div class="inline-form">
                                                <label for="">រូបភាព</label>
                                                <input type="file" name="picture" placeholder="រូបភាព" value="" accept="image/*" onchange="loadFile(event)">

                                        </div>
                                        <div class="preview">
                                                <img id="output" />
                                                <script>
                                                        var loadFile = function(event) {
                                                                var output = document.getElementById('output');
                                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                                output.onload = function() {
                                                                        URL.revokeObjectURL(output.src) // free memory
                                                                }
                                                        };
                                                </script>
                                        </div>
                                        <div class="clear-fix"></div>
                                        <div class="button">
                                                <!-- <input type="submit" name="submit" value="យល់ព្រម">
                            <input type="reset" name="reset" id="" value="បដិសេដ"> -->

                                                <button class="left" type="reset" name="">បដិសេដ</button>
                                                <button class="right" type="submit" name="submit">យល់ព្រម</button>
                                        </div>
                                </div>
                        </form>


                </div>
        </div>
</body>

</html>