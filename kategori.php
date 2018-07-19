<?php
require_once 'core/init.php';
$kategori = new Kategori();
$id = Input::get('id');

if(isset($_GET['id']) && preg_match("/[\W]+/", $_GET['id'])){
  echo '<script>alert("Patched Injection By Zahidcode")</script>';
  Redirect::to('views/adminpanel/template/404');
}

$jumlah_visit = $user->jumlah_data('statik_pengunjung');
$listkategori = $user->list_table('kategori');
$get_kategori = $kategori->list_table_where('kategori','id',$id);
$postkategori = $kategori->list_table_where('post','kategori',$id);
?>
<?php require_once 'statik_pengunjung.php'; ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Final Project By Zahidin</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/blog/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/blog/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">

				<!-- Intro -->
					<div id="intro">
						<h1>Welcome To My Blog<br /></h1>
						<p>Website ini dibuat oleh seseorang mahasiswa yang mempunyai tangan ajaib <a href="#">@pria_kacamata98nan</a><br />
						bertujuan untuk pembelajaran bagaimana website itu dibuat.</p>
						<ul class="actions">
							<li><a href="#header" class="button icon solo fa-arrow-down scrolly">Continue</a></li>
						</ul>
					</div>

				<!-- Header -->
					<header id="header">
						<a href="index.html" class="logo">Final Project</a>
					</header>

					<?php require_once 'views/blog/template/navbar.php'; ?>

				<!-- Main -->
					<div id="main">

						<!-- Featured Post -->
						  <article class="post featured">
						    <header class="major">
									<?php foreach($get_kategori as $g): ?>
						      <span class="date"><?=$g['nama_kategori']?></span>
						      <h2><a href="#">Post kategori :<br />
						      <?=$g['nama_kategori']?></a></h2>
								<?php endforeach; ?>
						    </header>
						    <!-- <a href="#" class="image main"><img src="images/pic01.jpg" alt="" /></a> -->
						    <!-- <ul class="actions">
						      <li><a href="#" class="button big">Full Story</a></li>
						    </ul> -->
						  </article>

							<!-- Posts -->
							  <section class="posts">
							    <?php foreach($postkategori as $p):?>
							    <article>
							      <header>
							        <span class="date"><?=$p['penulis']?> / <?=$p['tgl_post']?></span>
							        <h2><a href="readpost.php?id=<?=$p['id']?>"><?=$p['judul']?></a></h2>
                      <small><?=$p['tag']?></small>
							      </header>
							      <p><?=substr( $p['isi_konten'],0,255 )?></p>
							      <ul class="actions">
							        <li><a href="readpost.php?id=<?=$p['id']?>" class="button">Read More</a></li>
							      </ul>
							    </article>
							  <?php endforeach;?>
							  </section>

					</div>

					<!-- Footer -->
					  <footer id="footer">
							<section align="center">
								<h2>Kategori</h2>
								<?php foreach($listkategori as $l): ?>
								<section class="alt">
									<h3><a href="kategori.php?id=<?=$l['id']?>"><?=$l['nama_kategori']?></a></h3>
								</section>
							<?php endforeach; ?>

							</section>
							<section align="center">
								<h2>Jumlah Visitor</h2>
								<h2><?=$jumlah_visit?></h2>

							</section>
					  </footer>

					<!-- Copyright -->
					<div id="copyright">
					    <ul><li>&copy; Final Project</li><li>Design: <a href="#">Muhammad Zahidin Nur</a></li></ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/blog/js/jquery.min.js"></script>
			<script src="assets/blog/js/jquery.scrollex.min.js"></script>
			<script src="assets/blog/js/jquery.scrolly.min.js"></script>
			<script src="assets/blog/js/skel.min.js"></script>
			<script src="assets/blog/js/util.js"></script>
			<script src="assets/blog/js/main.js"></script>

	</body>
</html>
