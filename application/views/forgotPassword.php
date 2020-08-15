<html>
	<body>
		<?php
			echo validation_errors();
			echo form_open(base_url().'forgotPassword/sendMail');
			echo form_label('Email:','email');
			echo "<br>";
			echo form_input('email');
			echo "<br>";
			echo form_label('New password:','password');
			echo "<br>";
			echo form_input('password');
			echo "<br>";
			echo form_submit('Submit','Submit');
			echo form_close();
		?>
	</body>
</html>
