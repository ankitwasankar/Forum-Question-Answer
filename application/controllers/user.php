<?php
	class User extends CI_Controller{
		
		/*************************************************
			Constructor 
		**************************************************/
		public function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('form_validation');
			$this->load->library('encrypt');
			$this->load->library('session');
			$this->load->library('upload');
			$this->load->model('ask_qstn_model');
			$this->load->model('top_qstn_model');
			$this->load->model('recent_qstn_model');
			$this->load->model('increment');
			$this->load->model('retrieve_all_reply_model');
			$this->load->model('get_reply');
			$this->load->model('display_qstn_model');
			$this->load->model('change_pass_model');
			$this->load->model('edit_info_model');
			$this->load->model('view_user_model');
			$this->load->model('search_model');
			if($this->session->userdata('validated')!=true)
				redirect('Guest/login','Location');
		}
		
		/*************************************************
			Dashboard
		**************************************************/
		public function index(){
			
			$data['message']="";
			$target_path="assets/profile_pics";
			$target_path=$target_path."/".$this->session->userdata('userid');
			if(file_exists($target_path))
				$data['pic_bool']="true";
			else
				$data['pic_bool']="false";
				
			$this->load->view('user/header/header',$data);
			$this->load->view('user/index',$data);
			$this->load->view('user/sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data);
		}
		
		/*************************************************
			Ask question
		**************************************************/
		public function ask_question(){
			
			$data['message']="";	
			$data['username']=$this->session->userdata('username');			
			$this->form_validation->set_rules('title','Title','trim|required|max_length[100]|xxs_clean');
			$this->form_validation->set_rules('body','Details','trim|required|max_length[4000]|xxs_clean|htmlspecialchars');
			$this->form_validation->set_rules('tags','Tags','trim|required|max_length[100]|xxs_clean');
			
			if($this->form_validation->run()==TRUE && isset($_POST['submit'])==TRUE){
				$qstn=new Ask_qstn_model;
				$qstn->title=$this->input->post('title');
				$qstn->body=$this->input->post('body');
				$qstn->tag1=$this->input->post('tags');
				$qstn->userid=$this->session->userdata('userid');
				$qstn->username=$this->session->userdata('username');
				date_default_timezone_set("Asia/Kolkata");
				$date = new DateTime();
				$qstn->time=$date->getTimestamp();
				
				if($qstn->insert_qstn()){
					$data['message']="Question succeessfully submited";
					$this->load->helper('url',$data);
					$this->load->view('user/header/header_ask',$data);
					$this->load->view('user/ask_question',$data);
					$this->load->view('footer/footer',$data);
				}				
			}
			
			$this->load->view('user/header/header_ask',$data);
			$this->load->view('user/ask_question',$data);
			$this->load->view('user/sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data);
		}
		
		/*************************************************
			Top questions
		**************************************************/
		public function top_questions(){
			$data['username']=$this->session->userdata('username');
			$data['nickname']=$this->session->userdata('nickname');
			$this->load->helper('url',$data);
			$this->load->view('user/header/header',$data);
			$this->load->view('user/top_questions',$data);
			$this->load->view('user/sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data);
		}
		
		/***************************************************************************
				Recent questions
		**************************************************************************/
		
		public function recent_questions(){
			$qstn = Recent_qstn_model::find_all_qstn();
			$data['username']=$this->session->userdata('username');
			$data['nickname']=$this->session->userdata('nickname');
			$this->load->helper('url',$data,$qstn);
			$this->load->view('user/header/header',$data,$qstn);
			$this->load->view('user/recent_questions',$data,$qstn);
			$this->load->view('user/sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data,$qstn);
		}
		
		/***************************************************************************
				Recent questions
		**************************************************************************/
		public function display_qstn($qid_no){
			
			if(isset($_POST['submit'])==TRUE){
			$this->form_validation->set_rules('reply','Answer','trim|required|max_length[4000]|xxs_clean|htmlspecialchars');
			if($this->form_validation->run()==TRUE){
					$obj=new Get_reply;
					$obj->userid=$this->session->userdata('userid');
					$obj->q_id=$qid_no;
					$obj->reply=$this->input->post('reply');
					$obj->store_reply();
					$obj2=Increment::get_replies($qid_no);
					Increment::increplies($qid_no,$obj2->replies);
				}
			}
				$data['qid_no']=$qid_no;
				$data['message']="";
				
				$obj1=Increment::get_views($qid_no);
				Increment::incviews($qid_no,$obj1->views);
				
				$this->load->view('user/header/header_ask',$data);
				$this->load->view('user/disp_qstn',$data);
				//$this->load->view('user/sidebar/right_sidebar',$data);
				$this->load->view('footer/footer',$data);
	
		}
		
		/***************************************************************************
				My asked questions 
		**************************************************************************/
		public function my_questions(){
			$data['message']="";
			$this->load->view('user/header/header',$data);
			$this->load->view('user/my_questions',$data);
			$this->load->view('user/sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data);
		}
		
		
		/***************************************************************************
				My achievements
		**************************************************************************/
		public function my_achievements(){
			$data['message']="";
			$this->load->view('user/header/header',$data);
			$this->load->view('user/my_achievements',$data);
			$this->load->view('user/sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data);
		}
		
		/*************************************************
			view user info
		**************************************************/
		public function view_user($id_no){
			$data['id_no']=$id_no;
			$target_path="assets/profile_pics";
			$target_path=$target_path."/".$id_no;
			if(file_exists($target_path))
				$data['pic_bool']="true";
			else
				$data['pic_bool']="false";
			
			$this->load->view('user/header/header',$data);
			$this->load->view('view_user',$data);
			$this->load->view('user/sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data);
			
		}
		
		/***************************************************************************
				change passowrd
		**************************************************************************/
		public function change_password(){
			$data['message']="";
			$this->form_validation->set_rules('cpass','Current Password','trim|required|max_length[16]|min_length[8]|md5');
			$this->form_validation->set_rules('npass1','New Password','trim|required|matches[npass2]|max_length[16]|min_length[8]|md5');
			$this->form_validation->set_rules('npass2','Retype Password','trim|required|max_length[16]|max_length[16]|min_length[8]|md5');

			if($this->form_validation->run()==TRUE){
				$pass_old=$this->input->post('cpass');
				$pass_new=$this->input->post('npass1');
				
				$obj= new Change_pass_model;
				if($obj->old_pass_exist($pass_old)){
				if($obj->change_password($pass_new,$pass_old)){
					$data['message']="Password changed successfully";
				}
				}
				else{
					$data['message']="Sorry current password does not matched...";
				}
			}
			$this->load->view('user/header/header',$data);
			$this->load->view('user/change_password',$data);
			$this->load->view('user/sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data);
		}
		
		/***************************************************************************
				delete account permanantly
		**************************************************************************/
		public function delete_account(){
			$data['message']="";
			$this->load->view('user/header/header',$data);
			$this->load->view('user/delete_account',$data);
			$this->load->view('user/sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data);
		}
		
		
		/***************************************************************************
			Edit profile information
		**************************************************************************/
		public function edit_info(){
			$data['message']="";
			$this->form_validation->set_rules('mb_no','Mobile number','trim|max_length[10]|xxs_clean');
			$this->form_validation->set_rules('location','location','trim|max_length[100]|xxs_clean');
			$this->form_validation->set_rules('specialization','Specialization','trim|max_length[100]|xxs_clean');
			if($this->form_validation->run()==TRUE && isset($_POST['submit'])==TRUE){
				$obj2=new Edit_info_model;
				$mb_no_p=$this->input->post('mb_no');
				$location_p=$this->input->post('location');
				$specializaton_p=$this->input->post('specializaton');
				
				if($obj2->save_info($mb_no_p,$location_p,$specializaton_p))
					$data['message']="Information Successfully changed...";
				else
					$data['message']="Some error occuredd....";
			}
			$obj=new Edit_info_model;$obj1=new Edit_info_model;
			$obj1=$obj->get_info();
			$data['mb_no']=$obj1->mb_no;
			$data['location']=$obj1->location;
			$data['specialization']=$obj1->specializaton;
			
			$this->load->view('user/header/header',$data);
			$this->load->view('user/edit_info',$data);
			$this->load->view('user/sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data);
		}
		
		/***************************************************************************
				logout
		**************************************************************************/
		public function logout(){
			$this->session->sess_destroy();
			echo "Log out Successful..Cloase window or Wait to redirect to login page...";
			echo "<meta http-equiv=\"refresh\" content=\"2;url=http://localhost/forum_final/index.php/Guest/login\">";
			
		}
		
		
		/***************************************************************************
				Upload profile pic
		**************************************************************************/
		public function upload(){
			$target_path="assets/profile_pics";
			$target_path=$target_path."/".$this->session->userdata('userid');
			$image =$_FILES["uploaded"]["tmp_name"];
			if(is_uploaded_file($_FILES['uploaded']['tmp_name'])){
			if(file_exists($target_path)) {
				chmod($target_path,0755); //Change the file permissions if allowed
				unlink($target_path); //remove the file
			}
			move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_path);
			}
			redirect("user/index",'refresh');
		}
		
		
		/*************************************************************
			Search
		***********************************************************/
			public function search(){
				$data['message']="";
				$data['search_term']="";
				$this->form_validation->set_rules('search_term','"Search Term"','trim|required|max_length[60]|xxs_clean');
				
				if($this->form_validation->run()==TRUE){
			
					$search_term=$this->input->post('search_term');
					if($search_term)$data['search_term']=$search_term;
				}
				$this->load->view('user/header/header',$data);
				$this->load->view('user/search_questions',$data);
				$this->load->view('user/sidebar/right_sidebar',$data);
				$this->load->view('footer/footer',$data);
				}
	}
?>