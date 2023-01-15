<?php 
   include('ticketing/layouts/header.php');
?>

<div class="packages" id="#permainan">
    <div class="container">
        <div class="banner-vertical-center-work container d-flex justify-content-center align-items-center py-0 p-0">
            <div class="banner-content col-lg-12 col-12 m-lg-auto text-center">
                <h2 class="banner-body light-300 fw-bold">
                Rencanakan kunjungan kamu dan keluarga ke Saloka sesuai tanggal dan jumlah orang di bawah ini.
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
        <?php
                if(isset($_SESSION["error"])){
                    $error = $_SESSION["error"];
                    echo '<div class="banner-vertical-center-work container d-flex justify-content-center align-items-center py-0 p-0"><div class="banner-content col-lg-12 col-12 m-lg-auto text-center text-danger">'.$error.'</span></div></div>';
                }
                if(isset($_SESSION["success"])){
                    $success = $_SESSION["success"];
                    echo '<div class="banner-vertical-center-work container d-flex justify-content-center align-items-center py-0 p-0"><div class="banner-content col-lg-12 col-12 m-lg-auto text-center text-success">'.$success.'</span></div></div>';
                }
        ?>
        <div class="row">
            <div class=" col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card bg-gradient-success">
                            <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                                <h3 class="card-title">
                                    <i class="far fa-calendar-alt"></i>
                                    Calendar
                                    </h3>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-0">
                                <!--The calendar -->
                                <div id="calendar" style="width: 100%"></div>
                            </div>
                            <!-- /.card-body -->
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <form action="<?= $base_url.'/controllers/Pesanan/BuatPesanan.php' ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-header bg-white">
                            <h2 class="text-bold text-center">Ticket Types</h2>
                        </div>
                        <div class="card-body">
                            <div class="card card-white justify-content-center mx-5">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3>Regular Weekend Ticket</h3>
                                            <p style="font-size: 12px;">Tiket terusan weekend saloka theme park. Bebas menaiki semua wahana</p>
                                        </div>
                                        <div class="col-md-4 justify-content-center pt-5">
                                            <p class="text-center">Total Pengunjung</p>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                                        <span class="fa fa-minus"></span>
                                                    </button>
                                                </span>
                                                <input type="text" name="quant[2]" class="form-control input-number" value="1" min="1" max="100" >
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                                        <span class="fa fa-plus"></span>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pt-5 mx-auto">
                                            <!-- -- -->
                                            <p>Rp <span id="price-tiket"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ml-5 mr-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>arrival date</p>
                                    <h4 id="date-arrival"></h4>
                                    <input type="text" name="user_id" value="<?= (isset($_SESSION["login"])) ? $_SESSION["login"]["id"] : "" ?>" hidden>
                                    <input type="text" name="tanggal_wisata" id="tanggal_wisata" hidden>
                                </div>
                                <div class="col-md-3">
                                    <!-- -- -->
                                    <p>Rp <span id="total-price"></span></p>
                                    <input type="text" name="total_pembayaran" id="total_pembayaran" hidden>
                                </div>
                                <div class="col-md-3">
                                    <?php if(isset($_SESSION["login"])){ ?>
                                        <button type="submit" class="btn btn-success" name="pesan">CHECKOUT</button>
                                    <?php }else{ ?>
                                        <a href="login.php" class="btn btn-success">CHECKOUT</a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row mt-2 float-right">
                                <?php if(isset($_SESSION["login"])){ ?>
                                    <p>*telah melakukan reservasi? cek status reservasi <a href="pesanan.php">Di sini</a></p>
                               <?php }else{ ?>
                                    <p>*telah melakukan reservasi? cek status reservasi <a href="login.php">Di sini</a></p>
                               <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('ticketing/layouts/footer.php') ?>
<script>
    $('#calendar').datepicker({
        format: 'YY-M-D',
        todayHighlight: true,
    }).on('changeDate', function() {
        let getDate = $(this).datepicker('getDate');
        let splitDate = getDate.toString().split(" ");
        let valueCurrent = $(".input-number").val();
        let year, month, day;

        if (splitDate[0] === "Sun" || splitDate[0] === "Sat") {
            let price = 150000;
            let totalPrice = price * valueCurrent;

            $("#price-tiket").text(price);
            $("#total-price").text(totalPrice);
            $("#total_pembayaran").val(totalPrice);
        } else {
            let price = 120000;
            let totalPrice = price * valueCurrent;

            $("#price-tiket").text(price);
            $("#total-price").text(totalPrice);
            $("#total_pembayaran").val(totalPrice);
        }
        splitDate[1] == 'Jan' ? month = '01' : splitDate[1] == 'Feb' ? month = '02' : splitDate[1] == 'Mar' ? month = '03' : splitDate[1] == 'Apr' ? month = '04' : splitDate[1] == 'May' ? month = '05' : splitDate[1] == 'Jun' ? month = '06' : splitDate[1] == 'Jul' ? month = '07' : splitDate[1] == 'Aug' ? month = '08' : splitDate[1] == 'Sep' ? month = '09' : splitDate[1] == 'Oct' ? month = '10' : splitDate[1] == 'Nov' ? month = '11' : month = '12';

        let tanggal_wisata = splitDate[3]+'-'+month+'-'+splitDate[2];
        $("#date-arrival").text(splitDate[0]+", "+splitDate[2]+" "+splitDate[1]+" "+splitDate[3]);
        $("#tanggal_wisata").val(tanggal_wisata);
    });

    $('.btn-number').click(function(e){
        e.preventDefault();
        
        fieldName = $(this).attr('data-field');
        type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        
        // --
        let getPrice = $("#price-tiket").text();        
        let getTotalPrice = $("#total-price").text();

        if (!isNaN(currentVal)) {
            if(type == 'minus') {
                
                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                    
                    // --
                    let totalPrice = parseInt(getTotalPrice) - parseInt(getPrice);
                    $("#total-price").text(totalPrice);
                    $("#total_pembayaran").val(totalPrice);
                } 
                if(parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if(type == 'plus') {

                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();

                    // --
                    let totalPrice = parseInt(getPrice) + parseInt(getTotalPrice);
                    $("#total-price").text(totalPrice);
                    $("#total_pembayaran").val(totalPrice);
                }
                if(parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }
                
            }
            
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function(){
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {
    
        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        // --
        let getPrice = $("#price-tiket").text();        
        // let getTotalPrice = $("#total-price").text();
        
        name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')

            // --
            let totalPrice = parseInt(getPrice) * valueCurrent;
            $("#total-price").text(totalPrice);
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')

            // --
            let totalPrice = parseInt(getPrice) * valueCurrent;
            $("#total-price").text(totalPrice);
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        
        
    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>


<?php
    unset($_SESSION["error"]);
?>