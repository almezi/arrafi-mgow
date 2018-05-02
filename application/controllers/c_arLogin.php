<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_arLogin extends CI_Controller {
    
	public function __construct()
	{
	 parent::__construct();
	 $this->load->model('m_login');
	}
	public function index () 
	{
	$this->load->view('template/phead'); 
	$this->load->view('v-form_login');  
	$this->load->view('template/pfooter'); 
	}
	
	public function login () 
	{
	$this->load->view('template/phead'); 
	$this->load->view('v-form_login'); 
	$this->load->view('template/pfooter'); 
	}
	
	
	/*public function checking ()
	{
	
		$this->load->model('m_login'); // load model_user
		$hasil = $this->m_login->cek_user() ;
		if ($hasil == true) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['status'] = $sess->status;
				$sess_data['kodepeg'] = $sess->kodepeg;
				$this->session->set_userdata($sess_data);
			}

			if ($this->session->userdata('status') =='KaTu') {
				echo "<script>alert('Login berhasil!');history.go(-1);</script>";
				redirect('c_arAdmin/display');
			}
			else if ($this->session->userdata('status')=='satpam') {
				echo "<script>alert('Login berhasil!');history.go(-1);</script>";
				redirect('c_arSatpam/display');
			}
			else if ($this->session->userdata('status') =='caraka') {
				echo "<script>alert('Login berhasil!');history.go(-1);</script>";
				redirect('c_arCaraka/display');
			}		
		}else{
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}
	
	public function logout()
	{
	$this->session->unset_userdata('username');
	$this->session->unset_userdata('status');
	$this->session->sess_destroy();
	echo "<script>alert('Apakah anda ingin keluar?');history.go(-1);</script>";
	redirect('c_arLogin/login');
	}	
	}*/

	function edit(){
		$data['editUser'] = $this->m_login->editUser();
		$this->load->view('v_edituser');
	}

}
?>