<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Daftar_Ulang_M extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function select_jadwal_daftar_ulang(){
			$tahun = date('Y');
			$tahun = intval($tahun);
			$ta = ($tahun).'/'.($tahun+1);

			$this->db->select('*');
			$this->db->from('jadwal_tanggal');
			$where = array(
				'jenis' => 'Daftar Ulang',
				'ta' => $ta
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_jadwal_daftar_ulang($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta,
				'status' => 'Belum',
				'jenis' => 'Daftar Ulang'
			);

			$this->db->insert('jadwal_tanggal',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function edit_jadwal_daftar_ulang($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta,$status){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta,
				'status' => $status,
				'jenis' => 'Daftar Ulang'
			);

			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->update('jadwal_tanggal', $data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function select_jadwal_daftar_ulang_per_id($id_jadwal){
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

		public function delete_jadwal_daftar_ulang($id_jadwal){
			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->delete('jadwal_tanggal');
			return $this->db->affected_rows();
		}

		public function select_dokumen_daftar_ulang(){
			$this->db->select('*');
			$this->db->from('formulir');
			$this->db->join('dokumen_daftar_ulang','dokumen_daftar_ulang.no_pendaftaran=formulir.no_pendaftaran');
			$this->db->join('buku_tamu','formulir.email=buku_tamu.email');
			$this->db->order_by('formulir.no_pendaftaran','ASC');
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_bukti_bayar($nama_bayar,$bukti_bayar,$jumlah_bayar,$sisa_bayar,$status,$no_pendaftaran,$mime,$tanggal_bayar,$email){
			
			$data = array(
				'nama_bayar' => $nama_bayar,
				'bukti_bayar' => $bukti_bayar,
				'tanggal_bayar' => $tanggal_bayar,
				'total_bayar' => 17500000,
				'jumlah_bayar' => $jumlah_bayar,
				'sisa_bayar' => $sisa_bayar,
				'status' => $status,
				'jenis' => 'Daftar Ulang',
				'status_konfirmasi' => 'Belum',
				'no_pendaftaran' => $no_pendaftaran,
				'mime' => $mime,
				'email' => $email
			);

			$this->db->insert('pembayaran',$data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function edit_status_kelengkapan_daftar_ulang($no_pendaftaran){
			$data = array(
				'status' => 'Sudah'
			);
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('dokumen_daftar_ulang',$data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function informasi_kelengkapan_dokumen($no_hp){
			$data = array(
				'DestinationNumber' => $no_hp,
				'TextDecoded' => 'Silakan melengkapi dokumen untuk mengikuti proses daftar ulang. Ar-Rafi'
			);

			$this->db->insert('outbox',$data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function select_pembayaran_daftar_ulang(){
			$this->db->select('*');
			$this->db->from('formulir');
			$this->db->join('pembayaran','pembayaran.no_pendaftaran=formulir.no_pendaftaran');
			$this->db->join('buku_tamu','formulir.email=buku_tamu.email');
			$this->db->order_by('formulir.no_pendaftaran','ASC');
			$this->db->where('jenis','Daftar Ulang');
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_status_pembayaran_daftar_ulang($no_pendaftaran){
			$data = array(
				'status_konfirmasi' => 'Sudah',
				'jenis' => 'Daftar Ulang'
			);
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('pembayaran',$data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function informasi_pembayaran($no_hp){
			$data = array(
				'DestinationNumber' => $no_hp,
				'TextDecoded' => 'Silakan melakukan pembayaran untuk mengikuti proses daftar ulang. Ar-Rafi'
			);

			$this->db->insert('outbox',$data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function select_unggah_berkas_per_no_pendaftaran($no_pendaftaran){
			$this->db->select('*');
			$this->db->from('dokumen_daftar_ulang');
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_berkas($no_pendaftaran,$nama_akta,$akta_kelahiran,$nama_ktp,$ktp,$nama_kk,$kartu_keluarga,$nama_sk,$surat_keterangan){
			$data = array(
				'nama_akta' => $nama_akta,
				'akta_kelahiran' => $akta_kelahiran,
				'nama_ktp' => $nama_ktp,
				'ktp' => $ktp,
				'nama_kk' => $nama_kk,
				'kk' => $kartu_keluarga,
				'nama_sk' => $nama_sk,
				'surat_keterangan' => $surat_keterangan,
				'status' => 'Belum'
			);

			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('dokumen_daftar_ulang',$data);
			return $this->db->affected_rows();
		}
	}