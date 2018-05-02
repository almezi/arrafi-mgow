<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Guru extends CI_Controller  {
	function __construct(){
		parent::__construct();
		$this->load->model('Guru_model');
		$this->auth->cek_auth();
		//constructor yang dipanggil ketika memanggil Guru.php untuk melakukan pemanggilan pada model : Gurus_model.php yang ada di folder models
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('Login2','refresh');
	}
}

/* Location: ./application/controllers/Gurus.php */