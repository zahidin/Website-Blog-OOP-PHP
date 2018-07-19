<?php
require_once 'core/init.php';

$list = $user->list_table('bukutamu');

if( !$user->is_login('role',1) ){
  Session::flash('tidak_login', '<script>alert("Anda Harus Login")</script>');
  Redirect::to('loginAdmin');
}

// delete action
if( isset($_GET['id']) )
{
  $delete = $user->delete_bukutamu(Input::get('id'));
  Redirect::to('admin-listbukutamu');
}
// # end delete action

if(isset($_GET['id']) && preg_match("/[\W]+/", $_GET['id'])){
  echo '<script>alert("Patched Injection By Zahidcode")</script>';
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
                <h4 class="page-title">List Bukutamu</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="admin-dashboard.php">Dashboard</a></li>
                    <li class="active">List Bukutamu</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tablebukutamu">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Kota</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pesan</th>
                                    <th>Tanggal</th>
                                    <th>Pengaturan</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              <?php foreach($list as $l):?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><?=$l['nama']?></td>
                                    <td><?=$l['email']?></td>
                                    <td><?=$l['kota']?></td>
                                    <?php if( $l['jenis_kelamin'] == 'P'){?>
                                    <td>Pria</td>
                                    <?php }else{ ?>
                                    <td>Wanita</td>
                                    <?php } ?>
                                    <td><?=$l['pesan']?></td>
                                    <td><?=$l['tgl_bukutamu']?></td>
                                    <td>
                                      <div class="btn-group">
                                        <a href="admin-listbukutamu.php?id=<?=$l['id']?>" class="btn btn-sm btn-danger delete"><i class="fa fa-trash-o"></i> Hapus</a>
                                      </div>
                                    </td>
                                </tr>
                              <?php $no++ ?>
                              <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
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
      $('.delete').on('click',function(){
          var getLink = $(this).attr('href');
          swal({
                  title: 'Delete Data',
                  text: 'Yakin Ingin Anda Menghapus ?',
                  html: true,
                  confirmButtonColor: '#f33155',
                  showCancelButton: true,
                  },function(){
                  window.location.href = getLink
              });
          return false;
      });
  });

  $(function () {
    $('#tablebukutamu').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  });
</script>
