<?php 
    include('ticketing/layouts/header.php');

    $id = $_GET["id"];
    $permainan = mysqli_query($connection, "SELECT * FROM permainan where id = '$id'");
    $permainan = mysqli_fetch_assoc($permainan);
?>
<div class="packages">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage text_align_center">
                    <h2><?= $permainan['nama_permainan'] ?></h2>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <img src="<?= $base_url.'/assets/server/img/'.$permainan["foto"] ?>" alt="#"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tuscany">
                    <div class="tusc text_align_left">
                    <div class="italy">
                        <h3><?= $permainan["nama_permainan"] ?></h3>
                        <span><img src="assets/client/images/loca.png" alt="#"/> Indonesia</span>
                    </div>
                    <div class="italy_right">
                        <h3>Harga</h3>
                        <span>Rp <?= $permainan["harga"] ?> / orang</span>
                    </div>
                    </div>
                    <p><?= $permainan["deskripsi"] ?></p>
                    <div class="titlepage text_align_center ">
                        <h2>Pesan Sekarang!</h2>
                        <div class="col-md-8 offset-md-2">
                            <form id="request" class="main_form" action="<?= $base_url.'/controllers/Pesanan/BuatPesanan.php' ?>" method="POST">
                                <div class="row">
                                    <input class="cont_in" type="number" name="user_id" value="<?= $_SESSION['login']['id'] ?>" hidden> 
                                    <input class="cont_in" type="number" name="permainan_id" value="<?= $permainan['id'] ?>" hidden> 
                                    <div class="col-md-12 ">
                                        <input class="cont_in" placeholder="Jumlah Orang" type="number" name="jumlah_orang"> 
                                    </div>
                                    <div class="col-md-12">
                                        <input class="cont_in" placeholder="Tanggal" type="date" name="tanggal_wisata"> 
                                    </div>
                                    <div class="col-md-12">
                                        <button class="send_btnt" name="pesan">Pesan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('ticketing/layouts/footer.php') ?>