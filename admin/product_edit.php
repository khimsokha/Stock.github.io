<?php
 $host = "localhost";
 $username = "root";
 $password = "";
 $db = "comtechstock";

 $connect = new mysqli($host, $username, $password, $db);
 if($connect->connect_error){
    die("Error Connect to DB".$connect->connect_error);
 }

       

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET['id'])){
        header("location: ?ref=".$_SERVER["PHP_SELF"]);
        exit;
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM itproduct WHERE id= $id";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();

    // if(!$result){
    //     die("Error get Data");
        
    //     header('location: ./index.php');
    //     exit;
    //}
                

                $code=$row['code'];
                $name=$row['name'];
                $how=$row['how'];
                $account=$row['account'];
                $saccount=$row['saccount'];
                $model=$row['model'];
                $country=$row['country'];
                $think=$row['think'];
                $quantity=$row['quantity'];
                $retail_price=$row['retail_price'];
                // $total_price=$_POST['total_price'];
                $total_price = $quantity * $retail_price;

                $status=$row['status'];
                $date=$row['date'];
                $place=$row['place'];
                $picture=$row['picture'];
}else{  
        
        $id=$_POST['id'];
        $code=$_POST['code'];
        $name=$_POST['name'];
        $how=$_POST['how'];
        $account=$_POST['account'];
        $saccount=$_POST['saccount'];
        $model=$_POST['model'];
        $country=$_POST['country'];
        $think=$_POST['think'];
        $quantity=$_POST['quantity'];
        $retail_price=$_POST['retail_price'];
        // $total_price=$_POST['total_price'];
        $total_price = $quantity * $retail_price;

        $status=$_POST['status'];
        $date=$_POST['date'];
        $place=$_POST['place'];
        //$picture=$_POST['picture']; 
        $picture = $_FILES["picture"]["name"];
	        $tempname = $_FILES["picture"]["tmp_name"];
	        $folder = "./img/". $picture;
                // Now let's move the uploaded image into the folder: image
                        if (move_uploaded_file($tempname, $folder)) {
                                echo "<h3> Image uploaded successfully!</h3>";
                        } else {
                                echo "<h3> Failed to upload image!</h3>";
                        }

                                // if($code==""||$name == ""||$account == ""||$saccount == ""||$retail_price == ""||$status == ""||$dat == ""||){
                                //         echo"
                                //                 <script>
                                //                         alert('All Field can't empty');
                                //                 </script>
                                        
                                //         ";
                                // }
                                

$sql ="UPDATE itproduct SET code = '$code', name = '$name', how = '$how', account = '$account',saccount = '$saccount', model = '$model',country = '$country',think = '$think', quantity = '$quantity', retail_price = '$retail_price', total_price = '$total_price', status = '$status', date = '$date', place = '$place' WHERE id = $id ";
$result = $connect->query($sql);



if(!$result){
    echo"
    <script>
    alert('Edit Not success !  ');
    </script>
    ";  
    die();
    }else{
        if(isset($_GET['header'])){
                $header = $_GET['header'];
        }
        header("location:./".$header.".php");
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
</head>
<body>
    <div class="box">
        <div class="form">
            <h2>កែសម្រួលព័ត៌មានសម្ភារ</h2>
            <form  METHOD="POST" action=""  multipart = "form/data" enctype="multipart/form-data">

                <div class="control-form">
                                <input type="hidden" name="id"  value="<?php echo $id ;?>">
                    <div class="inline-form">
                            <label for="">លេខកូដ</label>
                            <input type="text" name="code" placeholder="Name prodecnd" value="<?php echo $code ;?>">
                    </div>
                    
                    <div class="inline-form">
                            <label for="">ឈ្មោះសម្ភារ</label>
                            <input type="text" name="name" placeholder="ឈ្មោះសម្ភារ:" value="<?php echo $name ;?>">
                    </div>
                    <div class="inline-form">
                            <label for="">លក្ខណ:បច្ចេកទេស</label> 
                            <input type="text" name="how" placeholder="លក្ខណ:បច្ចេកទេស" value="<?php echo $how ;?>">
                    </div>
                    <div class="inline-form">
                            <label for="">គណនី</label> 
                            <input type="text" name="account" placeholder="គណនី"value="<?php echo $account ;?>">
                    </div>
                    <div class="inline-form">
                        <label for="">អនុគណនី</label>
                        <input list="saccount" name = "saccount" value="<?php echo $saccount;?>"> <br>
                        <datalist  id="saccount">
                            <option value="60055">60055</option>
                            <option value="60051">60051</option>
                            <option value="60053">60053</option>
                            <option value="60052">60052</option>
                            
                        </datalist>
                    </div>
                    <div class="inline-form">
                            <label for="">ម៉ាក</label> 
                            <input type="text" name="model"  placeholder="ម៉ាក" value="<?php echo $model ;?>">
                    </div>
                    <div class="inline-form">
                            <label for="">ប្រទេសផលិត</label> 
                            <input type="text" name="country"  placeholder="ប្រទេសផលិត" value="<?php echo $country ;?>">
                    </div>
                    <div class="inline-form">
                            <label for="">ឯកតា</label>
                            <input list="think" name = "think" value="<?php echo $think;?>"> <br>
                            <datalist  id="think">
                                <option value="រាយ">រាយ</option>
                                <option value="គ្រឿង">គ្រឿង</option>
                                <option value="ប្រអប់">ប្រអប់</option>
                                <option value="កេស">កេស</option>
                                
                            </datalist>
                    </div>
                    <div class="inline-form">
                            <label for="">បរិមាណ</label> 
                            <input type="text" name="quantity" placeholder="បរិមាណ" value="<?php echo $quantity ;?>">
                    </div>
                    <div class="inline-form">
                            <label for="">តម្លៃរាយ</label> 
                            <input type="text" name="retail_price" placeholder="តម្លៃរាយ" value="<?php echo $retail_price ;?>">
                    </div>
                    <!-- <div class="inline-form">
                            <label for="">តម្លៃសរុប</label> 
                            <input type="text" name="total_price" placeholder="តម្លៃសរុប" value="">
                    </div> -->
                    <div class="inline-form">
                            <label for="">ស្ថានភាព</label>
                            <input list="status" name = "status" value="<?php echo $status;?>"> <br>
                            <datalist  id="status">
                                <option value="ល្អ">ល្អ</option>
                                <option value="មធ្យម">មធ្យម</option>
                                <option value="អន់">អន់</option>
                                <option value="ខូច">ខូច</option>
                            </datalist>
                    </div>
                    <div class="inline-form">
                            <label for="" > កាលបរិច្ចេទចូល</label>
                            <input type="date" name="date" id="" value="<?php echo $date ;?>">
                    </div>
                    <div class="inline-form">
                            <label for="">កន្លែងប្រើប្រាស់</label>
                            <input list="place" name = "place" value="<?php echo $place;?>"> <br>
                            <datalist  id="place">
                                <option value="com.lab1">com.lab1</option>
                                <option value="com.lab2">com.lab2</option>
                                <option value="com.media">com.media</option>
                                <option value="office">office</option>
                                <option value="in stock">in stock</option>
                            </datalist>
                    </div>
                    <div class="clear-fix"></div>
                    <div class="inline-form">
                            <label for="">រូបភាព</label>
                            <input type="file" name="picture" placeholder="រូបភាព" value="<?php echo $picture ;?>" accept="image/*" onchange="loadFile(event)"> <img src="img/<?php echo $picture ;?>" width="50px" height="auto" >
                                        
                    </div>
                    <div class="preview">
                        <img id="output"/> 
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
                           
                            <button class="left" type="reset">បដិសេដ</button>
                            <button class="right" type="submit" name="submit">យល់ព្រម</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>