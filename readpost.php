<?php
require_once 'core/init.php';
$post = new Post();
$komentar = new Komentar();

if(isset($_GET['id']) && preg_match("/[\W]+/", $_GET['id'])){
  echo '<script>alert("Patched Injection By Zahidcode")</script>';
  Redirect::to('views/404');
}

if(Session::exists('komentar_berhasil')){
	echo Session::flash('komentar_berhasil');
}


$id = Input::get('id');
$detail = $post->detail_post('post','id',$id);
$list_komen = $komentar->list_table_desc('komentar','id_post',$id);


$errors = array();
if( isset($_POST['submit']) ){

  $validation = new Validation();

  $validation = $validation->check(array(
    'nama' => array(
                'required' => true,
              ),
    'email' => array(
                'required' => true,
              ),
    'komentar' => array(
                'required' => true,
              )
  ));

if( $validation->passed() ){
    $komentar->insert_komentar(array(
      'id' => '',
      'nama' => Input::get('nama'),
      'email' => Input::get('email'),
      'komentar' => Input::get('komentar'),
      'tgl_komentar' => date("d-m-Y"),
      'id_post' => Input::get('id_post'),
    ));
    Session::flash('komentar_berhasil', '<script>alert("Komentar Berhasil");window.location.reload();</script>');
  }else{
    $errors = $validation->errors();
  }
}



?>
<?php require_once 'views/blog/template/header.php'; ?>
<?php require_once 'views/blog/template/subheader.php'; ?>
<?php require_once 'views/blog/template/navbar.php'; ?>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<span class="date"><?=$detail['tgl_post']." / ".$detail['penulis']?></span>
									<h1><?=$detail['judul']?></h1>
                  <small><?=$detail['tag']?></small>
								</header>
								<?=$detail['isi_konten']?>
							</section>

					</div>

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

				<!-- Footer -->
					<footer id="footer">
						<section>
              <h2>Tambah Komentar</h2>
							<form method="post">
								<div class="field">
									<label for="nama">Nama</label>
									<input type="text" name="nama" id="name" />
									<input type="hidden" name="id_post" value="<?=$detail['id']?>" />
								</div>
								<div class="field">
									<label for="email">Email</label>
									<input type="text" name="email" id="email" />
								</div>
								<div class="field">
									<label for="message">Komentar</label>
									<textarea name="komentar" id="message" rows="3"></textarea>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Kirim Komentar" name="submit" /></li>
								</ul>
							</form>
						</section>
						<section class="split contact">
              <?php foreach($list_komen as $l): ?>
							<section class="alt">
								<h3><?=$l['nama']?><br><?=$l['tgl_komentar']?></h3>
								<p><?=$l['komentar']?></p>
							</section>
            <?php endforeach; ?>
						</section>
					</footer>

<?php require_once 'views/template/footer.php'; ?>
