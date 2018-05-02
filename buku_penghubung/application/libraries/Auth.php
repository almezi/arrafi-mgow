<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth {
	public function cek_auth(){
		$this->ci =&get_instance();
		$this->sesi =$this->ci->session->userdata('isLogin');
		$this->hak =$this->ci->session->userdata('stat');
		if($this->sesi != TRUE){
			redirect('Login2','Refresh');
			exit();
		}
	}
	
	public function hak_akses($kecuali="Guru"){
		if($this->hak==$kecuali){
			echo "<script>alert('Anda tidak berhak mengakses halaman ini !')</script>";
			redirect('dashboard');
		}elseif($this->hak=="Tata Usaha"){
			echo "<script>alert('Anda belum login !')</script>";
			redirect('Login2');
		}else{
		
		}
	}
}