<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login1 extends CI_Controller  {
	function __construct(){
	parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('m_login');
		$this->load->library('session');
	}

	    public function index() {
			$this->load->view('A_Login');
		}
		
		public function aksi(){		
		$data=array(
			'username'=>$this->input->post('uname'),
			'password'=>$this->input->post('pass'),
			'akses'=>$this->input->post('pass')
		);
		
		$akses = array(
				'akses' => $this->row->akses
			);
		
		$cek=$this->m_login->m_aksi($data);
		$cek2=$this->m_login->m_aksi2($akses);
		if($cek == 1 && 'Guru'){
			$x=$this->session->set_userdata($data);			
			redirect('login1/Guru');
		}
		else if($cek == 1 && 'Wali Kelas'){
			$x=$this->session->set_userdata($data);			
			redirect('login1/Wali_Kelas');
		}
		else if($cek == 1 && 'Tata Usaha'){
			$x=$this->session->set_userdata($data);			
			redirect('login1/Tata_Usaha');
		}
		
		else{
			echo "login gagal";
		}
		}
		
		public function Guru(){
		$data = array(
		'username' => $this->session->userdata('username')
		);
		$this->load->view('v_sukses_G', $data);	
		}
		
		public function Wali_Kelas(){
		$data = array(
		'username' => $this->session->userdata('username')
		);
		$this->load->view('v_sukses_W', $data);	
		}
		
		public function Tata_Usaha(){
		$data = array(
		'username' => $this->session->userdata('username')
		);
		$this->load->view('v_sukses_T', $data);	
		}
		
	public function logout(){
		$this->session->sess_destroy();
		redirect('Login1/');
	}
	}
?>
