<?php
require_once 'core/init.php';
$list = $user->list_table('bukutamu');

if( !$user->is_login('role',0) ){
  Session::flash('tidak_login', '<script>alert("Anda Harus Login")</script>');
  Redirect::to('loginBukutamu');
}

if(!$user->is_login('role',0)){
  Redirect::to('loginBukutamu');
}

if(Session::exists('bukutamu_berhasil')){
	echo Session::flash('bukutamu_berhasil');
}

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
    'kota' => array(
                'required' => true,
              ),
    'jenis_kelamin' => array(
                'required' => true,
              ),
    'pesan' => array(
                'required' => true,
              ),
  ));

  if( $validation->passed() ){
    $user->insert_bukutamu(array(
      'id' => '',
      'nama' => Input::get('nama'),
      'email' => Input::get('email'),
      'kota' => Input::get('kota'),
      'jenis_kelamin' => Input::get('jenis_kelamin'),
      'pesan' => Input::get('pesan'),
      'tgl_bukutamu' => date("d-m-Y H:i:s"),
    ));
    Session::flash('bukutamu_berhasil','<script>alert("Selamat ! Anda Berhasil Menambah Pesan")</script>');
    Redirect::to('bukutamu');
  }else{
    $errors = $validation->errors();
  }
}
?>
<?php require_once 'views/blog/template/header.php'; ?>
<?php require_once 'views/blog/template/subheader.php'; ?>
<?php require_once 'views/blog/template/navbar.php'; ?>
<div id="main">

<h2>Buku Tamu</h2>

<form method="post" class="alt">

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

  <div class="row uniform">
    <div class="6u 12u$(xsmall)">
      <label for="demo-name">Nama</label>
      <input type="text" id="demo-name" name="nama" placeholder="Nama" />
    </div>
    <div class="6u$ 12u$(xsmall)">
      <label for="demo-email">Email</label>
      <input type="email" id="demo-email" name="email" placeholder="Email" />
    </div>
    <!-- Break -->
    <div class="12u$">
      <div class="select-wrapper">
        <label for="demo-category">Kota</label>
        <select name="kota" id="demo-category">
          <option value="">-- Pilih --</option>
          <option value="Aceh">Aceh</option>
          <option value="Bali">Bali</option>
          <option value="Bengkulu">Bengkulu</option>
          <option value="Jakarta">Jakarta Raya</option>
          <option value="Jambi">Jambi</option>
          <option value="Jawa Tengah">Jawa Tengah</option>
          <option value="Jawa Timur">Jawa Timur</option>
          <option value="Jawa Barat">Jawa Barat</option>
          <option value="Papua">Papua</option>
          <option value="Yogyakarta">Yogyakarta</option>
          <option value="Kalimantan Barat">Kalimantan Barat</option>
          <option value="Kalimantan Selatan">Kalimantan Selatan</option>
          <option value="Kalimantan Tengah">Kalimantan Tengah</option>
          <option value="Kalimantan Timur">Kalimantan Timur</option>
          <option value="Lampung">Lampung</option>
          <option value="NTB">Nusa Tenggara Barat</option>
          <option value="NTT">Nusa Tenggara Timur</option>
          <option value="Riau">Riau</option>
          <option value="Sulawesi Selatan">Sulawesi Selatan</option>
          <option value="Sulawesi Tengah">Sulawesi Tengah</option>
          <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
          <option value="Sumatera Barat">Sumatera Barat</option>
          <option value="Sumatera Utara">Sumatera Utara</option>
          <option value="Maluku">Maluku</option>
          <option value="Maluku Utara">Maluku Utara</option>
          <option value="Sulawesi Utara">Sulawesi Utara</option>
          <option value="Sulawesi Selatan">Sumatera Selatan</option>
          <option value="Banten">Banten</option>
          <option value="Gorontalo">Gorontalo</option>
          <option value="Bangka">Bangka Belitung</option>
        </select>
      </div>
    </div>
    <!-- Break -->
    <label for="radio">Jenis Kelamin</label>
    <div class="4u 12u$(small)"><br>
      <input type="radio" id="demo-priority-low" name="jenis_kelamin" value="P">
      <label for="demo-priority-low">Pria</label>
    </div>
    <div class="4u 12u$(small)"><br>
      <input type="radio" id="demo-priority-normal" name="jenis_kelamin" value="W">
      <label for="demo-priority-normal">Wanita</label>
    </div>
    <!-- Break -->
    <div class="12u$">
      <label for="demo-message">Pesan</label>
      <textarea name="pesan" id="demo-message" placeholder="Tulis pesan anda" rows="6"></textarea>
    </div>
    <!-- Break -->
    <div class="12u$">
      <ul class="actions">
        <li><input type="reset" value="Reset" /></li>
        <li><input type="submit" value="Kirim" name="submit" class="special" /></li>
      </ul>
    </div>
  </div>
</form>
<hr />

<!-- TABLE -->
<div class="table-wrapper">
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Kota</th>
        <th>Jenis Kelamin</th>
        <th>Pesan</th>
        <th>Tanggal</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($list)){ ?>
      <?php $no = 1 ; ?>
      <?php foreach($list as $l):?>
      <tr>
        <td><?=$no?></td>
        <td><?=$l['nama']?></td>
        <td><?=$l['email']?></td>
        <td><?=$l['kota']?></td>
        <?php if($l['jenis_kelamin'] == 'P'){?>
        <td>Pria</td>
        <?php }else{ ?>
        <td>Wanita</td>
        <?php } ?>
        <td><?=$l['pesan']?></td>
        <td><?=$l['tgl_bukutamu']?></td>
      </tr>
    <?php $no++ ?>
    <?php endforeach ?>
    <?php }else{ ?>
      <td colspan="7" align="center">Tidak ada data</td>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>
<?php require_once 'views/blog/template/footer.php'; ?>
