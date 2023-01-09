<?php
    session_start();
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
        $wisata_id      = $_POST["wisata_id"];
        $harga          = $_POST["harga"];
        $nama_permainan = $_POST["nama_permainan"];
        $nama_file      = $_FILES['nama_file']['name'];
        $deskripsi  = $_POST["deskripsi"];

        if(!empty($nama_file)){
            $ekstensi_diperbolehkan	= array('png','jpg', 'jpeg');
            $x = explode('.', $nama_file);
            $ekstensi = strtolower(end($x));
            $nama_file = generateFileName().'.'.$ekstensi;
            $file_tmp = $_FILES['nama_file']['tmp_name'];
            $movelocation = '../../assets/server/img/'.$nama_file;
            if(in_array($ekstensi, $ekstensi_diperbolehkan) == true){
                $file_gambar = mysqli_query($connection, "SELECT foto FROM permainan WHERE id = '$id'");
                $file_gambar = mysqli_fetch_assoc($file_gambar);

                if($file_gambar["foto"] != $nama_file){
                    $loc_img = '../../assets/server/img/'.$file_gambar["foto"];
                    if(file_exists($loc_img)){
                        unlink($loc_img);
                    }
                }

                $move = move_uploaded_file($file_tmp, $movelocation);

                $query      = mysqli_query($connection, "UPDATE permainan SET 
                    wisata_id       = '$wisata_id',
                    nama_permainan  = '$nama_permainan',
                    foto            = '$nama_file',
                    harga           = '$harga',
                    deskripsi       = '$deskripsi',
                    WHERE id = '$id'
                ");
            }else{
                $_SESSION["foto"] = "Extensi foto hanya bisa png, jpg dan jpeg!";
                $query = false;
            }
        }else{
            $query      = mysqli_query($connection, "UPDATE permainan SET 
                wisata_id       = '$wisata_id',
                nama_permainan  = '$nama_permainan',
                harga           = '$harga',
                deskripsi       = '$deskripsi'
                WHERE id = '$id'
            ");
        }


        if($query){
            header('location: '.$base_url.'/admin/permainan/permainan.php?permainan');
            return false;
        }else{
            $_SESSION['error'] = "Something wrong!";
            header('location: '.$base_url.'/admin/permainan/edit-permainan.php?permainan&id='.$id);
            return false;
        }
        
    }
?>