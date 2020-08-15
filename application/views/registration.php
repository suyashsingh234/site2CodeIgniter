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
					<pre>
					<?php
					echo form_open(base_url().'registration/login');
					echo form_label('Username:','username');
					echo "<br>";
					echo form_input('username');
					echo "<br>";
					echo form_label('Password:','password');
					echo "<br>";
					echo form_password('password');
					echo "<br>";
					echo form_submit('submit','submit');
					echo form_close();
					$forgotPassUrl=base_url().'forgotPassword';
					echo "<a href={$forgotPassUrl}>Forgot password?</a>";
					?>
					</pre>
				</div>
				<div id="signupForm">
					<pre>
					<?php
					echo form_open(base_url().'registration/signup');
					echo form_label('Email:','email');
					echo "<br>";
					echo form_input('email');
					echo "<br>";
					echo form_label('Username:','username');
					echo "<br>";
					echo form_input('username');
					echo "<br>";
					echo form_label('Password:','password');
					echo "<br>";
					echo form_password('password');
					echo "<br>";
					echo form_label('Confirm password:','confirmPassword');
					echo "<br>";
					echo form_password('confirmPassword');
					echo "<br>";
					echo form_submit('submit','submit');
					echo form_close();
					?>
				</pre>
			</div>
		</div>

	</div>

		<script type="text/javascript" src="<?= base_url() ?>js/registration.js"></script>
	</body>
</html>
