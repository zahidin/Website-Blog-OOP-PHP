  <nav id="nav">
    <ul class="links">
      <li><a href="index.php">Home</a></li>
      <li><a href="profil.php">Profil</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="loginBukutamu.php">Buku Tamu</a></li>
    </ul>
    <ul class="icons">
      <li><a href="https://twitter.com/mzahidinn" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
      <li><a href="https://www.facebook.com/muhammad.z.noer.3" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
      <li><a href="https://www.instagram.com/pria_kacamata98nan/ " class="icon fa-instagram"><span class="label">Instagram</span></a></li>
      <li><a href="https://github.com/zahidin" class="icon fa-github"><span class="label">GitHub</span></a></li>
      <?php if(isset($_SESSION['role'])){?>
      <?php if($_SESSION['role'] == 0){ ?>
      <li><a href="logout.php" class="icon">Logout</a></li>
      <?php }} ?>
    </ul>
  </nav>
