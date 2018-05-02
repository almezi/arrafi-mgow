<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tata_Usaha extends CI_Controller  {
	function __construct(){
		parent::__construct();
		$this->load->model('Tata_Usaha_model');
		$this->load->library('pagination');
		$this->load->helper('form');
		//constructor yang dipanggil ketika memanggil Guru.php untuk melakukan pemanggilan pada model : Gurus_model.php yang ada di folder models
	}

	public function index()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Tata_Usaha_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Tata_Usaha_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifSaran'] = $this->Tata_Usaha_model->notifRespon_TU();
		$data['listnotifSaran'] = $this->Tata_Usaha_model->ListNotifRespon_TU();
		$data['listSaran'] = $this->Tata_Usaha_model->getAllTanggapan_TU();
		$this->load->view('T_Saran',$data);
	}
	
	public function NotifikasiSaran()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Tata_Usaha_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Tata_Usaha_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifSaran'] = $this->Tata_Usaha_model->notifRespon_TU();
		$data['listnotifSaran'] = $this->Tata_Usaha_model->ListNotifRespon_TU();
		$this->load->view('Notifikasi/Notifikasi_TataUsaha',$data);
	}
	
	//Saran
	public function homeSaran()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Tata_Usaha_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Tata_Usaha_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifSaran'] = $this->Tata_Usaha_model->notifRespon_TU();
		$data['listnotifSaran'] = $this->Tata_Usaha_model->ListNotifRespon_TU();
		$data['listSaran'] = $this->Tata_Usaha_model->getAllTanggapan_TU();
		$this->load->view('T_Saran',$data);
	}
	
	public function homeSaran1()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Tata_Usaha_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Tata_Usaha_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notif'] = $this->Tata_Usaha_model->notifikasiLaporan();
		$data['listSaran'] = $this->Tata_Usaha_model->getAllTanggapan_TU();
		$this->load->view('T_Saran',$data);
	}
	
	public function viewSaran()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$nip=$this->uri->segment(3);
		$tanggal=$this->uri->segment(4);
		$ambil_akun1 = $this->Tata_Usaha_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Tata_Usaha_model->ambil_status($this->session->userdata('kode'));
		$ambil_tanggal = $this->Tata_Usaha_model->ambil_tanggal($nip);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'tanggal' => $ambil_tanggal
		);
		$this->Tata_Usaha_model->Ubahnotifikasi_RTU($nip,$tanggal);
		$data['notifSaran'] = $this->Tata_Usaha_model->notifRespon_TU();
		$data['listnotifSaran'] = $this->Tata_Usaha_model->ListNotifRespon_TU();
		$data['listTanggal'] = $this->Tata_Usaha_model->getAllTanggal($nip);
		$data['listSaranWali'] = $this->Tata_Usaha_model->getAllTanggapan_TWali($nip,$tanggal);
		$data['listSaran'] = $this->Tata_Usaha_model->getAllTanggapan_TOrtu($nip,$tanggal);
		$this->load->view('T_Lihat_saran',$data);
	}
	
	public function search()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$nip = $this->input->get('nip');
		$awal = $this->input->get('awal');
		$akhir = $this->input->get('akhir');
		$tanggal = $this->input->get('tanggal');
		$ambil_akun1 = $this->Tata_Usaha_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Tata_Usaha_model->ambil_status($this->session->userdata('kode'));
		$ambil_tanggal = $this->Tata_Usaha_model->ambil_tanggal($nip);
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status,
			'tanggal' => $ambil_tanggal
		);
		$data['notifSaran'] = $this->Tata_Usaha_model->notifRespon_TU();
		$data['listnotifSaran'] = $this->Tata_Usaha_model->ListNotifRespon_TU();
		$data['listTanggal'] = $this->Tata_Usaha_model->getAllTanggal($nip);
		$data['listSaranWali'] = $this->Tata_Usaha_model->getAllTanggapan_TWali2($nip,$tanggal);
		$data['jumlahListSaran'] = $this->Tata_Usaha_model->jumlahAllTanggapan_TOrtu2($nip,$awal,$akhir);
		$data['listSaran'] = $this->Tata_Usaha_model->getAllTanggapan_TOrtu2($nip,$awal,$akhir);
		$this->load->view('T_Lihat_DetailSaran',$data);
	}
	
	public function CetakSaran()
	{	
		$awal=$this->uri->segment(3);
		$akhir=$this->uri->segment(4);
		$nip=$this->uri->segment(5);
		$data['listSaranWali'] = $this->Tata_Usaha_model->getAllTanggapan_TWali1($nip);
		$data['listSaran'] = $this->Tata_Usaha_model->getAllTanggapan_TOrtu1($awal,$akhir,$nip);
		$this->load->view('T_excel',$data);
	}
	
	public function homeLaporan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Tata_Usaha_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Tata_Usaha_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifSaran'] = $this->Tata_Usaha_model->notifRespon_TU();
		$data['listnotifSaran'] = $this->Tata_Usaha_model->ListNotifRespon_TU();
		$this->load->view('T_Laporan',$data);
	}
	
	public function addLaporan()
	{
		
		$this->Tata_Usaha_model->insertLaporan();
		redirect('Tata_Usaha/viewLaporan');
	}
	
	public function viewLaporan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		
		$ambil_akun1 = $this->Tata_Usaha_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Tata_Usaha_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifSaran'] = $this->Tata_Usaha_model->notifRespon_TU();
		$data['listnotifSaran'] = $this->Tata_Usaha_model->ListNotifRespon_TU();
		$data['listLaporan'] = $this->Tata_Usaha_model->getAllLaporan();
		$this->load->view('T_Lihat_Laporan',$data);
	}
	
	public function viewDetailLaporan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$id=$this->uri->segment(3);
		$ambil_akun1 = $this->Tata_Usaha_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Tata_Usaha_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifSaran'] = $this->Tata_Usaha_model->notifRespon_TU();
		$data['listnotifSaran'] = $this->Tata_Usaha_model->ListNotifRespon_TU();
		$data['listLaporan'] = $this->Tata_Usaha_model->getAllDetailLaporan($id);
		$this->load->view('T_Lihat_DetailLaporan',$data);
	}
	
	public function edit_Laporan()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$id=$this->uri->segment(3);
		$ambil_akun1 = $this->Tata_Usaha_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Tata_Usaha_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifSaran'] = $this->Tata_Usaha_model->notifRespon_TU();
		$data['listnotifSaran'] = $this->Tata_Usaha_model->ListNotifRespon_TU();
		$data['listLaporan'] = $this->Tata_Usaha_model->getAllDetailLaporan($id);
		$this->load->view('T_edit_Laporan',$data);
	}
	
	public function editLaporan()
	{
		
		$this->Tata_Usaha_model->updateLaporan();
		redirect('Tata_Usaha/viewLaporan');
	}
	
	public function deleteLaporan()
	{
		$id=$this->uri->segment(3);
		$this->Tata_Usaha_model->hapusLaporan($id);
		redirect('Tata_Usaha/viewLaporan');
	}
	
	public function viewLaporanPDF()
	{
		//Function yang digunakan untuk menampilkan view Guru_view.php
		$ambil_akun1 = $this->Tata_Usaha_model->ambil_user($this->session->userdata('uname'));
		$ambil_status = $this->Tata_Usaha_model->ambil_status($this->session->userdata('kode'));
		$data = array(
			'user1' => $ambil_akun1,
			'status' => $ambil_status
		);
		$data['notifSaran'] = $this->Tata_Usaha_model->notifRespon_TU();
		$data['listnotifSaran'] = $this->Tata_Usaha_model->ListNotifRespon_TU();
		$data['listLaporan'] = $this->Tata_Usaha_model->getAllDetailLaporan();
		$this->load->view('T_PreviewPDF',$data);
	}
	
	function login(){
		$session = $this->session->userdata('isLogin');
		if($session == False){
			$this->load->view('A_Login');
		}else{
			redirect('Tata_Usaha');
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('Login2','refresh');
	}
	
	
	/*public function CetakPDF()
	{
		$data['listLaporan'] = $this->Tata_Usaha_model->getAllDetailLaporan();
		$this->load->view('T_PDF',$data);
	}*/
	
	public function CetakPDF()
	{
		
        ob_start();
        $data['listLaporan'] = $this->Tata_Usaha_model->getAllDetailLaporan();
        $this->load->view('T_PreviewPDF',$data);
        $html = ob_get_contents();
        ob_end_clean();
 
        require_once('./New folder/html2pdf-4.5.1/html2pdf-4.5.1/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Siswa.pdf', 'D');
    
	}
	
	
	public function addGuruDb()
	{
		//Function yang dipanggil ketika ingin memasukan produk ke dalam database
		$data = array(
				'nip' => $this->input->post('nip'),
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
				'nip' => $this->input->get('nip'),
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