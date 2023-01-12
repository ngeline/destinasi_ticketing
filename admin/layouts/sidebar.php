
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <?php 
      if(isset($_GET["pesanan"]) || isset($_GET["wisata"]) || isset($_GET["permainan"])){
    ?>
    <img class="animation__shake" src="../../assets/client/images/logo.png" alt="AdminLTELogo" height="60" width="160">
    <?php 
      }else{
    ?>
    <img class="animation__shake" src="../assets/client/images/logo.png" alt="AdminLTELogo" height="60" width="160">
    <?php 
      }
    ?>
  </div>

  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <?php 
        if(isset($_GET["pesanan"]) || isset($_GET["wisata"]) || isset($_GET["permainan"])){
      ?>
      <img src="../../assets/client/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <?php 
        }else{
      ?>
      <img src="../assets/client/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <?php 
        }
      ?>
      <span class="brand-text font-weight-light">Ticketing App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
            if(isset($_GET["pesanan"]) || isset($_GET["wisata"]) || isset($_GET["permainan"])){
          ?>
          <img src="../../assets/server/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
          <?php 
            }else{
          ?>
          <img src="../assets/server/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
          <?php 
            }
          ?>
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <?php 
              if(isset($_GET["pesanan"]) || isset($_GET["wisata"]) || isset($_GET["permainan"])){
            ?>
            <a href="../dashboard.php?dashboard" class="nav-link <?php if (isset($_GET["dashboard"])){echo "active"; }?>">
            <?php 
              }else{
            ?>
            <a href="dashboard.php?dashboard" class="nav-link <?php if (isset($_GET["dashboard"])){echo "active"; }?>">
            <?php
              }
            ?>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <!-- <li class="nav-item menu-open">
            <?php 
              if(isset($_GET["pesanan"]) || isset($_GET["wisata"]) || isset($_GET["permainan"])){
            ?>
            <a href="../wisata/wisata.php?wisata" class="nav-link <?php if (isset($_GET["wisata"])){echo "active"; }?>">
            <?php 
              }else{
            ?>
            <a href="wisata/wisata.php?wisata" class="nav-link <?php if (isset($_GET["wisata"])){echo "active"; }?>">
            <?php
              }
            ?>
              <i class="nav-icon fas fa-map-marked"></i>
              <p>
                Wisata
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <?php 
              if(isset($_GET["pesanan"]) || isset($_GET["wisata"]) || isset($_GET["permainan"])){
            ?>
            <a href="../permainan/permainan.php?permainan" class="nav-link <?php if (isset($_GET["permainan"])){echo "active"; }?>">
            <?php 
              }else{
            ?>
            <a href="permainan/permainan.php?permainan" class="nav-link <?php if (isset($_GET["permainan"])){echo "active"; }?>">
            <?php
              }
            ?>
              <i class="nav-icon fas fa-gamepad"></i>
              <p>
                Permainan
              </p>
            </a>
          </li> -->
          <li class="nav-item menu-open">
            <?php 
              if(isset($_GET["pesanan"]) || isset($_GET["wisata"]) || isset($_GET["permainan"])){
            ?>
            <a href="../pesanan/pesanan.php?pesanan" class="nav-link <?php if (isset($_GET["pesanan"])){echo "active"; }?>">
            <?php 
              }else{
            ?>
            <a href="wisata/wisata.php?wisata" class="nav-link <?php if (isset($_GET["wisata"])){echo "active"; }?>">
            <?php
              }
            ?>
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Pesanan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>