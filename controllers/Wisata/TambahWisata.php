<?php
    require_once('../../setting/connection.php');
    function generateFileName(){
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789_";
        $name = "";
        for($i=0; $i<12; $i++)
        $name.= $chars[rand(0,strlen($chars))];
        return $name;
    }

    if(isset($_POST["simpan"])){
        $nama_wisata    = $_POST["nama_wisata"];
        $harga          = $_POST["harga"];
        $alamat         = $_POST["alamat"];
        $deskripsi      = $_POST["deskripsi"];
        $fasilitas      = $_POST["fasilitas"];
        $hal_perhatian  = $_POST["hal_perhatian"];
        $nama_file      = $_FILES['nama_file']['name'];

        
        $x = explode('.', $nama_file);
        $ekstensi = strtolower(end($x));
        $nama_file = generateFileName().'.'.$ekstensi;
        $file_tmp = $_FILES['nama_file']['tmp_name'];
        $movelocation = '../../assets/server/img/'.$nama_file;
        $move = move_uploaded_file($file_tmp, $movelocation);


        $query      = mysqli_query($connection, "INSERT INTO wisata (nama_wisata, harga, alamat, deskripsi, fasilitas, hal_perhatian, file) VALUES (
            '$nama_wisata',
            '$harga',
            '$alamat',
            '$deskripsi',
            '$fasilitas',
            '$hal_perhatian',
            '$nama_file'
        )");

        if($query){
            header('location: '.$base_url.'/admin/wisata/wisata.php?wisata');
            return false;
        }else{
            $_SESSION['error'] = "Something wrong in server!";
            header('location: '.$base_url.'/admin/wisata/tambah-wisata.php?wisata');
            return false;
        }
    }
?>