<div class="main_block">
	<br>
		<h2> User registered on the forum: </h2>
		
	<br><br>
		<?php
			$records=Array();
			$records=View_user_model::view_user($id_no);
			if($pic_bool=="true"){$path=base_url()."assets/profile_pics/".$id_no."";}
						  else $path=base_url()."assets/images/default.jpg";
			echo "
			<div class=\"img_left\" ><img  src=".$path."></div>
			<table class=\"table_right\">
				<tr>
					<td>User :
					<td>".$records[0]->nickname."
				</tr>
				<tr>
					<td>Name :
					<td>".$records[0]->name."
				</tr>
				<tr>
					<td>Surname :
					<td>".$records[0]->surname."
				</tr>
				<tr>
					<td>Location :
					<td>".$records[0]->location."
				</tr>
				<tr>
					<td>Speciality :
					<td>".$records[0]->specialization."
				</tr>
			</table>"
		?>
	
</div>
</div>