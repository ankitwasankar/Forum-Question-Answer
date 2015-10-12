<?php
	class Ask_qstn_model extends CI_Model{
		
		public $username;
		public $userid;
		public $tag1;
		public $body;
		public $title;
		public $time;
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function insert_qstn(){
			
			$this->db->trans_start();
			$this->db->query("insert into qstns values (default,\"".$this->title."\",\"".$this->body."\")");
			$q_id=Ask_qstn_model::get_qid($this->title);
			$this->db->query("update qinfo set time=".$this->time.",tag1='".$this->tag1."',tag2=default,tag3=default,tag4=default,tag5=default where qid=".$q_id);
			$this->db->query("update qu set uid='".$this->userid."' where qid=".$q_id);
			$this->db->query("insert into qu values(".$q_id.",".$this->userid.")");
			$this->db->trans_complete();
			if($this->db->trans_status()===FALSE)
				return FALSE;
			else
				return TRUE;
		}
		
		public function get_qid($title_name){
			$query="select qid from qstns where title=\"".$title_name."\""; 
			$record=$this->db->query($query);
			foreach ($record->result() as $row)
				{	
					$qid_no=$row->qid;
					break;
				}
			return $qid_no;
		}
	}

?>