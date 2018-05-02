<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class panitia extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('m_login','',TRUE);
			//$this->load->model('m_admin','',TRUE);
			$this->load->model('m_panitia');
		}

		//menu jadwal ppdb
		public function jadwal_ppdb(){
			$result = $this->m_panitia->select_jadwal_ppdb();

			$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' => 'panitia/jadwal_ppdb',
				'data_jadwal' => $result
			);

			$this->load->view('template',$data);
		}

		public function buat_jadwal_ppdb(){
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$tgl_selesai = $this->input->post('tgl_selesai');

			$tahun = date('Y');
			$tahun = intval($tahun);

			$ta = ($tahun).'/'.($tahun+1);

			$result = $this->m_panitia->insert_jadwal_ppdb($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Buat Jadwal </div>');
				redirect('panitia/jadwal_ppdb');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Buat Jadwal </div>');
				redirect('panitia/jadwal_ppdb');
			}
		}
		
		public function edit_jadwal_ppdb(){
			$result = $this->m_panitia->select_jadwal_ppdb_per_id($this->uri->segment(3))->row(0,'array');
			
			$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' => 'panitia/edit_jadwal_ppdb',
				'id_jadwal' => $result['id_jadwal'],
				'nama_kegiatan' => $result['nama_kegiatan'],
				'keterangan' => $result['keterangan'],
				'tgl_mulai' => date('d-m-Y',strtotime($result['tgl_mulai'])),
				'tgl_selesai' => date('d-m-Y',strtotime($result['tgl_selesai'])),
				'ta' => $result['ta'],
				'status' => $result['status']
			);

			$this->load->view('template',$data);
		}

		public function ubah_jadwal_ppdb(){
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tgl_mulai = $this->input->post('tanggal_mulai');
			$tgl_selesai = $this->input->post('tanggal_selesai');
			$ta = $this->input->post('ta');
			$id_jadwal = $this->input->post('id_jadwal');
			$status = $this->input->post('status');


			$edit = $this->m_panitia->edit_jadwal_ppdb($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta,$status);

			if ($edit>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Jadwal </div>');
					redirect('panitia/jadwal_ppdb');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Jadwal </div>');
					redirect('panitia/jadwal_ppdb');
			}
		}

		public function hapus_jadwal_ppdb(){
			$id_jadwal = $this->uri->segment(3);

			$result = $this->m_panitia->delete_jadwal_ppdb($id_jadwal);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Hapus Jadwal </div>');
				redirect('panitia/jadwal_ppdb');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Hapus Jadwal </div>');
				redirect('panitia/jadwal_ppdb');
			}
		}
		
		//menu jadwal seleksi
		public function jadwal_seleksi(){
			$result = $this->m_panitia->select_jadwal_seleksi();

			$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' => 'panitia/jadwal_seleksi',
				'data_jadwal' => $result
			);

			$this->load->view('template',$data);
		}

		public function buat_jadwal_seleksi(){
			$tahun = date('Y');
			$tahun = intval($tahun);

			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tanggal = $this->input->post('tanggal');
			$waktu_mulai = $this->input->post('waktu_mulai');
			$waktu_selesai = $this->input->post('waktu_selesai');
			$ta = ($tahun).'/'.($tahun+1);
			$ruangan = $this->input->post('ruangan');

			$result = $this->m_panitia->insert_jadwal_seleksi($nama_kegiatan,$keterangan,$tanggal,$waktu_mulai,$waktu_selesai,$ta,$ruangan);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Buat Jadwal </div>');
				redirect('panitia/jadwal_seleksi');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Buat Jadwal </div>');
				redirect('panitia/jadwal_seleksi');
			}
		}
		
		public function edit_jadwal_seleksi(){
			$result = $this->m_panitia->select_jadwal_seleksi_per_id($this->uri->segment(3))->row(0,'array');
			
			$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' => 'panitia/edit_jadwal_seleksi',
				'id_jadwal' => $result['id_jadwal'],
				'nama_kegiatan' => $result['nama_kegiatan'],
				'keterangan' => $result['keterangan'],
				'tanggal' => date('d-m-Y',strtotime($result['tanggal'])),
				'waktu_mulai' => $result['waktu_mulai'],
				'waktu_selesai' => $result['waktu_selesai'],
				'ta' => $result['ta'],
				'status' => $result['status'],
				'nama_ruangan' => $result['nama_ruangan']
			);

			$this->load->view('template',$data);
		}

		public function ubah_jadwal_seleksi(){
			$id_jadwal = $this->input->post('id_jadwal');
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tanggal = $this->input->post('tanggal');
			$waktu_mulai = $this->input->post('waktu_mulai');
			$waktu_selesai = $this->input->post('waktu_selesai');
			if(isset($_POST['ruangan'])){
				$nama_ruangan = $this->input->post('ruangan');
			}else{
				$nama_ruangan = $this->input->post('ruangan_tamp');
			}
			if(isset($_POST['status'])){
				$status = $this->input->post('status');
			}else{
				$status = $this->input->post('status_tamp');
			}
			$edit = $this->m_panitia->edit_jadwal_seleksi($id_jadwal,$nama_kegiatan,$keterangan,$tanggal,$waktu_mulai,$waktu_selesai,$nama_ruangan,$status);

			if ($edit>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Jadwal </div>');
				redirect('panitia/jadwal_seleksi');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Jadwal </div>');
				redirect('panitia/jadwal_seleksi');
			}
		}

		public function hapus_jadwal_seleksi(){
			$id_jadwal = $this->uri->segment(3);

			$result = $this->m_panitia->delete_jadwal_seleksi($id_jadwal);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Hapus Jadwal </div>');
				redirect('panitia/jadwal_seleksi');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Hapus Jadwal </div>');
				redirect('panitia/jadwal_seleksi');
			}
		}
		
		//menu laporan psikotes
		public function laporan_psikotes(){
			$result = $this->m_panitia->select_data_pembayaran_psikotes();

			$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' => 'panitia/pembayaran_psikotes',
				'data_bayar' => $result
			);

			$this->load->view('template',$data);
		}

		public function konfirmasi_pembayaran_psikotes(){
			$id_bayar = $this->uri->segment(3);
			$no_pendaftaran = $this->uri->segment(4);

			$result = $this->m_panitia->edit_status_konfirmasi_pembayaran($no_pendaftaran,$id_bayar);


			if ($result>=0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil konfirmasi pembayaran.</div>');
				redirect('panitia/laporan_psikotes');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal konfirmasi pembayaran.</div>');
				redirect('panitia/laporan_psikotes');
			}
		}
		
		public function agama_check(){
			$agama = $this->input->post('agama');

            if ($agama=='Agama') {
                $this->form_validation->set_message('agama_check','Silakan pilih Agama');
                return FALSE;
            } else {
                return TRUE;
            }
		}

		public function tgl_lahir_check(){
			$tgl_lahir = $this->input->post('tgl_lahir');

			$date1 = new DateTime($tgl_lahir);
			$date2 = new DateTime(date('2016-06-30'));
			$interval = $date1->diff($date2);

			$tahun = $interval->y;
			$bulan = $interval->m;

			if ($tahun<6) {
				$this->form_validation->set_message('tgl_lahir_check','Usia pendaftar 6 tahun pada juni 2016');
				return FALSE;
            } else {
                return TRUE;
            }
		}

		public function goda_check(){
			$goda = $this->input->post('goda');

            if ($goda=='Golongan Darah') {
                $this->form_validation->set_message('goda_check','Silakan pilih Golongan Darah');
                return FALSE;
            } else {
                return TRUE;
            }
		}

		public function tempat_tinggal_check(){
			$tempat_tinggal = $this->input->post('tempat_tinggal');

            if ($tempat_tinggal=='Tempat Tinggal') {
                $this->form_validation->set_message('tempat_tinggal_check','Silakan pilih Tempat Tinggal');
                return FALSE;
            } else {
                return TRUE;
            }
		}

		public function pdd_ayah_check(){
			$pdd_ayah = $this->input->post('pdd_ayah');

			if ($pdd_ayah=='Pendidikan') {
                $this->form_validation->set_message('pdd_ayah_check','Silakan pilih Pendidikan');
                return FALSE;
            } else {
                return TRUE;
            }
		}

		public function pdd_ibu_check(){
			$pdd_ibu = $this->input->post('pdd_ibu');

			if ($pdd_ibu=='Pendidikan') {
                $this->form_validation->set_message('pdd_ibu_check','Silakan pilih Pendidikan');
                return FALSE;
            } else {
                return TRUE;
            }
		}

		public function pdd_wali_check(){
			$pdd_wali = $this->input->post('pdd_wali');

			if ($pdd_wali=='Pendidikan') {
                $this->form_validation->set_message('pdd_wali_check','Silakan pilih Pendidikan');
                return FALSE;
            } else {
                return TRUE;
            }
		}

		public function asal_anak_check(){
			$asal_anak = $this->input->post('asal_anak');

			if ($asal_anak == 'Asal') {
                $this->form_validation->set_message('asal_anak_check','Silakan pilih Asal Anak');
                return FALSE;
            } else {
                return TRUE;
            }
		}
	}
?>