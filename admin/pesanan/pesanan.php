<?php 
  session_start();
  include('../../setting/connection.php');
  
  if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location:".$base_url.'/admin/login.php');
  }

  $data = mysqli_query($connection, "SELECT ps.*, u.name, w.nama_wisata
                        FROM pesanan ps, users u, wisata w
                        WHERE ps.user_id = u.id
                        AND ps.wisata_id = w.id
                        ORDER BY id DESC
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
            <h1 class="m-0">Pesanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php?dashboard">Home</a></li>
              <li class="breadcrumb-item active">Pesanan</li>
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
                <h3 class="card-title float-left">Data Pesanan</h3>
                <a href="tambah-pesanan.php?pesanan" class="btn btn-sm btn-success float-right">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pengunjung</th>
                      <th>Wisata</th>
                      <th>Jumlah Orang</th>
                      <th>Total Pembayaran | Status Pembayaran</th>
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
                        <td><?=$row["name"]?></td>
                        <td><?=$row["nama_wisata"]?></td>
                        <td><?=$row["jumlah_orang"]?></td>
                        <td><?=$row["total_pembayaran"]?> <?php ($row["status_pesanan"] == 1 ) ? '<span class="bg-success mx-1 my-2">Sudah Dibayar</span>' : '<span class="bg-danger mx-1 my-2">Belum Dibayar</span>' ?></td>
                        <td>
                        <?php if($row['status_pesanan'] != 2){ ?>
                            <a href="<?= $base_url.'/admin/pesanan/edit-pesanan.php?pesanan&id='.$row["id"] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= $base_url.'/controllers/Pesanan/HapusPesanan.php?id='.$row["id"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus pesanan <?php echo $row['name']; ?>?');">Hapus</a>
                          <?php if ($row['status_admin'] == 0) {?>
                            <a href="<?= $base_url.'/controllers/Pesanan/ConfirmPesanan.php?id='.$row["id"] ?>" class="btn btn-sm btn-success" onclick="return confirm('Anda yakin ingin konfirmasi pesanan <?php echo $row['name']; ?>?');">Konfirmasi Pesanan</a>
                          <?php } else {?>
                            <button class="btn btn-sm btn-success">Terkonfirmasi Admin</button>
                          <?php }?>
                          <?php if ($row['status_pesanan'] == 0) {?>
                            <a href="<?= $base_url.'/controllers/Pesanan/ConfirmPembayaran.php?id='.$row["id"] ?>" class="btn btn-sm btn-primary" onclick="return confirm('Anda yakin ingin konfirmasi pembayaran <?php echo $row['name']; ?>?');">Konfirmasi Pembayaran</a>
                          <?php } else {?>
                            <button class="btn btn-sm btn-primary">Telah Dibayar</button>
                          <?php }?>
                        <?php }else{?>
                            <button class="btn btn-danger">PESANAN DIBATALKAN</button>
                        <?php }?>
                        </td>
                      </tr>
                    <?php }?>

                  </tbody>
                  <!-- <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Pengunjung</th>
                      <th>Wisata</th>
                      <th>Permainan</th>
                      <th>Jumlah Orang</th>
                      <th>Total Pembayaran | Status Pembayaran</th>
                      <th>Action</th>
                    </tr>
                  </tfoot> -->
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