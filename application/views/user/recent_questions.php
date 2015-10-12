<div class="main_block">
	<br>
		<h2> Recent questions on forum :</h2>
		
	<br><br>
	<div class="questions">
	<table>
		<?php
				$records=Recent_qstn_model::find_all_qstn();
				$i=1;
				foreach($records as $d){
			echo "<tr>";
			echo "<td class=\"answers\"> <div class=\"division_no\">".$d->replies."</div><div class=\"division\">answers</div>
				<td class=\"views\"><div class=\"division_no_v\">".$d->views."</div><div class=\"division_v\">views</div>
				<td class=\"qstns\"><a href=\"".base_url()."index.php/user/display_qstn/".$d->id."\">".$d->title."</a>
				<td class=\"users\"> asked by ".$d->user."
			</tr>";
			}
			?>
		</table>
	</div>
		<br><br>

</div>
</div>