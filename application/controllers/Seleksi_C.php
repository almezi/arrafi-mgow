<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Seleksi_C extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('Seleksi_M');
		}

		public function lihat_nilai_ops(){
			$result = $this->Seleksi_M->select_nilai_ops();
			
			$data = array(
				'page' => 'Observasi Pengenalan Sekolah',
				'content' => 'dashboard/panitia/ops',
				'toolbar' => 'Hasil OPS',
				'data_nilai' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function input_nilai_ops(){
			$no_pendaftaran = $this->input->post('no_pendaftaran');
			$self_identity = $this->input->post('self_identity');
			$part_of_body = $this->input->post('part_of_body');
			$observation = $this->input->post('observation');
			$math_counting = $this->input->post('math_counting');
			$writing_reading = $this->input->post('writing_reading');
			$pengetahuan_agama = $this->input->post('pengetahuan_agama');
			$sikap = $this->input->post('sikap');
			$keterangan = $this->input->post('keterangan');

			$result = $this->Seleksi_M->select_nilai_ops_per_no_pendaftaran($no_pendaftaran);

			foreach ($result as $key => $value) {
				if ($self_identity=="") {
					$self_identity = $value->self_identity;
				}

				if ($part_of_body=="") {
					$part_of_body = $value->part_of_body;
				}

				if ($observation=="") {
					$observation = $value->observation;
				}

				if ($math_counting=="") {
					$math_counting = $value->math_counting;
				}

				if ($writing_reading=="") {
					$writing_reading = $value->writing_reading;
				}

				if ($pengetahuan_agama=="") {
					$pengetahuan_agama = $value->pengetahuan_agama;
				}

				if ($sikap=="") {
					$sikap = $value->sikap;
				}

				if ($keterangan=="") {
					$keterangan = $value->keterangan;
				}
			}

			$total = $self_identity + $part_of_body + $observation + $math_counting + $writing_reading + $pengetahuan_agama + $sikap;

			if ($total >= 234 && $total<=300) {
				$status = 'Diterima';
			} elseif ($total >= 230 && $total<=233)  {
				$status = 'Dipertimbangkan';
			} elseif ($total < 230) {
				$status = 'Ditolak';
			}

			$result = $this->Seleksi_M->insert_nilai_ops($self_identity,$part_of_body,$observation,$math_counting,$writing_reading,$pengetahuan_agama,$sikap,$keterangan,$total,$status,$no_pendaftaran);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Input Nilai OPS </div>');
				redirect('Seleksi_C/lihat_nilai_ops');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Input Nilai OPS </div>');
				redirect('Seleksi_C/lihat_nilai_ops');
			}
		}

		public function ubah_nilai_ops(){
			$no_pendaftaran = $this->input->post('no_pendaftaran');
			$self_identity = $this->input->post('self_identity');
			$part_of_body = $this->input->post('part_of_body');
			$observation = $this->input->post('observation');
			$math_counting = $this->input->post('math_counting');
			$writing_reading = $this->input->post('writing_reading');
			$pengetahuan_agama = $this->input->post('pengetahuan_agama');
			$sikap = $this->input->post('sikap');
			$keterangan = $this->input->post('keterangan');

			$result = $this->Seleksi_M->select_nilai_ops_per_no_pendaftaran($no_pendaftaran);

			foreach ($result as $key => $value) {
				if ($self_identity=="") {
					$self_identity = $value->self_identity;
				}

				if ($part_of_body=="") {
					$part_of_body = $value->part_of_body;
				}

				if ($observation=="") {
					$observation = $value->observation;
				}

				if ($math_counting=="") {
					$math_counting = $value->math_counting;
				}

				if ($writing_reading=="") {
					$writing_reading = $value->writing_reading;
				}

				if ($pengetahuan_agama=="") {
					$pengetahuan_agama = $value->pengetahuan_agama;
				}

				if ($sikap=="") {
					$sikap = $value->sikap;
				}

				if ($keterangan=="") {
					$keterangan = $value->keterangan;
				}
			}

			$total = $self_identity + $part_of_body + $observation + $math_counting + $writing_reading + $pengetahuan_agama + $sikap;

			if ($total >= 234 && $total<=300) {
				$status = 'Diterima';
			} elseif ($total >= 230 && $total<=233)  {
				$status = 'Dipertimbangkan';
			} elseif ($total < 230) {
				$status = 'Ditolak';
			}

			$result = $this->Seleksi_M->edit_nilai_ops($self_identity,$part_of_body,$observation,$math_counting,$writing_reading,$pengetahuan_agama,$sikap,$keterangan,$total,$status,$no_pendaftaran);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Nilai OPS </div>');
				redirect('Seleksi_C/lihat_nilai_ops');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Nilai OPS </div>');
				redirect('Seleksi_C/lihat_nilai_ops');
			}
		}

		public function lihat_nilai_ok(){
			$result = $this->Seleksi_M->select_nilai_ok();
			
			$data = array(
				'page' => 'Observasi Kelas',
				'content' => 'dashboard/panitia/ok',
				'toolbar' => 'Hasil OK',
				'data_nilai' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function input_nilai_ok(){
			$no_pendaftaran = $this->input->post('no_pendaftaran');
			$koordinasi_keseimbangan = $this->input->post('koordinasi_keseimbangan');
			$sosial = $this->input->post('sosial');
			$pengendalian_gerak = $this->input->post('pengendalian_gerak');

			$nilai_ok = $this->Seleksi_M->select_nilai_ok_per_no_pendaftaran($no_pendaftaran);

			foreach ($nilai_ok as $key => $value) {
				if ($koordinasi_keseimbangan=="") {
					$koordinasi_keseimbangan = $value->koordinasi_keseimbangan;
				}

				if ($sosial=="") {
					$sosial = $value->sosial;
				}

				if ($pengendalian_gerak=="") {
					$pengendalian_gerak = $value->pengendalian_gerak;
				}
			}

			$total = $koordinasi_keseimbangan+$sosial+$pengendalian_gerak;

			if ($total>=27 && $total<=39) {
				$status = 'Diterima';
			} else if ($total<27){
				$status = 'Ditolak';
			}

			$result = $this->Seleksi_M->insert_nilai_ok($no_pendaftaran,$koordinasi_keseimbangan,$sosial,$pengendalian_gerak,$total,$status);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Input Nilai OK </div>');
				redirect('Seleksi_C/lihat_nilai_ok');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Input Nilai OK </div>');
				redirect('Seleksi_C/lihat_nilai_ok');
			}
		}

		public function ubah_nilai_ok(){
			$no_pendaftaran = $this->input->post('no_pendaftaran');
			$koordinasi_keseimbangan = $this->input->post('koordinasi_keseimbangan');
			$sosial = $this->input->post('sosial');
			$pengendalian_gerak = $this->input->post('pengendalian_gerak');

			$nilai_ok = $this->Seleksi_M->select_nilai_ok_per_no_pendaftaran($no_pendaftaran);

			foreach ($nilai_ok as $key => $value) {
				if ($koordinasi_keseimbangan=="") {
					$koordinasi_keseimbangan = $value->koordinasi_keseimbangan;
				}

				if ($sosial=="") {
					$sosial = $value->sosial;
				}

				if ($pengendalian_gerak=="") {
					$pengendalian_gerak = $value->pengendalian_gerak;
				}
			}

			$total = $koordinasi_keseimbangan+$sosial+$pengendalian_gerak;

			if ($total>=27 && $total<=39) {
				$status = 'Diterima';
			} else if ($total<27){
				$status = 'Ditolak';
			}

			$result = $this->Seleksi_M->edit_nilai_ok($no_pendaftaran,$koordinasi_keseimbangan,$sosial,$pengendalian_gerak,$total,$status);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Nilai OK </div>');
				redirect('Seleksi_C/lihat_nilai_ok');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Nilai OK </div>');
				redirect('Seleksi_C/lihat_nilai_ok');
			}
		}

		public function lihat_nilai_rekap(){
			$result = $this->Seleksi_M->select_nilai_rekap();
			
			$data = array(
				'page' => 'Rekapitulasi',
				'content' => 'dashboard/panitia/rekap',
				'toolbar' => 'Rekapitulasi',
				'data_nilai' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function hasil_seleksi(){
			$no_pendaftaran = $this->uri->segment(4);
			$status = $this->uri->segment(3);

			$result = $this->Seleksi_M->edit_hasil_seleksi($no_pendaftaran,$status);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ganti Status </div>');
				redirect('Seleksi_C/lihat_nilai_rekap');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Ganti Status </div>');
				redirect('Seleksi_C/lihat_nilai_rekap');
			}
		}

		public function lihat_pengumuman_seleksi(){
			$result = $this->Seleksi_M->select_pengumuman();
			
			$data = array(
				'page' => 'Pengumuman Seleksi',
				'content' => 'dashboard/panitia/pengumuman',
				'toolbar' => 'Pengumuman Seleksi',
				'data_pengumuman' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function pengumuman_seleksi(){
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');
			$result = $this->session->select_pengumuman_seleksi($no_pendaftaran);

			$data = array(
				'page' => 'Pengumuman Seleksi',
				'content' => 'dashboard/pendaftar/pengumuman',
				'toolbar' => 'Pengumuman Seleksi',
				'data_pengumuman' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function hasil_psikotes(){
			$psikotes = $this->uri->segment(3);
			$no_pendaftaran = $this->uri->segment(4);

			$result = $this->Seleksi_M->edit_hasil_psikotes($psikotes,$no_pendaftaran);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ganti Status </div>');
				redirect('Seleksi_C/lihat_nilai_rekap');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Ganti Status </div>');
				redirect('Seleksi_C/lihat_nilai_rekap');
			}
		}

		public function hasil_wawancara(){
			$wawancara = $this->uri->segment(3);
			$no_pendaftaran = $this->uri->segment(4);

			if ($wawancara=='Tidak') {
				$wawancara = 'Tidak Siap';
			}

			$result = $this->Seleksi_M->edit_hasil_wawancara($wawancara,$no_pendaftaran);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ganti Status </div>');
				redirect('Seleksi_C/lihat_nilai_rekap');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Ganti Status </div>');
				redirect('Seleksi_C/lihat_nilai_rekap');
			}
		}

		public function umumkan(){
			$result = $this->Seleksi_M->select_pengumuman();

			foreach ($result as $key => $value) {
				$sms = $this->Seleksi_M->insert_outbox_pengumuman($value->no_hp);
			}

			if ($sms>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil mengumumkan.</div>');
				redirect('Seleksi_C/lihat_pengumuman_seleksi');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal mengumumkan.</div>');
				redirect('Seleksi_C/lihat_pengumuman_seleksi');
			}
		}
	}