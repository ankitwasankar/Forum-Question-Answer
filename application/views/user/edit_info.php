<div class="main_block">
	<br>
	<h2>Edit profile information:</h2>
	<br>
	<div class="err_msg" ><a><?php echo "$message"; ?> <?php echo validation_errors(); ?></a></div>
	<form action="<?php echo base_url() ?>index.php/user/edit_info" method="post">
		<table>
			<tr>
				<td>Mobile number:</td>
				<td><input class="text_box" value="<?php echo "$mb_no" ?>" type="text" name="mb_no" ></td>
			</tr>
			<tr>
				<td>Location:</td>
				<td><textarea name="location"><?php echo "$location" ?></textarea></td>
			</tr>
			<tr>
				<td>Your specialty (qualification):</td>
				<td><textarea name="specializaton"><?php echo "$specialization" ?></textarea></td>
			</tr>
			<tr>
			<td><input class="submit_button" type="submit" name="submit" value="Change">
			</tr>
		</table>
	</form>
</div>
</div>