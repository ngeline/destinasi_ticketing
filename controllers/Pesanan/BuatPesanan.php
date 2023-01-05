<?php 
    session_start();
    require_once('../../setting/connection.php');

    if(isset($_POST["pesan"])){
        $user_id           = $_POST["user_id"];
        $permainan_id   = $_POST["permainan_id"];
        $jumlah_orang   = $_POST["jumlah_orang"];
        $tanggal_wisata = $_POST["tanggal_wisata"];

        $wisata_id = mysqli_query($connection, "SELECT id, harga FROM permainan where id = $permainan_id");
        $wisata_id = mysqli_fetch_assoc($wisata_id);
        $w_id = $wisata_id["id"];
        $harga = $wisata_id["harga"];
        
        $total_pembayaran = $harga * $jumlah_orang;

        $query      = mysqli_query($connection, "INSERT INTO pesanan (user_id, wisata_id, permainan_id, total_pembayaran, jumlah_orang, tanggal_wisata, status_admin, status_pesanan) VALUES (
            '$user_id',
            '$w_id',
            '$permainan_id',
            '$total_pembayaran',
            '$jumlah_orang',
            '$tanggal_wisata',
            '0',
            '0'
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