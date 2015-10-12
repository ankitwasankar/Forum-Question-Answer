<?php
	class Increment extends CI_Model{
		
		public $q_id;
		public $views;
		public $ryplies;
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		public function get_views($qid_no){
			
			$query="select views from view0reply where qid=".$qid_no;
			$record=$this->db->query($query);
			$obj=new Increment;
			foreach($record->result() as $d){
				$obj->views=$d->views;
				break;
			}
			return $obj;
		}
		
		public function get_replies($qid_no){
			
			$query="select replies from view0reply where qid=".$qid_no;
			$record=$this->db->query($query);
			foreach($record->result() as $d){
				$obj=new Increment;
				$obj->replies=$d->replies;
				break;
			}
			return $obj;
		}
		
		
		public function incviews($qid_no,$view_no){
			$view_no++;
			$query="update view0reply set views=".$view_no." where qid=".$qid_no;
			$this->db->query($query);
		}
		public function increplies($qid_no,$reply_no){
			$reply_no++;
			$query="update view0reply set replies=".$reply_no." where qid=".$qid_no;
			$this->db->query($query);
		}
	}
?>