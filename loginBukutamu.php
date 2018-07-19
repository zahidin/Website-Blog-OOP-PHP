<?php
require_once 'core/init.php';

if($user->is_login('role',0)){
	Redirect::to('bukutamu');
}

if(Session::exists('msg_berhasil')){
	echo Session::flash('msg_berhasil');
}

if(Session::exists('tidak_login')){
	echo Session::flash('tidak_login');
}


Session::set('token',Input::get('token'));


$errors = array();

if(isset($_POST['submit'])){
	if( Token::check(Input::get('token') )){

		$validation = new Validation();

		$validation = $validation->check(array(
			'username' => array(
										'required' => true,
										'min'      => 3,
										'max'      => 100
										),
			'password' => array(
										'required' =>true,
										'min'      => 3,
										'max'      =>100,
										),
		));
		// jika validasi berhasil
		if( $validation->passed() )
		{
			if( $user->cek_nama(Input::get('username')) )
			{
				if( $user->login_user( Input::get('username'),Input::get('password') ) ){
					Session::set('username',Input::get('username'));
					Session::set('role',0);
					Redirect::to('bukutamu');
				}else{
					$errors[] = "Username atau password anda salah";
				}
			}else{
				$errors[] = "Username anda belum terdaftar silahkan Register terlebih dahulu";
			}
		}else{
			$errors = $validation->errors();
		}
	}
}

 ?>
<html lang="en">
<head>
	<title>Login Buku Tamu</title>
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

				<form class="login100-form validate-form" action="loginBukutamu.php" method="post">

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
						Login Tamu
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid username is required: test123">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<input type="hidden" name="token" value="<?php echo Token::generate() ?>">

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="registerBukutamu.php">
							Create your Account
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
