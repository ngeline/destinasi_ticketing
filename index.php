<?php 
   include('ticketing/layouts/header.php');
   
   $wisata = mysqli_query($connection, "SELECT * FROM permainan LIMIT 4");
?>
<!-- top -->
      <div class="full_bg">
         <div class="slider_main">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <!-- carousel code -->
                     <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-inner">
                           <!-- first slide -->
                           <div class="carousel-item active">
                              <div class="carousel-caption relative">
                                 <div class="row">
                                    <div  class="col-md-10 offset-md-1">
                                       <div class="board">
                                          <h1>Destinasi <br>Permainan Wisata </h1>
                                          <p>when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed towhen looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to</p>
                                          <a href="permainan.php" class="read_more" href="Javascript:void(0)">Permainan Kami</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- controls -->
                        <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span> -->
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end banner -->
      <!-- packages -->
      <div class="packages" id="#permainan">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_center ">
                     <h2>Dunia Permainan</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <?php foreach($wisata as $data){  ?>
               <div class=" col-md-6">
                  <div id="ho_img" class="packages_box" data-aos="fade-right" >
                     <figure><img src="<?= $base_url.'/assets/server/img/'.$data["foto"] ?>" alt="#"/></figure>
                     <div class="tuscany">
                        <div class="tusc text_align_left">
                           <div class="italy">
                              <h3><?= $data["nama_permainan"] ?></h3>
                              <span><img src="assets/client/images/loca.png" alt="#"/> Indonesia</span>
                           </div>
                           <div class="italy_right">
                              <h3>Harga</h3>
                              <span>Rp <?= $data["harga"] ?> / orang</span>
                           </div>
                        </div>
                        <p><?= $data["deskripsi"] ?></p>
                        <div class="tusc">
                           <?php if(isset($_SESSION["login"])){ ?>
                              <a href="detail.php" class="read_more" href="Javascript:void(0)">Pesan</a>
                           <?php }else{ ?>
                              <a href="login.php" class="read_more" href="Javascript:void(0)">Pesan</a>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
               <?php }  ?>
               <div class="col-md-12">
                  <a class="read_more" href="Javascript:void(0)">See More</a>
               </div>
            </div>
         </div>
      </div>
      <!-- end packages -->
      <!-- about -->
      <div class="about" id="about">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_center">
                     <h2>About Our Company</h2>
                  </div>
               </div>
               <div class="col-md-10 offset-md-1">
                  <div class="about_text text_align_center">
                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentiallyLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                     </p>
                     <a class="read_more" href="about.html">Read More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
      <!-- customers -->
      <div class="customers">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="titlepage text_align_center">
                     <h2>Customers Says </h2>
                  </div>
               </div>
            </div>
            <!-- start slider section -->
            <div class="row">
               <div class="col-md-12">
                  <div id="myCarousel" class="carousel slide customers_banne" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="test_box text_align_center">
                                    <p>text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a typetext of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p>
                                    <i><img src="assets/client/images/test2.png" alt="#"/></i>
                                    <h4>Fitter Found</h4>
                                    <span>Industry's standard </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="test_box text_align_center">
                                    <p>text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a typetext of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p>
                                    <i><img src="assets/client/images/test2.png" alt="#"/></i>
                                    <h4>Fitter Found</h4>
                                    <span>Industry's standard </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="test_box text_align_center">
                                    <p>text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a typetext of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p>
                                    <i><img src="assets/client/images/test2.png" alt="#"/></i>
                                    <h4>Fitter Found</h4>
                                    <span>Industry's standard </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <i class="fa fa-angle-left" aria-hidden="true"></i>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <i class="fa fa-angle-right" aria-hidden="true"></i>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end customers -->
<?php include('ticketing/layouts/footer.php') ?>