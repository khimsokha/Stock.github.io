<?php
 $host = "localhost";
 $username = "root";
 $password = "";
 $db = "comtechstock";

        

 $connect = new mysqli($host, $username, $password, $db);
 if($connect->connect_error){
    die("Error Connect to DB".$connect->connect_error);
 }