<?php
require_once 'core/init.php';
$gallery = new Gallery();
$upload = new Uploader();
$list = $gallery->list_table('gallery');

if( !$user->is_login('role',1) ){
  Session::flash('tidak_login', '<script>alert("Anda Harus Login")</script>');
  Redirect::to('loginAdmin');
}

if(isset($_GET['id']) && preg_match("/[\W]+/", $_GET['id'])){
  echo '<script>alert("Patched Injection By Zahidcode")</script>';
}

// delete action
if( isset($_GET['id']) )
{
  $detail = $gallery->detail_gallery('gallery','id',$_GET['id']);
  $delete_image = $upload->delete_image($detail['nama_file']);
  $delete = $gallery->delete_gallery(Input::get('id'));
  Redirect::to('admin-listgallery');
}
// # end delete action

if(Session::exists('galleryedit_berhasil')){
	echo Session::flash('galleryedit_berhasil');
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
                <h4 class="page-title">List Gallery</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="admin-dashboard.php">Dashboard</a></li>
                    <li class="active">List Gallery</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tablegallery">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Gambar</th>
                                    <th>Keteragan</th>
                                    <th>Tanggal Upload</th>
                                    <th>Pengaturan</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              <?php foreach($list as $l):?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><img width="90px" height="90px" src="uploads/<?=$l['nama_file']?>"></td>
                                    <td><?=$l['alt']?></td>
                                    <td><?=$l['tanggal_upload']?></td>
                                    <td>
                                      <div class="btn-group">
                                        <a href="admin-editgallery.php?id=<?=$l['id']?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="admin-listgallery.php?id=<?=$l['id']?>" class="btn btn-sm btn-danger delete"><i class="fa fa-trash-o"></i> Hapus</a>
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
    $('#tablegallery').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  });
</script>
