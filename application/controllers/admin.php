<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {
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
				window.location='kelola_user'</script>";
			}
			else{
				echo "<script>window.alert('Proses Tambah User Gagal. \nPeriksa Koneksi Internet Anda.')
				window.location='kelola_user'</script>";
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
		$cek1=$this->m_admin->cek_grup_user($user, $group);
		if ($cek1->num_rows() > 0){
			echo "<script>window.alert('User dan Group yang Anda Masukkan Sudah Ada')
			window.location='grup_user_tambah'</script>";
		}
		else{
			$this->m_admin->tambah_grup_user($user, $group);
			echo "<script>window.alert('User Berhasil Ditambahkan ke Group')
			window.location='kelola_user'</script>";
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
		redirect('admin/get_grup_user/'.$username);
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
		redirect('admin/kelola_user');
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
			window.location='kelola_user'</script>";
		}
		else if ((md5($pass1) != $pass) && $this->email->send()) {
			$this->m_admin->edit_user_pass($user, $pass1);
			$this->m_admin->edit_user_pass_history($user, $admin);
			echo "<script>window.alert('Password Berhasil Diubah')
			window.location='kelola_user'</script>";
		}
		else{
			echo "<script>window.alert('Proses Ubah Password Gagal. \nPeriksa Koneksi Internet Anda.')
			window.location='kelola_user'</script>";
		}
	}
	
	function get_reset(){
		$user=$this->uri->segment(3);
		$this->m_admin->reset_pass($user);
		$this->m_admin->reset_pass_history($user);
		redirect('admin/kelola_user');
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
		redirect('admin/kelola_user');
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
			$modul=$this->input->post('modul');
			$link=$this->input->post('link');
			$this->m_admin->tambah_modul();
			echo "<script>window.alert('Modul Berhasil Ditambahkan')
			window.location='data_modul'</script>";
		}
	}
	
	function hps_modul(){
		$kode=$this->uri->segment(3);
		$this->m_admin->hapus_modul($kode);
		redirect('admin/data_modul');
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
			window.location='kelola_otoritas'</script>";
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
		redirect('admin/kelola_otoritas');
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
			$nama_grup=$this->input->post('grup');
			$this->m_admin->tambah_grup($nama_grup);
			echo "<script>window.alert('Group Berhasil Ditambahkan')
			window.location='kelola_otoritas'</script>";
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
		$kode_group = $this->input->post('kode');
		$data = array(
			'nama_group'=>$this->input->post('grup')
		);
		$this->m_admin->edit_grup($data,$kode_group);
		echo "<script>window.alert('Group Berhasil Diubah')
		window.location='kelola_otoritas'</script>";
	}
	
	/*INTEGRASI*/
	function tambah_integrasi(){
		$data = array(
			'list_menu'=>$this->m_login->tampil_menu(),
			'list_online'=>$this->m_login->tampil_online(),
			'list_grup'=>$this->m_admin->tampil_grup(),
			'list_user'=>$this->m_admin->tampil_semua_user(),
			'konten' =>"admin/integrasi"
		);
		$this->load->view('template_integrasi',$data);
	}
	
	function simpan_integrasi(){
		//insert tabel grup
		$nama_grup=$this->input->post('nama_grup');
		$nama_grup_fix=str_replace(" ","-",ucwords(strtolower($nama_grup)));
		$this->m_admin->tambah_grup($nama_grup_fix);
		$kode_grup=$this->m_admin->get_kode_grup($nama_grup_fix)->row(0,'array');

		//insert multiple modul ke tabel modul
		$nama_modul=$this->input->post('nama_modul');
		$kode_modul= array();
		foreach($nama_modul as $index=>$nama_modul_yes) {
			$nama_modul_fix=str_replace(" ","_",strtolower($nama_modul_yes));
			$link=str_replace(" ","_",strtolower($nama_grup))."/".$nama_modul_fix;
			$cek=$this->m_admin->tambah_modul(strtolower($nama_modul_yes), $link);
			$kode_modul[]=$this->m_admin->get_kode_modul(strtolower($nama_modul_yes))->row(0,'array');
		}
		
		//insert multiple username (otoritas) ke tabel grup user
		$username=$this->input->post('username');
		foreach($username as $index=>$username_yes) {
			$this->m_admin->tambah_grup_user($username_yes, $kode_grup['kode_group']);
		}
	
		//insert multiple ke tabel grup modul
		foreach($kode_modul as $index=>$kode_modul_yes) {
			$this->m_admin->tambah_otoritas($kode_grup['kode_group'], $kode_modul_yes['kode_modul']);
		}
		
		//insert ke tabel integrasi
		$nama_aplikasi=$this->input->post('nama_aplikasi');
		$deskripsi_aplikasi=$this->input->post('deskripsi_aplikasi');
		$created_name = $this->session->userdata('username');
		date_default_timezone_set('Asia/Jakarta');
		$created_date = date("Y-m-d H:i:s");

		$object = array(
				"nama_aplikasi" => $nama_aplikasi,
				"deskripsi_aplikasi" => $deskripsi_aplikasi,
				"kode_grup" => $kode_grup['kode_group'],
				"created_name" => $created_name,
				"created_date" => $created_date,
				"modified_name" => $created_name,
				"modified_date" => $created_date
		);
		$this->m_admin->tambah_integrasi($object);
		$id_integrasi=$this->m_admin->get_id_integrasi($nama_aplikasi)->row(0,'array');
		
		//jika controller
		$path_controller=site_url().'application/controllers/';
		$number_of_controller_uploaded = count($_FILES['controller']['name']);
		for ($i = 0; $i < $number_of_controller_uploaded; $i++) :
		    $_FILES['controller[]']['name']     = $_FILES['controller']['name'][$i];
		    $_FILES['controller[]']['type']     = $_FILES['controller']['type'][$i];
		    $_FILES['controller[]']['tmp_name'] = $_FILES['controller']['tmp_name'][$i];
		    $_FILES['controller[]']['error']    = $_FILES['controller']['error'][$i];
		    $_FILES['controller[]']['size']     = $_FILES['controller']['size'][$i];
			
			$config = array(
				'upload_path' => realpath(FCPATH . 'application/controllers'),
				'overwrite' => TRUE,
				'allowed_types' => 'php|html'
			);
			
			$this->upload->initialize($config);
			$controller = site_url().'application/controllers/'.$_FILES['controller[]']['name'];
			
			if(!$this->upload->do_upload('controller[]')){
				$data = array('error' => $this->upload->display_errors());
			}else{
				$data = array('upload_data' => $this->upload->data());
			}
			
	        $data_controller = array(
			   	'file_aplikasi' => $controller,
			   	'keterangan' => 1,
				'id_integrasi' => $id_integrasi['id_integrasi']
  		    );
			$this->m_admin->tambah_aplikasi($data_controller);
	    endfor;
		
		//jika models
		$path_models=site_url().'application/models/';
		$number_of_models_uploaded = count($_FILES['model']['name']);
		for ($i = 0; $i < $number_of_models_uploaded; $i++) :
		    $_FILES['model[]']['name']     = $_FILES['model']['name'][$i];
		    $_FILES['model[]']['type']     = $_FILES['model']['type'][$i];
		    $_FILES['model[]']['tmp_name'] = $_FILES['model']['tmp_name'][$i];
		    $_FILES['model[]']['error']    = $_FILES['model']['error'][$i];
		    $_FILES['model[]']['size']     = $_FILES['model']['size'][$i];
			
			$config = array(
				'upload_path' => realpath(FCPATH . 'application/models'),
				'overwrite' => TRUE,
				'allowed_types' => 'php|html'
			);

			$this->upload->initialize($config);
			$model = site_url().'application/models/'.$_FILES['model[]']['name'];
			
			if(!$this->upload->do_upload('model[]')){
				$data = array('error' => $this->upload->display_errors());
			}else{
				$data = array('upload_data' => $this->upload->data());
			}
	        $data_model = array(
			   	'file_aplikasi' => $model,
			   	'keterangan' => 2,
				'id_integrasi' => $id_integrasi['id_integrasi']
  		    );
			$this->m_admin->tambah_aplikasi($data_model);
	    endfor;
		
		//jika views
		//buat folder aplikasi di views
		$folder_view=str_replace(" ","_",strtolower($nama_grup));
		$path_view=realpath(FCPATH . 'application/views');
		mkdir($path_view.'/'.$folder_view, 0755, TRUE);
		
		//upload file aplikasi
		$number_of_views_uploaded = count($_FILES['view']['name']);
		for ($i = 0; $i < $number_of_views_uploaded; $i++) :
		    $_FILES['view[]']['name']     = $_FILES['view']['name'][$i];
		    $_FILES['view[]']['type']     = $_FILES['view']['type'][$i];
		    $_FILES['view[]']['tmp_name'] = $_FILES['view']['tmp_name'][$i];
		    $_FILES['view[]']['error']    = $_FILES['view']['error'][$i];
		    $_FILES['view[]']['size']     = $_FILES['view']['size'][$i];

			$config = array(
				'upload_path' => $path_view.'/'.$folder_view,
				'overwrite' => TRUE,
				'allowed_types' => 'php|html'
			);

			$this->upload->initialize($config);
			$view = site_url().'application/views/'.$folder_view.'/'.$_FILES['view[]']['name'];
			
			if(!$this->upload->do_upload('view[]')){
				$data = array('error' => $this->upload->display_errors());
			}else{
				$data = array('upload_data' => $this->upload->data());
			}
			
	        $data_view = array(
			   	'file_aplikasi' => $view,
			   	'keterangan' => 3,
				'id_integrasi' => $id_integrasi['id_integrasi']
  		    );
			$this->m_admin->tambah_aplikasi($data_view);
	    endfor;	
		
		//pengecekan
		$cek=$this->m_admin->cek_integrasi($id_integrasi['id_integrasi']);
		if ($cek->num_rows()>0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Integrasi Aplikasi Berhasil</div>');
			echo "<div class='loader'></div>";
			echo "<script>if(confirm('Integrasi Aplikasi Berhasil. Apakah Anda ingin logout aplikasi?')){
				window.location.href='http://localhost/arrafi/c_login/doLogout';
			}else{
				window.location='kelola_integrasi';
			}</script>";
		}
		else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Integrasi Aplikasi </div>');
			echo "<script>window.location='tambah_integrasi'</script>";
		}
	}
	
	function kelola_integrasi(){
		$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'list_grup'=>$this->m_admin->tampil_grup(),
				'list_integrasi'=>$this->m_admin->tampil_integrasi(),
				'konten' =>"admin/kelola_integrasi"
		);
		$this->load->view('template',$data);
	}
		
	function upgrade_integrasi(){		
		$id_integrasi = $this->uri->segment(3);
		$kode_grup = $this->uri->segment(4);
		$nama_grup = $this->uri->segment(5);
		$list_integrasi = $this->m_admin->get_integrasi($id_integrasi);
		$data_integrasi =$list_integrasi->row(0,'array');
		$data = array(
			'list_menu'=>$this->m_login->tampil_menu(),
			'list_online'=>$this->m_login->tampil_online(),
			'list_grup'=>$this->m_admin->tampil_grup(),
			'nama_aplikasi'=>$data_integrasi['nama_aplikasi'],
			'deskripsi_aplikasi'=> $data_integrasi['deskripsi_aplikasi'],
			'list_user'=>$this->m_admin->tampil_semua_user(),
			'kode_grup' => $kode_grup,
			'id_integrasi' => $id_integrasi,
			'list_user_integrasi'=>$this->m_admin->get_username_integrasi($kode_grup)->result(),
			'nama_grup' => $data_integrasi['nama_group'],
			'list_modul_integrasi'=>$this->m_admin->get_modul_integrasi($kode_grup)->result(),
			'konten' =>"admin/upgrade_integrasi"
		);
		$this->load->view('template_integrasi',$data);
	}
	
	function simpan_upgrade_integrasi(){				
		$id_integrasi = $this->uri->segment(3);
		$kode_grup = $this->uri->segment(4);
		$nama_grup = $this->uri->segment(5);
		$new_nama_grup = $this->input->post('nama_grup');
		$path_view=realpath(FCPATH . 'application/views');
		$folder_view=str_replace(" ","_",strtolower($new_nama_grup));
		
		//delete folder view dulu
		$dirname = $path_view."/".$nama_grup;
		if (is_dir($dirname)) {
			$dir = new RecursiveDirectoryIterator($dirname, RecursiveDirectoryIterator::SKIP_DOTS);
			foreach (new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST ) as $filename => $file) {
				if (is_file($filename))
					unlink($filename);
				else
            rmdir($filename);
			}
			rmdir($dirname); // Now remove folder
		}
		
		//buat folder view baru
		mkdir($path_view.'/'.$folder_view, 0755, TRUE);
		
		//delete grup berdasarkan kode grup
		$this->m_admin->hapus_grup_integrasi($kode_grup);
		
		//upgrade tabel grup
		$nama_grup_fix=str_replace(" ","-",ucwords(strtolower($new_nama_grup)));
		$this->m_admin->tambah_grup($nama_grup_fix);
		
		//ambil kode grup baru
		$new_kode_grup = $this->m_admin->get_kode_grup($nama_grup_fix)->row(0,'array');
			
		//upgrade tabel integrasi
		$nama_aplikasi = $this->input->post('nama_aplikasi');
		$deskripsi_aplikasi = $this->input->post('deskripsi_aplikasi');
		$modified_name = $this->session->userdata('username');
		date_default_timezone_set('Asia/Jakarta');
		$modified_date = date("Y-m-d H:i:s");
		$data = array(
			'nama_aplikasi' => $nama_aplikasi,
			'deskripsi_aplikasi' => $deskripsi_aplikasi,
			'kode_grup' => $new_kode_grup['kode_group'],
			'modified_name' => $modified_name,
			'modified_date' => $modified_date
		);
		$this->m_admin->edit_integrasi($id_integrasi, $data);
			
		//ambil id_integrasi baru
		$new_id_integrasi = $this->m_admin->get_id_integrasi($nama_aplikasi)->row(0,'array');
		
		//delete grup_user berdasarkan kode grup
		$this->m_admin->hapus_grup_user_integrasi($kode_grup);
		
		//upgrade tabel grup_user
		$username=$this->input->post('username');
		foreach($username as $index=>$username_yes) {
			$this->m_admin->tambah_grup_user($username_yes, $new_kode_grup['kode_group']);
		}
		
		//delete grup_modul berdasarkan kode grup
		$this->m_admin->hapus_grup_modul($kode_grup);
		
		//upgrade tabel modul
		$nama_modul=$this->input->post('nama_modul');
		$kode_modul= array();
		foreach($nama_modul as $index=>$nama_modul_yes) {
			$nama_modul_fix=str_replace(" ","_",strtolower($nama_modul_yes));
			$link=str_replace(" ","_",strtolower($nama_grup))."/".$nama_modul_fix;
			$cek=$this->m_admin->tambah_modul(strtolower($nama_modul_yes), $link);
			$kode_modul[]=$this->m_admin->get_kode_modul(strtolower($nama_modul_yes))->row(0,'array');
		}
		
		//upgrade tabel grup_modul
		$nama_modul = $this->input->post('nama_modul');
		foreach($kode_modul as $index=>$kode_modul_yes) {
			$this->m_admin->tambah_otoritas($new_kode_grup['kode_group'], $kode_modul_yes['kode_modul']);
		}
		
		//delete tabel aplikasi
		$this->m_admin->hapus_aplikasi($id_integrasi);
			
		//jika controller
		$path_controller=site_url().'application/controllers/';
		$number_of_controller_uploaded = count($_FILES['controller']['name']);
		for ($i = 0; $i < $number_of_controller_uploaded; $i++) :
			$_FILES['controller[]']['name']     = $_FILES['controller']['name'][$i];
			$_FILES['controller[]']['type']     = $_FILES['controller']['type'][$i];
			$_FILES['controller[]']['tmp_name'] = $_FILES['controller']['tmp_name'][$i];
			$_FILES['controller[]']['error']    = $_FILES['controller']['error'][$i];
			$_FILES['controller[]']['size']     = $_FILES['controller']['size'][$i];
			
			$config = array(
				'upload_path' => realpath(FCPATH . 'application/controllers'),
				'overwrite' => TRUE,
				'allowed_types' => 'php|html'
			);
			
			$this->upload->initialize($config);
			$controller = site_url().'application/controllers/'.$_FILES['controller[]']['name'];
			
			if(!$this->upload->do_upload('controller[]')){
				$data = array('error' => $this->upload->display_errors());
			}else{
				$data = array('upload_data' => $this->upload->data());
			}
			
			$data_controller = array(
				'file_aplikasi' => $controller,
				'keterangan' => 1,
				'id_integrasi' => $new_id_integrasi['id_integrasi']
			);
			$this->m_admin->tambah_aplikasi($data_controller);
		endfor;
		
		//jika models
		$path_models=site_url().'application/models/';
		$number_of_models_uploaded = count($_FILES['model']['name']);
		for ($i = 0; $i < $number_of_models_uploaded; $i++) :
			$_FILES['model[]']['name']     = $_FILES['model']['name'][$i];
			$_FILES['model[]']['type']     = $_FILES['model']['type'][$i];
			$_FILES['model[]']['tmp_name'] = $_FILES['model']['tmp_name'][$i];
			$_FILES['model[]']['error']    = $_FILES['model']['error'][$i];
			$_FILES['model[]']['size']     = $_FILES['model']['size'][$i];
			
			$config = array(
				'upload_path' => realpath(FCPATH . 'application/models'),
				'overwrite' => TRUE,
				'allowed_types' => 'php|html'
			);

			$this->upload->initialize($config);
			$model = site_url().'application/models/'.$_FILES['model[]']['name'];
			
			if(!$this->upload->do_upload('model[]')){
				$data = array('error' => $this->upload->display_errors());
			}else{
				$data = array('upload_data' => $this->upload->data());
			}
			$data_model = array(
				'file_aplikasi' => $model,
				'keterangan' => 2,
				'id_integrasi' => $new_id_integrasi['id_integrasi']
			);
			$this->m_admin->tambah_aplikasi($data_model);
		endfor;
		
		//jika views
		//upload file aplikasi
		$number_of_views_uploaded = count($_FILES['view']['name']);
		for ($i = 0; $i < $number_of_views_uploaded; $i++) :
			$_FILES['view[]']['name']     = $_FILES['view']['name'][$i];
			$_FILES['view[]']['type']     = $_FILES['view']['type'][$i];
			$_FILES['view[]']['tmp_name'] = $_FILES['view']['tmp_name'][$i];
			$_FILES['view[]']['error']    = $_FILES['view']['error'][$i];
			$_FILES['view[]']['size']     = $_FILES['view']['size'][$i];

			$config = array(
				'upload_path' => $path_view.'/'.$folder_view,
				'overwrite' => TRUE,
				'allowed_types' => 'php|html'
			);

			$this->upload->initialize($config);
			$view = site_url().'application/views/'.$folder_view.'/'.$_FILES['view[]']['name'];
		
			if(!$this->upload->do_upload('view[]')){
				$data = array('error' => $this->upload->display_errors());
			}else{
				$data = array('upload_data' => $this->upload->data());
			}
			
			$data_view = array(
				'file_aplikasi' => $view,
				'keterangan' => 3,
				'id_integrasi' => $new_id_integrasi['id_integrasi']
			);
			$this->m_admin->tambah_aplikasi($data_view);
		endfor;	
		
		//pengecekan
		$cek=$this->m_admin->cek_integrasi($new_id_integrasi['id_integrasi']);
		if ($cek->num_rows()>0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Upgrade Integrasi Aplikasi Berhasil</div>');
			echo "<div class='loader'></div>";
			echo "<script>if(confirm('Upgrade Integrasi Aplikasi Berhasil. Apakah Anda ingin logout aplikasi?')){
				window.location.href='http://localhost/arrafi/c_login/doLogout';
			}else{
				window.location.href='http://localhost/arrafi/admin/kelola_integrasi';
			}</script>";
		}
		else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Upgrade Integrasi Aplikasi </div>');
			echo "<script>window.location.href='http://localhost/arrafi/admin/kelola_integrasi'</script>";
		}
	}
	
	function edit_integrasi(){
		$id_integrasi = $this->uri->segment(3);
		$kode_grup = $this->uri->segment(4);
		$list_integrasi = $this->m_admin->get_integrasi($id_integrasi);
		$data_integrasi =$list_integrasi->row(0,'array');
		$data = array(
			'list_menu'=>$this->m_login->tampil_menu(),
			'list_online'=>$this->m_login->tampil_online(),
			'list_grup'=>$this->m_admin->tampil_grup(),
			'nama_aplikasi'=>$data_integrasi['nama_aplikasi'],
			'deskripsi_aplikasi'=> $data_integrasi['deskripsi_aplikasi'],
			'list_user'=>$this->m_admin->tampil_semua_user(),
			'kode_grup' => $kode_grup,
			'id_integrasi' => $id_integrasi,
			'list_user_integrasi'=>$this->m_admin->get_username_integrasi($kode_grup)->result(),
			'nama_grup' => $data_integrasi['nama_group'],
			'list_modul_integrasi'=>$this->m_admin->get_modul_integrasi($kode_grup)->result(),
			'konten' =>"admin/edit_integrasi"
		);
		$this->load->view('template_integrasi',$data);
	}
	
	function simpan_edit_integrasi(){
		$id_integrasi = $this->uri->segment(3);
		$kode_grup = $this->uri->segment(4);
		
		//nama grup
		$nama_grup= $this->m_admin->get_nama_grup($kode_grup)->row(0,'array');
				
		//delete grup berdasarkan kode grup
		$this->m_admin->hapus_grup_integrasi($kode_grup);
		
		//edit tabel grup
		$nama_grup_fix=str_replace(" ","-",ucwords(strtolower($nama_grup['nama_group'])));
		$this->m_admin->tambah_grup($nama_grup_fix);
		
		//ambil kode grup baru
		$new_kode_grup = $this->m_admin->get_kode_grup($nama_grup_fix)->row(0,'array');
		
		//edit tabel integrasi
		$nama_aplikasi = $this->input->post('nama_aplikasi');
		$deskripsi_aplikasi = $this->input->post('deskripsi_aplikasi');
		$modified_name = $this->session->userdata('username');
		date_default_timezone_set('Asia/Jakarta');
		$modified_date = date("Y-m-d H:i:s");
		$data = array(
			'nama_aplikasi' => $nama_aplikasi,
			'deskripsi_aplikasi' => $deskripsi_aplikasi,
			'kode_grup' => $new_kode_grup['kode_group'],
			'modified_name' => $modified_name,
			'modified_date' => $modified_date
		);
		$this->m_admin->edit_integrasi($id_integrasi, $data);
		
		//ambil id_integrasi baru
		$new_id_integrasi = $this->m_admin->get_id_integrasi($nama_aplikasi)->row(0,'array');
		
		//delete grup_user berdasarkan kode grup
		$this->m_admin->hapus_grup_user_integrasi($new_kode_grup['kode_group']);
		
		//edit tabel grup_user
		$username=$this->input->post('username');
		foreach($username as $index=>$username_yes) {
			$this->m_admin->tambah_grup_user($username_yes, $kode_grup);
		}
		
		//delete grup_modul berdasarkan kode grup
		$this->m_admin->hapus_grup_modul($new_kode_grup['kode_group']);
		
		//edit tabel modul
		$nama_modul=$this->input->post('nama_modul');
		$kode_modul= array();
		foreach($nama_modul as $index=>$nama_modul_yes) {
			$nama_modul_fix=str_replace(" ","_",strtolower($nama_modul_yes));
			$link=str_replace(" ","_",strtolower($nama_grup_fix))."/".$nama_modul_fix;
			$cek=$this->m_admin->tambah_modul(strtolower($nama_modul_yes), $link);
			$kode_modul[]=$this->m_admin->get_kode_modul(strtolower($nama_modul_yes))->row(0,'array');
		}
		
		//edit tabel grup_modul
		$nama_modul = $this->input->post('nama_modul');
		foreach($kode_modul as $index=>$kode_modul_yes) {
			$this->m_admin->tambah_otoritas($new_kode_grup['kode_group'], $kode_modul_yes['kode_modul']);
		}
		
		//edit tabel aplikasi
		$data = array(
			'id_integrasi' => $new_id_integrasi['id_integrasi']
		);
		$this->m_admin->edit_aplikasi($id_integrasi,$data);
		
		//pengecekan
		$cek=$this->m_admin->cek_integrasi($new_id_integrasi['id_integrasi']);
		if ($cek->num_rows()>0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Edit Integrasi Aplikasi Berhasil</div>');
			echo "<div class='loader'></div>";
			echo "<script>window.location.href='http://localhost/arrafi/admin/kelola_integrasi'</script>";
		}
		else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Integrasi Aplikasi </div>');
			echo "<script>window.location.href='http://localhost/arrafi/admin/kelola_integrasi'</script>";
		}
	}
	
	function ajax_lihat_integrasi(){
		$kode_grup = $_POST['kode_grup'];
		$hasil1 = $this->m_admin->get_modul_integrasi2($kode_grup);
		$nama_modul ='';
		foreach ($hasil1 as $value) {
			foreach ($value as $value1) {
				$nama_modul .= $value1 . ', ';
			}
		}
		
		$nama_modul = substr($nama_modul, 0, -2);
		
		header('Content-Type: application/x-json; charset=utf-8');
		echo($nama_modul);
	}
	
	function ajax_lihat_integrasi2(){
		$kode_grup = $_POST['kode_grup'];		
		$hasil2 = $this->m_admin->get_username_integrasi2($kode_grup);
		$username ='';
		foreach ($hasil2 as $value) {
			foreach ($value as $value1) {
				$username .= $value1 . ', ';
			}
		}
		$username = substr($username, 0, -2);
		header('Content-Type: application/x-json; charset=utf-8');
		echo($username);
	}
	
}