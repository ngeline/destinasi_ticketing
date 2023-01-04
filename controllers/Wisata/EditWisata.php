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
        $id = $_GET["id"];
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

            $file_gambar = mysqli_query($connection, "SELECT file FROM wisata WHERE id = '$id'");
            $file_gambar = mysqli_fetch_assoc($file_gambar);

            if($file_gambar["file"] != $nama_file){
                $loc_img = '../../assets/server/img/'.$file_gambar["file"];
                if(file_exists($loc_img)){
                    unlink($loc_img);
                }
            }

            $move = move_uploaded_file($file_tmp, $movelocation);

            $query      = mysqli_query($connection, "UPDATE wisata SET 
                nama_wisata = '$nama_wisata',
                harga       = '$harga',
                alamat      = '$alamat',
                deskripsi   = '$deskripsi',
                fasilitas   = '$fasilitas',
                hal_perhatian = '$hal_perhatian',
                file        = '$nama_file'
                WHERE id = '$id'
            ");


            if($query){
                header('location: '.$base_url.'/admin/wisata/wisata.php?wisata');
                return false;
            }else{
                $_SESSION['error'] = "Something wrong in server!";
                header('location: '.$base_url.'/admin/wisata/edit-wisata.php?wisata&id='.$id);
                return false;
            }
        
    }
?>