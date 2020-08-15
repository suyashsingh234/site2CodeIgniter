<html>
	<head>
		<link rel="stylesheet" href="<?= base_url(); ?>css/userPage.css">
	</head>
	<body>
		<?= $navbar ?>
		<table>
			<tr>
				<td>Name</td>
				<td>Language</td>
				<td>Description</td>
				<td>Link</td>
				<td><button id="add">+</button></td>
			</tr>
			<?php
			foreach($projects->result() as $row){
				echo "<tr>";
				echo "<td>{$row->name}</td>";
				echo "<td>{$row->language}</td>";
				echo "<td>{$row->description}</td>";
				if($row->link){
					$fileurl=base_url().$row->link;
					echo "<td><a href=$fileurl>link</a></td>";
				}
				echo "</tr>";
			}
			?>
		</table>
		<?php
			echo validation_errors();
			echo form_open(base_url().'userPage/addProject',array('id'=>'addProjectForm'));
			echo form_label('Name:','name');
			echo "<br>";
			echo form_input('name');
			echo "<br>";
			echo form_label('Language:','language');
			echo "<br>";
			echo form_input('language');
			echo "<br>";
			echo form_label('Description:','description');
			echo "<br>";
			echo form_input('description');
			echo "<br>";
			echo form_submit('Submit','Submit');
			echo form_close();
		?>

		<script src="<?=base_url()?>js/userPage.js"></script>
	</body>
</html>
