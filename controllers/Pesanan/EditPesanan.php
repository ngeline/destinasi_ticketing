<?php 
    session_start();
    require_once('../../setting/connection.php');

    if(isset($_POST["simpan"])){
        $id = $_GET["id"];
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

        $getUser = mysqli_query($connection, "SELECT user_id FROM pesanan WHERE id='$id'");
        $getUser = mysqli_fetch_assoc($getUser);
        $getUser = $getUser["user_id"];

        $updUser = mysqli_query($connection, "UPDATE users SET 
                name = '$nama',
                username = '$username'
            WHERE id = '$getUser'
        ");

        $query      = mysqli_query($connection, "UPDATE pesanan SET
                wisata_id   = '$wisata_id',
                permainan_id = '$permainan_id',
                total_pembayaran = '$total_pembayaran',
                jumlah_orang = '$jumlah_orang',
                tanggal_wisata = '$tanggal_wisata',
                status_admin = '1',
                status_pesanan = '$status_pesanan'
            WHERE id = '$id'
        ");

        if($query && $updUser){
            header('location: '.$base_url.'/admin/pesanan/pesanan.php?pesanan');
            return false;
        }else{
            $_SESSION['error'] = "Something wrong in server!";
            header('location: '.$base_url.'/admin/pesanan/edit-pesanan.php?pesanan&id='.$id);
            return false;
        }
    }
?>