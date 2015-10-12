<div class="main_block">
	<br>
		<h2>Ask a question</h2>
	<br>
		<a class="err_msg"><?php echo validation_errors(); ?><?php if(isset($message)) echo "<p>$message</p>"; ?></a>
		<br>
		<form action="" method="post">
		<a>Title of your question:</a>
		<br>
		<input type="text" name="title" class="text_box_title"></input>
		<br><br>
		<!--paragraph-->
		<p>
		<a>Question details:</a>
		<textarea class="ckeditor" name="body"></textarea>
		<br><br>
		<a>Tags</a>
			<input type="text" name="tags" class="text_box_title">
		
		<p>
		<br><br>
		<input type="submit" class="submit_button" name="submit" value="Submit">
		</p>
		</form>
</div>
</div>