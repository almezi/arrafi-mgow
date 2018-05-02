<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Her_Registrasi_M extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function select_jadwal_her_registrasi(){
			$tahun = date('Y');
			$tahun = intval($tahun);
			$ta = ($tahun).'/'.($tahun+1);

			$this->db->select('*');
			$this->db->from('jadwal_tanggal');
			$where = array(
				'jenis' => 'Her-Registrasi',
				'ta' => $ta
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_jadwal_her_registrasi($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta,
				'status' => 'Belum',
				'jenis' => 'Her-Registrasi'
			);

			$this->db->insert('jadwal_tanggal',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function select_jadwal_her_registrasi_per_id($id_jadwal){
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

		public function edit_jadwal_her_registrasi($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta,$status){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta,
				'status' => $status,
				'jenis' => 'Her-Registrasi'
			);

			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->update('jadwal_tanggal', $data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function delete_jadwal_her_registrasi($id_jadwal){
			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->delete('jadwal_tanggal');
			return $this->db->affected_rows();
		}

		public function select_pendataan_buku_seragam(){
			$this->db->select('*');
			$this->db->from('pendataan_seragam');
			$this->db->join('data_siswa','data_siswa.nis=pendataan_seragam.nis','right');
			$this->db->order_by('nama_siswa','ASC');
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_pendataan_buku_seragam($nis){
			$data = array(
				'nis' => $nis,
				'status' => 'Sudah'
			);

			$this->db->insert('pendataan_seragam',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function insert_pendataan_buku_seragam_sms($no_hp){
			$data = array(
				'DestinationNumber' => $no_hp,
				'TextDecoded' => 'Silakan mengambil buku dan seragam pada Tata Usaha Bagian Kesiswaan. Ar-Rafi'
			);

			$this->db->insert('outbox',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function insert_pengambilan_buku_seragam_sms($no_hp){
			$data = array(
				'DestinationNumber' => $no_hp,
				'TextDecoded' => 'Silakan mengambil buku dan seragam pada Tata Usaha Bagian Kesiswaan. Ar-Rafi'
			);

			$this->db->insert('outbox',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function insert_bukti_bayar($nama_bayar,$bukti_bayar,$jumlah_bayar,$sisa_bayar,$status,$nis,$mime,$tanggal_bayar,$email){
			
			$data = array(
				'nama_bayar' => $nama_bayar,
				'bukti_bayar' => $bukti_bayar,
				'tanggal_bayar' => $tanggal_bayar,
				'total_bayar' => 5000000,
				'jumlah_bayar' => $jumlah_bayar,
				'sisa_bayar' => $sisa_bayar,
				'status' => $status,
				'jenis' => 'Her-Registrasi',
				'status_konfirmasi' => 'Belum',
				'nis' => $nis,
				'mime' => $mime,
				'email' => $email
			);

			$this->db->insert('pembayaran',$data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function select_pembayaran_her_registrasi(){
			$this->db->select('*');
			$this->db->from('pembayaran_her_registrasi');
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_status_pembayaran_her_registrasi($nis){
			$data = array(
				'status_konfirmasi' => 'Sudah',
				'jenis' => 'Her-Registrasi'
			);
			$this->db->where('nis',$nis);
			$this->db->update('pembayaran',$data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function informasi_pembayaran($no_hp){
			$data = array(
				'DestinationNumber' => $no_hp,
				'TextDecoded' => 'Silakan melakukan pembayaran Her Registrasi. Ar-Rafi'
			);

			$this->db->insert('outbox',$data);
			$query = $this->db->affected_rows();
			return $query;
		}
	}