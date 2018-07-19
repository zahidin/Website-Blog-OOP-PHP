<?php
require_once 'core/init.php';
$gallery = new Gallery();
$uploader = new Uploader();

if(isset($_GET['id']) && preg_match("/[\W]+/", $_GET['id'])){
  Redirect::to('views/404');
}

if(!$user->is_login('role',1)){
  Session::flash('tidak_login', '<script>alert("Anda Harus Login")</script>');
  Redirect::to('loginAdmin');
}

$id=Input::get('id');
$detail = $gallery->detail_gallery('gallery','id',$id);

$errors = array();
if( isset($_POST['submit']) ){

  $uploader->edit_image($detail['nama_file']);

  if( $uploader->passed() ){

    $namefile = $uploader->get_namefile();
    $gallery->edit_gallery(array(
      'id' => Input::get('id'),
      'nama_file' => $namefile,
      'alt' => Input::get('alt'),
      'tanggal_upload' => date("d-m-Y H:i:s"),
    ));
    Session::flash('galleryedit_berhasil', '<script>alert("Image Berhasil Di Edit")</script>');
    Redirect::to('admin-listgallery');
  }else {
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
                  <form class="" action="admin-editgallery.php" method="post" enctype="multipart/form-data">

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
                          <label for="alt">Keterangan Gambar</label>
                          <textarea name="alt" class="form-control" rows="8" cols="80" autofocus required><?=$detail['alt']?></textarea>
                        </div>

                        <input type="hidden" class="form-control" name="id" value="<?=$detail['id']?>">

                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="gambar">Gambar</label><br>
                              <img src="uploads/<?=$detail['nama_file']?>" width="90px" height="90px" name="gambar" >
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="image">Upload Edit Gambar</label>
                              <input type="file" class="form-control col-md-4" name="file_gallery" >
                            </div>
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
