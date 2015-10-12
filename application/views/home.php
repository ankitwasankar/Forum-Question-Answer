<div class="main_block">
	<br>
		<h2> Top questions on forum :</h2>
		
	<br><br>
	<div class="questions">
	<table>
			<?php
			$records=Top_qstn_model::get_qstns();
				$i=1;
			foreach($records as $d){
			echo "<tr>";
			echo "<td class=\"answers\"> <div class=\"division_no\">".$d->replies."</div><div class=\"division\">answers</div>
				<td class=\"views\"><div class=\"division_no_v\">".$d->views."</div><div class=\"division_v\">views</div>
				<td class=\"qstns\"><a href=\"".base_url()."index.php/guest/display_qstn/".$d->q_id."\">".$d->title."</a>
				<td class=\"users\"> asked by ".$d->nickname."
			</tr>";
			}
			?>
			
	</table>
	</div>
	</a></div>
	
		<br><br>

</div>