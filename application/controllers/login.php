<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_login','',TRUE);
		$this->load->model('m_admin','',TRUE);
        $this->load->helper(array('url','form','cookie'));
        $this->load->library(array('session','email'));
		//$this->is_logged_in();
		//$this->load->library('form_validation');
    }
	
	public function cek_login()
	{
		$username = $this->input->post('username');
       	$password = $this->input->post('password');
		$user = $this->m_login->cek_user($username);
		$aktif = $this->m_login->cek_aktif($username);
		$hasil = $this->m_login->get_login($username, $password);
		
		if(($user == true && $aktif == false) && $hasil == true){
			$data = array(
				'berhasil' =>true,
				'username'=>$hasil->username,
				'status_user'=>$hasil->status_user,
				'kode_group'=>$hasil->kode_group,
				'no_pendaftaran'=>$hasil->no_pendaftaran,
				'no_hp' => $hasil->no_hp,
				'email' => $hasil->email,
				'nama_group' => $hasil->nama_group
			);
			$this->session->set_userdata($data);
			$this->session->userdata($data);
			$this->m_login->get_online($username);
			redirect('c_home/beranda');
		}else if($user == false){
			$this->session->set_flashdata('user', '<style type="text/css">
													p {color : red}
													</style>
													<center><p>Username Tidak Ada</p></center>');
			redirect('c_home/home');
		}else if($user == true && $aktif == true){
			$this->session->set_flashdata('nonaktif', '<style type="text/css">
													p {color : red}
													</style>
													<center><p>Akun Harus Aktif</p></center>');
			redirect('c_home/home');
		}else{
			$this->session->set_flashdata('gagal', '<style type="text/css">
													p {color : red}
													</style>
													<center><p>Password Salah</p></center>');
			redirect('c_home/home');
		}
	}

    function doLogout() {
		$username = $this->session->userdata('username');
		$this->m_login->last_login($username);
		$this->m_login->hapus_online($username);
        $this->session->sess_destroy();
        redirect('c_home/home');
    }
	
	public function aktif_user($user, $pass1){
        $result = $this->m_login->aktivasi_user($user, $pass1);
        if ($result > 0) {
            $this->session->set_flashdata('pesan','<style type="text/css">
													p {color : green}
													</style>
													<center><p>Proses Reset Password Berhasil. <br>Masukkan Username dan Password Baru Anda.</p></center>');
            redirect('c_home/home');
        } else {
            $this->session->set_flashdata('pesan','<style type="text/css">
													p {color : green}
													</style>
													<center><p>Maaf, Proses Reset Password Gagal.</p></center>');
			redirect('c_home/home');
        }
    }
	
	public function ubah_user()
	{
		$user = $this->input->post('username');
        $email = $this->input->post('email');
		$pass1 = $this->input->post('password1');
		$cek1=$this->m_admin->cek_username();
		$cek2=$this->m_admin->cek_email();
		$cek3=$this->m_login->cek_user_email($user, $email);
		$aktif = $this->m_login->cek_aktif($user);
		if (($cek1->num_rows() == 0 && $cek2->num_rows() == 1) && $cek3 == false){
			$this->session->set_flashdata('user1', '<style type="text/css">
													p {color : red}
													</style>
													<center><p>Username Tidak Ada</p></center>');
			redirect('c_home/reset');
		}
		else if (($cek1->num_rows() == 0 && $cek2->num_rows() == 0) && $cek3 == false){
			$this->session->set_flashdata('user2', '<style type="text/css">
													p {color : red}
													</style>
													<center><p>Username dan Email Tidak Ada</p></center>');
			redirect('c_home/reset');
		}
		else if ($aktif == true){
			$this->session->set_flashdata('aktif', '<style type="text/css">
													p {color : red}
													</style>
													<center><p>Akun Tidak Aktif</p></center>');
			redirect('c_home/reset');
		}
		else if ($cek2->num_rows() == 0 && $cek3 == false){
			$this->session->set_flashdata('email1', '<style type="text/css">
													p {color : red}
													</style>
													<center><p>Email Tidak Ada</p></center>');
			redirect('c_home/reset');
		}
		else if ($cek3 == false){
			$this->session->set_flashdata('email2', '<style type="text/css">
													p {color : red}
													</style>
													<center><p>Username dan Email Tidak Cocok</p></center>');
			redirect('c_home/reset');
		}
		else{
            $from_email = 'arrafielementary@gmail.com';
            $subject = 'Reset Password Akun';
            $message = 'Yth. '.$user.',<br /><br /> Reset password oleh username: <b>'.$user.'</b> dengan password: <b>'.$user.'</b> telah dilakukan. 
						<br>Silahkan klik link berikut ini untuk mengaktifkan kembali akun anda.
						<br /><br /> http://localhost/arrafi/c_login/aktif_user/'.$user.'/'.$pass1.'<br /><br /><br /> Terima kasih.
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
                $this->m_login->reset_user($user, $pass1);
				$this->m_login->reset_pass_history($user);
				$this->session->set_flashdata('pesan', '<style type="text/css">
													p {color : green}
													</style>
													<center><p>Password Berhasil Direset. 
													<br>Silahkan Cek Email Anda untuk Mengaktifkan Akun.</p></center>');
				redirect('c_home/home');
            }
			else{
				$this->session->set_flashdata('pesan', '<style type="text/css">
													p {color : red}
													</style>
													<center><p>Periksa Koneksi Internet Anda</p></center>');
				redirect('c_home/reset');
			}
		}
	}
	
	public function daftar_user($user, $pass){
        $result = $this->m_login->aktivasi_user($user, $pass);
        if ($result > 0) {
            $this->session->set_flashdata('pesan','<style type="text/css">
													p {color : green}
													</style>
													<center><p>Selamat Akun Berhasil Dibuat. <br> Silahkan Masukkan Username dan Password Anda.</p></center>');
            redirect('c_home/home');
        } else {
            $this->session->set_flashdata('pesan','<style type="text/css">
													p {color : green}
													</style>
													<center><p>Maaf, Proses Pembuatan Akun Gagal.</p></center>');
			redirect('c_home/home');
        }
    }
	
	public function ganti_user($user, $pass1){
        $result = $this->m_login->aktivasi_user($user, $pass1);
        if ($result > 0) {
            $this->session->set_flashdata('pesan','<style type="text/css">
													p {color : green}
													</style>
													<center><p>Password Berhasil Diubah. <br>Masukkan Username dan Password Baru Anda.</p></center>');
            redirect('c_home/home');
        } else {
            $this->session->set_flashdata('pesan','<style type="text/css">
													p {color : green}
													</style>
													<center><p>Maaf, Proses Ubah Password Gagal.</p></center>');
			redirect('c_home/home');
        }
    }
}
?>