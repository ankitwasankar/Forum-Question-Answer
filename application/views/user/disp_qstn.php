<div class="main_block">
		<?php
			$qid_no=$qid_no;
			$obj=new Display_qstn_model;
			$obj_1=new Display_qstn_model;
			$obj_1=$obj->get_qstn($qid_no);	
			$body_final=htmlspecialchars_decode($obj_1->body);
		?>
		<p>
		<br>
		<h1>Question Details:</h1>
		<br>
		<div class="qstn">
			<h3>Title of question:</h3>
			<div class="title_qstn"><a><?php echo $obj_1->title;?></a></div><br>
			<h3>Detailed description:</h3>	<br>		
			<div><?php echo($body_final); ?><br></div>
			<div align="right" class="ask_time"><p>This question is asked by <?php echo "<a href=\"".base_url()."index.php/user/view_user/".$obj_1->uid."\">".$obj_1->nickname."</a> on ".date('d-M-Y',$obj_1->time) ?></p></div>
		</div>
		</p>	
		<!-- All replies	-->
		<!-- ********** -->
		<p>
		<div class="reply">
		<h3 style="clear:both;">Replies to the question:</h3>
		<?php
			$reply= Retrieve_all_reply_model::retrieve($qid_no);
			$i=1;
			foreach($reply as $r){
				echo "<div class=\"reply_block\">";
				echo "<br><div class=\"reply_block\">";
				echo "<h6>".$i.") Answer by ".$r->username.":</h6>";
				echo "<div>";
				echo htmlspecialchars_decode($r->reply);
				echo "</div>";
				echo "</div>";
				$i++;
			}
			if(!$reply){
				echo "<div class=\"set_anchor\"><a>No replies are available yet...</a></div>";
			}
		?>
		</div>
		</div>
		</p>
		<!---   your answer  -->
		<!--  ************* -->
		<br>
		<form action="" method="post">		
		<h2> Give an answer to the question:</h2><br>
		<a class="messages"><?php echo validation_errors(); ?></a>
		<textarea class="ckeditor" name="reply"></textarea>
		<p><br>
		<input type="submit" class="submit_button" name="submit" value="Submit">
		</p>
		</form>
		<br>
		<!--  ******************-->
	</div>
</div>
</div>
</div>