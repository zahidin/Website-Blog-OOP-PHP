<?php
require_once 'core/init.php';
$gallery = new Gallery();
$detail = $gallery->list_table('gallery');
?>
<?php require_once 'statik_pengunjung.php'; ?>
<?php require_once 'views/blog/template/header.php'; ?>
<?php require_once 'views/blog/template/subheader.php'; ?>
<?php require_once 'views/blog/template/navbar.php'; ?>

<div id="main">
  <h2>Gallery</h2>
  <div class="box alt">
    <div class="row 50% uniform">
      <?php foreach($detail as $d): ?>
      <div class="4u"><span class="image fit"><img src="uploads/<?=$d['nama_file']?>" alt="<?=$d['alt']?>" /></span></div>
    <?php endforeach; ?>
    </div>
  </div>
</div>

<?php require_once 'views/blog/template/footer.php'; ?>
