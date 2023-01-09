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
                                          <h1>SALOKA THEME PARK</h1>
                                          <p>SALOKA hadir sebagai taman rekreasi terbesar di Tengah Jawa yang masuk dalam daftar destinasi wisata Pesona Indonesia, serta mengusung konsep kearifan lokal berdasarkan legenda rakyat Baru Klinthing. Yuk, rasakan petualanganmu sekarang!</p>
                                          <a href="permainan.php" class="read_more" href="Javascript:void(0)">LIHAT PERMAINAN</a>
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
               <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
                  <img src="assets/client/images/haha1.png" class="img-fluid" alt="">
               </div>
               <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                  <h3>SALOKA THEME PARK MENGUSUNG KONSEP KEARIFAN LOKAL BERDASARKAN LEGENDA RAKYAT BARU KLINTHING.</h3>
                  <br>
                  <p class="fst-italic">
                  Nama SALOKA terinspirasi dari legenda Rawa Pening, suatu Kawasan yang dekat dengan wilayah SALOKA Theme Park berada. Diceritakan pada zaman dahulu hiduplah sepasang suami-istri bernama Ki Hajar Salokantara dan Nyi Endang Sawitri. Mereka mempunyai seorang anak bernama Baru Klinthing yang berwujud naga dan bisa berbicara seperti layaknya manusia. Baru Klinthing dikenal suka menolong. Berangkat dari cerita tersebut, SALOKA berharap mampu menyajikan keceriaan tiada habisnya dengan maskot berbentuk naga yang bernama “LOKA”.
                  </p>
                  <a href="#" class="read-more">Pasang Sekarang <i class="bi bi-long-arrow-right"></i></a>
               </div>
            </div>
         </div>
      </div>
      <br>

      <div id="" class="banner-wrapper bg-light w-100 py-2">
        <div class="banner-vertical-center-work container d-flex justify-content-center align-items-center py-0 p-0">
            <div class="banner-content col-lg-8 col-12 m-lg-auto text-center">
                <h1 class="banner-heading h2 display-3 semi-bold-600"><img class="" height="150px" width="150px" src="assets/client/images/logo.png"></h1>
                <h3 class="banner-body pb-2 light-300 fw-bold">
                Fakta Menarik!
                </h3>
                <p class="banner-body pb-2 light-300">
                SALOKA telah terdaftar sebagai member International Association of Amusement Parks and Attractions (IAAPA). Pada 22 Juni 2019, SALOKA telah diresmikan oleh Menteri Pariwisata, Arief Yahya dan Gubernur Jawa Tengah, Ganjar Pranowo.
                </p>

            </div>
        </div>
      </div>
      <br>
      <div>
        <div class="container pb-3">
            <div class="row d-flex align-items-center py-0">
                <div class="col-lg-6">
                    <img src="assets/client/images/salokabg.jpg" class="img-fluid" >
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                  <h3>PESAN TIKET KAMU!</h3>
                  <br>
                  <p class="fst-italic">
                  Kini petualangan mu bersama keluarga semakin mudah untuk mendapatkan tiket masuk Saloka! Selain pembelian on the spot, Kamu juga dapat melakukan pemesanan tiket secara online. Klik di bawah ini untuk memesan tiket secara online.
                  </p>
                  <br>
                  <a href="pesan.php" class="read_more">Beli Tiket Terusan</a>
               </div>
            </div>
        </div>
        <br><br>
        <div id="" class="banner-wrapper w-100 py-2">
        <div class="banner-vertical-center-work container d-flex justify-content-center align-items-center py-0 p-0">
            <div class="banner-content col-lg-12 col-12 m-lg-auto text-center">
                <h2 class="banner-body light-300 fw-bold">
                Rencanakan kunjungan kamu dan keluarga ke Saloka sesuai pilihan-pilihan di bawah ini.
                </h2>
                <h3 class="banner-body pb-2 light-300 fw-bold">
                INFORMASI TICKETING:
                </h3>
                <p class="banner-body pb-2 light-300">
                Anak dengan tinggi dibawah 90 CM bebas bayar tiket
                </p>
                <br>
            </div>
        </div>
      </div>
        <div class="row">
            <div class="col-md-12">
               <a class="read_more" href="pesan.php">Tickey by Saloka</a>
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
                     <h2>SEJARAH SI LOKA</h2>
                  </div>
               </div>
               <div class="col-md-10 offset-md-1">
                  <div class="about_text text_align_center">
                     <p>SALOKA hadir sebagai salah satu destinasi wisata Pesona Indonesia yang berbentuk taman rekreasi tematik keluarga di Jawa Tengah yang mengusung konsep kearifan lokal. Berlokasi di persimpangan antara kota Semarang, Salatiga, Surakarta dan Daerah Istimewa Yogyakarta.
                        Berdiri di atas lahan seluas 12 Hektare, memiliki 25 wahana yang terbagi dalam 5 zona permainan, yaitu zona Pesisir, zona Balalantar, zona Kamayayi, zona Ararya, dan zona Segara Prada. Tidak hanya wahana permainan, di dalamnya juga terdapat pertunjukan Baru Klintihing. Selain itu, ada pilihan restoran, café, dan foodtruck yang menawarkan berbagai makanan-minuman yang memanjakan lidah untuk bersantai. 
                        >SALOKA dibangun dengan peralatan modern oleh tenaga ahli berpengalaman dan berlisensi internasional. 
                     </p>
                     <!-- <a class="read_more" href="about.html">Read More</a> -->
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
                     <h2>FASILITAS UMUM DI SALOKA</h2>
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
                                    <!-- <p>text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a typetext of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p> -->
                                    <i><img src="assets/client/images/toilet.png" alt="#"/></i>
                                    <h4>TOILET</h4>
                                    <!-- <span>Industry's standard </span> -->
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="test_box text_align_center">
                                    <!-- <p>text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a typetext of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p> -->
                                    <i><img src="assets/client/images/mushola.png" alt="#"/></i>
                                    <h4>MUSHOLA</h4>
                                    <!-- <span>Industry's standard </span> -->
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="test_box text_align_center">
                                    <!-- <p>text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a typetext of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p> -->
                                    <i><img src="assets/client/images/sepeda.png" alt="#"/></i>
                                    <h4>SEPEDA LISTRIK</h4>
                                    <!-- <span>Industry's standard </span> -->
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
                  <center>
                  <h2>Berikut berbagai fasilitas yang tersedia di Saloka:</h2>
                  <br>
                  <p>Musholla
                  <p>ATM Center
                  <p>Toilet
                  <p>Informasi Kehilangan
                  <p>Loker
                  <p>Ruang Laktasi
                  <p>Toilet Difabel
                  <p>Klinik Kesehatan
                  <p>Loket Informasi
                  <p>Area Merokok
                  <p>Halte bis</p></center>
               </div>
            </div>
         </div>
      </div>
      <!-- end customers -->
<?php include('ticketing/layouts/footer.php') ?>