<div class="main_block">
	<br>
	<h2>Login Page:</h2>
	<br><br>
	<?php echo form_open('Guest/login');?>
	<table>
		<tr>	
			<td>Username 
			<td><INPUT TYPE="email" placeholder="email-id" NAME="username" value="<?php echo set_value('username'); ?>" class="text_box">
		</tr>
		<tr>	
			<td>Password
			<td><INPUT TYPE="password" name="password" value="" class="text_box">
		</tr>
		<tr>
			<td><INPUT TYPE="submit" id="log_button" NAME="submit" VALUE="Log In" class="submit_button">
		</tr>
		</table>
	</form>
			<div class="err_msg"><?php echo "<p>$message</p>"; ?> <?php echo validation_errors(); ?></div><br>
			<a class="main_log"href="<?php echo base_url(); ?>index.php/Forum" >forgot password click here!</a>
		
	
</div>
</div>