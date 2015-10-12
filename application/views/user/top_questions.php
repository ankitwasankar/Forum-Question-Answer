<div class="main_block">
	<br>
		<h2> Top questions on forum :</h2>
		
	<br><br>
	<div class="questions">
	<table>
		<?php
				$records=Top_qstn_model::get_qstns();
				$i=1;
			/*	
				echo "<tr class=\"weight\"><td class=\"firstcolumn\">Sr. No.</td><td class=\"title_col\">Title of question</td><td>Time</td><td>Views</td><td>Replies</td><td>User</td></tr>";
				foreach($records as $d){
					$date=$d->time;
					echo "<tr><td class=\"firstcolumn\">".$i.")</td> <td class=\"title_col\"><a href=\"".base_url()."index.php/user/profile/display_qstn/".$d->q_id."\">".$d->title."</a></td>"."<td>".date('d-M-Y',$date)."</td><td>".$d->views."</td><td>".$d->replies."</td><td>".$d->nickname."</td></</tr>";
					$i++;
					if($i>10){
						break;
					}
				}
			*/
			?>
			<?php
			foreach($records as $d){
			echo "<tr>";
			echo "<td class=\"answers\"> <div class=\"division_no\">".$d->replies."</div><div class=\"division\">answers</div>
				<td class=\"views\"><div class=\"division_no_v\">".$d->views."</div><div class=\"division_v\">views</div>
				<td class=\"qstns\"><a href=\"".base_url()."index.php/user/display_qstn/".$d->q_id."\">".$d->title."</a>
				<td class=\"users\"> asked by ".$d->nickname."
			</tr>";
			}
			?>
			
	</table>
	</div>
		<br><br>

</div>
</div>