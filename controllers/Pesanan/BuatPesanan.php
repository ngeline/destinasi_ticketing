<?php 
    session_start();
    require_once('../../setting/connection.php');

    if(isset($_POST["pesan"])){
        $user_id           = $_POST["user_id"];
        $jumlah_orang   = $_POST["quant"][2];
        $tanggal_wisata = $_POST["tanggal_wisata"];
        $total_pembayaran = $_POST["total_pembayaran"];


        $wisata_id = mysqli_query($connection, "SELECT id, harga FROM wisata  ORDER BY id DESC LIMIT 1");
        $wisata_id = mysqli_fetch_assoc($wisata_id);
        $w_id = $wisata_id["id"];
        $harga = $wisata_id["harga"];
        $date = date("Y-m-d H:i:s");
        

        $query      = mysqli_query($connection, "INSERT INTO pesanan (user_id, wisata_id, total_pembayaran, jumlah_orang, tanggal_wisata, status_admin, status_pesanan, createdAt, updatedAt) VALUES (
            '$user_id',
            '$w_id',
            '$total_pembayaran',
            '$jumlah_orang',
            '$tanggal_wisata',
            '0',
            '0',
            '$date',
            '$date'
        )");

        if($query){
            $_SESSION['success'] = "Berhasil Membuat Pesanan!!";
            header('location: '.$base_url.'/pesanan.php');
            return false;
        }else{
            $_SESSION['error'] = "Gagal Membuat Pesanan!!";
            header('location: '.$base_url.'/detail.php?id='.$permainan_id);
            return false;
        }
    }
?>