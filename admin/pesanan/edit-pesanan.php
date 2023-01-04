<?php 
  session_start();
  include('../../setting/connection.php');
  include('../../controllers/Authentication/login.php');
  
  if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location:".$base_url.'/admin/login.php');
  }

  $id = $_GET["id"];

  $wisata = mysqli_query($connection, "SELECT id, nama_wisata FROM wisata");
  $permainan = mysqli_query($connection, "SELECT id, nama_permainan FROM permainan");
  $pesanan = mysqli_query($connection, "SELECT ps.*, u.name, w.nama_wisata, p.nama_permainan, p.harga
                        FROM pesanan ps, users u, wisata w, permainan p
                        WHERE ps.user_id = u.id
                        AND ps.wisata_id = w.id
                        AND ps.permainan_id = p.id
                        AND ps.id = '$id'
                        ");
  $pesanan = mysqli_fetch_assoc($pesanan);

  include('../layouts/header.php');
  include('../layouts/navbar.php');
  include('../layouts/sidebar.php');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Pesanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php?dashboard">Home</a></li>
              <li class="breadcrumb-item active">Tambah Pesanan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Tambah Pesanan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= $base_url.'/controllers/Pesanan/EditPesanan.php?id='.$id ?>" method="POST" enctype="multipart/form-data" id="form-insert">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Pengunjung</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pengunjung" value="<?= $pesanan["name"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="wisata_id">Nama Wisata</label>
                            <select name="wisata_id" id="wisata_id" class="form-control">
                                <option value="" selected disabled>===== Pilih Wisata =====</option>
                                <?php if(!is_null($wisata)){ 
                                    foreach($wisata as $data){
                                  ?>
                                <option value="<?= $data["id"] ?>" <?php if($pesanan['wisata_id'] == $data['id']){ ?> selected <?php } ?>><?= $data["nama_wisata"] ?></option>
                                <?php 
                                    }
                                  }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="permainan_id">Nama Permainan</label>
                            <select name="permainan_id" id="permainan_id" class="form-control">
                                <option value="" selected disabled>===== Pilih Permainan =====</option>
                                <?php if(!is_null($permainan)){ 
                                    foreach($permainan as $dt){
                                  ?>
                                <option value="<?= $dt["id"] ?>" <?php if($pesanan['permainan_id'] == $dt['id']){ ?> selected <?php } ?>><?= $dt["nama_permainan"] ?></option>
                                <?php 
                                    }
                                  }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Harga">Harga</label>
                            <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga" value="<?= $pesanan["harga"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_orang">Jumlah Orang Pengikut</label>
                            <input type="number" name="jumlah_orang" class="form-control" id="jumlah_orang" placeholder="Jumlah Orang" value="<?= $pesanan["jumlah_orang"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_wisata">Tanggal Wisata</label>
                            <input type="date" name="tanggal_wisata" class="form-control" id="tanggal_wisata" placeholder="Tanggal Wisata" value="<?= $pesanan["tanggal_wisata"] ?>">
                        </div>
                        <div class="form-group">
                          <label for="status_pesanan">Status Pesanan</label>
                          <select name="status_pesanan" id="status_pesanan" class="form-control">
                            <option value="" selected disabled> === Pilih Status Pesanan === </option>
                            <option value="1" <?php if($pesanan['status_pesanan'] == 1){ ?> selected <?php } ?>>Sudah Dibayar</option>
                            <option value="0" <?php if($pesanan['status_pesanan'] == 0){ ?> selected <?php } ?>>Belum Dibayar</option>
                          </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
            
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include('../Layouts/footer.php') ?>