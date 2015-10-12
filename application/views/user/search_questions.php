<div class="main_block">
	<br>
		<h2> Search results:</h2>
		
	<br>
	<div class="questions">
	<div class="err_msg"><?php echo "<p>$message</p>"; ?> <?php echo validation_errors(); ?></div><br>
	<table>
		<?php
			if(!validation_errors()){
				$records=Search_model::get_result($search_term);
				$i=1;
				
				if($records & $search_term!=""){
				foreach($records as $d){
				echo "<tr>";
				echo "<td class=\"answers\"> <div class=\"division_no\">".$d->replies."</div><div class=\"division\">answers</div>
				<td class=\"views\"><div class=\"division_no_v\">".$d->views."</div><div class=\"division_v\">views</div>
				<td class=\"qstns\"><a href=\"".base_url()."index.php/User/display_qstn/".$d->q_id."\">".$d->title."</a>
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