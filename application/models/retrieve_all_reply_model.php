<?php
	class Retrieve_all_reply_model extends CI_Model{
		public $username;
		public $q_id;
		public $reply;
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		public function retrieve($qid_no){
			$query="select * from all_reply where q_id=".$qid_no.";";
			$records=$this->db->query($query);
			return Retrieve_all_reply_model::instantiate($records);
			
		}	
		public function instantiate($records){
			$objects = Array();
			$i=0;
			foreach ($records->result() as $row){
				$o= new Retrieve_all_reply_model;
				$o->username=$row->username;
				$o->q_id=$row->q_id;
				$o->reply=$row->reply;
				$objects[$i]=$o;
				$i++;
			}
			return $objects;
		}
	}
?>