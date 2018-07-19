<?php
require_once 'core/init.php';
$user_bukutamu = $user->jumlah_data('users','role','0');
$jumlah_post = $user->jumlah_data('post');
$jumlah_visit = $user->jumlah_data('statik_pengunjung');

if( !$user->is_login('role',1) ){
  Session::flash('tidak_login', '<script>alert("Anda Harus Login")</script>');
  Redirect::to('loginAdmin');
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
                <h4 class="page-title">Dashboard</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="admin-dashboard.php">Dashboard</a></li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- Different data widgets -->
        <!-- ============================================================== -->
        <!-- .row -->
        <div class="row">
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Visitor</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?=$jumlah_visit?></span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">TOTAL POST</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash2"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?=$jumlah_post?></span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">TOTAL USER BUKUTAMU</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash3"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?=$user_bukutamu?></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/.row -->
        <!--row -->
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> <?=date('Y') ?> &copy; Development By Muhammad Zahidin Nur </footer>
</div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
<?php require_once 'views/adminpanel/template/footer.php'; ?>
<script src="assets/adminpanel/js/dashboard1.js"></script>
