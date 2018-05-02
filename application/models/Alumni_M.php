<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Alumni_M extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function select_jadwal_pengambilan_ijazah(){
			$tahun = date('Y');
			$tahun = intval($tahun);
			$ta = ($tahun).'/'.($tahun+1);

			$this->db->select('*');
			$this->db->from('jadwal_tanggal');
			$where = array(
				'jenis' => 'Pengambilan Ijazah',
				'ta' => $ta
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_jadwal_pengambilan_ijazah($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta,
				'status' => 'Belum',
				'jenis' => 'Pengambilan Ijazah'
			);

			$this->db->insert('jadwal_tanggal',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function edit_jadwal_pengambilan_ijazah($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta,$status){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta,
				'status' => $status,
				'jenis' => 'Pengambilan Ijazah'
			);

			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->update('jadwal_tanggal', $data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function select_jadwal_pengambilan_ijazah_per_id($id_jadwal){
			$tahun = date('Y');
			$tahun = intval($tahun);
			$ta = ($tahun).'/'.($tahun+1);

			$this->db->select('*');
			$this->db->from('jadwal_tanggal');
			$where = array(
				'id_jadwal' => $id_jadwal,
				'ta' => $ta
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function delete_jadwal_pengambilan_ijazah($id_jadwal){
			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->delete('jadwal_tanggal');
			return $this->db->affected_rows();
		}

		public function select_pengambilan_ijazah(){
			$this->db->select('*');
			$this->db->from('data_siswa');
			$this->db->where('kelas','6');
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_pendataan_alumni($nis,$persepsi,$jekel,$domisili,$tujuan_lanjutan,$nama_lanjutan,$matematika,$indonesia,$english,$ipa,$ips){
			$data = array(
				'nis' => $nis,
				'persepsi' => $persepsi,
				'jekel' => $jekel,
				'domisili' => $domisili,
				'tujuan_lanjutan' => $tujuan_lanjutan,
				'nama_lanjutan' => $nama_lanjutan,
				'matematika' => $matematika,
				'indonesia' => $indonesia,
				'english' => $english,
				'ipa' => $ipa,
				'ips' => $ips
			);

			$this->db->insert('pendataan_alumni',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function select_grafik_alumni(){
			$query = $this->db->query('CALL `grafik_persepsi`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10, @p11, @p12)');
			$query = $this->db->query('SELECT @p0 AS `persepsi_1`, @p1 AS `persepsi_2`, @p2 AS `persepsi_3`, @p3 AS `persepsi_4`, @p4 AS `jekel_l`, @p5 AS `jekel_p`, @p6 AS `domisili_kota`, @p7 AS `domisili_kab`, @p8 AS `tujuan_smpn`, @p9 AS `tujuan_smps`, @p10 AS `tujuan_mtsn`, @p11 AS `tujuan_mtss`, @p12 AS `jumlah_alumni`');
			return $query->result();
		}

		public function insert_pengambilan_ijazah($nis){
			$data = array(
				'nis' => $nis,
				'status' => 'Sudah'
			);

			$this->db->insert('pengambilan_ijazah',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function insert_pengambilan_ijazah_sms($no_hp){
			$data = array(
				'DestinationNumber' => $no_hp,
				'TextDecoded' => 'Silakan mengambil ijazah pada Tata Usaha Bagian Kesiswaan. Ar-Rafi'
			);

			$this->db->insert('outbox',$data);
			$result = $this->db->affected_rows();
			return $result;
		}
	}