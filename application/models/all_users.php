<?php
	class All_users extends CI_Model{
		
		public $userid;
		public $nickname;
		public $specialization;
		public $location;
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function get_user_info(){
			$query="select * from user_info;";
			$records=$this->db->query($query);
			return All_users::instantiate($records);
		}
		public function instantiate($records){
			$obj=Array();
			$i=0;
			
			foreach($records->result() as $d){
				$o=new All_users();
				$o->userid=$d->uid;
				$o->nickname=$d->nickname;
				$o->specialization=$d->specializaton;
				$o->location=$d->location;
				
				$obj[$i]=$o;
				$i++;
			}
			return $obj;
		}
	}
?>