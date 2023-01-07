<?php 
    session_start();
    require_once('../../setting/connection.php');

    if(isset($_POST["simpan"])){
        $nama           = $_POST["name"];
        $wisata_id      = $_POST["wisata_id"];
        $permainan_id   = $_POST["permainan_id"];
        $harga          = $_POST["harga"];
        $jumlah_orang   = $_POST["jumlah_orang"];
        $total_pembayaran = $harga * $jumlah_orang;
        $tanggal_wisata = $_POST["tanggal_wisata"];
        $status_pesanan = $_POST["status_pesanan"];
        $password       = password_hash("pengunjung", PASSWORD_BCRYPT);

        $user = mysqli_query($connection, "INSERT INTO users (level, name, username, password) VALUES (
            'pengunjung',
            '$nama',
            '$nama',
            '$password'
        )");

        $getUser = mysqli_query($connection, "SELECT id FROM users ORDER BY id DESC LIMIT 1");
        $getUser = mysqli_fetch_assoc($getUser);
        $getUser = $getUser["id"];

        $date = date("Y-m-d H:i:s");

        $query      = mysqli_query($connection, "INSERT INTO pesanan (user_id, wisata_id, permainan_id, total_pembayaran, jumlah_orang, tanggal_wisata, status_admin, status_pesanan, createdAt, updatedAt) VALUES (
            '$getUser',
            '$wisata_id',
            '$permainan_id',
            '$total_pembayaran',
            '$jumlah_orang',
            '$tanggal_wisata',
            '1',
            '$status_pesanan',
            '$date',
            '$date'
        )");

        if($status_pesanan == 1){
            $getPesanan = mysqli_query($connection, "SELECT id, total_pembayaran FROM pesanan ORDER BY id DESC LIMIT 1");
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
        }

        if($query){
            header('location: '.$base_url.'/admin/pesanan/pesanan.php?pesanan');
            return false;
        }else{
            $_SESSION['error'] = "Something wrong in server!";
            header('location: '.$base_url.'/admin/pesanan/tambah-pesanan.php?pesanan');
            return false;
        }
    }
?>