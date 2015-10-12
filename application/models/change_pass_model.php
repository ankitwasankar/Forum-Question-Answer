<?php
	class Change_pass_model extends CI_Model{
		
		public function old_pass_exist($pass_old){
			$query="select * from auth where password=\"".$pass_old."\";";
			$records=$this->db->query($query);
			if($records->num_rows>0)
			return true;
			else
			return false;
		}
		public function change_password($pass_new,$pass_old){
			
			$query="update auth set password=\"".$pass_new."\" where password=\"".$pass_old."\";";
				if($this->db->query($query))
					return true;
				else
					return false;
		}
	}
?>