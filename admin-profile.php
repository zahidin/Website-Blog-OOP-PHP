<?php
require_once 'core/init.php';
$detail = $user->detail_user('users','username',Session::get('username'));

if( !$user->is_login('role',1) ){
  Session::flash('tidak_login', '<script>alert("Anda Harus Login")</script>');
  Redirect::to('loginAdmin');
}

if(Session::exists('ganti_password')){
	echo Session::flash('ganti_password');
}

$errors = array();
if( isset($_POST['submit']) ){
  $validation = new Validation();

  $validation = $validation->check(array(
    'username' => array(
                  'required' => true,
                  'min'      => 3,
                  'max'      => 100
                  ),
    'email' => array(
                  'required' => true,
                  'min'      => 3,
                  'max'      => 100
                  ),
    'password' => array(
                  'required' =>true,
                  'min'      => 3,
                  'max'      =>100,
                  ),
    'confirm_password' => array(
                          'required' => true,
                          'match'    => 'password',
                )
  ));

  if( $validation->passed() ){
    $user->ganti_password(array(
      'username' => Input::get('username'),
      'email' => Input::get('email'),
      'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT),
      'role' => 1
    ));
    Session::flash('ganti_password','<script>alert("Anda Berhasil Ganti Password")</script>');
    Redirect::to('admin-profile');
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
                <h4 class="page-title">Profile</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="admin-dashboard.php">Dashboard</a></li>
                    <li class="active">Profile</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <!-- .row -->
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="user" src="assets/adminpanel/plugins/images/large/img1.jpg">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)"><img src="assets/adminpanel/plugins/images/users/varun.jpg" class="thumb-lg img-circle" alt="img"></a>
                                <h4 class="text-white"><?=$detail['username']?></h4>
                                <h5 class="text-white"><?=$detail['email']?></h5> </div>
                        </div>
                    </div>
                    <div class="user-btm-box">
                        <div class="col-md-12 col-sm-12 text-center">
                            <p class="text-purple"><i class="ti-facebook"></i></p>
                            <h1>You Are Admin</h1> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <form class="form-horizontal form-material" method="post">

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

                        <div class="form-group">
                            <label class="col-md-12">Username</label>
                            <div class="col-md-12">
                                <input type="text" value="<?=$detail['username']?>" class="form-control form-control-line" name="username" readonly> </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" value="<?=$detail['email']?>" class="form-control form-control-line" name="email" id="example-email" readonly> </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line" name="password">
                                <small>Biarkan kosong jika tidak ingi merubah password</small>
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-12">Confirm Password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line" name="confirm_password">
                                <small>Biarkan kosong jika tidak ingi merubah password</small>
                              </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success" type="submit" name="submit">Ganti Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> <?=date('Y') ?> &copy; Development By Muhammad Zahidin Nur </footer>
</div>
<?php require_once 'views/adminpanel/template/footer.php'; ?>
<script src="assets/adminpanel/js/custom.min.js"></script>
