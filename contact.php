<?php include('ticketing/layouts/header.php') ?>
<div class="contact">
    <div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="titlepage text_align_center">
                <h2>Contact Us</h2>
            </div>
        </div>
        <div class="col-md-8 offset-md-2">
            <form id="request" class="main_form">
                <div class="row">
                <div class="col-md-12 ">
                    <input class="cont_in" placeholder="Full Name" type="type" name=" Name"> 
                </div>
                <div class="col-md-12">
                    <input class="cont_in" placeholder="Your Email" type="type" name="Email"> 
                </div>
                <div class="col-md-12">
                    <input class="cont_in" placeholder="Phone Number" type="type" name="Phone Number">                          
                </div>
                <div class="col-md-12">
                    <textarea class="textarea2" style="color:#676767;" placeholder="Message" type="type" name="Message"> </textarea>
                </div>
                <div class="col-md-12">
                    <button class="send_btnt">Send</button>
                </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
<?php include('ticketing/layouts/footer.php') ?>