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
        $wisata_id      = $_POST["wisata_id"];
        $harga          = $_POST["harga"];
        $nama_permainan = $_POST["nama_permainan"];
        $nama_file      = $_FILES['nama_file']['name'];

        
        $x = explode('.', $nama_file);
        $ekstensi = strtolower(end($x));
        $nama_file = generateFileName().'.'.$ekstensi;
        $file_tmp = $_FILES['nama_file']['tmp_name'];
        $movelocation = '../../assets/server/img/'.$nama_file;
        $move = move_uploaded_file($file_tmp, $movelocation);


        $query      = mysqli_query($connection, "INSERT INTO permainan (wisata_id, nama_permainan, foto, harga) VALUES (
            '$wisata_id',
            '$nama_permainan',
            '$nama_file',
            '$harga'
        )");

        if($query){
            header('location: '.$base_url.'/admin/permainan/permainan.php?permainan');
            return false;
        }else{
            $_SESSION['error'] = "Something wrong in server!";
            header('location: '.$base_url.'/admin/permainan/tambah-permainan.php?permainan');
            return false;
        }
    }
?>