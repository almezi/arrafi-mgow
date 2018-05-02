<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_login','',TRUE);
		$this->load->model('m_admin','',TRUE);
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('session','email'));
	}
	
	/*kelola user*/
	function kelola_user(){
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'list_grup'=>$this->m_admin->tampil_grup(),
				'list_user'=>$this->m_admin->tampil_semua_user(),
				'konten' =>"admin/akun.php"
		);
		$this->load->view('template',$data);
	}
	
	function ubah_password(){
		if(empty($this->uri->segment(3))){
			$username=$this->session->userdata('username');
			$data = array(
					'list_menu'=>$this->m_login->tampil_menu(),
					'list_user'=>$this->m_admin->tampil_detail_user($username),
					'list_online'=>$this->m_login->tampil_online(),
					'konten' =>"admin/akun_edit_pass.php"
			);
			$this->load->view('template',$data);
		}else{
			$username=$this->uri->segment(3);
			$data = array(
					'list_menu'=>$this->m_login->tampil_menu(),
					'list_user'=>$this->m_admin->tampil_detail_user($username),
					'list_online'=>$this->m_login->tampil_online(),
					'konten' =>"admin/akun_edit_pass.php"
			);
			$this->load->view('template',$data);
		}
	}
		
	function simpan_user(){
		$user=$this->input->post('username');
		$pass=$this->input->post('password1');
		$email=$this->input->post('email');
		$group=$this->input->post('group');
		$cek1=$this->m_admin->cek_username();
		$cek2=$this->m_admin->cek_email();
		if ($cek1->num_rows() > 0){
			echo "<script>window.alert('Username yang Anda Masukkan Sudah Ada')
			window.location='akun_tambah'</script>";
		}
		else if ($cek2->num_rows() > 0){
			echo "<script>window.alert('Email yang Anda Masukkan Sudah Ada')
			window.location='akun_tambah'</script>";
		}
		else{
			$from_email = 'arrafielementary@gmail.com';
            $subject = 'Pendaftaran Akun';
            $message = 'Yth. '.$user.',<br /><br /> Akun dengan username: <b>'.$user.'</b> dan password: <b>'.$pass.'</b> berhasil dibuat.
						<br>Silahkan klik link berikut ini untuk mengaktifkan akun anda sekarang.
						<br /><br /> http://localhost/arrafi/c_login/daftar_user/'.$user.'/'.$pass.'<br /><br /><br /> Terima kasih.
						<br /><br /> Hormat kami,<br /> SD Ar-Rafi.\'';

            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = $from_email;
			$config['smtp_pass'] = 'arrafielementary';
            $config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n";
			$this->email->initialize($config);

            $this->email->from($from_email, 'SD Ar-Rafi\'');
            $this->email->to($email);
			$this->email->subject($subject);
            $this->email->message($message);
		
			if ($this->email->send()) {
				$this->m_admin->tambah_user($user, $pass, $email);
				$this->m_admin->tambah_grup_user($user, $group);
				echo "<script>window.alert('User Berhasil Ditambahkan')
				window.location='data_user'</script>";
			}
			else{
				echo "<script>window.alert('Proses Tambah User Gagal. \nPeriksa Koneksi Internet Anda.')
				window.location='data_user'</script>";
			}
		}
	}
	
	function akun_tambah(){
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'list_grup'=>$this->m_admin->tampil_grup(),
				'konten' =>"admin/akun_tambah.php"
		);
		$this->load->view('template',$data);
	}
	
	function grup_user_tambah(){
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_user'=>$this->m_admin->tampil_user(),
				'list_grup'=>$this->m_admin->tampil_grup(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>"admin/grup_user_tambah.php"
		);
		
		$this->load->view('template',$data);
	}
	
	function simpan_grup_user(){
		$user=$this->input->post('username');
		$group=$this->input->post('group');
		$cek1=$this->m_admin->cek_grup_user();
		if ($cek1->num_rows() > 0){
			echo "<script>window.alert('User dan Group yang Anda Masukkan Sudah Ada')
			window.location='grup_user_tambah'</script>";
		}
		else{
			$this->m_admin->tambah_grup_user($user, $group);
			echo "<script>window.alert('User Berhasil Ditambahkan ke Group')
			window.location='data_user'</script>";
		}
	}
	
	function get_grup_user(){
		$user=$this->uri->segment(3);
		$this->session->set_userdata('u.username', $user);
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_grup'=>$this->m_admin->tampil_grup_user($user),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>"admin/grup_user.php"
		);
		$this->load->view('template',$data);
	}
	
	
	function hps_grup_user(){
		$username = $this->uri->segment(4); 
		$kode_group = $this->uri->segment(3);
		$this->m_admin->hapus_grup_user($username, $kode_group);
		redirect('c_admin/get_grup_user/'.$username);
	}
	
	
	function get_user(){
		$username=$this->uri->segment(3);
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_user'=>$this->m_admin->tampil_detail_user($username),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>"admin/akun_edit.php"
		);
		$this->load->view('template',$data);
	}
	
	function update_user(){
		$this->m_admin->edit_user();
		redirect('c_admin/data_user');
	}
	
	function update_user_pass(){
		$user=$this->input->post('username');
		$email=$this->input->post('email');
		$pass1=$this->input->post('password1');
		$admin=$this->session->userdata('username');
		$pass=$this->input->post('pass');
		
		$from_email = 'arrafielementary@gmail.com';
        $subject = 'Ganti Password Akun';
        $message = 'Yth. '.$user.',<br /><br /> Akun dengan username: <b>'.$user.'</b> telah diganti password: <b>'.$pass1.'</b> oleh: <b>'.$admin.'</b>. 
					<br> Silahkan klik link berikut ini untuk mengaktifkan akun anda sekarang.<br />
					<br /> http://localhost/arrafi/c_login/ganti_user/'.$user.'/'.$pass1.'<br /><br /><br /> Terima kasih.
					<br /><br /> Hormat kami,<br /> SD Ar-Rafi.\'';

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = '465';
		$config['smtp_user'] = $from_email;
		$config['smtp_pass'] = 'arrafielementary';
        $config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
		$this->email->initialize($config);

        $this->email->from($from_email, 'SD Ar-Rafi\'');
        $this->email->to($email);
		$this->email->subject($subject);
        $this->email->message($message);
		
		if (md5($pass1) == $pass){
			echo "<script>window.alert('Password Tidak Diubah')
			window.location='data_user'</script>";
		}
		else if ((md5($pass1) != $pass) && $this->email->send()) {
			$this->m_admin->edit_user_pass($user, $pass1);
			$this->m_admin->edit_user_pass_history($user, $admin);
			echo "<script>window.alert('Password Berhasil Diubah')
			window.location='data_user'</script>";
		}
		else{
			echo "<script>window.alert('Proses Ubah Password Gagal. \nPeriksa Koneksi Internet Anda.')
			window.location='data_user'</script>";
		}
	}
	
	function get_reset(){
		$user=$this->uri->segment(3);
		$this->m_admin->reset_pass($user);
		$this->m_admin->reset_pass_history($user);
		redirect('c_admin/data_user');
	}
	
	function get_grup_user_status(){
		$id=$this->uri->segment(3);
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_grup'=>$this->m_admin->tampil_status_grup_user($id),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>"admin/grup_user_edit.php"
		);
		$this->load->view('template',$data);
	}
	
	function update_grup_user(){
		$this->m_admin->edit_grup_user();
		redirect('c_admin/data_user');
	}
	
	/*kelola modul*/
	function kelola_modul(){
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_modul'=>$this->m_admin->tampil_semua_modul(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>"admin/modul.php"
		);
		$this->load->view('template',$data);
	}
	
	function modul_tambah(){
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>"admin/modul_tambah.php"
		);
		$this->load->view('template',$data);
	}
	
	function simpan_modul(){
		$cek1=$this->m_admin->cek_modul();
		$cek2=$this->m_admin->cek_link();
		if ($cek1->num_rows() > 0){
			echo "<script>window.alert('Modul yang Anda Masukkan Sudah Ada')
			window.location='modul_tambah'</script>";
		}
		else if ($cek2->num_rows() > 0){
			echo "<script>window.alert('Link yang Anda Masukkan Sudah Ada')
			window.location='modul_tambah'</script>";
		}
		else {
			$this->m_admin->tambah_modul();
			echo "<script>window.alert('Modul Berhasil Ditambahkan')
			window.location='data_modul'</script>";
		}
	}
	
	function hps_modul(){
		$kode=$this->uri->segment(3);
		$this->m_admin->hapus_modul($kode);
		redirect('c_admin/data_modul');
	}
	
	function get_modul(){
		$kode=$this->uri->segment(3);
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_modul'=>$this->m_admin->tampil_detail_modul($kode),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>"admin/modul_edit.php"
		);
		$this->load->view('template',$data);
	}
	
	function update_modul(){
		$modul=$this->input->post('modul');
		$this->m_admin->edit_modul();
		$this->m_admin->edit_modul_history($modul);
		echo "<script>window.alert('Modul Berhasil Diubah')
		window.location='data_modul'</script>";
	}
	
	/*kelola otoritas*/
	function kelola_otoritas(){
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_grup'=>$this->m_admin->tampil_semua_grup(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>"admin/otoritas.php"
		);
		
		
		$this->load->view('template',$data);
	}
	
	function get_otoritas_modul(){
		$grup=$this->uri->segment(3);
		$this->session->set_userdata('nama_group', $grup);
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_modul'=>$this->m_admin->tampil_modul_grup($grup),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>"admin/otoritas_modul.php"
		);
		$this->load->view('template',$data);
	}
	
	function otoritas_tambah(){
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_grup'=>$this->m_admin->tampil_grup(),
				'list_modul'=>$this->m_admin->tampil_semua_modul(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>"admin/otoritas_tambah.php"
		);
		$this->load->view('template',$data);
	}
	
	function simpan_otoritas(){
		$cek=$this->m_admin->cek_otoritas();
		$group=$this->input->post('group');
		$modul=$this->input->post('modul');
		if ($cek->num_rows() > 0){
			echo "<script>window.alert('Otoritas yang Anda Masukkan Sudah Ada')
			window.location='otoritas_tambah'</script>";
		}
		else{
			$this->m_admin->tambah_otoritas($group,$modul);
			echo "<script>window.alert('Otoritas Berhasil Ditambahkan')
			window.location='data_grup'</script>";
		}
	}
	
	function get_otoritas_status(){
		$kode=$this->uri->segment(3);
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_modul'=>$this->m_admin->tampil_status_modul_grup($kode),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>"admin/otoritas_edit.php"
		);
		$this->load->view('template',$data);
	}
	
	function update_otoritas(){
		$grup=$this->input->post('grup');
		$modul=$this->input->post('modul');
		$status=$this->input->post('status');
		$this->m_admin->edit_otoritas();
		$this->m_admin->edit_otoritas_history($grup, $modul, $status);
		redirect('c_admin/data_grup');
	}
	
	function grup_tambah(){
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>"admin/grup_tambah.php"
		);
		$this->load->view('template',$data);
	}
	
	function simpan_grup(){
		$cek=$this->m_admin->cek_grup();
		if ($cek->num_rows() > 0){
			echo "<script>window.alert('Group yang Anda Masukkan Sudah Ada')
			window.location='grup_tambah'</script>";
		}
		else {
			$this->m_admin->tambah_grup();
			echo "<script>window.alert('Group Berhasil Ditambahkan')
			window.location='data_grup'</script>";
		}
	}
	
	function get_grup(){
		$kode=$this->uri->segment(3);
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_grup'=>$this->m_admin->tampil_detail_grup($kode),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>"admin/grup_edit.php"
		);
		$this->load->view('template',$data);
	}
	
	function update_grup(){
		$this->m_admin->edit_grup();
		echo "<script>window.alert('Group Berhasil Diubah')
		window.location='data_grup'</script>";
	}
	
	/*INTEGRASI*/
	function integrasi(){
		$data = array(
			'list_menu'=>$this->m_login->tampil_menu(),
			'list_online'=>$this->m_login->tampil_online(),
			'list_grup'=>$this->m_admin->tampil_grup(),
			'list_user'=>$this->m_admin->tampil_semua_user(),
			'konten' =>"admin/integrasi"
		);
		$this->load->view('template',$data);
	}
}