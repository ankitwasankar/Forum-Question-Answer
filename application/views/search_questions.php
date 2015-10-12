<div class="main_block">
	<br>
		<h2> Search results:</h2>
		
	<br>
	<div class="questions">
	<div class="err_msg"><?php echo "<p>$message</p>"; ?> <?php echo validation_errors(); ?></div><br>
	<table>
	<?php  /*
				$records=Recent_qstn_model::find_all_qstn();
				$i=1;
				echo "<table class=\"qstn_table\">";
				echo "<tr class=\"weight\"><td class=\"firstcolumn\">Sr. No.</td><td class=\"title_col\">Title of question</td><td>Time</td><td>Views</td><td>Replies</td><td><a>User</a></td></tr>";
				foreach($records as $d){
					$date=$d->time;
					echo "<tr><td class=\"firstcolumn\">".$i.")</td> <td class=\"title_col\"><a href=\"".base_url()."index.php/user/profile/display_qstn/".$d->id."\">".$d->title."</a></td>"."<td>".date('d-M-Y',$date)."</td><td>".$d->views."</td><td>".$d->replies."</td><td><a>".$d->user."</a></td></</tr>";
					$i++;
					if($i>10){
						break;
					}
				}
				echo "</table>";
		*/?>
		<?php
				if(!validation_errors()){
				$records=Search_model::get_result($search_term);
				$i=1;
				if($records){
				foreach($records as $d){
				echo "<tr>";
				echo "<td class=\"answers\"> <div class=\"division_no\">".$d->replies."</div><div class=\"division\">answers</div>
				<td class=\"views\"><div class=\"division_no_v\">".$d->views."</div><div class=\"division_v\">views</div>
				<td class=\"qstns\"><a href=\"".base_url()."index.php/guest/display_qstn/".$d->q_id."\">".$d->title."</a>
				<td class=\"users\"> asked by ".$d->user."
			</tr>";
			}}
			else
				echo "No result found for \" ".$search_term." \"";
			}
			?>
		</table>
	</div>
		<br><br>

</div>
</div>