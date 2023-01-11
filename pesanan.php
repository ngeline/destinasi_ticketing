<?php 
    include('ticketing/layouts/header.php');
    $user_id = $_SESSION['login']['id'];
    $pesanan = mysqli_query($connection, "SELECT ps.*, p.nama_permainan, p.foto from pesanan ps, permainan p where user_id = '$user_id' AND p.id = ps.permainan_id");
?>
<div class="packages">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="titlepage text_align_center">
                    <h2>Status Pesanan Tiket</h2>
                </div>
            </div>
            
        </div>
        <?php foreach($pesanan as $data) { ?>
            <div class="row">
                <div class="col-md-6">
                    <figure><img src="<?= $base_url.'/assets/server/img/'.$data["foto"] ?>" alt="#"/></figure>
                    <div class="tuscany text_align_center">
                        <div class="tusc text_align_center">
                            <div class="italy">
                                <h3><?= $data["nama_permainan"] ?></h3>
                            </div>
                            <div class="italy_right">
                                <h3>Harga</h3>
                                <span>Rp <?= $data["total_pembayaran"] ?> / <?= $data["jumlah_orang"] ?> orang</span>
                            </div>
                        </div>
                        <p> Status Admin:  <?= ($data["status_admin"] == 0) ? 'Belum Dikonfirmasi' : 'Terkonfirmasi, silahkan datang dan segera membayar ditempat' ?></p>
                        <p> Status Pesanan: <?= ($data["status_pesanan"] == 0) ? 'Belum Dibayar' : 'Selesai' ?> </p>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</div>
<?php include('ticketing/layouts/footer.php') ?>