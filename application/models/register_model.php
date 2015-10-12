<?php
	class Register_model extends CI_Model{
		
		public $username;
		public $password;
		public $nickname;
		public $name;
		public $surname;
		public $mb_no;
		public $uid;
		
		public function __construct(){
			
			parent::__construct();
			$this->load->database();
		}
		
		public function save(){
			$this->db->trans_start();
			$this->db->query('insert into auth values("'.$this->username.'","'.$this->password.'",default)');
			$obj=Register_model::get_uid($this->username);
			$this->db->query('update userinfo set nickname="'.$this->nickname.'" ,name="'.$this->name.'" ,surname="'.$this->surname.'", mb_no='.$this->mb_no."
			where uid=".$obj->uid);
			$this->db->trans_complete();
			
			if($this->db->trans_status()===FALSE)
				return FALSE;
			else
				return TRUE;
	    }
		
		public function get_uid($username){
			
			$query="select uid from auth where username=\"".$username."\"";
			$records=$this->db->query($query);
			$obj=new Register_model;
			foreach($records->result() as $d){
				$obj->uid=$d->uid;
				break;
			}
			return $obj;
		}
	}
?>