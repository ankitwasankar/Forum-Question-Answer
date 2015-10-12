<?php
class Display_qstn_model extends CI_Model{
	
	public static $table_name="disp_qstn";
	public $q_id;
	public $title;
	public $body;
	public $time;
	public $nickname;
	public $views;
	public $replies;
	public $uid;
	
	
	public function __construct(){
			parent::__construct();
			$this->load->database();
		}
	public function get_qstn($qid_no){
		$query="select * from disp_qstn where qid=".$qid_no.";";
		$record=$this->db->query($query);
		$obj=new Display_qstn_model;
		foreach($record->result() as $d){
			
			$obj->q_id=$d->qid;
			$obj->title=$d->title;
			$obj->body=$d->body;
			$obj->time=$d->time;
			$obj->nickname=$d->nickname;
			$obj->views=$d->views;
			$obj->replies=$d->replies;
			$obj->uid=$d->uid;
			
			break;
		}
		return $obj;
	}
	
}
?>