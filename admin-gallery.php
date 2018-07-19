<?php
require_once 'core/init.php';
$gallery = new Gallery();
$uploader = new Uploader();

if(!$user->is_login('role',1)){
  Session::flash('tidak_login', '<script>alert("Anda Harus Login")</script>');
  Redirect::to('loginAdmin');
}

if(Session::exists('upload_berhasil')){
	echo Session::flash('upload_berhasil');
}

$errors = array();
if( isset($_POST['submit']) ){

  $uploader = $uploader->do_upload();

  if( $uploader->passed() ){
    $namefile = $uploader->get_namefile();
    $gallery->insert_gallery(array(
      'id' => '',
      'nama_file' => $namefile,
      'alt' => Input::get('alt'),
      'tanggal_upload' => date("d-m-Y H:i:s"),
    ));
    Session::flash('upload_berhasil', '<script>alert("Image Berhasil Di Upload")</script>');
    Redirect::to('admin-gallery');
  }else{
    $errors = $uploader->errors();
  }
}

?>
<?php require_once 'views/adminpanel/template/header.php';?>
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Gallery</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="admin-dashboard.php">Dashboard</a></li>
                    <li class="active">Gallery</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                  <form class="" action="admin-gallery.php" method="post" enctype="multipart/form-data">

                    <!-- alert pesan error -->
                    <?php if(!empty($errors)){ ?>
                        <div class="error">
                          <?php foreach ($errors as $error) { ?>
                            <!-- sweetalert -->
                            <body onload='swal({title: "Login Gagal Ada Kesalahan !",
                                                    text: "<b><?php echo $error;?></b>",
                                                    timer: 3000,
                                                    type: "error",
                                                    html: true,
                                                    showConfirmButton: false });'>
                        <?php  } ?>
                        </div>
                    <?php } ?>
                    <!-- end alert pesan error -->

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="judul">Keterangan Gambar</label>
                          <textarea name="alt" class="form-control" rows="8" cols="80" autofocus required></textarea>
                        </div>
                        <div class="form-group">
                          <label for="image">Upload Gambar</label>
                          <input type="file" class="form-control" name="file_gallery" >
                        </div>
                        <div class="col-md-9">
                          <div class="form-group">
                            <button type="button" name="back" class="col-md-2 btn btn-info" onclick="history.back(-1)"><i class="fa fa-long-arrow-left"></i> Kembali</button>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <button type="submit" name="submit" class="col-md-7 btn btn-success"><i class="fa fa-paper-plane"></i> Kirim</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> <?=date('Y') ?> &copy; Development By Muhammad Zahidin Nur </footer>
</div>

<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->

<?php require_once 'views/adminpanel/template/footer.php'; ?>
