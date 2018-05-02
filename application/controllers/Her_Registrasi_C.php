<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Her_Registrasi_C extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('Her_Registrasi_M');
			$this->load->model('SPP_Bulanan_M');
		}

		public function lihat_jadwal_her_registrasi(){
			$result = $this->Her_Registrasi_M->select_jadwal_her_registrasi();

			$data = array(
				'page' => 'Her Registrasi',
				'content' => 'dashboard/kesiswaan/jadwal_her_registrasi',
				'toolbar' => 'Jadwal Her Registrasi',
				'data_jadwal' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function buat_jadwal_her_registrasi(){
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$tgl_selesai = $this->input->post('tgl_selesai');

			$tahun = date('Y');
			$tahun = intval($tahun);

			$ta = ($tahun).'/'.($tahun+1);

			$result = $this->Her_Registrasi_M->insert_jadwal_her_registrasi($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Buat Jadwal </div>');
				redirect('Her_Registrasi_C/lihat_jadwal_her_registrasi');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Buat Jadwal </div>');
				redirect('Her_Registrasi_C/lihat_jadwal_her_registrasi');
			}
		}

		public function ubah_jadwal_her_registrasi(){
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tgl_mulai = $this->input->post('tanggal_mulai');
			$tgl_selesai = $this->input->post('tanggal_selesai');
			$ta = $this->input->post('ta');
			$id_jadwal = $this->input->post('id_jadwal');
			$status = $this->input->post('status');

			$result = $this->Her_Registrasi_M->select_jadwal_her_registrasi_per_id($id_jadwal);

			foreach ($result as $key => $value) {
				if ($keterangan=="") {
					$keterangan = $value->keterangan;
				}

				if ($tgl_mulai=="") {
					$tgl_mulai = $value->tgl_mulai;
				}

				if ($tgl_selesai=="") {
					$tgl_selesai = $value->tgl_selesai;
				}

				if ($ta=="") {
					$ta = $value->ta;
				}

				if ($nama_kegiatan=="") {
					$nama_kegiatan = $value->nama_kegiatan;
				}

				if ($status=="") {
					$status = $value->status;
				}
			}

			$edit = $this->Her_Registrasi_M->edit_jadwal_her_registrasi($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta,$status);

			if ($edit>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Jadwal </div>');
					redirect('Her_Registrasi_C/lihat_jadwal_her_registrasi');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Jadwal </div>');
					redirect('Her_Registrasi_C/lihat_jadwal_her_registrasi');
			}
		}

		public function hapus_jadwal_her_registrasi(){
			$id_jadwal = $this->uri->segment(3);

			$result = $this->Her_Registrasi_M->delete_jadwal_her_registrasi($id_jadwal);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Hapus Jadwal </div>');
				redirect('Her_Registrasi_C/lihat_jadwal_her_registrasi');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Hapus Jadwal </div>');
				redirect('Her_Registrasi_C/lihat_jadwal_her_registrasi');
			}
		}

		public function pendataan_buku_seragam(){
			$result = $this->Her_Registrasi_M->select_pendataan_buku_seragam();

			$data = array(
				'page' => 'Buku & Seragam',
				'content' => 'dashboard/kesiswaan/pendataan_buku_seragam',
				'toolbar' => 'Pendataan Buku dan Seragam',
				'data_jadwal' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function konfirmasi_pendataan_buku_seragam(){
			$nis = $this->uri->segment(3);

			$result = $this->Her_Registrasi_M->insert_pendataan_buku_seragam($nis);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil konfirmasi status.</div>');
				redirect('Her_Registrasi_C/pendataan_buku_seragam');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal konfirmasi status.</div>');
				redirect('Her_Registrasi_C/pendataan_buku_seragam');
			}
		}

		public function informasikan_pendataan_buku_seragam(){
			$no_hp = $this->uri->segment(3);

			$result = $this->Her_Registrasi_M->insert_pendataan_buku_seragam_sms($no_hp);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil mengirim SMS.</div>');
				redirect('Her_Registrasi_C/pendataan_buku_seragam');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal mengirim SMS.</div>');
				redirect('Her_Registrasi_C/pendataan_buku_seragam');
			}
		}

		public function informasikan_pengambilan_buku_seragam(){
			$result = $this->SPP_Bulanan_M->select_data_siswa();

			foreach ($result as $key => $value) {
				$sms = $this->Her_Registrasi_M->insert_pengambilan_buku_seragam_sms($value->no_telp);
			}

			if ($sms>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil mengirim SMS.</div>');
				redirect('Her_Registrasi_C/pendataan_buku_seragam');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal mengirim SMS.</div>');
				redirect('Her_Registrasi_C/pendataan_buku_seragam');
			}
		}

		public function unggah_pembayaran_her_registrasi(){
			$data = array(
				'page' => 'Her Registrasi',
				'content' => 'dashboard/orangtua/unggah_pembayaran_her_registrasi',
				'toolbar' => 'Pembayaran Her Registrasi'
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function unggah_bukti_bayar(){
			$nama_bayar = $_FILES['bukti_bayar']['name'];
			$file = getimagesize($_FILES['bukti_bayar']['tmp_name']);
			$bukti_bayar = addslashes(file_get_contents($_FILES['bukti_bayar']['tmp_name']));
			$mime = $file['mime'];
			$jumlah_bayar = $this->input->post('jumlah_bayar');
			$sisa_bayar = 5000000 - $jumlah_bayar;
			$nis = $this->input->post('nis');
			$status = "";
			$tanggal_bayar = date("Y-m-d");
			$email = $this->session->userdata('email');

			if ($sisa_bayar==0) {
				$status = "Lunas";
			} else if ($sisa_bayar > 0 && $sisa_bayar < 5000000){
				$status = "Kredit";
			}

			$result = $this->Her_Registrasi_M->insert_bukti_bayar($nama_bayar,$bukti_bayar,$jumlah_bayar,$sisa_bayar,$status,$nis,$mime,$tanggal_bayar,$email);
			
			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Bukti bayar berhasil diupload.</div>');
				redirect('Her_Registrasi_C/unggah_pembayaran_her_registrasi');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Bukti bayar gagal diupload.</div>');
				redirect('Her_Registrasi_C/unggah_pembayaran_her_registrasi');
			}
		}

		public function lihat_data_pembayaran_her_registrasi(){
			$result = $this->Her_Registrasi_M->select_pembayaran_her_registrasi();

			$data = array(
				'page' => 'Her Registrasi',
				'content' => 'dashboard/keuangan/pembayaran_her_registrasi',
				'toolbar' => 'Pembayaran Her Registrasi',
				'data_bayar' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function konfirmasi_pembayaran_her_registrasi(){
			$nis = $this->uri->segment(3);

			$result = $this->Her_Registrasi_M->edit_status_pembayaran_her_registrasi($nis);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil konfirmasi status.</div>');
				redirect('Her_Registrasi_C/lihat_data_pembayaran_her_registrasi');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal konfirmasi status.</div>');
				redirect('Her_Registrasi_C/lihat_data_pembayaran_her_registrasi');
			}
		}

		public function informasikan_pembayaran_her_registrasi(){
			$no_hp = $this->uri->segment(3);

			$result = $this->Her_Registrasi_M->informasi_pembayaran($no_hp);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil mengirim SMS.</div>');
				redirect('Her_Registrasi_C/lihat_data_pembayaran_her_registrasi');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal mengirim SMS.</div>');
				redirect('Her_Registrasi_C/lihat_data_pembayaran_her_registrasi');
			}
		}
	}