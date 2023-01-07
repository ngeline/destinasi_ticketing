<?php 
    session_start();
    require_once('../../setting/connection.php');

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $date = date("Y-m-d H:i:s");

        $query      = mysqli_query($connection, "UPDATE pesanan SET
                status_pembayaran = '1',
                updatedAt = '$date'
            WHERE id = '$id'
        ");

        if($query){
            header('location: '.$base_url.'/admin/pesanan/pesanan.php?pesanan');
            return false;
        }else{
            $_SESSION['error'] = "Something wrong in server!";
            header('location: '.$base_url.'/admin/pesanan/pesanan.php?pesanan');
            return false;
        }
    }
?>