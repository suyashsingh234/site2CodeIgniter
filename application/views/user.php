<html>
	<head>
	</head>
	<body>
		<?php
			if(isset($status)){
				echo "check mail and activate account";
				unset($status);
			}
			else if(isset($_SESSION['username'])){
				if($_SESSION['username']=='admin')
					header("Location:".base_url()."userPage/admin");
				else{
					header("Location:".base_url()."userPage/user");
				}
			}
			else{
				header("Location:".base_url());
			}

		?>
	</body>
</html>
