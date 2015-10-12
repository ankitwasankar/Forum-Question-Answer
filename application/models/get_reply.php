<?php
class Get_reply extends CI_Model{
	
	public $table_name="reply0qstn";
	public $userid;
	public $q_id;
	public $reply;
	public function __construct(){
			
			parent::__construct();
			$this->load->database();
	}
	public function store_reply(){
		$query="insert into reply0qstn values( ".$this->q_id.",".$this->userid.",\"".$this->reply."\");";
		$this->db->query($query);
		//return $this->db->insert(self::$table_name,$this);
	}
}
?>