<?php
	class Search_model extends CI_Model{
		
		public $q_id;
		public $title;
		public $replies;
		public $views;
		public $user;
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
			
		public function get_result($result_query){
			
			$arr=explode(" ",$result_query);				
			$i=count($arr);
			
			$obj=Array();
			$ret_obj=Array();
			$obj= Search_model::all_terms();
			$i=0;$j=0;
			foreach($obj as $heading){
				
				if(strstr($heading->title,$arr[$i])){
					$ret_obj[$j]=$heading;$j++;
				}
			}
			//echo $ret_obj[0]->title;
			if($ret_obj==NULL)return false;
			else return $ret_obj;
		}
		
		public function all_terms(){
		
			$query="select * from all_qstns;";
			$records=$this->db->query($query);
			return Search_model::instantiate($records);
		}
		
		public function instantiate($records){
			$obj=Array();
			$i=0;
			foreach($records->result() as $row){
				$o=new Search_model;
				$o->q_id=$row->qid;
				$o->user=$row->nickname;
				$o->views=$row->views;
				$o->replies=$row->replies;
				$o->title=$row->title;
				$obj[$i]=$o;
				$i++;
			}
			return $obj;
			
		}
	}
?>