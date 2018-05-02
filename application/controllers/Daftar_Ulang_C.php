<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Daftar_Ulang_C extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('Daftar_Ulang_M');
		}

		public function lihat_jadwal_daftar_ulang(){
			$result = $this->Daftar_Ulang_M->select_jadwal_daftar_ulang();

			$data = array(
				'page' => 'Daftar Ulang',
				'content' => 'dashboard/panitia/jadwal_daftar_ulang',
				'toolbar' => 'Jadwal Daftar Ulang',
				'data_jadwal' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function buat_jadwal_daftar_ulang(){
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$tgl_selesai = $this->input->post('tgl_selesai');

			$tahun = date('Y');
			$tahun = intval($tahun);

			$ta = ($tahun).'/'.($tahun+1);

			$result = $this->Daftar_Ulang_M->insert_jadwal_daftar_ulang($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Buat Jadwal </div>');
				redirect('Daftar_Ulang_C/lihat_jadwal_daftar_ulang');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Buat Jadwal </div>');
				redirect('Daftar_Ulang_C/lihat_jadwal_daftar_ulang');
			}
		}

		public function ubah_jadwal_daftar_ulang(){
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tgl_mulai = $this->input->post('tanggal_mulai');
			$tgl_selesai = $this->input->post('tanggal_selesai');
			$ta = $this->input->post('ta');
			$id_jadwal = $this->input->post('id_jadwal');
			$status = $this->input->post('status');

			$result = $this->Daftar_Ulang_M->select_jadwal_daftar_ulang_per_id($id_jadwal);

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

			$edit = $this->Daftar_Ulang_M->edit_jadwal_daftar_ulang($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta,$status);

			if ($edit>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Jadwal </div>');
					redirect('Daftar_Ulang_C/lihat_jadwal_daftar_ulang');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Jadwal </div>');
					redirect('Daftar_Ulang_C/lihat_jadwal_daftar_ulang');
			}
		}

		public function hapus_jadwal_daftar_ulang(){
			$id_jadwal = $this->uri->segment(3);

			$result = $this->Daftar_Ulang_M->delete_jadwal_daftar_ulang($id_jadwal);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Hapus Jadwal </div>');
				redirect('Daftar_Ulang_C/lihat_jadwal_daftar_ulang');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Hapus Jadwal </div>');
				redirect('Daftar_Ulang_C/lihat_jadwal_daftar_ulang');
			}
		}

		public function lihat_dokumen_daftar_ulang(){
			$result = $this->Daftar_Ulang_M->select_dokumen_daftar_ulang();

			$data = array(
				'page' => 'Daftar Ulang',
				'content' => 'dashboard/panitia/dokumen_daftar_ulang',
				'toolbar' => 'Dokumen Daftar Ulang',
				'data_dokumen' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function unggah_dokumen_persyaratan(){
			$data = array(
				'page' => 'Daftar Ulang',
				'content' => 'dashboard/orangtua/unggah_dokumen',
				'toolbar' => 'Dokumen Daftar Ulang'
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function unggah_pembayaran_daftar_ulang(){
			$data = array(
				'page' => 'Daftar Ulang',
				'content' => 'dashboard/orangtua/unggah_pembayaran_daftar_ulang',
				'toolbar' => 'Pembayaran Daftar Ulang'
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function unggah_bukti_bayar(){
			$nama_bayar = $_FILES['bukti_bayar']['name'];
			$file = getimagesize($_FILES['bukti_bayar']['tmp_name']);
			$bukti_bayar = addslashes(file_get_contents($_FILES['bukti_bayar']['tmp_name']));
			$mime = $file['mime'];
			$jumlah_bayar = $this->input->post('jumlah_bayar');
			$sisa_bayar = 17500000 - $jumlah_bayar;
			$no_pendaftaran = $this->input->post('no_pendaftaran');
			$status = "";
			$tanggal_bayar = date("Y-m-d");
			$email = $this->session->userdata('email');

			if ($sisa_bayar==0) {
				$status = "Lunas";
			} else if ($sisa_bayar > 0 && $sisa_bayar < 17500000){
				$status = "Kredit";
			}

			$result = $this->Daftar_Ulang_M->insert_bukti_bayar($nama_bayar,$bukti_bayar,$jumlah_bayar,$sisa_bayar,$status,$no_pendaftaran,$mime,$tanggal_bayar,$email);
			
			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Bukti bayar berhasil diupload.</div>');
				redirect('Daftar_Ulang_C/unggah_pembayaran_daftar_ulang');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Bukti bayar gagal diupload.</div>');
				redirect('Daftar_Ulang_C/unggah_pembayaran_daftar_ulang');
			}
		}

		public function konfirmasi_kelengkapan_daftar_ulang(){
			$no_pendaftaran = $this->uri->segment(3);

			$result = $this->Daftar_Ulang_M->edit_status_kelengkapan_daftar_ulang($no_pendaftaran);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil konfirmasi status.</div>');
				redirect('Daftar_Ulang_C/lihat_dokumen_daftar_ulang');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal konfirmasi status.</div>');
				redirect('Daftar_Ulang_C/lihat_dokumen_daftar_ulang');
			}
		}

		public function informasikan_kelengkapan_daftar_ulang(){
			$no_hp = $this->uri->segment(3);

			$result = $this->Daftar_Ulang_M->informasi_kelengkapan_dokumen($no_hp);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil mengirim SMS kelengkapan berkas.</div>');
				redirect('Daftar_Ulang_C/lihat_dokumen_daftar_ulang');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal mengirim SMS kelengkapan berkas.</div>');
				redirect('Daftar_Ulang_C/lihat_dokumen_daftar_ulang');
			}
		}

		public function lihat_data_pembayaran_daftar_ulang(){
			$result = $this->Daftar_Ulang_M->select_pembayaran_daftar_ulang();

			$data = array(
				'page' => 'Daftar Ulang',
				'content' => 'dashboard/keuangan/pembayaran_daftar_ulang',
				'toolbar' => 'Pembayaran Daftar Ulang',
				'data_bayar' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function konfirmasi_pembayaran_daftar_ulang(){
			$no_pendaftaran = $this->uri->segment(3);

			$result = $this->Daftar_Ulang_M->edit_status_pembayaran_daftar_ulang($no_pendaftaran);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil konfirmasi status.</div>');
				redirect('Daftar_Ulang_C/lihat_data_pembayaran_daftar_ulang');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal konfirmasi status.</div>');
				redirect('Daftar_Ulang_C/lihat_data_pembayaran_daftar_ulang');
			}
		}

		public function informasikan_pembayaran_daftar_ulang(){
			$no_hp = $this->uri->segment(3);

			$result = $this->Daftar_Ulang_M->informasi_pembayaran($no_hp);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil mengirim SMS.</div>');
				redirect('Daftar_Ulang_C/lihat_data_pembayaran_daftar_ulang');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal mengirim SMS.</div>');
				redirect('Daftar_Ulang_C/lihat_data_pembayaran_daftar_ulang');
			}
		}

		public function upload_berkas(){
			$nama_akta = $_FILES['akta']['name'];
			$akta_kelahiran = $_FILES['akta']['tmp_name'];
			$nama_ktp = $_FILES['ktp']['name'];
			$ktp = $_FILES['ktp']['tmp_name'];
			$nama_kk = $_FILES['kk']['name'];
			$kartu_keluarga = $_FILES['kk']['tmp_name'];
			$nama_sk = $_FILES['sk']['name'];
			$surat_keterangan = $_FILES['sk']['tmp_name'];
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');

			$hasil = $this->Daftar_Ulang_M->select_unggah_berkas_per_no_pendaftaran($no_pendaftaran);

			foreach ($hasil as $key => $value) {
				if ($nama_akta=="" || $akta_kelahiran=="") {
					$nama_akta = $value->nama_akta;
					$akta_kelahiran = $value->akta_kelahiran;
				}

				if ($nama_ktp=="" || $ktp=="") {
					$nama_ktp = $value->nama_ktp;
					$ktp = $value->ktp;
				}

				if ($nama_kk=="" || $kartu_keluarga=="") {
					$nama_kk = $value->nama_kk;
					$kartu_keluarga = $value->kartu_keluarga;
				}

				if ($nama_sk=="" || $surat_keterangan=="") {
					$nama_sk = $value->nama_sk;
					$surat_keterangan = $value->surat_keterangan;
				}
			}
			
			$result = $this->Daftar_Ulang_M->insert_berkas($no_pendaftaran,$nama_akta,$akta_kelahiran,$nama_ktp,$ktp,$nama_kk,$kartu_keluarga,$nama_sk,$surat_keterangan);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil unggah berkas</div>');
				redirect('Daftar_Ulang_C/unggah_dokumen_persyaratan');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal unggah berkas</div>');
				redirect('Daftar_Ulang_C/unggah_dokumen_persyaratan');
			}
		}
	}