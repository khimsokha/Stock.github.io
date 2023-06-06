<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "comtechstock";
   
    $connect = new mysqli($host, $username, $password, $db);
    if($connect->connect_error){
       die("Error Connect to DB".$connect->connect_error);
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM itproduct WHERE id=$id";
        $connect->query($sql);

       
    }
    header('location:'. $_SERVER['HTTP_REFERER']);
    exit;

?>