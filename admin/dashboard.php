<?php 
  session_start();
  include('../setting/connection.php');
  
  if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location:".$base_url.'/admin/login.php');
  }

  include('layouts/header.php');
  include('layouts/navbar.php');
  include('layouts/sidebar.php');




  $data2 = mysqli_query($connection, "SELECT * FROM pesanan ");
  $data3 = mysqli_query($connection, "SELECT * FROM t_pembayaran ");

  $jml_pesanan = mysqli_num_rows($data2);
  $jml_pembayaran = mysqli_num_rows($data3);

?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?php echo number_format($jml_pesanan);?><sup style="font-size: 20px"></sup></h3>

              <p>Jumlah Pesanan</p>
              
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo number_format($jml_pembayaran);?><sup style="font-size: 20px"></sup></h3>

                <p>Jumlah Transaksi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- ISI DASHBOARD -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php include('Layouts/footer.php') ?>