<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Programming Forum</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css" >
		
		<!--  Editor scripts and styles -->
		<script src="<?php echo base_url()?>assets/CKEditor/ckeditor.js"></script>
		<link rel="stylesheet" href="<?php echo base_url()?>assets/CKEditor/sample.css">
		<!-- *****************************  -->
		
	</head>
	<body>
		<div class="top_header">
			<div class="top_left_block">Welcome to the programming forum </div>
			<div class="top_right_block">
				<?php echo form_open('User/search');?>
					<input type="text" id="top_search_box" name="search_term" placeholder="Enter the search term" >&nbsp;&nbsp;&nbsp;
					<input type="submit" id="top_search_button" value="Search" >
				</form>
			</div>
		</div>
		
		<div class="header_wrapper">
			<div class="banner_block">
				<img src="<?php echo base_url();?>assets/images/banner.jpg">
			</div>
			<div class="info_box">
				<p>
					You are logged in as <?php echo $this->session->userdata('username');; ?><br>
					Time :<?php echo date('d-M-Y'); ?><br><br>
					<a href="<?php echo base_url();?>index.php/user/logout">Log out!</a>
				</p>
			</div>
		</div>
		<div class="main_wrapper">
			<div class="nav">
				<ul>
					<li><a href="<?php echo base_url(); ?>index.php/user/">Dashboard</a>
					<li><a href="<?php echo base_url(); ?>index.php/user/top_questions">Top Questions</a>
					<li><a href="<?php echo base_url(); ?>index.php/user/recent_questions">Recent Questions</a>
					<li><a href="<?php echo base_url(); ?>index.php/user/ask_question">Ask a Question</a>
				</ul>
			</div>