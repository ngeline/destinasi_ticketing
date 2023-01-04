<?php 
  session_start();
  include('../../setting/connection.php');
  include('../../controllers/Authentication/login.php');
  
  if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location:".$base_url.'/admin/login.php');
  }

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
            <h1 class="m-0">Pesanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php?dashboard">Home</a></li>
              <li class="breadcrumb-item">Pesanan</li>
              <li class="breadcrumb-item active">Edit Pesanan</li>
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
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_wisata">Nama Wisata</label>
                            <input type="text" class="form-control" id="nama_wisata" placeholder="Nama Wisata">
                        </div>
                        <div class="form-group">
                            <label for="Harga">Harga</label>
                            <textarea name="harga" id="harga" cols="30" rows="10" placeholder="Harga" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Alamat" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Deskripsi" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fasilitas">Deskripsi</label>
                            <textarea name="fasilitas" id="fasilitas" cols="30" rows="10" placeholder="Fasilitas" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="hal_perhatian">Hal Perhatian</label>
                            <textarea name="hal_perhatian" id="hal_perhatian" cols="30" rows="10" placeholder="Hal Perhatian" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nama_file">Foto</label>
                            <input type="file" class="form-control" id="nama_file" placeholder="Nama Wisata">
                        </div>
                    </div>
                    <!-- /.card-body -->
            
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('../Layouts/footer.php') ?>