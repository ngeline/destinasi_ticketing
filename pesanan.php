<?php 
    include('ticketing/layouts/header.php');
    $user_id = $_SESSION['login']['id'];
    $pesanan = mysqli_query($connection, "SELECT ps.*, w.nama_wisata from pesanan ps, wisata w where user_id = '$user_id' AND w.id = ps.wisata_id");
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
        <div class="row">
            <?php foreach($pesanan as $data) { ?>
                <div class="col-md-6">
                    <figure><img src="https://i.pinimg.com/originals/07/bf/9b/07bf9bd57e28d154a9c3df0178b3befe.jpg" alt="#" width="80%" /></figure>
                    <div class="tuscany">
                        <div class="tusc text_align_left">
                            <div class="italy">
                                <h3><?= $data["nama_wisata"] ?></h3>
                                <br>
                                <h3>Harga <span>Rp <?= $data["total_pembayaran"] ?> / <?= $data["jumlah_orang"] ?> orang</span></h3>
                                <p>Tanggal Wisata : <?= date('d F Y', strtotime($data["tanggal_wisata"])) ?></p>
                            </div>
                        </div>
                        <?php if($data['status_pesanan'] != 2){ ?>
                            <p> Status Admin:  <?= ($data["status_admin"] == 0) ? 'Belum Dikonfirmasi' : 'Terkonfirmasi, silahkan datang dan segera membayar ditempat' ?></p>
                            <p> Status Pesanan: <?= ($data["status_pesanan"] == 0) ? 'Belum Dibayar' : 'Selesai' ?> </p>
                        <?php }else{ ?>
                            <p> Status Admin:  <span class="text-danger">Pesanan Dibatalkan</span></p>
                            <p> Status Pesanan: <span class="text-danger">Pesanan Dibatalkan</span></p>
                        <?php } ?>
                    </div>
                    <div class="tuscany">
                        <?php if($data['status_pesanan'] != 2){ ?>
                            <?php if($data['status_pesanan'] == 0){ ?>
                                <a href="<?= $base_url.'/controllers/Pesanan/BatalPesanan.php?id='.$data["id"] ?>" class="btn btn-primary" onclick="return confirm('Anda yakin ingin membatalkan pesanan Anda di <?php echo $data['nama_wisata']; ?>?');">Batalkan Pesanan</a>
                            <?php }else{ ?>
                                <button class="btn btn-success text-bold">PESANAN TERKONFIRMASI</button>
                            <?php } ?>
                        <?php }else{ ?>
                            <button class="btn btn-danger text-bold">PESANAN DIBATALKAN</button>
                        <?php } ?>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>
<?php include('ticketing/layouts/footer.php') ?>