<?php
require_once 'core/init.php';


if($user->is_login('role',0)){
  Redirect::to('loginBukutamu');
}

$errors = array();
if( isset($_POST['submit']) ){

	$validation = new Validation();

	$validation = $validation->check(array(
    'username' => array(
                'required' => true,
                'min'      => 3,
                'max'      => 100,
              ),
    'email' => array(
                'required' => true,
                'min'      => 3,
                'max'      => 100,
              ),
    'password' => array(
                  'required' => true,
                  'min'      => 3,
                ),
    'password_verify' => array(
                          'required' => true,
                          'match'    => 'password',
                )
	));

	if($user->cek_nama(Input::get('username'))){
			$errors[] = "Username anda sudah terdaftar Mohon untuk diganti";
	}else{
		if( $validation->passed() ){
			$user->register_user(array(
				'username' => Input::get('username'),
				'email' => Input::get('email'),
				'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT),
			));
			Session::flash('msg_berhasil','<script>alert("Selamat ! Anda Berhasil Mendaftar")</script>');
			Redirect::to('loginBukutamu');
		}else{
			$errors = $validation->errors();
		}
	}

}
 ?>

<html lang="en">
<head>
	<title>Register User Tamu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets/loginbukutamu/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/loginbukutamu/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/loginbukutamu/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/loginbukutamu/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/loginbukutamu/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/loginbukutamu/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/loginbukutamu/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/loginbukutamu/css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/loginbukutamu/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="registerBukutamu.php" method="post">
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

					<span class="login100-form-title">
						Register Tamu
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid username is required: tamu123">
						<input class="input100" type="text" name="username" placeholder="Username" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password_verify is required">
						<input class="input100" type="password" name="password_verify" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" type="submit">
							Register
						</button>
					</div>
					<div class="text-center p-t-136">
						<a class="txt2" href="bukutamu.php">
							Login your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="assets/loginbukutamu/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/loginbukutamu/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/loginbukutamu/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/loginbukutamu/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/loginbukutamu/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets/loginbukutamu/js/main.js"></script>
<!--===============================================================================================-->
	<script src="assets/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
