<div class="main_block">
		<br>
		<h2>Registration form:</h2>
		<br><br>
		<?php echo form_open('Guest/Register');?>
		<?php echo "<p>$message</p>"; ?> <?php echo validation_errors(); ?>
			<table>
				<tr>
					<td>Username * 
					<td><input type="email" size="60" name="username" id="username" value="<?php echo set_value('username'); ?>" class="text_box">
					<td><a>Your email-id will be your username (login name)</a>
			    </tr>		
				<tr>
					<td>Password *
					<td><input type="password" size="16" name="password" id="password" class="text_box"\>
					<td><a>Enter alpha-numeric password(8-16 characters)</a>
				</tr>	
				<tr>
					<td>Confirm password * 
					<td><input type="password" name="password_c" id="password_c" class="text_box">
					<td><a>Confirm password</a>
				</tr>
				<tr>
					<td>Nickname*
					<td><input type="text" name="nickname" id="nickname" value="<?php echo set_value('nickname'); ?>" class="text_box">
					<td><a>Nickame will be visible to other users.</a>
				</tr>
				<tr>
					<td>First name * 
					<td><input type="text" name="name" id="name" value="<?php echo set_value('name'); ?> "class="text_box">
					<td><a>Enter your first name.</a>
				</tr>
				<tr>
					<td>Last name *
					<td><input type="text" name="surname" id="surname" value="<?php echo set_value('surname'); ?>" class="text_box">
					<td><a>Enter your last name i.e surname.</a>
				</tr>
				<tr>	
					<td>Mobile Number 
					<td><input type="text" name="mb_no" id="mb_no" value="<?php echo set_value('mb_no'); ?>" class="text_box">
					<td><a class="instr">Enter your 10 digit mobile number</a>
				</tr>
				<tr>
					<td><input type="submit" name="submit" id="submit" class="submit_button" value="Submit">
				</tr>
			</table>
		</form>			
</div>
</div>