<?php
	//File ortu_model.php
	class Tata_Usaha_model extends CI_Model  {
		function __construct(){
		parent::__construct();
		$this->tbl ="users";
		$this->load->database();
		$this->load->library('session');
	}
		
	function ambil_user($username){
		$query= $this->db->get_where('pegawai',array('username'=>$username));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
	function ambil_status($kode){
		$query= $this->db->get_where('grup',array('kode_group'=>$kode));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
	function ambil_tanggal($nip){
		$b = $this->db->query("SELECT id_respon id FROM respon where nip='$nip' order by id_respon desc limit 1")->row_array();
		$id_respon = $b['id'];
			
		$query= $this->db->get_where('respon',array('id_respon'=>$id_respon));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
	function ambil_awal($awal){
		$query= $this->db->get_where('respon',array('tanggal'=>$awal));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
	function ambil_akhir($akhir){	
		$query= $this->db->get_where('respon',array('tanggal'=>$akhir));
		$query= $query->result_array();
		if($query){
				return $query[0];
			
			}
		}
		//Tata Usaha
	//Respon Tata Usaha
		function getAllTanggal($nip){
				$where="respon.status = 'Orang-Tua' and respon.nip='$nip'";
				$this->db->select('DISTINCT(respon.tanggal)');
				$this->db->from('guru');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('ortu','ortu.idortu=detail_respon.idortu');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
		function getAllTanggapan_TU(){
				$this->db->select('DISTINCT(respon.tanggal), guru.nama, respon.nip, detail_respon.notifikasi_T, kelas.nama kelas');
				$this->db->from('siswa');
				$this->db->join('kelas_siswa','siswa.nis=kelas_siswa.nis');
				$this->db->join('kelas','kelas.idkelas=kelas_siswa.idkelas');
				$this->db->join('wali','kelas.idkelas=wali.idkelas');
				$this->db->join('guru','guru.nip=wali.nip');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('ortu','ortu.idortu=detail_respon.idortu');
				$this->db->Where('respon.status','Orang-Tua');
				$query = $this->db->get();
				return $query->result();
		}
	
	function getAllTanggapan_TOrtu($nip,$tanggal){
				$where =("respon.tanggal='$tanggal' and respon.nip='$nip' and respon.status='Orang-Tua'");
				$this->db->select('distinct(respon.tanggal),respon.nip,respon.dari,respon.isi_respon');
				$this->db->from('respon');
				$this->db->join('detail_respon','detail_respon.id_respon=respon.id_respon');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllTanggapan_TWali($nip,$tanggal){
				$where =("respon.tanggal='$tanggal' and respon.nip='$nip' and respon.status='Orang-Tua'");
				$this->db->select('distinct((respon.tanggal)),guru.nama,respon.nip,kelas.nama kelas');
				$this->db->from('siswa');
				$this->db->join('kelas_siswa','siswa.nis=kelas_siswa.nis');
				$this->db->join('kelas','kelas.idkelas=kelas_siswa.idkelas');
				$this->db->join('wali','kelas.idkelas=wali.idkelas');
				$this->db->join('guru','guru.nip=wali.nip');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllTanggapan_TOrtu2($nip,$awal,$akhir){
				
				$where =("respon.tanggal between '$awal' and '$akhir' and respon.nip='$nip' and respon.status='Orang-Tua'");
				$this->db->select('distinct(respon.tanggal),respon.nip,respon.dari,respon.isi_respon');
				$this->db->from('respon');
				$this->db->join('detail_respon','detail_respon.id_respon=respon.id_respon');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function jumlahAllTanggapan_TOrtu2($nip,$awal,$akhir){
				
				$where =("respon.tanggal between '$awal' and '$akhir' and respon.nip='$nip' and respon.status='Orang-Tua'");
				$this->db->select('distinct(respon.tanggal),respon.nip,respon.dari,respon.isi_respon');
				$this->db->from('respon');
				$this->db->join('detail_respon','detail_respon.id_respon=respon.id_respon');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->num_rows();
		}
		
	function getAllTanggapan_TWali2($nip,$tanggal){
				$where =("respon.tanggal='$tanggal' and respon.nip=$nip and respon.status='Orang-Tua'");
				$this->db->select('distinct(respon.tanggal),guru.nama,respon.nip,kelas.nama kelas');
				$this->db->from('siswa');
				$this->db->join('kelas_siswa','siswa.nis=kelas_siswa.nis');
				$this->db->join('kelas','kelas.idkelas=kelas_siswa.idkelas');
				$this->db->join('wali','kelas.idkelas=wali.idkelas');
				$this->db->join('guru','guru.nip=wali.nip');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllTanggapan_TOrtu1($awal,$akhir,$nip){
				$where =("respon.tanggal between '$awal' and '$akhir' and respon.nip='$nip' and respon.status='Orang-Tua'");
				$this->db->select('distinct(respon.tanggal),respon.dari,respon.isi_respon');
				$this->db->from('respon');
				$this->db->join('detail_respon','detail_respon.id_respon=respon.id_respon');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllTanggapan_TWali1($nip){
				$where =("respon.nip=$nip");
				$this->db->select('distinct(respon.nip),guru.nama,kelas.nama kelas');
				$this->db->from('siswa');
				$this->db->join('kelas_siswa','siswa.nis=kelas_siswa.nis');
				$this->db->join('kelas','kelas.idkelas=kelas_siswa.idkelas');
				$this->db->join('wali','kelas.idkelas=wali.idkelas');
				$this->db->join('guru','guru.nip=wali.nip');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getWali1($nip){
				$where =("respon.nip=$nip and respon.status='Orang Tua'");
				$this->db->select('distinct(guru.nama) nama,respon.nip');
				$this->db->from('guru');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->Limit('1');
				$query = $this->db->get();
				return $query->result_array();
		}
		
	function getAllLaporan(){
				$user= $this->session->userdata('uname');
				$b = $this->db->query("SELECT id_pegawai id from pegawai where username='$user' limit 1")->row_array();
				$id = $b['id'];
				
				$this->db->select('distinct((tanggal_laporan)),id_laporan');
				$this->db->from('laporan');
				$this->db->where('id_pegawai',$id);
				$this->db->order_by('id_laporan','DESC');
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllDetailLaporan($id){
				$this->db->select('distinct((tanggal_laporan)),isi_laporan,id_laporan');
				$this->db->from('laporan');
				$this->db->Where('id_laporan',$id);
				$query = $this->db->get();
				return $query->result();
		}
		
	function insertLaporan(){
			$user= $this->session->userdata('uname');
			$b = $this->db->query("SELECT id_pegawai id from pegawai where username='$user' limit 1")->row_array();
			$id = $b['id'];
			
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			$data=array(
				'tanggal_laporan' => $sekarang,
				'isi_laporan' =>$this->input->post('isi'),
				'id_pegawai' =>$id
			);
			
			$this->db->insert('Laporan',$data);	
		}
		
	function updateLaporan(){
				$id= $this->input->post('id');
				$isi_laporan= $this->input->post('isi');
				$query=$this->db->query("update laporan set isi_laporan='$isi_laporan' where id_laporan=$id");
	}
	
	function hapusLaporan($id){
				$query=$this->db->query("delete from laporan where id_laporan=$id");
	}
	
	function notifikasiLaporan(){;
				$data = $this->db->query("select * from respon where status='Orang-Tua' and notifikasi='belum dibaca'")->num_rows();
				return $data;
	}
	
	function notifRespon_TU(){
				$query=$this->db->query("SELECT DISTINCT (respon.tanggal), guru.nama, respon.nip FROM guru
				JOIN respon ON ( respon.nip = guru.nip ) 
				JOIN detail_respon ON ( respon.id_respon = detail_respon.id_respon ) 
				JOIN ortu ON ( ortu.idortu = detail_respon.idortu ) 
				WHERE respon.status =  'Orang-Tua' AND detail_respon.notifikasi_T = 'belum dibaca'")->num_rows();
				return $query;
	}
	
	function ListNotifRespon_TU(){
				$data = $this->db->query("SELECT DISTINCT (respon.tanggal), guru.nama, respon.nip FROM guru
				JOIN respon ON ( respon.nip = guru.nip ) 
				JOIN detail_respon ON ( respon.id_respon = detail_respon.id_respon ) 
				JOIN ortu ON ( ortu.idortu = detail_respon.idortu ) 
				WHERE respon.status =  'Orang-Tua' AND detail_respon.notifikasi_T =  'belum dibaca'")->result();
				return $data;
	}
	
	function Ubahnotifikasi_RTU($nip,$tanggal){
				$query=$this->db->query("update detail_respon d join respon r on(d.id_respon=r.id_respon) set notifikasi_T='dibaca' 
				WHERE r.tanggal='$tanggal' and r.nip=$nip ");
	}
}