<html>
	<head>
		<title>Registration</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/registration.css">
	</head>
	<body>
		<?php
			if(isset($_SESSION['username'])){
				header("Location:".site_url()."userPage");
			}
			else if(isset($error)){
				echo "<script>
				alert('{$error}');
				</script>";
				unset($error);
			}
		?>

		<div id="container">

			<div id="topRow">
				<div id="loginBtn">
					Login
				</div>
				<div id="signupBtn">
					Sign up
				</div>
			</div>

			<div id="bottomRow">
				<?php echo validation_errors(); ?>
				<div id="loginForm">
					<?php
					echo form_open(base_url().'registration/login');
					echo form_input(array('name'=>'username', 'placeholder'=>'username'));
					echo "<br>";
					echo form_password(array('name'=>'password','placeholder'=>'password'));
					echo "<br>";
					echo form_submit('submit','submit');
					echo form_close();
					$forgotPassUrl=base_url().'forgotPassword';
					echo "<a href={$forgotPassUrl}>Forgot password?</a>";
					?>
				</div>
				<div id="signupForm">
					<?php
					echo form_open(base_url().'registration/signup');
					echo form_input(array('name'=>'email','placeholder'=>'email'));
					echo "<br>";
					echo form_input(array('name'=>'username','placeholder'=>'username'));
					echo "<br>";
					echo form_password(array('name'=>'password','placeholder'=>'password'));
					echo "<br>";
					echo form_password(array('name'=>'confirmPassword','placeholder'=>'confirm password'));
					echo "<br>";
					echo form_submit('submit','submit');
					echo form_close();
					?>
			</div>
		</div>

	</div>

		<script type="text/javascript" src="<?= base_url() ?>js/registration.js"></script>
	</body>
</html>
