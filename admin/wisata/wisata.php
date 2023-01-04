<?php 
  session_start();
  include('../../setting/connection.php');
  include('../../controllers/Authentication/login.php');
  
  if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location:".$base_url.'/admin/login.php');
  }

  $data = mysqli_query($connection, "SELECT *
                        FROM wisata 
                      ");

  include('../layouts/header.php');
  include('../layouts/navbar.php');
  include('../layouts/sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Wisata</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php?dashboard">Home</a></li>
              <li class="breadcrumb-item active">Wisata</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title float-left">Data Wisata</h3>
                <a href="tambah-wisata.php?wisata" class="btn btn-sm btn-success float-right">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Wisata</th>
                      <th>Alamat</th>
                      <th>Harga</th>
                      <th>Foto</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                    foreach($data as $row){
                      ?>
                      <tr>
                        <td><?=$no++?></td>
                        <td><?=$row["nama_wisata"]?></td>
                        <td><?=$row["alamat"]?></td>
                        <td><?=$row["harga"]?></td>
                        <td>
                          <?php if($row["file"] != null || !empty($row["file"])){?>
                            <img src="<?=$base_url.'/assets/server/img/'.$row["file"]?>" alt="Foto Taman" width="100px">
                          <?php }else { ?>
                            <img src="https://kliknusae.com/img/404.jpg" alt="Foto Taman" width="100px">
                          <?php } ?>
                        </td>
                        <td>
                          <a href="<?= $base_url.'/admin/wisata/edit-wisata.php?wisata&id='.$row["id"] ?>" class="btn btn-sm btn-warning">Edit</a>
                          <a href="<?= $base_url.'/controllers/Wisata/HapusWisata.php?id='.$row["id"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus wisata <?php echo $row['nama_wisata']; ?>?');">Delete</a>
                        </td>
                      </tr>
                    <?php }?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Wisata</th>
                      <th>Alamat</th>
                      <th>Harga</th>
                      <th>Foto</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>

<?php include('../Layouts/footer.php') ?>