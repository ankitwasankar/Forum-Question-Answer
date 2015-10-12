<?php
	class View_user_model extends CI_Model{
		
		public $username;
		public $uid;
		public $nickname;
		public $name;
		public $surname;
		public $mb_no;
		public $location;
		public $specialization;
		
		public function view_user($id_no){
			
			$query="select * from userinfo where uid=".$id_no;
			$records=$this->db->query($query);
			return View_user_model::instantiate($records);
		}
		public function instantiate($records){
			$objects = Array();
			$i=0;
			foreach ($records->result() as $row){
				$o= new View_user_model;
				$o->id=$row->uid;
				$o->nickname=$row->nickname;
				$o->name=$row->name;
				$o->surname=$row->surname;
				$o->mb_no=$row->mb_no;
				$o->location=$row->location;
				$o->specialization=$row->specializaton;
				$objects[$i]=$o;
				$i++;
			}
			return $objects;
		}
	}
?>