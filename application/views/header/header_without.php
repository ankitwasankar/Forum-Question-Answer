<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Programming Forum</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css" >
	</head>
	<body>
		<div class="top_header">
			<div class="top_left_block">Welcome to the programming forum </div>
			<div class="top_right_block">
				<?php echo form_open('Guest/search');?>
					<input type="text" name="search_term" id="top_search_box" placeholder="Enter the search term" >&nbsp;&nbsp;&nbsp;
					<input type="submit" id="top_search_button" value="Search" >
				</form>
			</div>
		</div>
		
		<div class="header_wrapper">
			<div class="banner_block">
				<img src="<?php echo base_url();?>assets/images/banner.jpg">
			</div>
		</div>
		<div class="main_wrapper">
			<div class="nav">
				<ul>
					<li><a href="<?php echo base_url(); ?>index.php/Guest/">Home</a>
					<li><a href="<?php echo base_url(); ?>index.php/Guest/recent_questions">Recently Asked</a>
					<li><a href="<?php echo base_url(); ?>index.php/Guest/users">Users</a>
					<li><a href="<?php echo base_url(); ?>index.php/Guest/achievements">Achievements</a>
					<li><a href="<?php echo base_url(); ?>index.php/Guest/about">About</a>
				</ul>
			</div>