<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-cog"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Setting</span>
          <div class="dropdown-divider"></div>
          <?php 
            if(isset($_GET["pesanan"]) || isset($_GET["wisata"]) || isset($_GET["permainan"])){
          ?>
            <a href="../../controllers/Authentication/logout.php" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
            </a>
          <?php
            }else{
          ?>
            <a href="../controllers/Authentication/logout.php" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
            </a>
          <?php
            }
          ?>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->