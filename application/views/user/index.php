<div class="main_block">
	<br>
	<h2>Welcome <?php echo $this->session->userdata('nickname'); ?></h2>
	<br>
	<div class="profile_block">
		<img  src="<?php if($pic_bool=="true"){echo base_url()."assets/profile_pics/".$this->session->userdata('userid');}
						  else echo base_url()."assets/images/default.jpg";?>">
		<table>
				<tr>
					<td>Username: <?php echo $this->session->userdata('username'); ?>
		            <td>Status : logged in.
				</tr>
			</table>
		<div class="prof_det">
			<br>
			<div class="prof_left">
			<a href="<?php echo base_url(); ?>index.php/user/change_password">Click here to change your password.</a><br>
			<a href="<?php echo base_url(); ?>index.php/user/edit_info">Edit your profile information.</a><br>
			</div>
			<div class="prof_right">
				<p>Upload profile pic:</p>
			<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/user/upload"> <input name="uploaded" type="file"><br>
																						<input type="submit" class="submit_button" value="upload"></form>
			</div>
		</div>
		<div class="hline">
		</div>
		<div class="activities">
			<h3>Activities:</h3><br>
			<a href="<?php echo base_url(); ?>index.php/user/my_questions">My asked questions.</a>
		</div>
		<div class="end">
			<h3>Account Settings:</h3><br>
			<a href="<?php echo base_url(); ?>index.php/user/delete_account">Delete my account permanently.</a>
		</div>
	</div>
</div>
</div>