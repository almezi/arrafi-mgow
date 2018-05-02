<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login2 extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Login1');
	}
	
	function index(){
		$this->load->view('A_Login');
		}
	

	function aksi(){
		$username = $this->input->post("uname");
		$password = $this->input->post("pass");
		
		//Melakukan pmmersamaan data dengan database
			$cek = $this->M_Login1->get_login($username,$password);
			$kode_group = $cek->kode;	// mengambil data(akses) dari database 
			$nama_group = $cek->nama;
			$this->session->set_userdata(array(
			'isLogin' => TRUE, //Set data setelah Login
			'uname' => $username, //set session username
			'kode' => $kode_group, //set session hak akses
			'status' => $nama_group
			));
		
			if($kode_group == 6){
			redirect('Wali_Kelas','refresh');
			}
			
			else if($kode_group == 5){
			redirect('Wali_Kelas','refresh');
			}
			
			else if($kode_group == 7){
			redirect('Tata_Usaha','refresh');
			}
			
			else if($kode_group == 13){
			redirect('Orang_Tua','refresh');
			}
			
			else{
			echo"<script>alert('Gagal Login')</script>";
			redirect('Login2','refresh');
			}
		
		}
	}

	 /*else if (count($cek2)== 1){// cek data berdasarkan username & password
			foreach ($cek2 as $cek2){
				$level = $cek2['Akses']; // mengambil data(akses) dari database
				$nomor = $cek2['Nomor_Induk']; // mengambil data(akses) dari database
				$Kelas_W = $cek2['Kelas'];
				$Nama_W = $cek2['Nama'];
				}
			$this->session->set_userdata(array(
			'isLogin' => TRUE, //Set data setelah Login
			'uname' => $username, //set session username
			'lvl_W' => $level, //set session hak akses
			'nmr_W' => $nomor, //
			'kls_W' => $Kelas_W, //
			'nama_W' => $Nama_W //
			));
		
			if($level == 'Wali Kelas'){
			redirect('Wali_Kelas','refresh');
			}
			
			else if($level == 'Guru'){
			redirect('Wali_Kelas','refresh');
			}
			else{
			echo"<script>alert('Gagal Login')</script>";
			redirect('Login2','refresh');
			}
		
		} else if (count($cek3)== 1){// cek data berdasarkan username & password
			foreach ($cek3 as $cek3){
				$level = $cek3['Akses']; // mengambil data(akses) dari database
				$nomor = $cek3['Nomor_Induk']; // mengambil data(akses) dari database
				$Kelas_O = $cek3['Kelas'];
				$Wali_O = $cek3['Nomor_Induk_Wali'];
				$Nama_O = $cek3['Nama'];
				$Nama_Wali = $cek3['Nama_Wali'];
				}
			$this->session->set_userdata(array(
			'isLogin' => TRUE, //Set data setelah Login
			'uname' => $username, //set session username
			'lvl_O' => $level, //set session hak akses
			'nmr_O' => $nomor, //
			'kls_O' => $Kelas_O,
			'Wali' => $Wali_O,
			'nama_O' => $Nama_O,
			'nama_Wali' => $Nama_Wali,
			));
		
			if($level == 'Orang Tua'){
			redirect('Orang_Tua','refresh');
			}
			else{
			echo"<script>alert('Gagal Login')</script>";
			redirect('Login2','refresh');
			}
		
		} else{
			echo"<script>alert('Gagal Login')</script>";
			redirect('Login2','refresh');
			}*/