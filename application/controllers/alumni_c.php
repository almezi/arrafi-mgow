<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class alumni_c extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('alumni_m');
		}

		public function lihat_jadwal_pengambilan_ijazah(){
			$result = $this->alumni_m->select_jadwal_pengambilan_ijazah();

			$data = array(
				'page' => 'Pengambilan Ijazah',
				'content' => 'dashboard/kesiswaan/jadwal_pengambilan_ijazah',
				'toolbar' => 'Jadwal Pengambilan Ijazah',
				'data_jadwal' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function buat_jadwal_pengambilan_ijazah(){
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$tgl_selesai = $this->input->post('tgl_selesai');

			$tahun = date('Y');
			$tahun = intval($tahun);

			$ta = ($tahun).'/'.($tahun+1);

			$result = $this->alumni_m->insert_jadwal_pengambilan_ijazah($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Buat Jadwal </div>');
				redirect('alumni_c/lihat_jadwal_pengambilan_ijazah');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Buat Jadwal </div>');
				redirect('alumni_c/lihat_jadwal_pengambilan_ijazah');
			}
		}

		public function ubah_jadwal_pengambilan_ijazah(){
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tgl_mulai = $this->input->post('tanggal_mulai');
			$tgl_selesai = $this->input->post('tanggal_selesai');
			$ta = $this->input->post('ta');
			$id_jadwal = $this->input->post('id_jadwal');
			$status = $this->input->post('status');

			$result = $this->alumni_m->select_jadwal_pengambilan_ijazah_per_id($id_jadwal);

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

			$edit = $this->alumni_m->edit_jadwal_pengambilan_ijazah($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta,$status);

			if ($edit>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Jadwal </div>');
					redirect('alumni_c/lihat_jadwal_pengambilan_ijazah');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Jadwal </div>');
					redirect('alumni_c/lihat_jadwal_pengambilan_ijazah');
			}
		}

		public function hapus_jadwal_pengambilan_ijazah(){
			$id_jadwal = $this->uri->segment(3);

			$result = $this->alumni_m->delete_jadwal_pengambilan_ijazah($id_jadwal);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Hapus Jadwal </div>');
				redirect('alumni_c/lihat_jadwal_pengambilan_ijazah');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Hapus Jadwal </div>');
				redirect('alumni_c/lihat_jadwal_pengambilan_ijazah');
			}
		}

		public function lihat_pengambilan_ijazah(){
			$result = $this->alumni_m->select_pengambilan_ijazah();

			$data = array(
				'page' => 'Pengambilan Ijazah',
				'content' => 'dashboard/kesiswaan/pengambilan_ijazah',
				'toolbar' => 'Pengambilan Ijazah',
				'data_pengambilan' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function form_pendataan_alumni(){
			$data = array(
				'page' => 'Pendataan Alumni',
				'content' => 'dashboard/orangtua/pendataan_alumni',
				'toolbar' => 'Pendataan Alumni'
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function input_pendataan_alumni(){
			$this->form_validation->set_rules('nis','NIS','required');
			if ($this->form_validation->run()==false) {
				$data = array(
					'page' => 'Pendataan Alumni',
					'content' => 'dashboard/orangtua/pendataan_alumni',
					'toolbar' => 'Pendataan Alumni'
				);

				$this->parser->parse('dashboard/index',$data);
			} else {
				$nis = $this->input->post('nis');
				$persepsi = $this->input->post('persepsi');
				$jekel = $this->input->post('jekel');
				$domisili = $this->input->post('domisili');
				$tujuan_lanjutan = $this->input->post('tujuan_lanjutan');
				$nama_lanjutan = ucwords($this->input->post('tujuan_lanjutan'));
				$matematika = $this->input->post('matematika');
				$indonesia = $this->input->post('indonesia');
				$english = $this->input->post('english');
				$ipa = $this->input->post('ipa');
				$ips = $this->input->post('ips');

				foreach ($persepsi as $key => $value) {
					$persepsi = $value;
				}

				$result = $this->alumni_m->insert_pendataan_alumni($nis,$persepsi,$jekel,$domisili,$tujuan_lanjutan,$nama_lanjutan,$matematika,$indonesia,$english,$ipa,$ips);

				if ($result>0) {
					$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Input Data </div>');
					redirect('alumni_c/form_pendataan_alumni');
				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Input Data </div>');
					redirect('alumni_c/form_pendataan_alumni');
				}
			}
		}

		public function konfirmasi_pengambilan_ijazah(){
			$nis = $this->uri->segment(3);

			$result = $this->alumni_m->insert_pengambilan_ijazah($nis);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil konfirmasi status.</div>');
				redirect('alumni_c/lihat_pengambilan_ijazah');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal konfirmasi status.</div>');
				redirect('alumni_c/lihat_pengambilan_ijazah');
			}
		}

		public function informasikan_pengambilan_ijazah(){
			$no_hp = $this->uri->segment(3);

			$result = $this->alumni_m->insert_pengambilan_ijazah_sms($no_hp);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil mengirim SMS.</div>');
				redirect('alumni_c/lihat_pengambilan_ijazah');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal mengirim SMS.</div>');
				redirect('alumni_c/lihat_pengambilan_ijazah');
			}
		}

		public function grafik_alumni(){
			$result = $this->alumni_m->select_grafik_alumni();

			$data = array(
				'page' => 'Alumni',
				'content' => 'dashboard/kesiswaan/grafik_alumni',
				'toolbar' => 'Alumni',
				'data_alumni' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}
	}