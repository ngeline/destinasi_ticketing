<?php
    require_once('../../setting/connection.php');

    if (isset($_GET['id'])) {

	$id = $_GET['id'];

    $file_gambar = mysqli_query($connection, "SELECT file FROM wisata WHERE id = '$id'");
    $file_gambar = mysqli_fetch_assoc($file_gambar);

    $loc_img = '../../assets/server/img/'.$file_gambar["file"];
    if(file_exists($loc_img)){
        unlink($loc_img);
    }

	// perintah query untuk menghapus data pada tabel is_siswa
	$query = mysqli_query($connection, "DELETE FROM wisata WHERE id='$id'");

	// cek hasil query
	if($query){
        header('location: '.$base_url.'/admin/wisata/wisata.php?wisata');
        return false;
    }else{
        $_SESSION['error'] = "Gagal menghapus data!";
        header('location: '.$base_url.'/admin/wisata/wisata.php?wisata');
        return false;
    }
}
?>