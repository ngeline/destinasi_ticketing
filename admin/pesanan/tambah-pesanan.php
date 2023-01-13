<?php 
  session_start();
  include('../../setting/connection.php');
  
  if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location:".$base_url.'/admin/login.php');
  }

  $wisata = mysqli_query($connection, "SELECT id, nama_wisata FROM wisata ORDER BY id DESC LIMIT 1");

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
                <form action="<?= $base_url.'/controllers/Pesanan/TambahPesanan.php' ?>" method="POST" enctype="multipart/form-data" id="form-insert">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Pengunjung</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pengunjung">
                        </div>
                        <div class="form-group">
                            <label for="wisata_id">Nama Wisata</label>
                            <select name="wisata_id" id="wisata_id" class="form-control">
                                <option value="" selected disabled>===== Pilih Wisata =====</option>
                                <?php if(!is_null($wisata)){ 
                                    foreach($wisata as $data){
                                  ?>
                                <option value="<?= $data["id"] ?>"><?= $data["nama_wisata"] ?></option>
                                <?php 
                                    }
                                  }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_orang">Jumlah Orang Pengikut</label>
                            <input type="number" name="jumlah_orang" class="form-control" id="jumlah_orang" placeholder="Jumlah Orang" value="1">
                        </div>
                        <div class="form-group">
                            <label for="Harga">Harga</label>
                            <select name="harga" id="harga" class="form-control">
                              <option value="" disabled selected>===== Pilih Harga =====</option>
                              <option value="150000">150000</option>
                              <option value="120000">120000</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Harga">Total Pembayaran</label>
                            <input type="number" name="total_pembayaran" class="form-control" id="total_pembayaran" placeholder="Total Pembayaran" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_wisata">Tanggal Wisata</label>
                            <input type="date" name="tanggal_wisata" class="form-control" id="tanggal_wisata" placeholder="Tanggal Wisata">
                        </div>
                        <div class="form-group">
                          <label for="status_pesanan">Status Pesanan</label>
                          <select name="status_pesanan" id="status_pesanan" class="form-control">
                            <option value="" selected disabled> === Pilih Status Pesanan === </option>
                            <option value="1">Sudah Dibayar</option>
                            <option value="0">Belum Dibayar</option>
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

<script type="text/javascript">
  $(document).ready(function(){
    $('#harga').on('change', function(){
      let harga = $(this).val();
      let jumlah_orang = $('#jumlah_orang').val();
      
      let total = harga * jumlah_orang;
      $('#total_pembayaran').val(total);
    })
    $('#jumlah_orang').on('input', function(){
      let jumlah_orang = $(this).val();
      let harga = $('#harga').val();
      
      let total = harga * jumlah_orang;
      $('#total_pembayaran').val(total);
    })
  });
</script>