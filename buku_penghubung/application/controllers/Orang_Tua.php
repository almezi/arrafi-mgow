<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Orang_Tua extends CI_Controller  {
	function __construct(){
		parent::__construct();
		$this->load->model('Orang_Tua_model');
		//constructor yang dipanggil ketika memanggil Guru.php untuk melakukan pemanggilan pada model : Gurus_model.php yang ada di folder models
	}

	public function index()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListKegiatan']=$this->Orang_Tua_model->getAllKegiatan_Ortu();
		$this->load->view('O_Kegiatan',$data);
	}
	
	//Notif
	public function NotifOrangTua()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$this->load->view('Notifikasi/Notifikasi_OrangTua',$data);
	}
	
	public function NotifKegiatan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$this->load->view('Notifikasi/O_NotifKegiatan',$data);
	}
	
	public function RefreshKegiatan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		
		$data['ListKegiatan']=$this->Orang_Tua_model->getAllKegiatan_Ortu();
		$this->load->view('Pesan/AutoW_Pesan_Masuk',$data);
	}
	
	public function NotifInformasi()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$this->load->view('Notifikasi/O_NotifInformasi',$data);
	}
	
	public function NotifPesan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$this->load->view('Notifikasi/O_NotifPesan',$data);
	}
	
	public function NotifSaran()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$this->load->view('Notifikasi/O_NotifSaran',$data);
	}
	
	//Kegiatan
	public function homeKegiatan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListKegiatan']=$this->Orang_Tua_model->getAllKegiatan_Ortu();
		$this->load->view('O_Kegiatan',$data);
	}

	public function viewKegiatan()
	{
		//Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_Guru_view
		//$data['ListKegiatan'] = $this->Guru_model->getLihatKegiatan();
		$NISN=$this->uri->segment(3);
		$tanggal=$this->uri->segment(4);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$this->Orang_Tua_model->Ubahnotifikasi_KOrtu($NISN,$tanggal);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListNama']=$this->Orang_Tua_model->getAllKegiatan_Nama($NISN,$tanggal);
		$data['ListKegiatan2']=$this->Orang_Tua_model->getAllKegiatan_Ortu2($NISN,$tanggal);
		$this->load->view('O_Lihat_Kegiatan',$data);
	}
	
	
	
	//Pesan
	public function homePesan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListPesan']=$this->Orang_Tua_model->getAllPesan_Ortu();
		$this->load->view('O_Pesan',$data);
	}
	
	public function viewPesanMasuk()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListPesan']=$this->Orang_Tua_model->getAllPesan_Ortu();
		$this->load->view('O_Pesan',$data);
	}
	
	public function BalasPesan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$id=$this->uri->segment(3);
		$tanggal=$this->uri->segment(4);
		$nomor=$this->uri->segment(5);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['cekPesan']=$this->Orang_Tua_model->cek_Pesan($nomor);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListPesanWali']=$this->Orang_Tua_model->getAllPesan_Wali($id,$tanggal);
		$this->load->view('O_Pesan_Before',$data);
	}
	
	public function addPesan2()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$id=$this->uri->segment(3);
		$tanggal=$this->uri->segment(4);
		$nip=$this->uri->segment(5);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$this->Orang_Tua_model->Ubahnotifikasi_POrtu($id,$nip);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListPesanWali']=$this->Orang_Tua_model->getAllPesan_Wali2($id,$tanggal);
		$this->load->view('O_Pesan_After',$data);
	}
	
	public function addPesan(){
		$isi=$this->input->post('isi_pesan');
		$nis=$this->input->post('nis');
		$nomor=$this->input->post('nomor');
		$kosong="<p><br></p>";
		$c = $this->db->query("SELECT tanggal_pesan tanggal FROM pesan where nomor=$nomor order by nomor asc limit 1")->row_array();
		$tanggal = $c['tanggal'];
		if ($isi == $kosong || $isi == NULL){
					$this->session->set_flashdata('Kosong', 'This Value required');
					redirect('Orang_Tua/addPesan2/'.$nomor.'/'.$tanggal.'/'.$nis.'');
			}
		$this->Orang_Tua_model->UbahStatusPesan();
		$this->Orang_Tua_model->insertPesan_Ortu();
		redirect('Orang_Tua/viewPesanTerkirim');
	}
	
	public function viewPesanTerkirim()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListPesanTerkirim']=$this->Orang_Tua_model->getAllPesanTerkirim_Ortu();
		$this->load->view('O_Pesan_Terkirim',$data);
	}
	
	public function viewPesanHistory(){
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$nomor=$this->uri->segment(3);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListPesanHistory_Ortu']=$this->Orang_Tua_model->getAllPesanHistory_Ortu($nomor);
		$this->load->view('O_History_Pesan',$data);
	}
	
	public function editPesan()
	{
		//Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_Guru_view
		$id=$this->uri->segment(3);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListDataPesan']=$this->Orang_Tua_model->getDataPesan($id);
		$this->load->view('O_Edit_Pesan',$data);
	}
	
	public function updatePesan(){
		$id=$this->input->post('id_p');
		$isi=$this->input->post('isi_p');
		$kosong="<p><br></p>";
		if ($isi == $kosong || $isi == NULL){
					$this->session->set_flashdata('Kosong', 'This Value required');
					redirect('Orang_Tua/editPesan/'.$id.'');
			}
		$this->Orang_Tua_model->updatePesan_Ortu();
		redirect('Orang_Tua/viewPesanTerkirim');
	}
	
	public function hapusPesan(){
		$id=$this->uri->segment(3);
		$this->Orang_Tua_model->hapusPesan_Ortu($id);
		redirect('Orang_Tua/viewPesanTerkirim');
	}
	
	//Informasi
	public function homeInformasi()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$nip=$this->uri->segment(3);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListInformasi']=$this->Orang_Tua_model->getInformasi_Ortu($nip);
		$this->load->view('O_Informasi',$data);
	}
	
	public function viewInformasi()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		//$id=$this->uri->segment(3);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['detail']=$this->Orang_Tua_model->detail();
		$data['ListInformasi']=$this->Orang_Tua_model->getInformasi_Ortu();
		$this->load->view('O_Informasi',$data);
	}
	
	public function readInformasi()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$id=$this->uri->segment(3);
		$nip=$this->uri->segment(4);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['cekInformasi']=$this->Orang_Tua_model->cek_Informasi($id);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListInformasi']=$this->Orang_Tua_model->getInformasi_Ortu2($id,$nip);
		$this->load->view('O_Baca_Sebelum',$data);
	}
	
	public function readInformasi2()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$id=$this->uri->segment(3);
		$nomor=$this->uri->segment(4);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$this->Orang_Tua_model->Ubahnotifikasi_IOrtu($id,$nomor);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListInformasiDetail']=$this->Orang_Tua_model->getInformasiDetail_Ortu($id);
		$this->load->view('O_Baca_Sesudah',$data);
	}
	
	
	
	//Saran
	public function homeSaran()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		//$nip=$this->uri->segment(3);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListWali']=$this->Orang_Tua_model->getAll_Wali();
		$this->load->view('O_Lihat_Saran',$data);
	}
	
	public function Buatpembahasan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$nip=$this->uri->segment(3);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$ambil_nip = $this->Orang_Tua_model->ambil_nip($nip);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'nip' => $ambil_nip
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListWali']=$this->Orang_Tua_model->getAll_Wali();
		$data['listOrangtua2'] = $this->Orang_Tua_model->getAllOrangtua2($nip);
		$this->load->view('O_BuatPembahasan',$data);
	}
	
	public function Lihatpembahasan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$nip=$this->uri->segment(3);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$ambil_nip = $this->Orang_Tua_model->ambil_nip($nip);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'nip' => $ambil_nip
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['listpembahasan'] = $this->Orang_Tua_model->getAllTanggapan_Ortu($nip);
		$this->load->view('O_Lihat_Pembahasan',$data);
	}
	
	public function LihatSaran()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		//$nip=$this->uri->segment(3);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		//$this->Orang_Tua_model->Ubahnotifikasi_ROrtu();
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['ListWali']=$this->Orang_Tua_model->getAll_Wali();
		$this->load->view('Saran/LihatSaran_OrangTua',$data);
	}
	
	public function BuatSaran()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$nip=$this->uri->segment(3);
		$id_pembahasan=$this->uri->segment(4);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$ambil_nip = $this->Orang_Tua_model->ambil_nip($nip);
		$ambil_bahas = $this->Orang_Tua_model->ambil_bahas($nip,$id_pembahasan);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'nip' => $ambil_nip,
			'bahas' => $ambil_bahas
		);
		$this->Orang_Tua_model->Ubahnotifikasi_ROrtu($nip,$id_pembahasan);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['JumlahOrtu'] = $this->Orang_Tua_model->getJumlahOrangtua2($nip);
		$data['listTanggal'] = $this->Orang_Tua_model->getAllTanggal_Ortu($nip,$id_pembahasan);
		$data['listOrangtua2'] = $this->Orang_Tua_model->getAllOrangtua2($nip);
		$this->load->view('O_Saran',$data);
	}
	
	/*public function Saran()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$nip=$this->uri->segment(3);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$ambil_nip = $this->Orang_Tua_model->ambil_nip($nip);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'nip' => $ambil_nip
		);
		$this->Orang_Tua_model->Ubahnotifikasi_ROrtu($nip);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['JumlahOrtu'] = $this->Orang_Tua_model->getJumlahOrangtua2($nip);
		$data['listTanggal'] = $this->Orang_Tua_model->getAllTanggal_Ortu($nip);
		$data['listOrangtua2'] = $this->Orang_Tua_model->getAllOrangtua2($nip);
		$this->load->view('O_Saran',$data);
	}*/
	
	public function Isi_Saran()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$nip=$this->uri->segment(3);
		$id_pembahasan=$this->uri->segment(4);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$ambil_nip = $this->Orang_Tua_model->ambil_nip($nip);
		$ambil_bahas = $this->Orang_Tua_model->ambil_bahas($nip,$id_pembahasan);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'nip' => $ambil_nip,
			'bahas' => $ambil_bahas
		);
		$this->Orang_Tua_model->Ubahnotifikasi_ROrtu($nip,$id_pembahasan);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['JumlahOrtu'] = $this->Orang_Tua_model->getJumlahOrangtua2($nip);
		$data['listTanggal'] = $this->Orang_Tua_model->getAllTanggal_Ortu($nip,$id_pembahasan);
		$data['listOrangtua2'] = $this->Orang_Tua_model->getAllOrangtua2($nip);
		$this->load->view('Saran/Saran_OrangTua',$data);
	}
	
	public function addSaran(){
		$nip=$this->uri->segment(3);
		$id_pembahasan=$this->uri->segment(4);
		$this->Orang_Tua_model->insertRespon_Ortu2();
		$this->Orang_Tua_model->insertDetailRespon_Ortu();
		redirect('Orang_Tua/BuatSaran/'.$nip.'/'.$id_pembahasan.'','refresh');
	}
	
	public function addpembahasan(){
		$nip=$this->uri->segment(3);
		$pembahasan=$_POST['pembahasan'];
		$isi=$_POST['isi_res'];
		
		$b = $this->db->query("SELECT id_pembahasan id_p FROM respon join pembahasan using(id_pembahasan) where nama_pembahasan='$pembahasan' and nip='$nip' order by id_respon asc limit 1")->row_array();
		$id_pembahasan = $b['id_p'];
		
		$c = $this->db->query("SELECT id_pembahasan id FROM respon join pembahasan using(id_pembahasan) where nama_pembahasan='$pembahasan' and nip='$nip' order by id_respon asc limit 1")->num_rows();
				
		if($c == 1 ) {
			$this->session->set_flashdata('pembahasan',$pembahasan);
			$this->session->set_flashdata('isi',$isi);
			$this->session->set_flashdata('message', 'Sudah Dibahas Pada Grup Wali Kelas Ini');
			redirect('Orang_Tua/BuatSaran/'.$nip.'/'.$id_pembahasan.'');
		}
		$this->Orang_Tua_model->insertPembahasan();
		$this->Orang_Tua_model->insertRespon_Ortu();
		$this->Orang_Tua_model->insertDetailRespon_Ortu();
		redirect('Orang_Tua/Lihatpembahasan/'.$nip.'','refresh');
	}
	
	public function editSaran(){
		$nomor=$this->uri->segment(3);
		$nip=$this->uri->segment(4);
		$id_pembahasan=$this->uri->segment(5);
		$ambil_akun1 = $this->Orang_Tua_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Orang_Tua_model->ambil_status($this->session->userdata('kode'));
		$ambil_nip = $this->Orang_Tua_model->ambil_nip($nip);
		$ambil_bahas = $this->Orang_Tua_model->ambil_bahas($nip,$id_pembahasan);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'nip' => $ambil_nip,
			'bahas' => $ambil_bahas
		);
		$data['notifRespon']=$this->Orang_Tua_model->notifRespon_Ortu();
		$data['LihatNotifRespon']=$this->Orang_Tua_model->LihatNotifRespon_Ortu();
		$data['notifInformasi']=$this->Orang_Tua_model->notifInformasi_Ortu();
		$data['ListNotifInformasi']=$this->Orang_Tua_model->ListNotifInformasi_Ortu();
		$data['notifPesan']=$this->Orang_Tua_model->notifPesan_Ortu();
		$data['ListNotifPesan']=$this->Orang_Tua_model->ListNotifPesan_Ortu();
		$data['notifKegiatan']=$this->Orang_Tua_model->notifKegiatan_Ortu();
		$data['ListNotifKegiatan']=$this->Orang_Tua_model->ListNotifKegiatan_Ortu();
		$data['ListTanggapanWali']=$this->Orang_Tua_model->getAllTanggapan_Wali();
		$data['JumlahOrtu'] = $this->Orang_Tua_model->getJumlahOrangtua2($nip);
		$data['listTanggal'] = $this->Orang_Tua_model->getAllTanggal_Ortu($nip,$id_pembahasan);
		$data['listDataRespon']=$this->Orang_Tua_model->ambil_dataRespon($nomor);
		$this->load->view('O_Edit_saran',$data);
	}
	
	public function UpdateRespon(){
					$nip_guru=$this->uri->segment(3);
					$bahas=$this->uri->segment(4);
					$this->Orang_Tua_model->ubahRespon();
					redirect('Orang_Tua/BuatSaran/'.$nip_guru.'/'.$bahas.'');
			
	}
	
	public function UpdatePembahasan(){
					$nip_guru=$this->uri->segment(3);
					$bahas=$this->uri->segment(4);
					$this->Orang_Tua_model->ubahpembahasan($nip_guru,$bahas);
					redirect('Orang_Tua/BuatSaran/'.$nip_guru.'/'.$bahas.'');
			
	}
	
	function hapusSaran(){
			$id=$this->uri->segment(3);
			$nip=$this->uri->segment(4);
			$bahas=$this->uri->segment(5);
			$this->Orang_Tua_model->hapusIdRespon($id);
			redirect('Orang_Tua/BuatSaran/'.$nip.'/'.$bahas.'');
		}
		
	function login(){
		$session = $this->session->userdata('isLogin');
		if($session == False){
			$this->load->view('A_Login');
		}else{
			redirect('Orang_Tua');
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('Login2','refresh');
	}
	
	public function addGuruDb()
	{
		//Function yang dipanggil ketika ingin memasukan produk ke dalam database
		$data = array(
				'NIK' => $this->input->post('NIK'),
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' => $this->input->post('alamat'),
				'no_telepon' => $this->input->post('no_telepon'),
				'email' => $this->input->post('email'),
				'status' => $this->input->post('status')
				);
		$this->Guru_model->addGuru($data); //passing variable $data ke Gurus_model

		redirect('Guru'); //redirect page ke halaman utama controller Gurus
		
		
	
	}
	
	public function addKegiatanDb()
	{
		//Function yang dipanggil ketika ingin memasukan produk ke dalam database
		$data = array(
				'id_kegiatan' => $this->input->get('id_kegiatan'),
				'NIK' => $this->input->get('NIK'),
				'tanggal_kegiatan' => $this->input->get('tanggal_kegiatan'),
				'kelas' => $this->input->get('kelas'),
				'nama_kegiatan' => $this->input->get('nama_kegiatan'),
				'status' => $this->input->get('status')
				);
		$this->Guru_model->addKegiatan($data); //passing variable $data ke Gurus_model

		redirect('Guru'/'addKegiatan'); //redirect page ke halaman utama controller Gurus
		
		$data1 = array(
				'id_kegiatan' => $this->input->get('id_kegiatan'),
				'NISN' => $this->input->get('NISN'),
				'tahun_ajaran' => $this->input->get('tanggal_kegiatan'),
				);
		$this->Guru_model->addKegiatan($data1); //passing variable $data ke Gurus_model

		redirect('Guru'/'addKegiatan'); //redirect page ke halaman utama controller Gurus
	
	}

	public function updateGuru()
	{
		//Function yang dipanggil ketika ingin melakukan update produk kemudian menampilkan update_Guru_view
	}

	public function updateGuruDb()
	{
		//Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
	}

	public function deleteGuruDb()
	{
		//Function yang dipanggil ketika ingin melakukan delete produk dari database
	}
}

/* Location: ./application/controllers/Gurus.php */