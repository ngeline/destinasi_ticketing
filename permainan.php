<?php 
   include('ticketing/layouts/header.php');
   
   $wisata = mysqli_query($connection, "SELECT * FROM permainan");
?>
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
                              <a href="detail.php?id=<?= $data["id"] ?>" class="read_more" href="Javascript:void(0)">Pesan</a>
                           <?php }else{ ?>
                              <a href="login.php" class="read_more" href="Javascript:void(0)">Pesan</a>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
               <?php }  ?>
            </div>
         </div>
      </div>
      <!-- end packages -->
      <!-- end customers -->
<?php include('ticketing/layouts/footer.php') ?>