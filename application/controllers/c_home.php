<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Home extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('m_login','','',TRUE);
		$this->load->model('m_admin','','',TRUE);
        $this->load->helper(array('url','form'));
        $this->load->library(array('session','parser'));
    }
	
	public function beranda() {
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_history_user'=>$this->m_login->tampil_pass_history(),
				'list_history_modul'=>$this->m_admin->tampil_modul_history(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>"beranda.php"
		);
		 $this->load->view('template',$data);
	}
	
	public function home() {
		$data = array(
			'konten' => 'login'
		);
		$this->load->view('assets',$data);
	}
	
	public function daftar(){
		$data = array(
			'konten' => 'buku_tamu'
		);
		$this->parser->parse('assets',$data);
	}
	
	public function reset(){
		$data = array(
			'konten' => 'reset_password'
		);
		$this->load->view('assets',$data);
	}
	
	function update_profil(){
		$pass=$this->input->post('pass');
		$password=$this->input->post('password');
		$pass1=$this->input->post('password1');
		$pass2=$this->input->post('password2');
		if((($pass == md5($password)) && ($pass == md5($pass1))) && ($pass == md5($pass2)))
		{
			echo "<script>window.alert('Password Tidak Diubah')
			window.location='ubah_password'</script>";
		}
		else{	
			$this->m_login->edit_profil();
			$this->m_login->edit_pass_history();
			echo "<script>window.alert('Password Berhasil Diubah')
			window.location='beranda'</script>";
		}
	}
}
?>