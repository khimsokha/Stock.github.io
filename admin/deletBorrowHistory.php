<?php
include('include/config.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM listborrow WHERE id=$id";
    $connect->query($sql);

   
}
header('location: ./ListBorrowHistory.php');
exit;

?>