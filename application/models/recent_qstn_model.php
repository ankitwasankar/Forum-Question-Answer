<?php
	class Recent_qstn_model extends CI_Model{
		
		public static $table_name="recent_qstn";
		public $id;
		public $title;
		public $time;
		public $user;
		public $views;
		public $replies;
		public $uid;
		
		public function find_all_qstn(){
			$records=$this->db->query("select * from recent_qstns order by time desc");
			return Recent_qstn_model::instantiate($records);
		}
		
		public function find_all_my_qstn(){
			$uid=$this->session->userdata('userid');
			$records=$this->db->query("select * from recent_qstns where uid=\"".$uid."\" order by time desc ;");
			return Recent_qstn_model::instantiate($records);
		}
		
		public function instantiate($records){
			$objects = Array();
			$i=0;
			foreach ($records->result() as $row){
				$o= new Recent_qstn_model;
				$o->id=$row->qid;
				$o->title=$row->title;
				$o->time=$row->time;
				$o->user=$row->nickname;
				$o->views=$row->views;
				$o->replies=$row->replies;
				$objects[$i]=$o;
				$i++;
			}
			return $objects;
		}
	}	
?>