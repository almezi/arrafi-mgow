<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_login1 extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->tbl ="users";
		$this->load->database();
		$this->load->library('session');
	}
	
	function cek_user($username="",$password=""){
		$query= $this->db->get_where($this->tbl,array('username'=>$username,'password'=>$password));
		$query= $query->result_array();
		return $query;
		}
		
	function cek_user_W($username="",$password=""){
		$query= $this->db->get_where('user_W',array('username'=>$username,'password'=>$password));
		$query= $query->result_array();
		return $query;
		}
	
	function ambil_user_W($username){
		$query= $this->db->get_where('user_W',array('username'=>$username));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}

	function ambil_user($username){
		$query= $this->db->get_where($this->tbl,array('username'=>$username));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
	function ambil_kelas($kelas){
		$query= $this->db->get_where('siswa',array('Kelas'=>$kelas));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
		//Respon
		function getAllRespon(){
				$nomor= $this->session->userdata('nmr_W');
				$this->db->Select('distinct(respon.isi_respon),respon.tanggal_respon,respon.NIK_guru');
				$this->db->from('respon');
				$this->db->Where('respon.NIK_guru',$nomor);
				$query = $this->db->get();
				return $query->result();
		}
		
		function getAllTanggapan(){
				$nomor= $this->session->userdata('nmr_W');
				$this->db->select('distinct(respon.isi_respon),respon.tanggal_respon,respon.NIK_guru,orang_tua.nama');
				$this->db->from('respon');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('orang_tua','orang_tua.id_orangtua=detail_respon.id_orangtua');
				$this->db->Where('respon.NIK_guru',$nomor);
				$query = $this->db->get();
				return $query->result();
		}
		
		function getAllOrangtua(){
				$kls= $this->session->userdata('kls_W');
				$this->db->Select('*');
				$this->db->from('siswa');
				$this->db->Where('Kelas',$kls);
				$query = $this->db->get();
				return $query->result();
		}
		
		
		function insertRespon(){
			
			$tgl = date('Y-m-d');
			$id_respon = $this->input->post('id_res');
			$data=array(
				'id_respon' =>$id_respon,
				'tanggal_respon' =>$tgl,
				'isi_respon' =>$this->input->post('isi_res'),
				'NIK_guru' =>$this->session->userdata('nmr_W')
			);
			
			$this->db->insert('respon',$data);
		}
		
			function insertDetailRespon(){
			//extract($postdata);
			//$data  = array();
			
			$id_orangtua=$_POST['id_orangtua'];
			$count = count($_POST['id_orangtua']);
			$tgl = date('Y-m-d');
			$b = $this->db->query("SELECT id_respon id FROM respon order by id_respon desc limit 1")->row_array();
			$id_respon = $b['id'];
			
			$data =array();
			for($i=0; $i<$count; $i++) {
			$data[$i] = array(
				'id_respon' => $id_respon, 
				'id_orangtua' => $id_orangtua[$i],
				'd_tanggal_respon' =>$tgl
				);
			}

			$this->db->insert_batch('detail_respon', $data);
			}
			
		
		
	
	}