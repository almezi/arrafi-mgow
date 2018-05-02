<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Login1');
		$this->auth->cek_auth();
	}
	
	function index(){
		$ambil_akun = $this->M_Login1->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user' => $ambil_akun
		);
		$stat = $this->session->userdata('lvl');
		if($stat == 'Guru'){//admin
			$this->load->view('dashboard_admin',$data);
		} else{
			$this->load->view('dashboard_user',$data);
		}
	}
	

	function login(){
		$session = $this->session->userdata('isLogin');
		if($session == False){
			$this->load->view('A_Login');
		}else{
			redirect('dashboard');
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('Login2','refresh');
	}
	
}