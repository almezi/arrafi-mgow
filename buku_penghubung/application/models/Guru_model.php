<?php
	//File Guru_model.php
	class Guru_model extends CI_Model  {
		function __construct(){
		parent::__construct();
		$this->tbl ="users";
		$this->load->database();
		$this->load->library('session');
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
		
	function getAllKelas(){
				$query=$this->db->query("select distinct(kelas) from siswa");
				return $query->result();
		}
		
		
	function getAllMahasiswa(){
				if(!$this->input->get('kelas')){
				$query=$this->db->query("select * from siswa");
				return $query->result();
			}
				$kelas = $this->input->get('kelas');
				$query=$this->db->query("select * from siswa where Kelas like '%$kelas%'");
				return $query->result();
		}
	
//Guru
		
		//Guru Kegiatan
		function getAllKegiatanGuru(){
				/*$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.NISN,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.NISN = dk.NISN) Where NIK =$nomor");
				return $query->result();*/
				$nomor= $this->session->userdata('nmr');
				$this->db->select('distinct(kegiatan.tanggal_kegiatan),siswa.Kelas');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan', 'kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa', 'siswa.NISN = detail_kegiatan.NISN');
				$this->db->where('kegiatan.NIK',$nomor);
				$query = $this->db->get();
				return $query->result();
		}
		
	function insertKegiatanGuru(){
			$NIK=$this->session->userdata('nmr');
			$kelas=$_POST['KLS'];
			$status=$_POST['status'];
			$tgl = date('Y-m-d');
			
			//Mengambil jumlah name pada form
			$count = count($_POST['NISN']);
			
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			
			$data =array();
			for($i=0; $i<$count; $i++) {
			$data[$i] = array(
				'NIK' => $NIK,
				'tanggal_kegiatan' => $sekarang,
				'jam_kegiatan' => $sekarang,
				'kelas' => $kelas[$i],
				'nama_kegiatan' =>$this->input->post('kegiatan'),
				'status' =>$status[$i]
				);
			}

			$this->db->insert_batch('kegiatan', $data);
		}
		
			function insertDetailKegiatanGuru(){
			$NISN =$_POST['NISN'];
			$count = count($_POST['NISN']);
			$total = 0;
			//Mengambil id_kegiatan
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			$data =array();
			for($i=0; $i<$count; $i++) {
			$data[$i] = array(
				'NISN' => $NISN[$i],
				'tanggal_kegiatan' => $sekarang,
				'tahun_ajaran' =>$this->input->post('Tahun'),
				'notifikasi' =>'belum dibaca'
				);
			}
			
			$this->db->insert_batch('detail_kegiatan', $data);
			}
			
		function getAllKegiatan2Guru(){
				$tanggal = $this->input->get('tgl');
				$kelas = $this->input->get('kls');
				$nomor= $this->session->userdata('nmr');
				$where = "kegiatan.tanggal_kegiatan='$tanggal' and siswa.Kelas='$kelas' and kegiatan.NIK=$nomor";
				//$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.NISN,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.NISN = dk.NISN) Where s.NISN =$nisn");
				$this->db->select('distinct(kegiatan.tanggal_kegiatan),siswa.NISN,siswa.nama,kegiatan.nama_kegiatan,kegiatan.status,kegiatan.id_kegiatan,detail_kegiatan.tahun_ajaran,siswa.kelas');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan', 'kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa', 'siswa.NISN = detail_kegiatan.NISN');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function insertKegiatanPersonalGuru(){
			$tgl = date('Y-m-d');
			
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			$data=array(
				'NIK' => $this->session->userdata('nmr'),
				'tanggal_kegiatan' => $sekarang,
				'jam_kegiatan' => $sekarang,
				'kelas' => $this->input->post('kelas'),
				'nama_kegiatan' =>$this->input->post('kegiatan'),
				'status' =>$this->input->post('status')
			);
			
			$this->db->insert('kegiatan',$data);	
		}
		
		function insertDetailKegiatanPersonalGuru(){
			$data=array(
				'NISN' => $this->input->post('NISN'),
				'tahun_ajaran' =>$this->input->post('Tahun'),
				'notifikasi' =>'belum dibaca'
			);
			
			$this->db->insert('detail_kegiatan',$data);	
		}
		
		function getAllPelajaran(){
				//$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.NISN,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.NISN = dk.NISN) Where s.NISN =$nisn");
				$this->db->select('*');
				$this->db->from('mata_pelajaran');
				$query = $this->db->get();
				return $query->result();
		}
		
		function getAllEditPelajaran($id){
				//$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.NISN,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.NISN = dk.NISN) Where s.NISN =$nisn");
				$this->db->select('*');
				$this->db->from('mata_pelajaran');
				$this->db->where('id_pelajaran',$id);
				$query = $this->db->get();
				return $query->result();
		}
		
	function insertPelajaran(){
			$pelajaran=$this->input->post('pelajaran');
			$query=$this->db->query("INSERT INTO mata_pelajaran(pelajaran) 
			VALUES ('$pelajaran')");
	}
	
	function updatePelajaran(){
			$pelajaran=$this->input->post('pelajaran');
			$id_pelajaran=$this->input->post('id');
			$query=$this->db->query("update mata_pelajaran set pelajaran='$pelajaran' where id_pelajaran=$id_pelajaran");
	}
	
	function deletePelajaran($id){
			$query=$this->db->query("delete from mata_pelajaran where id_pelajaran=$id");
	}
	
	function ambil_NISN($NISN){
		$query= $this->db->get_where('siswa',array('NISN'=>$NISN));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
	function ambil_dataKegiatan($id){
				$this->db->select('*');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan', 'kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa', 'siswa.NISN = detail_kegiatan.NISN');
				$this->db->where('kegiatan.id_kegiatan',$id);
				$query = $this->db->get();
				return $query->result();
		}
		
	function ambil_dataKegiatan2(){
				$id = $this->input->get('id');
				$where = "kegiatan.id_kegiatan=$id";
				$this->db->select('*');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan', 'kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa', 'siswa.NISN = detail_kegiatan.NISN');
				$this->db->where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function updatedetailKegiatan(){
			$id=$this->input->post('id');
			$nik=$this->input->post('NIK');
			$nama=$this->input->post('kegiatan');
			$kelas=$this->input->post('KLS');
			$status=$this->input->post('status');
			$query=$this->db->query("update kegiatan set NIK=$nik,nama_kegiatan='$nama',Kelas='$kelas',status='$status' where id_kegiatan=$id");
			
			$id=$this->input->post('id');
			$thn=$this->input->post('Tahun');
			$nisn=$this->input->post('NISN');
			$query=$this->db->query("update detail_kegiatan set tahun_ajaran='$thn', NISN=$nisn  where id_kegiatan=$id");
		}
	
	function hapusIdKegiatan($id){
			$query=$this->db->query("delete from kegiatan where id_kegiatan=$id");
		}
}