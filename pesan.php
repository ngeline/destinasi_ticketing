<?php 
   include('ticketing/layouts/header.php');
   
   $wisata = mysqli_query($connection, "SELECT * FROM permainan LIMIT 4");
?>

<div class="packages" id="#permainan">
    <div class="container">
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
                                        <p>Rp 150.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ml-5 mr-5">
                        <div class="row">
                            <div class="col-md-6">
                                <p>arrival date</p>
                                <h4 id="date-arrival">Senin, 06 Desember 2023</h4>
                            </div>
                            <div class="col-md-3">
                                <p>Rp 120.000</p>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-success">CHECKOUT</button>
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
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('ticketing/layouts/footer.php') ?>
<script>
    $('#calendar').datetimepicker({
        format: 'L',
        inline: true
    });

    $('.btn-number').click(function(e){
        e.preventDefault();
        
        fieldName = $(this).attr('data-field');
        type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if(type == 'minus') {
                    
                    if(currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    } 
                    if(parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if(type == 'plus') {

                    if(currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
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
        
        name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
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