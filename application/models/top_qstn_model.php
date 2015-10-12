<?php
	class Top_qstn_model extends CI_Model{
		public $q_id;
		public $title;
		public $time;
		public $nickname;
		public $views;
		public $replies;
	
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
	
		public function get_qstns(){
			$query="select * from top_qstns;";
			$records=$this->db->query($query);
			return Top_qstn_model::instantiate($records);
		}
		public function instantiate($records){
			$obj=Array();
			$i=0;
			foreach($records->result() as $row){
				$o=new Top_qstn_model;
				$o->q_id=$row->qid;
				$o->title=$row->title;
				$o->time=$row->time;
				$o->nickname=$row->nickname;
				$o->views=$row->views;
				$o->replies=$row->replies;
				$obj[$i]=$o;
				$i++;
			}
			return $obj;
		}
	}
?>