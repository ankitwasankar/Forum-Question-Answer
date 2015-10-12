<?php
	class Guest extends CI_Controller{
	
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
			$this->load->model('register_model');
			$this->load->model('top_qstn_model');
			$this->load->model('all_users');
			$this->load->model('recent_qstn_model');
			$this->load->model('view_user_model');
			$this->load->model('login_model');
			$this->load->model('display_qstn_model');
			$this->load->model('increment');
			$this->load->model('retrieve_all_reply_model');
			$this->load->model('get_reply');
			$this->load->model('search_model');
		}
	
		/*************************************************
			Home Page with recent questions
		**************************************************/
		public function index(){
			$data['message']="";
			
			
			$this->load->view('header/header_with',$data);
			$this->load->view('home',$data);
			$this->load->view('sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data);
		}
		
		/*************************************************
			Registration page
		**************************************************/
		public function register(){
			$data['message']="";
			$this->form_validation->set_rules('username','Username','trim|required|valid_email|max_length[60]|xxs_clean');
			$this->form_validation->set_rules('password','Password','trim|required|matches[password_c]|max_length[16]|min_length[8]|md5');
			$this->form_validation->set_rules('password_c','Confirm password','trim|required||md5');
			$this->form_validation->set_rules('nickname','nickname','trim|required|max_length[30]|min_length[2]');
			$this->form_validation->set_rules('name','name','trim|required|max_length[30]|min_length[2]');
			$this->form_validation->set_rules('surname','last name','trim|required|max_length[30]|min_length[2]');
			$this->form_validation->set_rules('mb_no','mobile number','trim|max_length[10]|min_length[10]');
			
			if($this->form_validation->run()==TRUE ){
				
			  if(ctype_alpha($this->input->post('name')) && ctype_alpha($this->input->post('surname'))){	
				$rm=new Register_model();
				$rm->username=$this->input->post('username');
				$rm->password=$this->input->post('password');
				$rm->nickname=$this->input->post('nickname');
				$rm->name=$this->input->post('name');
				$rm->surname=$this->input->post('surname');
				
				if($rm->mb_no=$this->input->post('mb_no'));
				else $rm->mb_no="00";
					
				$lm=new Login_model;
				$lm->username=$this->input->post('username');
				$lm->password=$this->input->post('password');
				
				if($rm->save()){
					$data['message']='Registration successful';
					if($lm->authenticate()){
						redirect('user','Location');
					}
					else
						$data['message']='Some Error Occured';
					}
				else
					$data['message']='Some Error Occured';
			  }
			  else
				$data['message']='Name or Surname is incorrect';
			}
			
			$this->load->helper('url',$data);
			$this->load->helper('form',$data);
			$this->load->view('header/header_without',$data);
			$this->load->view('register',$data);
			$this->load->view('sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data);
		}
		
		/*************************************************
			Login and Login Page
		**************************************************/
		public function login(){
			
			$data['message']="";
			$this->form_validation->set_rules('username','Username','trim|required|valid_email|max_length[60]|xxs_clean');
			$this->form_validation->set_rules('password','Password','trim|required|max_length[16]|min_length[8]|md5');
			
			if($this->form_validation->run()==TRUE){
				$l=new Login_model;
				$l->username=$this->input->post('username');
				$l->password=$this->input->post('password');
				if($l->authenticate()){
					$data['message']="Success";
					redirect('user','Location');
				}
				else
					$data['message']='Username password not matched.';
			}
			else
				$data['some error occured']="";
				
			$this->load->view('header/header_without',$data);
			$this->load->view('login',$data);
			$this->load->view('sidebar/right_sidebar',$data);
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
			$this->load->view('header/header_with',$data,$qstn);
			$this->load->view('recent_questions',$data,$qstn);
			$this->load->view('sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data,$qstn);
		}
		
		/***************************************************************************
				All users
		**************************************************************************/		
		public function users(){
			$data['message']="";
			$this->load->view('header/header_with',$data);
			$this->load->view('users',$data);
			$this->load->view('sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data);
		}
		
		
		/*************************************************
			Achievements
		**************************************************/
		public function achievements(){
			$data['message']="";
			$this->load->view('header/header_with',$data);
			$this->load->view('achievements',$data);
			$this->load->view('sidebar/right_sidebar',$data);
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
			
			$this->load->view('header/header_with',$data);
			$this->load->view('view_user',$data);
			$this->load->view('sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data);
			
		}
		
		/*************************************************
			About us page
		**************************************************/
		public function about(){
			$data['message']="";
			$this->load->view('header/header_with',$data);
			$this->load->view('about',$data);
			$this->load->view('sidebar/right_sidebar',$data);
			$this->load->view('footer/footer',$data);
			
		}
		
		/*************************************************************
			display questions
		***********************************************************/
		public function display_qstn($qid_no){
			
			/*if(isset($_POST['submit'])==TRUE){
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
			*/
				$data['qid_no']=$qid_no;
				$data['message']="";
				
				$obj1=Increment::get_views($qid_no);
				Increment::incviews($qid_no,$obj1->views);
				
				$this->load->view('header/header_with',$data);
				$this->load->view('disp_qstn',$data);
				//$this->load->view('sidebar/right_sidebar',$data);
				$this->load->view('footer/footer',$data);
	
		}
		
		
		/*************************************************************
			Forget password
		***********************************************************/
			public function forgot_password(){
				$data['message']="";
				$this->load->view('header/header_without',$data);
				$this->load->view('forgot_pass',$data);
				$this->load->view('sidebar/right_sidebar',$data);
				$this->load->view('footer/footer',$data);
				}
		
		
		/*************************************************************
			search
		***********************************************************/
			public function search(){
				$data['message']="";
				$this->form_validation->set_rules('search_term','"Search Term"','trim|required|max_length[60]|xxs_clean');
				
				if($this->form_validation->run()==TRUE){
			
					$search_term=$this->input->post('search_term');
					$data['search_term']=$search_term;
					$qids=Array();
					$qids=new Search_model;
					$qids->get_result($search_term);
				}
				$this->load->view('header/header_without',$data);
				$this->load->view('search_questions',$data);
				$this->load->view('sidebar/right_sidebar',$data);
				$this->load->view('footer/footer',$data);
				}
	}
?>