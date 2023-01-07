<?php 
    session_start();
    require_once('../../setting/connection.php');

    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $getPesanan = mysqli_query($connection, "SELECT id, total_pembayaran FROM pesanan WHERE id='$id'");
        $getPesanan = mysqli_fetch_assoc($getPesanan);
        $getPesananId = $getPesanan["id"];
        $getPesananPembayaran = $getPesanan["total_pembayaran"];

        $date = date("Y-m-d");

        $pembayaran = mysqli_query($connection, "INSERT INTO t_pembayaran (pesanan_id, metode_pembayaran, total_pembayaran, createdAt, updatedAt) VALUES (
            '$getPesananId',
            'Offline',
            '$getPesananPembayaran',
            '$date',
            '$date'
        )
        ");

        $query      = mysqli_query($connection, "UPDATE pesanan SET
                status_admin = '1',
                updated_at = '$date'
            WHERE id = '$id'
        ");

        if($query && $pembayaran){
            header('location: '.$base_url.'/admin/pesanan/pesanan.php?pesanan');
            return false;
        }else{
            $_SESSION['error'] = "Something wrong in server!";
            header('location: '.$base_url.'/admin/pesanan/pesanan.php?pesanan');
            return false;
        }
    }
?>