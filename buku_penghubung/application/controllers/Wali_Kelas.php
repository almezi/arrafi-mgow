<?php 
class Wali_Kelas extends CI_Controller  {
	function __construct(){
		parent::__construct();
		$this->load->model('Wali_Kelas_model');
		$this->load->library('session');
		//constructor yang dipanggil ketika memanggil Guru.php untuk melakukan pemanggilan pada model : Gurus_model.php yang ada di folder models
	}

	public function index()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_kelas = $this->Wali_Kelas_model->ambil_kelas($this->input->get('kelas'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'kls' => $ambil_kelas
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listKelas'] = $this->Wali_Kelas_model->getAllKelas();
		$data['listPelajaran'] = $this->Wali_Kelas_model->getAllPelajaran();
		$data['listMahasiswa'] = $this->Wali_Kelas_model->getAllMahasiswa();	
		$this->load->view('W_Buat_Kegiatan',$data);
	}
	
	public function NotifWaliKelas()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_kelas = $this->Wali_Kelas_model->ambil_kelas($this->input->get('kelas'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'kls' => $ambil_kelas
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();	
		$this->load->view('Notifikasi/Notifikasi_WaliKelas',$data);
	}
	
	public function NotifInformasi()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_kelas = $this->Wali_Kelas_model->ambil_kelas($this->input->get('kelas'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'kls' => $ambil_kelas
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();	
		$this->load->view('Notifikasi/W_NotifInformasi',$data);
	}
	
	public function NotifPesan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_kelas = $this->Wali_Kelas_model->ambil_kelas($this->input->get('kelas'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'kls' => $ambil_kelas
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();	
		$this->load->view('Notifikasi/W_NotifPesan',$data);
	}
	
	public function NotifSaran()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_kelas = $this->Wali_Kelas_model->ambil_kelas($this->input->get('kelas'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'kls' => $ambil_kelas
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();	
		$this->load->view('Notifikasi/W_NotifSaran',$data);
	}
	
	//Kegiatan
	public function homeKegiatan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_kelas = $this->Wali_Kelas_model->ambil_kelas($this->input->get('kelas'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'kls' => $ambil_kelas
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listKelas'] = $this->Wali_Kelas_model->getAllKelas();
		$data['listPelajaran'] = $this->Wali_Kelas_model->getAllPelajaran();
		$data['listMahasiswa'] = $this->Wali_Kelas_model->getAllMahasiswa();	
		$this->load->view('W_Buat_Kegiatan',$data);
	}

	public function addKegiatan()
	{
		//Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_Guru_view
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_kelas = $this->Wali_Kelas_model->ambil_kelas($this->input->get('kelas'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'kls' => $ambil_kelas
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listKelas'] = $this->Wali_Kelas_model->getAllKelas();
		$data['listPelajaran'] = $this->Wali_Kelas_model->getAllPelajaran();
		$data['listMahasiswa'] = $this->Wali_Kelas_model->getAllMahasiswa();	
		$this->load->view('W_Buat_Kegiatan',$data);	
	}
	
	public function tambahKegiatan(){
				$user= $this->session->userdata('uname');
				$b = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $b['NIP'];
				$kelas=$_POST['kkk'];
				$tgl = $this->input->post('tgl_kegiatan');
				$kegiatan = $this->input->post('kegiatan'); 
				$jumlah_id = $this->db->query("SELECT id_kegiatan id FROM kegiatan where NIP='$nomor' 
				and nama_kegiatan='$kegiatan' and tanggal_kegiatan like '%$tgl%' and kelas='$kelas'
				order by id_kegiatan desc limit 1")->num_rows();
				if($jumlah_id == 1 ) {
					$this->session->set_flashdata('kegiatan',$kegiatan);
					$this->session->set_flashdata('Kelas',$kelas);
					$this->session->set_flashdata('tanggal',$tgl);
					$this->session->set_flashdata('message', 'Sudah Ada');
					$this->session->set_flashdata('dan', 'Dan Tanggal');
					$this->session->set_flashdata('pada', 'Pada');
					redirect('Wali_Kelas/search?kelas='.$kelas.'');
				}else if($tgl > date('Y-m-d')) {
					$this->session->set_flashdata('Tgl', 'Tanggal Tidak Boleh Lebih Dari Tanggal Sekarang');
					redirect('Wali_Kelas/addKegiatan');
				}
				
				$this->Wali_Kelas_model->insertKegiatan();
				$this->Wali_Kelas_model->insertDetailKegiatan();
				echo"<script>alert('Berhasil Dimasukan')</script>";
				redirect('Wali_Kelas/viewKegiatan');
				
	}
					
	
	
	public function search()
	{
		//Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_Guru_view
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_kelas = $this->Wali_Kelas_model->ambil_kelas($this->input->get('kelas'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'kls' => $ambil_kelas
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listKelas'] = $this->Wali_Kelas_model->getAllKelas();
		$data['listPelajaran'] = $this->Wali_Kelas_model->getAllPelajaran();
		$data['listMahasiswa'] = $this->Wali_Kelas_model->getAllMahasiswa();
		$this->load->view('W_Buat_Kegiatan',$data);
		
	}
	
	
	/*public function search_Personal()
	{
		//Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_Guru_view
		$ambil_akun = $this->Wali_Kelas_model->ambil_user_W($this->session->userdata('uname'));
		$ambil_kelas = $this->Wali_Kelas_model->ambil_kelas($this->input->get('kelas'));
		$data = array(
			'user' => $ambil_akun,
			'kls' => $ambil_kelas
		);
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listKelas'] = $this->Wali_Kelas_model->getAllKelas();
		$data['listPelajaran'] = $this->Wali_Kelas_model->getAllPelajaran();
		$data['listMahasiswa'] = $this->Wali_Kelas_model->getAllMahasiswa();
		$this->load->view('W_Kegiatan_Personal',$data);
		
	}*/
	
	/*public function addKegiatanPersonal(){
				$this->Wali_Kelas_model->insertKegiatanPersonal();
				$this->Wali_Kelas_model->insertDetailKegiatanPersonal();
				redirect('Wali_Kelas/viewKegiatan');	
			
	}*/
	

	public function viewKegiatan()
	{
		//Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_Guru_view
		//$data['ListKegiatan'] = $this->Guru_model->getLihatKegiatan();
			
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_kelas = $this->Wali_Kelas_model->ambil_kelas($this->input->get('kelas'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'kls' => $ambil_kelas
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listKegiatan'] = $this->Wali_Kelas_model->getAllKegiatan();
		$this->load->view('W_Lihat_Kegiatan',$data);
	}
	
	
	public function viewKegiatan2()
	{
		//Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_Guru_view
		//$data['ListKegiatan'] = $this->Guru_model->getLihatKegiatan();
		//$tanggal=$this->uri->segment(3);
		//$kelas=$this->uri->segment(4);
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listKegiatan2'] = $this->Wali_Kelas_model->getAllKegiatan2();
		$this->load->view('W_Lihat_Kegiatan2',$data);
	}
	
	function get_dataKegiatan(){
	
			$id=$this->uri->segment(3);
			$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
			$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
			$ambil_kelas = $this->Wali_Kelas_model->ambil_kelas($this->input->get('kelas'));
			$ambil_kegiatan = $this->Wali_Kelas_model->ambil_kegiatan($id);
			$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'kls' => $ambil_kelas,
			'kegiatan' => $ambil_kegiatan
			);
			$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
			$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
			$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
			$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
			$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
			$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
			$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
			$data['listPelajaran'] = $this->Wali_Kelas_model->getAllPelajaran();
			$data['listKelas'] = $this->Wali_Kelas_model->getAllKelas();
			$data['listKegiatan3']=$this->Wali_Kelas_model->ambil_dataKegiatan($id);
			$this->load->view('W_Edit_Kegiatan',$data);
		}
	
	public function search2()
	{
		//Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_Guru_view
		//$id=$this->input->get('id');
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_kelas = $this->Wali_Kelas_model->ambil_kelas($this->input->get('kelas'));
		$ambil_kegiatan = $this->Wali_Kelas_model->ambil_kegiatan($this->input->get('id'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'kls' => $ambil_kelas,
			'kegiatan' => $ambil_kegiatan
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listKelas'] = $this->Wali_Kelas_model->getAllKelas();
		$data['listPelajaran'] = $this->Wali_Kelas_model->getAllPelajaran();
		$data['listMahasiswa'] = $this->Wali_Kelas_model->getAllMahasiswa();
		$data['listKegiatan4'] =$this->Wali_Kelas_model->ambil_dataKegiatan2();
		$this->load->view('W_Edit_Kegiatan&Nama',$data);
		
	}
	
	/*public function search_Pelajaran()
	{
		//Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_Guru_view
		$id=$this->uri->segment(3);
		$ambil_akun = $this->Wali_Kelas_model->ambil_user_W($this->session->userdata('uname'));
		$data = array(
			'user' => $ambil_akun
		);
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listKelas'] = $this->Wali_Kelas_model->getAllKelas();
		$data['listPelajaran'] = $this->Wali_Kelas_model->getAllPelajaran();
		$data['listKegiatan5'] = $this->Wali_Kelas_model->ambil_dataKegiatan($id);
		$this->load->view('W_Edit_Kegiatan&Pelajaran',$data);
		
	}*/
	
	public function editKegiatan()
	{
		//Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_Guru_view
		//$data['ListKegiatan'] = $this->Guru_model->getLihatKegiatan();
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		if($this->input->post())
			{
				$this->Wali_Kelas_model->updatedetailKegiatan();
				redirect('Wali_Kelas/viewKegiatan');
			}
			$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
			$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
			$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
			$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
			$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
			$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
			$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
			$this->load->view('W_Lihat_Kegiatan',$data);
	}
	
	function hapusKegiatan(){
			$id=$this->uri->segment(3);
			$this->Wali_Kelas_model->hapusIdKegiatan($id);
			redirect('Wali_Kelas/viewKegiatan');
		}
		
	/*public function tambahMataPelajaran()
	{
		//Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_Guru_view
		$ambil_akun = $this->Wali_Kelas_model->ambil_user_W($this->session->userdata('uname'));
		$data = array(
			'user' => $ambil_akun
		);
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listPelajaran'] = $this->Wali_Kelas_model->getAllPelajaran();
		$this->load->view('W_TambahPelajaran',$data);
		
	}
	
	public function tambahMataPelajaranPersonal()
	{
		//Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_Guru_view
		$ambil_akun = $this->Wali_Kelas_model->ambil_user_W($this->session->userdata('uname'));
		$data = array(
			'user' => $ambil_akun
		);
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listPelajaran'] = $this->Wali_Kelas_model->getAllPelajaran();
		$this->load->view('W_TambahPelajaranPersonal',$data);
		
	}
	
	function addPelajaran(){
			$this->Wali_Kelas_model->insertPelajaran();
			redirect('Wali_Kelas/addKegiatan');
		}
		
	function addPelajaranPersonal(){
			$this->Wali_Kelas_model->insertPelajaran();
			redirect('Wali_Kelas/search_Personal');
		}
	
	public function editMataPelajaran()
	{
		//Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_Guru_view
		$id=$this->uri->segment(3);
		$ambil_akun = $this->Wali_Kelas_model->ambil_user_W($this->session->userdata('uname'));
		$data = array(
			'user' => $ambil_akun
		);
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listEditPelajaran'] = $this->Wali_Kelas_model->getAllEditPelajaran($id);
		$this->load->view('W_EditPelajaran',$data);
		
	}
	
	public function editMataPelajaranPersonal()
	{
		//Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_Guru_view
		$id=$this->uri->segment(3);
		$ambil_akun = $this->Wali_Kelas_model->ambil_user_W($this->session->userdata('uname'));
		$data = array(
			'user' => $ambil_akun
		);
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listEditPelajaran'] = $this->Wali_Kelas_model->getAllEditPelajaran($id);
		$this->load->view('W_EditPelajaranPersonal',$data);
		
	}
	
	function editPelajaran(){
			$this->Wali_Kelas_model->updatePelajaran();
			redirect('Wali_Kelas/addKegiatan');
		}
		
	function editPelajaranPersonal(){
			$this->Wali_Kelas_model->updatePelajaran();
			redirect('Wali_Kelas/search_Personal');
		}
		
	function hapusMataPelajaran(){
			$id=$this->uri->segment(3);
			$this->Wali_Kelas_model->deletePelajaran($id);
			redirect('Wali_Kelas/addKegiatan');
		}
		
	function hapusMataPelajaranPersonal(){
			$id=$this->uri->segment(3);
			$this->Wali_Kelas_model->deletePelajaran($id);
			redirect('Wali_Kelas/search_Personal');
		}*/
	
	//Pesan
	public function homePesan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$this->load->view('W_Pesan',$data);
	}
	
	public function addPesan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['listMahasiswa_W'] = $this->Wali_Kelas_model->getAllMahasiswa_W();
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$this->load->view('W_Buat_Pesan',$data);
	}
	
	public function tambahPesan() {
		$isi=$this->input->post('isi_p');
		$kosong="<p><br></p>";
		if ($isi == $kosong || $isi == NULL){
					$this->session->set_flashdata('Kosong', 'This Value required');
					redirect('Wali_Kelas/addPesan');
			}
		$this->Wali_Kelas_model->insertPesan();
		redirect('Wali_Kelas/viewPesanTerkirim');
	}
	
	public function viewPesanMasuk()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['ListPesanMasuk'] = $this->Wali_Kelas_model->getAllPesanMasuk();
		$this->load->view('W_Pesan_Masuk',$data);
	}
	
	public function viewPesanHistory()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$nomor=$this->uri->segment(3);
		$id=$this->uri->segment(4);
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$this->Wali_Kelas_model->Ubahnotifikasi_PWali($id);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['ListPesanHistory'] = $this->Wali_Kelas_model->ambil_HistoryPesan($nomor);
		$this->load->view('W_History_Pesan',$data);
	}
	
	public function viewPesanTerkirim()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listPesan'] = $this->Wali_Kelas_model->getAllPesan();
		$this->load->view('W_Pesan_Terkirim',$data);
	}
	
	public function viewPesanStatus()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$id=$this->uri->segment(3);
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_informasi = $this->Wali_Kelas_model->ambil_informasi($id);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'info' => $ambil_informasi
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listPesan'] = $this->Wali_Kelas_model->getAllPesan();
		$this->load->view('W_PesanOrtuTerbaca',$data);
	}
	
	function get_dataPesan(){
			$id=$this->uri->segment(3);
			$id_o=$this->uri->segment(4);
			$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
			$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
			$ambil_pesan = $this->Wali_Kelas_model->ambil_pesan($id);
			$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'pesan' => $ambil_pesan
			);
			$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
			$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
			$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
			$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
			$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
			$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
			$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
			$data['listMahasiswa_W'] = $this->Wali_Kelas_model->getAllMahasiswa_W();
			$data['listDataPesan']=$this->Wali_Kelas_model->ambil_dataPesan($id,$id_o);
			$this->load->view('W_Edit_Pesan',$data);
		}
	

	
	
	function ubahPesan(){
		$isi=$this->input->post('isi_p');
		$id=$this->input->post('id_p');
		$nis=$this->input->post('idortu');
		$kosong="<p><br></p>";
		$c = $this->db->query("SELECT idortu id FROM ortu join siswa using(idortu) where nis='$nis' limit 1")->row_array();
		$idortu = $c['id'];
		if ($isi == $kosong || $isi == NULL){
					$this->session->set_flashdata('Kosong', 'This Value required');
					redirect('Wali_Kelas/get_dataPesan/'.$id.'/'.$idortu.'');
			}
				$this->Wali_Kelas_model->updatePesan();
					echo"<script>alert('Berhasil Diubah')</script>";
					redirect('Wali_Kelas/viewPesanTerkirim');
			
		
		}
		
	function hapusPesan(){
			$id=$this->uri->segment(3);
			$this->Wali_Kelas_model->hapusIdPesan($id);
			redirect('Wali_Kelas/viewPesanTerkirim');
		}
		
	
	
	//Informasi

	
	
	
	public function addInformasi()
	{
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listOrangtua'] = $this->Wali_Kelas_model->getAllOrangtua();
		$this->load->view('W_Buat_Informasi',$data);
	}
	
	public function tambahInformasi()
	{
			$subject=$_POST['subject_info'];
			$isi=$_POST['isi_info'];
			$tanggal=$_POST['tgl_info'];
			$kosong="<p><br></p>";
			if($this->input->post('tgl_info') < date('Y-m-d'))
			{
					$this->session->set_flashdata('subject',$subject);
					$this->session->set_flashdata('isi',$isi);
					$this->session->set_flashdata('tanggal',$tanggal);
					$this->session->set_flashdata('message', 'Tanggal Tidak Boleh Kurang Dari Tanggal Sekarang');
					redirect('Wali_Kelas/addInformasi');
			} else if ($isi == $kosong || $isi == NULL){
					$this->session->set_flashdata('subject',$subject);
					$this->session->set_flashdata('isi',$isi);
					$this->session->set_flashdata('tanggal',$tanggal);
					$this->session->set_flashdata('Kosong', 'This Value required');
					redirect('Wali_Kelas/addInformasi');
			}			
				$this->Wali_Kelas_model->insertInformasi();
				$this->Wali_Kelas_model->insertInformasiDetail();
				redirect('Wali_Kelas/viewInformasiTerkirim');
				
			
	}
	
			
	
	
	public function viewInformasiTerbaca()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['jumlahOrtu']=$this->Wali_Kelas_model->getAllJumlah();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listInformasiTerbaca'] = $this->Wali_Kelas_model->getAllInformasiTerbaca();
		$this->load->view('W_Lihat_InformasiTerbaca',$data);
	}
	
	public function viewInformasiTerbaca2()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$id=$this->uri->segment(3);
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$this->Wali_Kelas_model->Ubahnotifikasi_IWali($id);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['jumlahOrtu']=$this->Wali_Kelas_model->getAllJumlah();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listInformasiTerbaca'] = $this->Wali_Kelas_model->getInformasiTerbaca($id);
		$this->load->view('W_InformasiTerbaca',$data);
	}
	
	public function viewInformasiOrtuTerbaca()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$id=$this->uri->segment(3);
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_informasi = $this->Wali_Kelas_model->ambil_informasi($id);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'info' => $ambil_informasi
		);
		$this->Wali_Kelas_model->Ubahnotifikasi_IWali($id);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['jumlahOrtu']=$this->Wali_Kelas_model->getAllJumlah();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['Ortu']=$this->Wali_Kelas_model->getOrangTua();
		$data['listOrtuTerbaca'] = $this->Wali_Kelas_model->getOrangTuaTerbaca($id);
		$data['listInfoOrtuTerbaca'] = $this->Wali_Kelas_model->getOrangTuaTerbaca2($id);
		$this->load->view('W_InfoOrtuTerbaca',$data);
	}
	
	public function viewInformasiTerkirim()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listInformasi'] = $this->Wali_Kelas_model->getAllInformasi();
		$this->load->view('W_Lihat_InformasiTerkirim',$data);
	}
	
	public function editInformasi()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$id=$this->uri->segment(3);
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listDataInformasi']=$this->Wali_Kelas_model->ambil_dataInformasi($id);
		$this->load->view('W_Edit_Informasi',$data);
	}
	
	function ubahInformasi(){
			$id_informasi=$this->input->post('id_i');
			$tanggal_informasi=$this->input->post('tgl_info');
			$isi_informasi=$this->input->post('isi_info');
			$subject_informasi=$this->input->post('subject_info');
			$kosong="<p><br></p>";
			if($isi_informasi == $kosong || $isi_informasi == NULL)
			{
					$this->session->set_flashdata('subject',$subject_informasi);
					$this->session->set_flashdata('isi',$isi_informasi);
					$this->session->set_flashdata('tanggal',$tanggal_informasi);
					$this->session->set_flashdata('Kosong', 'This Value Required');
					redirect('Wali_Kelas/editInformasi/'.$id_informasi.'');
			}
				$this->Wali_Kelas_model->updateInformasi();
					echo"<script>alert('Berhasil Diubah')</script>";
					redirect('Wali_Kelas/viewInformasiTerkirim');
		}
		
	function hapusInformasi(){
			$id=$this->uri->segment(3);
			$this->Wali_Kelas_model->hapusIdInformasi($id);
			redirect('Wali_Kelas/viewInformasiTerkirim');
		}
	
	
	//Saran
	public function LihatPembahasan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['ListPembahasan'] = $this->Wali_Kelas_model->getAllTanggapan_Pembahasan();
		$this->load->view('W_Lihat_Pembahasan',$data);
	}
	
	public function homeSaran()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$pembahasan=$this->uri->segment(3);
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_bahas = $this->Wali_Kelas_model->ambil_bahas($pembahasan);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'bahas' => $ambil_bahas
		);
		$this->Wali_Kelas_model->Ubahnotifikasi($pembahasan);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listTanggal'] = $this->Wali_Kelas_model->getAllTanggal($pembahasan);
		$data['jumlahOrtu'] = $this->Wali_Kelas_model->getJumlahOrangtua();
		$data['listOrangtua'] = $this->Wali_Kelas_model->getAllOrangtua();
		$this->load->view('W_Saran',$data);
	}
	
	public function addSaran(){
		$pembahasan=$this->uri->segment(3);
		$this->Wali_Kelas_model->insertRespon();
		$this->Wali_Kelas_model->insertDetailRespon();
		redirect('Wali_Kelas/homeSaran/'.$pembahasan.'');
	}
	
	public function editSaran(){
		$id=$this->uri->segment(3);
		$pembahasan=$this->uri->segment(4);
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_bahas = $this->Wali_Kelas_model->ambil_bahas($pembahasan);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'bahas' => $ambil_bahas
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listTanggal'] = $this->Wali_Kelas_model->getAllTanggal($pembahasan);
		$data['jumlahOrtu'] = $this->Wali_Kelas_model->getJumlahOrangtua();
		$data['listDataRespon']=$this->Wali_Kelas_model->ambil_dataRespon($id);
		$this->load->view('W_Edit_saran',$data);
	}
	
	public function SaranOrtu()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['ListSaranOrtu'] = $this->Wali_Kelas_model->getAllTanggapan_TU();
		$this->load->view('W_Saran_OrangTua',$data);
	}
	
	public function LihatSaranOrtu()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$nip=$this->uri->segment(3);
		$tanggal=$this->uri->segment(4);
		$pembahasan=$this->uri->segment(5);
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$this->Wali_Kelas_model->Ubahnotifikasi_RTU($nip,$tanggal,$pembahasan);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listSaranWali'] = $this->Wali_Kelas_model->getAllTanggapan_TWali($nip,$tanggal,$pembahasan);
		$data['listSaran'] = $this->Wali_Kelas_model->getAllTanggapan_TOrtu($nip,$tanggal,$pembahasan);
		$this->load->view('W_Lihat_Saran',$data);
	}
	
	public function LihatDetailSaranOrtu()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$nip = $this->input->get('nip');
		$awal = $this->input->get('awal');
		$akhir = $this->input->get('akhir');
		$tanggal = $this->input->get('tanggal');
		$pembahasan = $this->input->get('pembahasan');
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listSaranWali'] = $this->Wali_Kelas_model->getAllTanggapan_TWali2($nip,$tanggal,$pembahasan);
		$data['jumlahListSaran'] = $this->Wali_Kelas_model->jumlahAllTanggapan_TOrtu2($nip,$awal,$akhir,$pembahasan);
		$data['listSaran'] = $this->Wali_Kelas_model->getAllTanggapan_TOrtu2($nip,$awal,$akhir,$pembahasan);
		$this->load->view('W_Lihat_DetailSaran',$data);
	}
	
	public function CetakSaran()
	{	
		$awal=$this->uri->segment(3);
		$akhir=$this->uri->segment(4);
		$nip=$this->uri->segment(5);
		$pembahasan=$this->uri->segment(6);
		$data['listSaranWali'] = $this->Wali_Kelas_model->getAllTanggapan_TWali1($nip,$pembahasan);
		$data['listSaran'] = $this->Wali_Kelas_model->getAllTanggapan_TOrtu1($awal,$akhir,$nip,$pembahasan);
		$this->load->view('W_excel',$data);
	}

	public function Saran()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$pembahasan=$this->uri->segment(3);
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_bahas = $this->Wali_Kelas_model->ambil_bahas($pembahasan);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'bahas' => $ambil_bahas
		);
		$this->Wali_Kelas_model->Ubahnotifikasi($pembahasan);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listTanggal'] = $this->Wali_Kelas_model->getAllTanggal($pembahasan);
		$data['jumlahOrtu'] = $this->Wali_Kelas_model->getJumlahOrangtua();
		$data['listOrangtua'] = $this->Wali_Kelas_model->getAllOrangtua();
		$this->load->view('Saran/Saran_Wali',$data);
	}
	
	public function UpdateRespon(){
		$pembahasan=$this->uri->segment(3);
		$this->Wali_Kelas_model->ubahRespon();
		redirect('Wali_Kelas/homeSaran/'.$pembahasan.'');
			
	}
	
	public function UpdateStatusPembahasan(){
		$pembahasan=$this->uri->segment(3);
		$this->Wali_Kelas_model->ubahStatusPembahasan($pembahasan);
		redirect('Wali_Kelas/LihatPembahasan');
			
	}
	
	function hapusSaran(){
		$id=$this->uri->segment(3);
		$pembahasan=$this->uri->segment(4);
		$this->Wali_Kelas_model->hapusIdRespon($id);
		redirect('Wali_Kelas/homeSaran/'.$pembahasan.'');
	}
	
	 //Laporan
	public function homeLaporan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['jumlahOrtu'] = $this->Wali_Kelas_model->getJumlahOrangtua();
		$data['ListPembahasan'] = $this->Wali_Kelas_model->getAllPembahasan_Laporan();
		$this->load->view('W_Laporan',$data);
	}
	
	public function CariPembahasan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_bahas = $this->Wali_Kelas_model->ambil_bahas($this->input->get('bahas'));
		$ambil_bahas_awal = $this->Wali_Kelas_model->ambil_bahas_awal($this->input->get('bahas'));
		$ambil_bahas_akhir = $this->Wali_Kelas_model->ambil_bahas_akhir($this->input->get('bahas'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'bahas' => $ambil_bahas,
			'bahas_awal' => $ambil_bahas_awal,
			'bahas_akhir' => $ambil_bahas_akhir
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['jumlahOrtu'] = $this->Wali_Kelas_model->getJumlahOrangtua();
		$data['jumlahBahas'] = $this->Wali_Kelas_model->getAllTanggapan_LJumlah($this->input->get('bahas'));
		$data['ListPembahasan'] = $this->Wali_Kelas_model->getAllPembahasan_Laporan();
		$this->load->view('W_DetailLaporan',$data);
	}
	
	public function viewLaporan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['listLaporan'] = $this->Wali_Kelas_model->getAllLaporan();
		$this->load->view('W_Lihat_Laporan',$data);
	}
	
	public function viewDetailLaporan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$id=$this->uri->segment(3);
		$nip=$this->uri->segment(4);
		$pembahasan=$this->uri->segment(5);
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_bahas = $this->Wali_Kelas_model->ambil_bahas($pembahasan);
		$ambil_bahas_awal = $this->Wali_Kelas_model->ambil_bahas_awal($pembahasan);
		$ambil_bahas_akhir = $this->Wali_Kelas_model->ambil_bahas_akhir($pembahasan);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'bahas' => $ambil_bahas,
			'bahas_awal' => $ambil_bahas_awal,
			'bahas_akhir' => $ambil_bahas_akhir
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['jumlahOrtu'] = $this->Wali_Kelas_model->getJumlahOrangtua();
		$data['jumlahBahas'] = $this->Wali_Kelas_model->getAllTanggapan_LJumlah($pembahasan);
		$data['listLaporan'] = $this->Wali_Kelas_model->getAllDetailLaporan($id);
		$data['listSaran'] = $this->Wali_Kelas_model->getAllTanggapan_LOrtu($nip,$pembahasan);
		$this->load->view('W_Lihat_DetailLaporan',$data);
	}
	
	public function viewPrintLaporan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$id=$this->uri->segment(3);
		$nip=$this->uri->segment(4);
		$pembahasan=$this->uri->segment(5);
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_bahas = $this->Wali_Kelas_model->ambil_bahas($pembahasan);
		$ambil_bahas_awal = $this->Wali_Kelas_model->ambil_bahas_awal($pembahasan);
		$ambil_bahas_akhir = $this->Wali_Kelas_model->ambil_bahas_akhir($pembahasan);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'bahas' => $ambil_bahas,
			'bahas_awal' => $ambil_bahas_awal,
			'bahas_akhir' => $ambil_bahas_akhir
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['jumlahOrtu'] = $this->Wali_Kelas_model->getJumlahOrangtua();
		$data['jumlahBahas'] = $this->Wali_Kelas_model->getAllTanggapan_LJumlah($pembahasan);
		$data['listLaporan'] = $this->Wali_Kelas_model->getAllDetailLaporan($id);
		$data['listSaran'] = $this->Wali_Kelas_model->getAllTanggapan_LOrtu($nip,$pembahasan);
		$this->load->view('W_PrintLaporan',$data);
	}
	
	public function edit_Laporan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$id=$this->uri->segment(3);
		$pembahasan=$this->uri->segment(4);
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_laporan = $this->Wali_Kelas_model->ambil_laporan($id);
		$ambil_bahas = $this->Wali_Kelas_model->ambil_bahas($pembahasan);
		$ambil_bahas_awal = $this->Wali_Kelas_model->ambil_bahas_awal($pembahasan);
		$ambil_bahas_akhir = $this->Wali_Kelas_model->ambil_bahas_akhir($pembahasan);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'laporan' => $ambil_laporan,
			'bahas' => $ambil_bahas,
			'bahas_awal' => $ambil_bahas_awal,
			'bahas_akhir' => $ambil_bahas_akhir
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['jumlahOrtu'] = $this->Wali_Kelas_model->getJumlahOrangtua();
		$data['jumlahBahas'] = $this->Wali_Kelas_model->getAllTanggapan_LJumlah($pembahasan);
		$data['ListPembahasan'] = $this->Wali_Kelas_model->getAllPembahasan_Laporan();
		$data['listLaporan'] = $this->Wali_Kelas_model->getAllDetailLaporan($id);
		$this->load->view('W_Edit_Laporan',$data);
	}
	
	public function Cariedit_Laporan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$id=$this->input->get('laporan');
		$pembahasan=$this->input->get('bahas');
		$ambil_akun1 = $this->Wali_Kelas_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Wali_Kelas_model->ambil_status($this->session->userdata('kode'));
		$ambil_laporan = $this->Wali_Kelas_model->ambil_laporan($id);
		$ambil_bahas = $this->Wali_Kelas_model->ambil_bahas($pembahasan);
		$ambil_bahas_awal = $this->Wali_Kelas_model->ambil_bahas_awal($pembahasan);
		$ambil_bahas_akhir = $this->Wali_Kelas_model->ambil_bahas_akhir($pembahasan);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'laporan' => $ambil_laporan,
			'bahas' => $ambil_bahas,
			'bahas_awal' => $ambil_bahas_awal,
			'bahas_akhir' => $ambil_bahas_akhir
		);
		$data['jumlah']=$this->Wali_Kelas_model->ambil_jumlah($this->session->userdata('uname'));
		$data['notifInformasi']=$this->Wali_Kelas_model->notifInformasi_Wali();
		$data['ListNotifInformasi']=$this->Wali_Kelas_model->ListNotifInformasi_Wali();
		$data['notif'] = $this->Wali_Kelas_model->notifikasiPesan();
		$data['LihatNotifRespon']=$this->Wali_Kelas_model->LihatNotifRespon_Wali();
		$data['notifPesan'] = $this->Wali_Kelas_model->notifPesan_Wali();
		$data['ListnotifPesan'] = $this->Wali_Kelas_model->ListNotifPesan_Wali();
		$data['jumlahOrtu'] = $this->Wali_Kelas_model->getJumlahOrangtua();
		$data['jumlahBahas'] = $this->Wali_Kelas_model->getAllTanggapan_LJumlah($pembahasan);
		$data['ListPembahasan'] = $this->Wali_Kelas_model->getAllPembahasan_Laporan();
		$data['listLaporan'] = $this->Wali_Kelas_model->getAllDetailLaporan($id);
		$this->load->view('W_Edit_Laporan',$data);
	}
	
	
	public function addLaporan()
	{
		$id=$this->input->post('id_pembahasan');
		$isi=$this->input->post('isi');
		$kosong="<p><br></p>";
		if ($isi == $kosong || $isi == NULL){
					$this->session->set_flashdata('Kosong', 'This Value required');
					redirect('Wali_Kelas/CariPembahasan?bahas='.$id.'');
			}
		$this->Wali_Kelas_model->insertLaporan();
		redirect('Wali_Kelas/viewLaporan');
	}
	
	public function editLaporan()
	{
		$id=$this->input->post('id');
		$bahas=$this->input->post('pembahasan');
		$isi=$this->input->post('isi');
		$kosong="<p><br></p>";
		if ($isi == $kosong || $isi == NULL){
					$this->session->set_flashdata('Kosong', 'This Value required');
					redirect('Wali_Kelas/edit_Laporan/'.$id.'/'.$bahas.'');
			}
		$this->Wali_Kelas_model->updateLaporan();
		redirect('Wali_Kelas/viewLaporan');
	}
	
	public function deleteLaporan()
	{
		$id=$this->uri->segment(3);
		$this->Wali_Kelas_model->hapusLaporan($id);
		redirect('Wali_Kelas/viewLaporan');
	}
	
	public function Reload()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$this->load->view('reload');
	}	
		
		
		/*public function kirim_chat()
    {
        $isi_respon=$this->input->post("isi_res");
        $NIK=$this->input->post("NIK");
         
        mysql_query("insert into respon (tanggal_respon,isi_respon,NIK) VALUES (NOW(),'$isi_respon',$NIK)");
        redirect ("Wali_Kelas/ambil_pesan");
    }
     
    public function ambil_pesan()
    {
        $tampil=mysql_query("select * from respon order by tanggal_respon desc");
        while($r=mysql_fetch_array($tampil)){
        echo "<li><b>$r[NIK]</b> : $r[isi_respon] (<i>$r[tanggal_respon]</i>)</li>";
        }
    }*/
	
	function login(){
		$session = $this->session->userdata('isLogin');
		if($session == False){
			$this->load->view('A_Login');
		}else{
			redirect('Wali_Kelas');
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('Login2','refresh');
	}
}

/* Location: ./application/controllers/Gurus.php */