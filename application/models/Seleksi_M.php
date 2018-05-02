<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Seleksi_M extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function select_nilai_ops(){
			$this->db->select('*');
			$this->db->from('penilaian_ops');
			$this->db->order_by('total','ASC');
			$query = $this->db->get();
			return $query->result();
		}

		public function select_nilai_ops_per_no_pendaftaran($no_pendaftaran){
			$this->db->select('*');
			$this->db->from('penilaian_ops');
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_nilai_ops($self_identity,$part_of_body,$observation,$math_counting,$writing_reading,$pengetahuan_agama,$sikap,$keterangan,$total,$status,$no_pendaftaran){
			$data = array(
				'self_identity' => $self_identity,
				'part_of_body' => $part_of_body,
				'observation' => $observation,
				'math_counting' => $math_counting,
				'writing_reading' => $writing_reading,
				'pengetahuan_agama' => $pengetahuan_agama,
				'sikap' => $sikap,
				'keterangan' => $keterangan,
				'total' => $total,
				'status' => $status
			);

			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('penilaian_ops',$data);
			return $this->db->affected_rows();
		}

		public function edit_nilai_ops($self_identity,$part_of_body,$observation,$math_counting,$writing_reading,$pengetahuan_agama,$sikap,$keterangan,$total,$status,$no_pendaftaran){
			$data = array(
				'self_identity' => $self_identity,
				'part_of_body' => $part_of_body,
				'observation' => $observation,
				'math_counting' => $math_counting,
				'writing_reading' => $writing_reading,
				'pengetahuan_agama' => $pengetahuan_agama,
				'sikap' => $sikap,
				'keterangan' => $keterangan,
				'total' => $total,
				'status' => $status
			);

			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('penilaian_ops',$data);
			return $this->db->affected_rows();
		}

		public function select_nilai_ok(){
			$this->db->select('*');
			$this->db->from('penilaian_ok');
			$this->db->order_by('total','ASC');
			$query = $this->db->get();
			return $query->result();
		}

		public function select_nilai_ok_per_no_pendaftaran($no_pendaftaran){
			$this->db->select('*');
			$this->db->from('penilaian_ok');
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_nilai_ok($no_pendaftaran,$koordinasi_keseimbangan,$sosial,$pengendalian_gerak,$total,$status){
			$data = array(
				'koordinasi_keseimbangan' => $koordinasi_keseimbangan,
				'sosial' => $sosial,
				'pengendalian_gerak' => $pengendalian_gerak,
				'total' => $total,
				'status' => $status
			);
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('penilaian_ok',$data);
			return $this->db->affected_rows();
		}

		public function edit_nilai_ok($no_pendaftaran,$koordinasi_keseimbangan,$sosial,$pengendalian_gerak,$total,$status){
			$data = array(
				'koordinasi_keseimbangan' => $koordinasi_keseimbangan,
				'sosial' => $sosial,
				'pengendalian_gerak' => $pengendalian_gerak,
				'total' => $total,
				'status' => $status
			);
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('penilaian_ok',$data);
			return $this->db->affected_rows();
		}

		public function select_nilai_rekap(){
			$this->db->select('*');
			$this->db->from('rekap_seleksi');
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_hasil_seleksi($no_pendaftaran,$status){
			$data = array(
				'status' => $status
			);
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('rekap_seleksi',$data);
			return $this->db->affected_rows();
		}

		public function select_pengumuman(){
			$this->db->select('*');
			$this->db->from('pengumuman_seleksi');
			$query = $this->db->get();
			return $query->result();
		}

		public function select_pengumuman_seleksi($no_pendaftaran){
			$this->db->select('status');
			$this->db->from('formulir');
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_hasil_psikotes($psikotes,$no_pendaftaran){
			$data = array(
				'psikotes' => $psikotes
			);

			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('rekap_seleksi',$data);
			return $this->db->affected_rows();
		}

		public function edit_hasil_wawancara($wawancara,$no_pendaftaran){
			$data = array(
				'wawancara' => $wawancara
			);

			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('rekap_seleksi',$data);
			return $this->db->affected_rows();
		}

		public function insert_outbox_pengumuman($no_hp){
			$data = array(
				'DestinationNumber' => $no_hp,
				'TextDecoded' => 'Selamat Anda dinyatakan lulus dan silakan melakukan daftar ulang. Ar-Rafi'
			);

			$this->db->insert('outbox',$data);
			return $this->db->affected_rows();
		}
	}