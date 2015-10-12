<div class="main_block">
	<br>
		<h2> Top questions on forum :</h2>
		
	<br><br>
	
	<div class="user_table">
	<?php
		$o=Array();
		$obj=new All_users();
		$o=$obj->get_user_info();
		$i=0;
		foreach($o as $object){	
		echo "<table><tr>
					<td>Username
					<td><a href=\" view_user/".$o[$i]->userid."\">".$o[$i]->nickname."</a>
					</tr>
					<tr>
					<td>Specialization
					<td>".$o[$i]->specialization."
					</tr>
					<tr>
					<td>Location
					<td>".$o[$i]->location."
					</tr>
				</table>";
					$i++;
	}
	
	?>
	</div>
	</div>
	</div>