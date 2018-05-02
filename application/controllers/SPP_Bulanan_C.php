<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class SPP_Bulanan_C extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('SPP_Bulanan_M');
		}

		public function form_bayar_spp(){
			$data = array(
				'page' => 'SPP Bulanan',
				'content' => 'dashboard/orangtua/unggah_pembayaran',
				'toolbar' => 'Pembayaran SPP Bulanan'
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function unggah_bukti_bayar(){
			$nama_bayar = $_FILES['bukti_bayar']['name'];
			$file = getimagesize($_FILES['bukti_bayar']['tmp_name']);
			$bukti_bayar = addslashes(file_get_contents($_FILES['bukti_bayar']['tmp_name']));
			$mime = $file['mime'];
			$jumlah_bayar = $this->input->post('jumlah_bayar');
			$sisa_bayar = 750000 - $jumlah_bayar;
			$nis = $this->input->post('nis');
			$status = "";
			$tanggal_bayar = date("Y-m-d");
			$email = $this->session->userdata('email');

			if ($sisa_bayar==0) {
				$status = "Lunas";
			} else if ($sisa_bayar > 0 && $sisa_bayar < 750000){
				$status = "Kredit";
			}

			$result = $this->SPP_Bulanan_M->insert_bukti_bayar($nama_bayar,$bukti_bayar,$jumlah_bayar,$sisa_bayar,$status,$nis,$mime,$tanggal_bayar,$email);
			
			if ($result>=0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Bukti bayar berhasil diupload.</div>');
				redirect('SPP_Bulanan_C/form_bayar_spp');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Bukti bayar gagal diupload.</div>');
				redirect('SPP_Bulanan_C/form_bayar_spp');
			}
		}

		public function riwayat_pembayaran(){
			$email = $this->session->userdata('email');
			$result = $this->SPP_Bulanan_M->select_riwayat_pembayaran_per_email($email);

			$data = array(
				'page' => 'SPP Bulanan',
				'content' => 'dashboard/orangtua/riwayat_pembayaran_spp',
				'toolbar' => 'Riwayat SPP Bulanan',
				'data_bayar' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function lihat_data_siswa(){
			$result = $this->SPP_Bulanan_M->select_data_siswa();

			$data = array(
				'page' => 'Data Siswa',
				'content' => 'dashboard/keuangan/data_siswa',
				'toolbar' => 'Data Siswa',
				'data_siswa' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function lihat_data_pembayaran(){
			$result = $this->SPP_Bulanan_M->select_pembayaran_spp_bulanan();

			$data = array(
				'page' => 'SPP Bulanan',
				'content' => 'dashboard/keuangan/spp_bulanan',
				'toolbar' => 'SPP Bulanan',
				'data_bayar' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function konfirmasi_pembayaran_spp(){
			$id_bayar = $this->uri->segment(3);

			$result = $this->SPP_Bulanan_M->edit_status_pembayaran($id_bayar);

			if ($result>=0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Perbaharui Status.</div>');
				redirect('SPP_Bulanan_C/lihat_data_pembayaran');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Perbaharui Status.</div>');
				redirect('SPP_Bulanan_C/lihat_data_pembayaran');
			}
		}

		public function informasikan_pelunasan(){
			$no_hp = $this->uri->segment(3);

			$result = $this->SPP_Bulanan_M->insert_outbox_pelunasan($no_hp);

			if ($result>=0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Mengirim SMS.</div>');
				redirect('SPP_Bulanan_C/lihat_data_siswa');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Mengirim SMS.</div>');
				redirect('SPP_Bulanan_C/lihat_data_siswa');
			}
		}
	}