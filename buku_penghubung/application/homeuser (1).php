<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeuser extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data=$this->session->userdata('logged_in');
			$this->load->model('user');
			$username = $session_data['username'];
			$data['cek_id'] = $this->user->cekid($username)->row_array();
			$this->load->view('header');
			$this->load->view('homeuser',$data);
			$this->load->view('footer');
		}
		else
		{
			echo "<script language=\"Javascript\">\n";
			echo "window.alert('Anda Harus Login Terlebih Dahulu');";
			echo "</script>";
			$this->load->view('login');
		}
	}
	
	public function editaccount()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data=$this->session->userdata('logged_in');
			$this->load->model('user');
			$username = $session_data['username'];
			$id = $this->uri->segment(3);
			$data['cek_id'] = $this->user->cekid($username)->row_array();
			$data['ambil_id'] = $this->user->cekid($id)->row_array();
			$this->load->view('header');
			$this->load->view('u_editaccount',$data);
			$this->load->view('footer');
		}
		else
		{
			echo "<script language=\"Javascript\">\n";
			echo "window.alert('Anda Harus Login Terlebih Dahulu');";
			echo "</script>";
			$this->load->view('login');
		}
	}
	
	public function editproduk()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data=$this->session->userdata('logged_in');
			$this->load->model('user');
			$username = $session_data['username'];
			$idproduk = $this->uri->segment(3);
			$data['cek_id'] = $this->user->cekid($username)->row_array();
			$data['ambil_produk'] = $this->user->cekproduk($idproduk)->row_array();
			$this->load->view('header');
			$this->load->view('editproduk',$data);
			$this->load->view('footer');
		}
		else
		{
			echo "<script language=\"Javascript\">\n";
			echo "window.alert('Anda Harus Login Terlebih Dahulu');";
			echo "</script>";
			$this->load->view('login');
		}
	}
	
	public function formuser()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data=$this->session->userdata('logged_in');
			$this->load->model('user');
			$username = $session_data['username'];
			$data['daftar_user'] = $this->user->list_user()->result();
			$data['cek_id'] = $this->user->cekid($username)->row_array();
			$this->load->view('header');
			$this->load->view('formuser',$data);
			$this->load->view('footer');
		}
		else
		{
			echo "<script language=\"Javascript\">\n";
			echo "window.alert('Anda Harus Login Terlebih Dahulu');";
			echo "</script>";
			$this->load->view('login');
		}
	}
	
	public function formviewproduk()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data=$this->session->userdata('logged_in');
			$this->load->model('user');
			$username = $session_data['username'];
			$data['daftar_produk'] = $this->user->list_produk()->result();
			$data['cek_id'] = $this->user->cekid($username)->row_array();
			$this->load->view('header');
			$this->load->view('formviewproduk',$data);
			$this->load->view('footer');
		}
		else
		{
			echo "<script language=\"Javascript\">\n";
			echo "window.alert('Anda Harus Login Terlebih Dahulu');";
			echo "</script>";
			$this->load->view('login');
		}
	}
	
	public function simpan()
	{
		$datauser = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nama' => $this->input->post('nama'));

		$this->db->where('username',$this->input->post('id'));
		$this->db->update('user',$datauser);

		redirect('homeuser');
	}
	
	public function simpanproduk()
	{
		$dataproduk = array(
			'idproduk' => $this->input->post('idproduk'),
			'namaproduk' => $this->input->post('namaproduk'),
			'harga' => $this->input->post('harga'));

		$this->db->where('idproduk',$this->input->post('id'));
		$this->db->update('produk',$dataproduk);

		redirect('homeadmin/formviewproduk');
	}
	
	public function forminput()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data=$this->session->userdata('logged_in');
			$this->load->model('user');
			$username = $session_data['username'];
			$data['daftar_user'] = $this->user->list_user()->result();
			$data['cek_id'] = $this->user->cekid($username)->row_array();
			$this->load->view('header');
			$this->load->view('forminput',$data);
			$this->load->view('footer');
		}
		else
		{
			echo "<script language=\"Javascript\">\n";
			echo "window.alert('Anda Harus Login Terlebih Dahulu');";
			echo "</script>";
			$this->load->view('login');
		}
	}
	
	public function insertproduk()
	{
		$dataproduk = array
		(
			'IDproduk' => $this->input->post('IDproduk'),
			'namaproduk' => $this->input->post('namaproduk'),
			'harga' => $this->input->post('harga')
		);
			
		$this->db->insert('produk',$dataproduk);
		redirect('homeadmin/forminput');
	}
	
	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->db->where('username',$id);
		$this->db->delete('user');
		redirect('homeadmin/formuser');
	}
	
	public function deleteproduk()
	{
		$id = $this->uri->segment(3);
		$this->db->where('idproduk',$id);
		$this->db->delete('produk');
		redirect('homeadmin/formviewproduk');
	}
	
	public function deleteinfo()
	{
		$id = $this->uri->segment(3);
		$this->db->where('kode_request',$id);
		$this->db->delete('inforequest');
		redirect('homeuser/viewformrequest');
	}
	
	public function viewdatabuku()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data=$this->session->userdata('logged_in');
			$this->load->model('user');
			$username = $session_data['username'];
			$data['daftar_user'] = $this->user->list_user()->result();
			$data['daftar_buku'] = $this->user->list_buku()->result();
			$data['cek_id'] = $this->user->cekid($username)->row_array();
			$this->load->view('header');
			$this->load->view('u_databuku',$data);
			$this->load->view('footer');
		}
		else
		{
			echo "<script language=\"Javascript\">\n";
			echo "window.alert('Anda Harus Login Terlebih Dahulu');";
			echo "</script>";
			$this->load->view('login');
		}
	}
	
	public function viewformrequest()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data=$this->session->userdata('logged_in');
			$this->load->model('user');
			$username = $session_data['username'];
			$data['cek_id'] = $this->user->cekid($username)->row_array();
			$data['kodebaru'] = $this->user->no_max();
			$data['kode_request'] = $this->user->no_max2();
			$data['daftar_user'] = $this->user->list_user()->result();
			$data['daftar_request'] = $this->user->list_request()->result();
			$data['daftar_inforequest'] = $this->user->list_inforequest()->result();
			$this->load->view('header');
			$this->load->view('formRequest',$data);
			$this->load->view('footer');
		}
		else
		{
			echo "<script language=\"Javascript\">\n";
			echo "window.alert('Anda Harus Login Terlebih Dahulu');";
			echo "</script>";
			$this->load->view('login');
		}
	}
	public function viewpersentasebuku()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data=$this->session->userdata('logged_in');
			$this->load->model('user');
			$username = $session_data['username'];
			$data['cek_id'] = $this->user->cekid($username)->row_array();
			$data['daftarbuku'] = $this->user->list_buku()->result();
			$this->load->view('header');
			$this->load->view('u_persentasebuku',$data);
			$this->load->view('footer');
		}
		else
		{
			echo "<script language=\"Javascript\">\n";
			echo "window.alert('Anda Harus Login Terlebih Dahulu');";
			echo "</script>";
			$this->load->view('login');
		}
	}
	
	public function tambahrequest()
	{
		$data = array
		(
			'kode_request' => $this->input->post('kode_request'),
			'username' => $this->input->post('username'),
			'nama_buku' => $this->input->post('nama_buku'),
			'pencipta_buku' => $this->input->post('pencipta_buku'),
			'tahun_terbit' => $this->input->post('tahun_terbit')
		);
			
		$this->db->insert('request',$data);
		redirect('homeuser/viewformrequest');
	}
	
	public function history(){		
		if($this->session->userdata('logged_in'))
		{
			$session_data=$this->session->userdata('logged_in');
			$this->load->model('user');
			$username = $session_data['username'];
			$data['cek_id'] = $this->user->cekid($username)->row_array();
			$name = $this->session->userdata('logged_in');
			$uname = $name['username'];
			$data['hasil'] = $hasil = $this->db->query("SELECT kode_buku, nama_buku, tanggal_pinjam, tanggal_kembali from peminjaman join buku using(kode_buku) where username = '$uname'");

			$this->load->view('header');
			$this->load->view('u_viewhistory',$data);
			$this->load->view('footer');
		}
		else
		{
			echo "<script language=\"Javascript\">\n";
			echo "window.alert('Anda Harus Login Terlebih Dahulu');";
			echo "</script>";
			$this->load->view('login');
		}
	}
	
	public function help(){		
		if($this->session->userdata('logged_in'))
		{
			$session_data=$this->session->userdata('logged_in');
			$this->load->model('user');
			$username = $session_data['username'];
			$data['cek_id'] = $this->user->cekid($username)->row_array();
			$name = $this->session->userdata('logged_in');
			$uname = $name['username'];
			$data['hasil'] = $hasil = $this->db->query("SELECT kode_buku, nama_buku, tanggal_pinjam, tanggal_kembali from peminjaman join buku using(kode_buku) where username = '$uname'");

			$this->load->view('header');
			$this->load->view('help',$data);
			$this->load->view('footer');
		}
		else
		{
			echo "<script language=\"Javascript\">\n";
			echo "window.alert('Anda Harus Login Terlebih Dahulu');";
			echo "</script>";
			$this->load->view('login');
		}
	}

}