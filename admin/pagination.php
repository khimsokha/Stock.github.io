<?php
    include('include/config.php');
    $result = $connect->query("SELECT * FROM itproduct WHERE saccount=60055 LIMIT 0,5");
?>