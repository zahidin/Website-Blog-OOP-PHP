<?php
require_once 'core/init.php';

$kategori = new Kategori();
$list = $kategori->list_table('kategori');

if( !$user->is_login('role',1) ){
  Session::flash('tidak_login', '<script>alert("Anda Harus Login")</script>');
  Redirect::to('loginAdmin');
}

// delete action
if( isset($_GET['id']) )
{
  $delete = $kategori->delete_kategori(Input::get('id'));
  Redirect::to('admin-listkategori');
}
// # end delete action

if(isset($_GET['id']) && preg_match("/[\W]+/", $_GET['id'])){
  echo '<script>alert("Patched Injection By Zahidcode")</script>';
}

if(Session::exists('kategoriedit_berhasil')){
	echo Session::flash('kategoriedit_berhasil');
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
                <h4 class="page-title">List Kategori</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="admin-dashboard.php">Dashboard</a></li>
                    <li class="active">List Kategori</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tablekategori">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori</th>
                                    <th>Pengaturan</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              <?php foreach($list as $l):?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><?=$l['nama_kategori']?></td>
                                    <td>
                                      <div class="btn-group">
                                        <a href="admin-editkategori.php?id=<?=$l['id']?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="admin-listkategori.php?id=<?=$l['id']?>" class="btn btn-sm btn-danger delete"><i class="fa fa-trash-o"></i> Hapus</a>
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
    $('#tablekategori').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  });
</script>
