<?php
	class Edit_info_model extends CI_Model{
		
		public $mb_no;
		public $location;
		public $specializaton;
		
		public function get_info(){
			$uid=$this->session->userdata('userid');
			$query="select * from userinfo where uid=".$uid;
			
			$records=$this->db->query($query);
			$obj=new Edit_info_model;
			foreach($records->result() as $d){				
				$obj->mb_no=$d->mb_no;
				$obj->location=$d->location;
				$obj->specializaton=$d->specializaton;
				break;
			}
			
			return $obj;
		}
		
		public function save_info($mb_no,$location,$specializaton){
			$uid=$this->session->userdata('userid');
			$query="update userinfo set mb_no=".$mb_no." where uid=".$uid;
			$this->db->query($query);
			$query="update userinfo set location=\"".$location."\" where uid=".$uid;
			$this->db->query($query);
			$query="update userinfo set specializaton=\"".$specializaton."\" where uid=".$uid;
			$this->db->query($query);
			return true;
		}
	}
?>