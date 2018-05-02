<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class SPP_Bulanan_M extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function insert_bukti_bayar($nama_bayar,$bukti_bayar,$jumlah_bayar,$sisa_bayar,$status,$nis,$mime,$tanggal_bayar,$email){
			
			$data = array(
				'nama_bayar' => $nama_bayar,
				'bukti_bayar' => $bukti_bayar,
				'tanggal_bayar' => $tanggal_bayar,
				'total_bayar' => 750000,
				'jumlah_bayar' => $jumlah_bayar,
				'sisa_bayar' => $sisa_bayar,
				'status' => $status,
				'jenis' => 'SPP',
				'status_konfirmasi' => 'Belum',
				'nis' => $nis,
				'mime' => $mime,
				'email' => $email
			);

			$this->db->insert('pembayaran',$data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function select_riwayat_pembayaran_per_email($email){
			$this->db->select('*');
			$this->db->from('pembayaran');

			$where = array(
				'jenis' => 'SPP',
				'email' => $email
			);
			$this->db->order_by('tanggal_bayar','ASC');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function select_data_siswa(){
			$this->db->select('*');
			$this->db->from('data_siswa');
			$this->db->order_by('nis','ASC');
			$query = $this->db->get();
			return $query->result();
		}

		public function select_pembayaran_spp_bulanan(){
			$this->db->select('*');
			$this->db->from('data_siswa');
			$this->db->join('pembayaran','data_siswa.nis=pembayaran.nis');
			$this->db->order_by('data_siswa.nis','ASC');
			$this->db->where('jenis','SPP');
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_status_pembayaran($id_bayar){
			$data = array(
				'status_konfirmasi' => 'Sudah'
			);

			$this->db->where('id_bayar',$id_bayar);
			$this->db->update('pembayaran',$data);
			return $this->db->affected_rows();
		}

		public function insert_outbox_pelunasan($no_hp){
			$data = array(
				'DestinationNumber' => $no_hp,
				'TextDecoded' => 'Silakan melakukan pelunasan pembayaran SPP Bulanan. Ar Rafi'
			);
			$this->db->insert('outbox',$data);
			return $this->db->affected_rows();
		}
	}