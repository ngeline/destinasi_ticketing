<?php 
    session_start();
    require_once('../../setting/connection.php');

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $query      = mysqli_query($connection, "UPDATE pesanan SET
                status_pesanan = '2'
            WHERE id = '$id'
        ");

        if($query){
            header('location: '.$base_url.'/pesanan.php?pesanan');
            return false;
        }else{
            $_SESSION['error'] = "GAGAL MEMBATALKAN PESANAN!";
            header('location: '.$base_url.'/pesanan.php?id='.$id);
            return false;
        }
    }
?>