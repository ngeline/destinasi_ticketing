<?php 
  session_start();
  include('../../setting/connection.php');
  include('../../controllers/Authentication/login.php');
  
  if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location:".$base_url.'/admin/login.php');
  }

  $wisata = mysqli_query($connection, "SELECT id, nama_wisata FROM wisata");

  include('../layouts/header.php');
  include('../layouts/navbar.php');
  include('../layouts/sidebar.php');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Permainan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php?dashboard">Home</a></li>
              <li class="breadcrumb-item">Permainan</li>
              <li class="breadcrumb-item active">Tambah Permainan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Tambah Permainan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= $base_url.'/controllers/Permainan/TambahPermainan.php' ?>" method="POST" enctype="multipart/form-data" id="form-insert">
                    <?php
                        if(isset($_SESSION["error"])){
                            $error = $_SESSION["error"];
                            echo '<div class="bg-danger text-center my-1 mx-1"><span class="text-uppercase text-white">'.$error.'</span></div>';
                        }
                    ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_wisata">Nama Wisata</label>
                            <select name="wisata_id" id="wisata_id" class="form-control">
                                <option value="" selected disabled>===== Pilih Wisata =====</option>
                                  <?php if(!is_null($wisata)){ 
                                    foreach($wisata as $data){
                                  ?>
                                    <option value="<?= $data["id"] ?>"><?= $data["nama_wisata"] ?></option>
                                  <?php 
                                      }
                                    }
                                  ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_permainan">Nama Permainan</label>
                            <input type="text" name="nama_permainan" class="form-control" id="nama_permainan" placeholder="Nama Permainan">
                        </div>
                        <div class="form-group">
                            <label for="Harga">Harga</label>
                            <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga">
                        </div>
                        <div class="form-group">
                            <label for="nama_file">Foto</label>
                            <input type="file" class="form-control" name="nama_file" id="nama_file" placeholder="Gambar">
                            <img src="" alt="Foto Taman" width="300px" id="preview" class="mt-2">
                        </div>
                    </div>
                    <!-- /.card-body -->
            
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('../Layouts/footer.php') ?>


<script>
$.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0}');

$(function () {
  $('#form-insert').validate({
    rules: {
      wisata_id: {
        required: true,
      },
      harga: {
        required: true,
        min: 1
      },
      nama_permainan: {
        required: true
      },
      nama_file: {
        required: true,
        extension: "jpg,jpeg,png",
        filesize: 5,
      },
    },
    messages: {
      wisata_id: {
        required: "Mohon memilih nama wisata!",
      },
      harga: {
        required: "Mohon isi harga!",
        min: "Mohon harga tidak kurang dari 1"
      },
      nama_permainan: {
        required: "Mohon isi nama permainan!"
      },
      nama_file: {
        required: "Mohon isi foto!",
        extension: "File harus format PNG atau JPG atau JPEG!",
        filesize: "Gambar harus kurang dari 5mb!"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#nama_file").change(function() {
    readURL(this);
});
</script>