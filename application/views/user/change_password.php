<div class="main_block">
	<br>
	<h2>Change you password:</h2>
	<br>
	<div class="err_msg" ><a><?php echo "$message"; ?> <?php echo validation_errors(); ?></a></div>
	<form action="<?php echo base_url() ?>index.php/User/change_password" method="post">
		<table>
			<tr>
				<td>Enter current password:
				<td><input class="text_box" type="password" name="cpass">
			</tr>
			<tr>
				<td>Enter new password:
				<td><input class="text_box" type="password" name="npass1">
			</tr>
			<tr>
				<td>Retype new password:
				<td><input class="text_box" type="password" name="npass2">
			</tr>
			<tr>
			<td><input class="submit_button" type="submit" value="Change">
			</tr>
		</table>
	</form>
</div>
</div>