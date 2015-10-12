<?php
	class Login_model extends CI_Model{
	
		public $username;
		public $password;
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		public function authenticate(){
			$this->username=$this->db->escape($this->username);
			$this->password=$this->db->escape($this->password);
			$records=$this->db->query("select * from auth where username=".$this->username." and password=".$this->password);
			$records2=$this->db->query("select * from user_nick where username=".$this->username);
			
			if($records->num_rows>0){
				$row=$records->row();
				$row2=$records2->row();
				$s_data=array(
					username=>$row->username,
					nickname=>$row2->nickname,
					userid=>$row2->uid,
					validated=>true);
				$this->session->set_userdata($s_data);
				return true;
			}
			else
				return false;
		}
	}
?>