<?php
    session_start();
    require_once('../../setting/connection.php');

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $getUser = mysqli_query($connection, "SELECT user_id FROM pesanan WHERE id='$id'");
        $getUser = mysqli_fetch_assoc($getUser);
        $getUser = $getUser["user_id"];

        // delete user
        $userDel = mysqli_query($connection, "DELETE FROM users WHERE id='$getUser'");
        $pesananDel = mysqli_query($connection, "DELETE FROM pesanan WHERE id='$id'");


        // cek hasil query
        if($userDel && $pesananDel){
            header('location: '.$base_url.'/admin/pesanan/pesanan.php?pesanan');
            return false;
        }else{
            $_SESSION['error'] = "Gagal menghapus data!";
            header('location: '.$base_url.'/admin/pesanan/pesanan.php?pesanan');
            return false;
        }
    }
?>