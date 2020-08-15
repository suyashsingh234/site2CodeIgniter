<html>
	<head>
		<link rel="stylesheet" href="<?= base_url(); ?>css/adminPage.css">
	</head>
	<body>
		<?= $navbar ?>
		<table>
			<tr>
				<td>
					Users
				</td>
				<td>
					Delete
				</td>
			</tr>
			<?php
				foreach($userList->result() as $row){
					$deleteurl=base_url()."admin/deleteUser/{$row->username}";
					echo "<tr>";
					echo "<td>";
					echo $row->username;
					echo "</td>";
					echo "<td>";
					echo "<a href='{$deleteurl}'>delete user</a>";
					echo "</td>";
					echo "</tr>";
				}
			?>
		</table>

		<table>
			<tr>
				<td>Username</td>
				<td>Project</td>
				<td>Language</td>
				<td>Description</td>
				<td>Upload</td>
			</tr>
			<?php
				foreach($projectList->result() as $row){
					echo "<tr>";
						echo "<td>";
							echo $row->username;
						echo "</td>";
						echo "<td>";
							echo $row->name;
						echo "</td>";
						echo "<td>";
							echo $row->language;
						echo "</td>";
						echo "<td>";
							echo $row->description;
						echo "</td>";
						echo "<td>";
							echo form_open_multipart('admin/upload');
							echo form_input(array('name'=>'id','type'=>'hidden','value'=>$row->id));
							echo form_upload('upload');
							echo form_submit('submit','submit');
							echo form_close();
						echo "</td>";
					echo "</tr>";
				}
			?>
		</table>

		<script src="<?=base_url()?>js/adminPage.js"></script>
	</body>
</html>
