<?php
require_once 'core/init.php';
$post = new Post();

if(isset($_GET['id']) && preg_match("/[\W]+/", $_GET['id'])){
  Redirect::to('views/404');
}

$id=Input::get('id');
$detail = $post->detail_post('post','id',$id);
$list_kategori = $post->list_table('kategori');


if( !$user->is_login('role',1) ){
  Session::flash('tidak_login', '<script>alert("Anda Harus Login")</script>');
  Redirect::to('loginAdmin');
}

$errors = array();
if( isset($_POST['submit']) ){
  $validation =  new Validation();

  $validation = $validation->check(array(
    'judul' => array(
                'required' => true,
              ),
    'isi_konten' => array(
                'required' => true,
              ),
    'penulis' => array(
                'required' => true,
              ),
    'tgl_post' => array(
                'required' => true,
              ),
    'kategori' => array(
                'required' => true,
              ),
    'tag' => array(
                'required' => true,
              ),
  ));

  if( $validation->passed() ){
    $post->edit_post(array(
      'id' => Input::get('id'),
      'judul' => Input::get('judul'),
      'isi_konten' => Input::get('isi_konten'),
      'penulis' => Input::get('penulis'),
      'tgl_post' => Input::get('tgl_post'),
      'kategori' => Input::get('kategori'),
      'tag' => Input::get('tag'),
    ));
    Session::flash('postedit_berhasil','<script>alert("Selamat ! Anda Berhasil Mengedit Post")</script>');
    Redirect::to('admin-listpost');
  }else{
    $errors = $validation->errors();
  }
}

?>

<?php require_once 'views/adminpanel/template/header.php'; ?>
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Edit Post</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="admin-dashboard.php">Dashboard</a></li>
                    <li class="active">Edit Post</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                  <form class="" action="admin-editpost.php" method="post" enctype="multipart/form-data">

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
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="judul">Judul</label>
                          <input type="text" class="form-control" name="judul" value="<?=$detail['judul']?>" >
                          <input type="hidden" class="form-control" name="id" value="<?=$detail['id']?>">
                        </div>
                        <div class="form-group">
                          <label for="isi_konten">Isi Konten</label>
                          <textarea name="isi_konten" rows="12" class="form-control textboxio"><?=$detail['isi_konten']?></textarea>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="penulis">Penulis</label>
                            <input type="text" name="penulis" class="form-control" value="<?=$detail['penulis']?>" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="tgl">Tanggal Terbit</label>
                            <input type="text" name="tgl_post" class="form-control calendar" value="<?=$detail['tgl_post']?>" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" name="kategori" >
                              <?php foreach($list_kategori as $l):?>
                              <?php if($detail['kategori'] == $l['id']){ ?>
                                <option value="<?=$detail['kategori']?>" selected=""> <?=$l['nama_kategori']?></option>
                              <?php }else{?>
                                <option value="<?=$l['id']?>"><?=$l['nama_kategori']?></option>
                              <?php } ?>
                            <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="tag">Tag </label>
                            <input type="text" name="tag" class="form-control" value="<?=$detail['tag']?>" >
                          </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <button type="button" name="back" class="col-md-12 btn btn-info" onclick="history.back(-1)"><i class="fa fa-long-arrow-left"></i> Kembali</button>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <button type="submit" name="submit" class="col-md-12 btn btn-warning"><i class="fa fa-paper-plane"></i> Edit</button>
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
<script>
  jQuery(document).ready(function($){
    textboxio.replace('.textboxio');
    $(".calendar").flatpickr({
      dateFormat: "d-m-Y",
    });
  });
</script>
