<!-- header -->
      <div class="header">
         <div class="top_header">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="select_main">
                        <div class="sign">
                           <div class="niceCountryInputSelector se_flag" style="width: 200px;" data-selectedcountry="US" data-showspecial="false" data-showflags="true" data-i18nall="All selected"
                              data-i18nnofilter="No selection" data-i18nfilter="Filter" data-onchangecallback="onChangeCallback" />
                           </div>
                           <?php if(isset($_SESSION["login"])){ ?>
                              <span> <a href="<?= $base_url.'/controllers/Authentication/logout.php' ?>">Keluar</a> </span>
                           <?php }else{ ?>
                              <span> <a href="register.php">Daftar</a> </span>
                              <span class="ml-1"> or <a href="login.php">Masuk</a> </span>   
                           <?php } ?>
                        </div>
                        <ul class="top_infomation">
                           <li><img src="assets/client/images/ti_call.png" alt="#"/>Call : +6212 9283 0184</li>
                           <li><img src="assets/client/images/ti_mail.png" alt="#"/><a href="Javascript:void(0)"> durianruntuh@kab_upin.com</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="header_midil">
            <div class="container">
               <div class="row d_flex">
                  <div class=" col-md-2 col-sm-3 logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="assets/client/images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-9 col-md-8">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mx-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="index.php">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="permainan.php">Permainan</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.php">Kontak Kami</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
                  <div class="col-md-2  d_none">
                     <ul class="email text_align_right">
                        <li><a href="Javascript:void(0)"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                        <li><a href="Javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i>   </a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>