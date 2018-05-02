<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller  {
	function __construct(){
	parent::__construct();
	$this->load->library('session');
	}

	public function index(){
	$user =$this->input->post('username');
	$pass =$this->input->post('password');
		
		if($user =='admin' && $pass == '123' )
		{
			//buat_session
			$this->session->set_userdata('username',$user);
			// redirect
			redirect('login/admin_page');
		}
		else
		{
			$this->load->view('index');
		}
	}
	
	public function admin_page()
	{
		$this->load->view('admin_page');	
	}
	
	
	
	public function logout()
	{
		//buat_session
			$this->session->unset_userdata(array('username'=>''));
			// redirect
			redirect('login/index');
	}
	
	
}

/* Location: ./application/controllers/Gurus.php */