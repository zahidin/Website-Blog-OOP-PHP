<?php
require_once 'core/init.php';
$post =  new Post();
$postan = $post->list_table('post');
?>
<!-- Posts -->
  <section class="posts">
    <?php foreach($postan as $p):?>
    <article>
      <header>
        <span class="date"><?=$p['penulis']?> / <?=$p['tgl_post']?></span>
        <h2><a href="#"><?=$p['judul']?></a></h2>
        <small><?=$p['tag']?></small>
      </header>
      <p><?=substr( $p['isi_konten'],0,255 )?></p>
      <ul class="actions">
        <li><a href="readpost.php?id=<?=$p['id']?>" class="button">Read More</a></li>
      </ul>
    </article>
  <?php endforeach;?>
  </section>

<!-- Footer -->
  <!-- <footer>
    <div class="pagination"> -->
      <!--<a href="#" class="previous">Prev</a>-->
      <!-- <a href="#" class="page active">1</a>
      <a href="#" class="page">2</a>
      <a href="#" class="page">3</a>
      <span class="extra">&hellip;</span>
      <a href="#" class="page">8</a>
      <a href="#" class="page">9</a>
      <a href="#" class="page">10</a>
      <a href="#" class="next">Next</a>
    </div>
  </footer> -->
