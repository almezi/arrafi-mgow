<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Welcome_M extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}

		public function get_jadwal_ppdb(){
			$this->db->select('*');
			$this->db->from('jadwal_tanggal');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_jadwal_seleksi(){
			$this->db->select('*');
			$this->db->from('jadwal_waktu');
			$query = $this->db->get();
			return $query->result();
		}

		public function select_data_buku_tamu(){
			$this->db->select('*');
			$this->db->from('buku_tamu');
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_data_buku_tamu($id_buku_tamu,$nama,$alamat,$no_hp,$email,$asal){
			$data = array(
				'id_buku_tamu' => $id_buku_tamu,
				'nama' => $nama,
				'alamat' => $alamat,
				'no_hp' => $no_hp,
				'email' => $email,
				'asal' => $asal
			);
			$this->db->insert('buku_tamu',$data);
			return $this->db->affected_rows();
		}

		public function select_buku_tamu_per_id($id_buku_tamu){
			$this->db->select('*');
			$this->db->from('buku_tamu');
			$this->db->where('id_buku_tamu',$id_buku_tamu);
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_buku_tamu($id_buku_tamu,$nama,$alamat,$no_hp,$email,$asal){
			$data = array(
				'nama' => $nama,
				'alamat' => $alamat,
				'no_hp' => $no_hp,
				'email' => $email,
				'asal' => $asal
			);

			$this->db->where('id_buku_tamu', $id_buku_tamu);
			$this->db->update('buku_tamu',$data);
			return $this->db->affected_rows();
		}

		public function delete_buku_tamu($id_buku_tamu){
			$this->db->where('id_buku_tamu', $id_buku_tamu);
			$this->db->delete('buku_tamu');
			return $this->db->affected_rows();
		}
	}