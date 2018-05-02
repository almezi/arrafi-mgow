<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_login1 extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->tbl ="user";
		$this->load->database();
		$this->load->library('session');
	}
	
	function cek_user($username="",$password=""){
		$query= $this->db->get_where($this->tbl,array('username'=>$username,'password'=>$password));
		$query= $query->result_array();
		return $query;
		}
		
	function get_login($username="",$password=""){
		$query= $this->db->query("select u.username username, password,status_user,gu.kode_group kode ,g.nama_group nama
								from user u join grup_user gu on(u.username=gu.username) 
								join grup g on(gu.kode_group=g.kode_group)
								where u.username='$username' and  password='$password'");
		if($query->num_rows()>=1){
			return $query->row();
		} else{
			return "";		
		}
	}
		
	/*function ambil_user($username){
		$query= $this->db->get_where($this->tbl,array('username'=>$username));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}*/
		
	/*function cek_user_W($username="",$password=""){
		$query= $this->db->get_where('user_W',array('username'=>$username,'password'=>$password));
		$query= $query->result_array();
		return $query;
		}
	
	/*function ambil_user_W($username){
		$query= $this->db->get_where('user_W',array('username'=>$username));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}*/
		
	/*function cek_user_O($username="",$password=""){
		$query= $this->db->get_where('user_O',array('username'=>$username,'password'=>$password));
		$query= $query->result_array();
		return $query;
		}*/
	
	/*function ambil_user_O($username){
		$query= $this->db->get_where('user_O',array('username'=>$username));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}*/

	
		
	/*function ambil_kelas($kelas){
		$query= $this->db->get_where('siswa',array('Kelas'=>$kelas));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
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
		
		
	/*function insertKegiatan(){
			//$id_kegiatan=$this->input->post('ID');
			$NIK=$this->input->post('NIK');
			//$tanggal_kegiatan=$this->input->post('TGL');
			$kelas=$this->input->post('KLS');
			$nama_kegiatan=$this->input->post('kegiatan');
			$status=$this->input->post('status');
			$query=$this->db->query("INSERT INTO kegiatan(NIK, tanggal_kegiatan, kelas, nama_kegiatan, status) 
			VALUES ($NIK,NOW(), $kelas,'$nama_kegiatan','$status')");
			
			
		}
	
	function insertDetailKegiatan(){
			$id_kegiatan=$this->input->post('ID');
			$NISN=$this->input->post('NISN');
			$tahun_ajaran=$this->input->post('Tahun');
			$query=$this->db->query("INSERT INTO detail_kegiatan(NISN, tahun_ajaran) 
			VALUES ($NISN,'$tahun_ajaran')");
		}*/
		
		/*function insertKegiatan(){
			$NIK=$this->session->userdata('nmr_W');
			$kelas=$_POST['KLS'];
			$status=$_POST['status'];
			$tgl = date('Y-m-d');
			
			//Mengambil jumlah name pada form
			$count = count($_POST['KLS']);
			
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			
			$data =array();
			for($i=0; $i<$count; $i++) {
			$data[$i] = array(
				'NIK' => $NIK,
				'tanggal_kegiatan' => $sekarang,
				'kelas' => $kelas[$i],
				'nama_kegiatan' =>$this->input->post('kegiatan'),
				'status' =>$status[$i]
				);
			}

			$this->db->insert_batch('kegiatan', $data);
		}
		
			function insertDetailKegiatan(){
			
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			$NISN =$_POST['NISN'];
			$count = count($_POST['NISN']);
			$total = 0;
			//Mengambil id_kegiatan
			
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
			
			function insertKegiatanPersonal(){
			$tgl = date('Y-m-d');
			
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			$data=array(
				'NIK' => $this->session->userdata('nmr_W'),
				'tanggal_kegiatan' => $sekarang,
				'kelas' => $this->input->post('kelas'),
				'nama_kegiatan' =>$this->input->post('kegiatan'),
				'status' =>$this->input->post('status')
			);
			
			$this->db->insert('kegiatan',$data);	
		}
		
		function insertDetailKegiatanPersonal(){
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			$data=array(
				'NISN' => $this->input->post('NISN'),
				'tanggal_kegiatan' => $sekarang,
				'tahun_ajaran' =>$this->input->post('Tahun'),
				'notifikasi' =>'belum dibaca'
			);
			
			$this->db->insert('detail_kegiatan',$data);	
		}
		
	function getAllKegiatan(){
				/*$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.NISN,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.NISN = dk.NISN) Where NIK =$nomor");
				return $query->result();*/
				/*$nomor= $this->session->userdata('nmr_W');
				$this->db->select('distinct(kegiatan.tanggal_kegiatan),siswa.Kelas');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan', 'kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa', 'siswa.NISN = detail_kegiatan.NISN');
				$this->db->where('kegiatan.NIK',$nomor);
				$this->db->order_by('kegiatan.id_kegiatan','DESC');
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllKegiatan2(){
				$tanggal = $this->input->get('tgl');
				$kelas = $this->input->get('kls');
				$nomor= $this->session->userdata('nmr_W');
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
	
	//Pesan
	function getAllMahasiswa_W(){
				$kelasw= $this->session->userdata('kls_W');
				$query=$this->db->query("select * from siswa where Kelas like '%$kelasw%'");
				return $query->result();
		}
		
	function insertPesan(){
			
			$NIK=$this->input->post('NIK');
			$isi_pesan=$this->input->post('isi_p');
			$id_orangtua=$this->input->post('id_ortu');
			$dari=$this->session->userdata('nama_W');
			$status='Belum Terbaca';
			
			$b = $this->db->query("SELECT id_pesan id FROM pesan order by id_pesan desc limit 1")->row_array();
			$id_pesan = $b['id'];
			
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			/*$query=$this->db->query("INSERT INTO pesan(tanggal_pesan,dari, isi_pesan, NIK, id_orangtua,nomor,status) 
			VALUES (NOW(),'$dari','$isi_pesan',$NIK,$id_orangtua,$id_pesan+1,'$status')");*/
			
			/*$data=array(
				'tanggal_pesan' =>$sekarang,
				'dari' =>$this->session->userdata('nama_W'),
				'isi_pesan' =>$this->input->post('isi_p'),
				'NIK' =>$this->input->post('NIK'),
				'id_orangtua' =>$this->input->post('id_ortu'),
				'nomor' =>$id_pesan+1,
				'status' => $status
			);
			
			$this->db->insert('pesan',$data);
		}
		
	function getAllPesan(){
				$nomor= $this->session->userdata('nmr_W');
				$nama=$this->session->userdata('nama_W');
				$where="pesan.dari='$nama' and pesan.NIK=$nomor";
				$this->db->select('distinct(pesan.tanggal_pesan),pesan.id_pesan,pesan.isi_pesan,pesan.id_orangtua,orang_tua.nama,pesan.status');
				$this->db->from('Pesan');
				$this->db->join('orang_tua','orang_tua.id_orangtua=pesan.id_orangtua');
				$this->db->join('guru','guru.NIK=pesan.NIK');
				$this->db->Where($where);
				$this->db->order_by('id_pesan','DESC');
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllPesanMasuk(){
				$nomor= $this->session->userdata('nmr_W');
				$nama= $this->session->userdata('nama_W');
				$where="pesan.NIK=$nomor and pesan.dari <> '$nama'";
				$this->db->select('distinct(pesan.tanggal_pesan),pesan.id_pesan,pesan.isi_pesan,pesan.id_orangtua,pesan.dari,pesan.nomor,pesan.status');
				$this->db->from('Pesan');
				$this->db->Where($where);
				$this->db->order_by('id_pesan','DESC');
				$query = $this->db->get();
				return $query->result();
	}
		
	function ambil_dataPesan($id,$id_o){
				$where = "pesan.id_pesan=$id and siswa.NISN=$id_o";
				$this->db->select('pesan.id_pesan,pesan.isi_pesan,pesan.id_orangtua,siswa.nama,siswa.NISN,siswa.Kelas');
				$this->db->from('Pesan');
				$this->db->join('orang_tua','orang_tua.id_orangtua=pesan.id_orangtua');
				$this->db->join('guru','guru.NIK=pesan.NIK');
				$this->db->join('detail_siswa','guru.NIK=detail_siswa.NIK');
				$this->db->join('siswa','siswa.NISN=detail_siswa.NISN');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function ambil_dataPesan2(){
				$id_pesan=$this->input->get('id_p2');
				$this->db->select('pesan.id_pesan,pesan.isi_pesan');
				$this->db->from('Pesan');
				$this->db->join('orang_tua','orang_tua.id_orangtua=pesan.id_orangtua');
				$this->db->join('guru','guru.NIK=pesan.NIK');
				$this->db->Where('pesan.id_pesan',$id_pesan);
				$query = $this->db->get();
				return $query->result();
		}
	function ambil_HistoryPesan($nomor){
				$where = "pesan.nomor=$nomor";
				$this->db->select('pesan.id_pesan,pesan.isi_pesan,pesan.dari,pesan.tanggal_pesan');
				$this->db->from('Pesan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
		function updatePesan(){
			$id_pesan=$this->input->post('id_p');
			$isi_pesan=$this->input->post('isi_p');
			$id_orangtua=$this->input->post('id_ortu');
			$query=$this->db->query("update pesan set isi_pesan='$isi_pesan',id_orangtua=$id_orangtua where id_pesan=$id_pesan");
		}
	
		function hapusIdPesan($id){
			$query=$this->db->query("delete from pesan where id_pesan=$id");
		}
		
		function hapusNomorPesan($nomor){
			$query=$this->db->query("delete from pesan where nomor=$nomor");
		}
		
	//Informasi
	
		function insertInformasi(){
			$tanggal_informasi=$this->input->post('tgl_info');
			$isi_informasi=$this->input->post('isi_info');
			$subject_informasi=$this->input->post('subject_info');
			$NIK=$this->input->post('NIK');
			$query=$this->db->query("INSERT INTO informasi(Tanggal, tanggal_informasi, isi_informasi, subject_informasi,NIK) 
			VALUES (NOW(),'$tanggal_informasi','$isi_informasi','$subject_informasi',$NIK)");
		}
		
		function insertInformasiDetail(){
			//Menampung name pada variabel
			$id_orangtua=$_POST['id_orangtua'];
			
			//Mengambil jumlah name pada form
			$count = count($_POST['id_orangtua']);
			
			//Mengambil id_respon
			$b = $this->db->query("SELECT id_informasi id FROM informasi order by id_informasi desc limit 1")->row_array();
			$id_informasi = $b['id'];
			
			//Mengambil Tanggal sekarang
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			$data =array();
			for($i=0; $i<$count; $i++) {
			
			$data[$i] = array(
				'id_orangtua' => $id_orangtua[$i], 
				'id_informasi' => $id_informasi,
				'd_tanggal_informasi' =>$sekarang,
				'notifikasi_O' =>'belum dibaca',
				'notifikasi_W' =>'belum dibaca'
				);
			}

			$this->db->insert_batch('detail_informasi', $data);

	}
	
		function getAllInformasi(){
				$nomor= $this->session->userdata('nmr_W');
				$this->db->select('distinct(informasi.tanggal),informasi.subject_informasi,informasi.tanggal_informasi,informasi.id_informasi');
				$this->db->from('Informasi');
				$this->db->join('guru','guru.NIK=informasi.NIK');
				$this->db->Where('guru.NIK',$nomor);
				$this->db->order_by('id_informasi','desc');
				$query = $this->db->get();
				return $query->result();
		}
		
		function  ambil_dataInformasi($id){
				$this->db->select('informasi.subject_informasi,informasi.NIK,informasi.tanggal_informasi,informasi.isi_informasi,informasi.id_informasi');
				$this->db->from('Informasi');
				$this->db->join('guru','guru.NIK=informasi.NIK');
				$this->db->Where('informasi.id_informasi',$id);
				$query = $this->db->get();
				return $query->result();
		}
		
		function updateInformasi(){
			$id_informasi=$this->input->post('id_i');
			$tanggal_informasi=$this->input->post('tgl_info');
			$isi_informasi=$this->input->post('isi_info');
			$subject_informasi=$this->input->post('subject_info');
			$query=$this->db->query("update informasi set isi_informasi='$isi_informasi',tanggal_informasi='$tanggal_informasi',
			subject_informasi='$subject_informasi' where id_informasi=$id_informasi");
		}
		
		function hapusIdInformasi($id){
			$query=$this->db->query("delete from informasi where id_informasi=$id");
		}
		
		function getAllInformasiTerbaca(){
				$nomor=$this->session->userdata('nmr_W');
				$query = $this->db->query("SELECT DISTINCT (i.tanggal), d.d_tanggal_informasi,i.subject_informasi, d.id_informasi,count(d.id_informasi) as jumlah FROM informasi i
				JOIN detail_informasi d ON ( i.id_informasi = d.id_informasi ) 
				WHERE i.NIK =$nomor AND notifikasi_O =  'dibaca' AND d.notifikasi_W in('belum dibaca','dibaca')
				group by d.id_informasi;");
				return $query->result();
		}
	
		function getInformasiTerbaca($id){
				$nomor= $this->session->userdata('nmr_W');
				$query = $this->db->query("SELECT distinct(i.tanggal),i.tanggal_informasi,i.subject_informasi,d.id_informasi,count(d.id_informasi) as jumlah
				FROM informasi i join detail_informasi d on(i.id_informasi=d.id_informasi)
				WHERE i.NIK =$nomor AND d.notifikasi_O = 'dibaca' AND d.notifikasi_W='dibaca' AND i.id_informasi =$id
				group by d.id_informasi;");
				return $query->result();
	}
	
	/*function getJumlahInformasiTerbaca(){
				$nomor= $this->session->userdata('nmr_W');
				$query = $this->db->query("SELECT i.tanggal,i.tanggal_informasi,i.subject_informasi,d.id_informasi,count(d.id_informasi) as jumlah
				FROM informasi i join detail_informasi d on(i.id_informasi=d.id_informasi)
				WHERE i.NIK =$nomor AND d.notifikasi_O = 'dibaca' AND d.notifikasi_W='dibaca' 
				group by d.id_informasi;");
				return $query->num_rows();
	}*/
	
	
		
		//Respon
		/*function getAllTanggapan(){
				$nomor= $this->session->userdata('nmr_W');
				$this->db->select('distinct(respon.dari),respon.isi_respon,respon.id_respon,HOUR(respon.tanggal_respon) as jam,MINUTE(respon.tanggal_respon) as menit,DAY(respon.tanggal_respon) as tanggal,MONTH(respon.tanggal_respon) as bulan,YEAR(respon.tanggal_respon) as tahun');
				$this->db->from('guru');
				$this->db->join('respon','respon.NIK_guru=guru.NIK');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('orang_tua','orang_tua.id_orangtua=detail_respon.id_orangtua');
				$this->db->Where('respon.NIK_guru',$nomor);
				$this->db->order_by('respon.id_respon','DESC');
				$query = $this->db->get();
				return $query->result();
		}
		
		/*function getAllTanggapan(){
				$nomor= $this->session->userdata('nmr_W');
				$query = $this->db->query("SELECT DISTINCT(r.dari), r.isi_respon, r.id_respon,HOUR(r.tanggal_respon) as jam, 
				MINUTE(r.tanggal_respon) as menit, DAY(r.tanggal_respon) as tanggal,MONTH(r.tanggal_respon) as bulan,
				YEAR(r.tanggal_respon) as tahun,count(d.id_respon) as jumlah FROM guru g
				JOIN respon r ON ( r.NIK_guru = g.NIK ) 
				JOIN detail_respon d ON ( r.id_respon = d.id_respon ) 
				JOIN orang_tua o ON ( o.id_orangtua = d.id_orangtua ) 
				WHERE r.NIK_guru=$nomor AND d.notifikasi_O  in('dibaca')
				group by d.id_respon
				order by r.id_respon desc")->result();
				return $query;
		}*/
		
		/*function getAllOrangtua(){
				$kls= $this->session->userdata('kls_W');
				$this->db->Select('*');
				$this->db->from('siswa');
				$this->db->Where('Kelas',$kls);
				$query = $this->db->get();
				return $query->result();
		}
		
		
		function insertRespon(){
			
			$tgl = date('Y-m-d');
			$b = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $b['sekarang'];
			
			$data=array(
				'id_respon' =>$this->input->post('id_res'),
				'dari' =>$this->input->post('dari'),
				'tanggal' =>$sekarang,
				'status' =>$this->session->userdata('lvl_W'),
				'tanggal_respon' =>$sekarang,
				'isi_respon' =>$this->input->post('isi_res'),
				'NIK_guru' =>$this->session->userdata('nmr_W')
			);
			
			$this->db->insert('respon',$data);
		}
		
			function insertDetailRespon(){
			//extract($postdata);
			//$data  = array();
			
			//Menampung name pada variabel
			$id_orangtua=$_POST['id_orangtua'];
			
			//Mengambil jumlah name pada form
			$count = count($_POST['id_orangtua']);
			$tgl = date('Y-m-d');
			
			//Mengambil id_respon
			$b = $this->db->query("SELECT id_respon id FROM respon order by id_respon desc limit 1")->row_array();
			$id_respon = $b['id'];
			
			//Mengambil Tanggal sekarang
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			$data =array();
			for($i=0; $i<$count; $i++) {
			
			$data[$i] = array(
				'id_respon' => $id_respon, 
				'id_orangtua' => $id_orangtua[$i],
				'd_tanggal_respon' =>$sekarang,
				'notifikasi_T' =>'belum dibaca',
				'notifikasi_O' =>'belum dibaca',
				'notifikasi_W' =>'dibaca'
				);
			}

			$this->db->insert_batch('detail_respon', $data);
			}
			
		function  ambil_dataRespon($id){
				$this->db->select('distinct(respon.isi_respon),respon.id_respon');
				$this->db->from('guru');
				$this->db->join('respon','respon.NIK_guru=guru.NIK');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('orang_tua','orang_tua.id_orangtua=detail_respon.id_orangtua');
				$this->db->Where('respon.id_respon',$id);
				$query = $this->db->get();
				return $query->result();
		}
		
		function updateRespon(){
			$id_respon=$this->input->post('id_res');
			$isi_respon=$this->input->post('isi_res');
			$query=$this->db->query("update respon set isi_respon='$isi_respon' where id_respon=$id_respon");
		}
		
		function hapusIdRespon($id){
			$query=$this->db->query("delete from respon where id_respon=$id");
		}
		
	//Orang Tua
	
	function getAllKegiatan_Ortu(){
				/*$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.NISN,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.NISN = dk.NISN) Where NIK =$nomor");
				return $query->result();*/
				/*$nomor= $this->session->userdata('nmr_O');
				$this->db->select('distinct(kegiatan.tanggal_kegiatan),siswa.nama,siswa.NISN,notifikasi');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan','kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa','siswa.NISN = detail_kegiatan.NISN');
				$this->db->where('siswa.NISN',$nomor);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllKegiatan_Ortu2($NISN,$tanggal){
				$where = "kegiatan.tanggal_kegiatan='$tanggal' and siswa.NISN=$NISN";
				//$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.NISN,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.NISN = dk.NISN) Where s.NISN =$nisn");
				$this->db->select('distinct(kegiatan.tanggal_kegiatan),siswa.NISN,siswa.nama,kegiatan.nama_kegiatan,kegiatan.status');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan', 'kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa', 'siswa.NISN = detail_kegiatan.NISN');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllKegiatan_Nama($NISN,$tanggal){
				$where = "kegiatan.tanggal_kegiatan='$tanggal' and siswa.NISN=$NISN";
				//$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.NISN,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.NISN = dk.NISN) Where s.NISN =$nisn");
				$this->db->select('distinct(kegiatan.tanggal_kegiatan),siswa.nama');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan', 'kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa', 'siswa.NISN = detail_kegiatan.NISN');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	
		
	
		
	//Pesan
		
	function getAllPesan_Ortu(){
				$nomor= $this->session->userdata('nmr_O');
				$nama= $this->session->userdata('nama_Wali');
				$where ="pesan.id_orangtua = $nomor and pesan.dari='$nama'";
				$this->db->select('distinct(pesan.tanggal_pesan),pesan.id_pesan,pesan.isi_pesan,guru.nama,pesan.status,pesan.nomor');
				$this->db->from('Pesan');
				$this->db->join('orang_tua','orang_tua.id_orangtua=pesan.id_orangtua');
				$this->db->join('guru','guru.NIK=pesan.NIK');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
	}
	
	function getAllPesan_Wali($id,$tanggal){
				$where = "pesan.tanggal_pesan='$tanggal' and pesan.id_pesan=$id";
				$this->db->select('pesan.isi_pesan,pesan.id_pesan,pesan.tanggal_pesan');
				$this->db->from('Pesan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
	}
	
	function UbahStatusPesan(){
				$id= $this->input->post('id_p');
				$query=$this->db->query("update pesan set status='Terbaca' where id_pesan=$id");
	}
	
	function getAllPesan_Wali2($id,$tanggal){
				$where = "pesan.tanggal_pesan='$tanggal' and pesan.id_pesan=$id";
				$this->db->select('id_pesan,isi_pesan,nomor');
				$this->db->from('Pesan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
	}
	
	function getAllPesanTerkirim_Ortu(){
				$nomor= $this->session->userdata('nmr_O');
				$nama=$this->session->userdata('nama_O');
				$where="pesan.dari='$nama' and pesan.id_orangtua=$nomor";
				$this->db->select('distinct(pesan.tanggal_pesan),pesan.id_pesan,pesan.isi_pesan,pesan.id_orangtua,pesan.dari,pesan.nomor');
				$this->db->from('Pesan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllPesanHistory_Ortu($nomor){
				$where="pesan.nomor=$nomor";
				$this->db->select('distinct(pesan.tanggal_pesan),pesan.id_pesan,pesan.isi_pesan,pesan.id_orangtua,pesan.dari,pesan.nomor');
				$this->db->from('Pesan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getDataPesan($id){
				$where="pesan.id_pesan=$id";
				$this->db->select('pesan.isi_pesan,pesan.id_pesan');
				$this->db->from('Pesan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function updatePesan_Ortu(){
				$id= $this->input->post('id_p');
				$isi_pesan= $this->input->post('isi_p');
				$query=$this->db->query("update pesan set isi_pesan='$isi_pesan' where id_pesan=$id");
	}
	
	function hapusPesan_Ortu($id){
				$query=$this->db->query("delete from pesan where id_pesan=$id");
	}
	
	
	function insertPesan_Ortu(){
			
			$tgl = date('Y-m-d');
			$status ='Belum Terbaca';
			
			$b = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $b['sekarang'];
			
			$data=array(
				'tanggal_pesan' =>$sekarang,
				'dari' =>$this->session->userdata('nama_O'),
				'isi_pesan' =>$this->input->post('isi_pesan'),
				'NIK' =>$this->session->userdata('Wali'),
				'id_orangtua' =>$this->session->userdata('nmr_O'),
				'nomor' =>$this->input->post('nomor'),
				'status' => $status
			);
			
			$this->db->insert('pesan',$data);
		}
	
	//Informasi
	
	function getInformasi_Ortu(){
				$nomor=$this->session->userdata('Wali');
				$id= $this->session->userdata('nmr_O');
				$where="detail_informasi.id_orangtua=$id and informasi.NIK=$nomor";
				$this->db->select('distinct(informasi.tanggal),informasi.tanggal_informasi,informasi.subject_informasi,detail_informasi.notifikasi_O,detail_informasi.id_informasi,detail_informasi.id_orangtua');
				$this->db->from('informasi');
				$this->db->join('detail_informasi','detail_informasi.id_informasi=informasi.id_informasi');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
	}
	
	function getInformasi_Ortu2($id){
				$nomor=$this->session->userdata('Wali');
				$where = "NIK=$nomor and id_informasi=$id ";
				$this->db->select('*');
				$this->db->from('informasi');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
	}
	
	
	
	function getInformasiDetail_Ortu($id){
				$this->db->select('distinct(informasi.Tanggal),informasi.tanggal_informasi,informasi.isi_informasi,informasi.isi_informasi,informasi.subject_informasi');
				$this->db->from('informasi');
				$this->db->join('detail_informasi','detail_informasi.id_informasi=informasi.id_informasi');
				$this->db->join('orang_tua','detail_informasi.id_orangtua=orang_tua.id_orangtua');
				$this->db->Where('informasi.id_informasi',$id);
				$query = $this->db->get();
				return $query->result();
	}
	
	function cek_Informasi($id){
				$nomor= $this->session->userdata('nmr_O');
				$data = $this->db->query("SELECT * FROM detail_informasi
				WHERE id_informasi=$id AND id_orangtua=$nomor order by id_informasi desc limit 1")->num_rows();
				return $data;
		}
	//Respon	
		
	function getAllTanggapan_Ortu(){
				$nomor= $this->session->userdata('Wali');
				$this->db->select('distinct(respon.dari),respon.status,respon.isi_respon,respon.id_respon,HOUR(respon.tanggal_respon) as jam,MINUTE(respon.tanggal_respon) as menit,DAY(respon.tanggal_respon) as tanggal,MONTH(respon.tanggal_respon) as bulan,YEAR(respon.tanggal_respon) as tahun');
				$this->db->from('guru');
				$this->db->join('respon','respon.NIK_guru=guru.NIK');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('orang_tua','orang_tua.id_orangtua=detail_respon.id_orangtua');
				$this->db->Where('respon.NIK_guru',$nomor);
				$this->db->order_by('respon.id_respon','DESC');
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllOrangtua2(){
				$kls= $this->session->userdata('kls_O');
				$this->db->Select('*');
				$this->db->from('siswa');
				$this->db->Where('Kelas',$kls);
				$query = $this->db->get();
				return $query->result();
	}
		
	function insertRespon_Ortu(){
			
			$tgl = date('Y-m-d');
			$b = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $b['sekarang'];
			
			$data=array(
				'id_respon' =>$this->input->post('id_res'),
				'dari' =>$this->input->post('dari'),
				'tanggal' =>$sekarang,
				'status' =>$this->session->userdata('lvl_O'),
				'tanggal_respon' =>$sekarang,
				'isi_respon' =>$this->input->post('isi_res'),
				'NIK_guru' =>$this->session->userdata('Wali')
			);
			
			$this->db->insert('respon',$data);
		}
	
	function insertDetailRespon_Ortu(){
			//extract($postdata);
			//$data  = array();
			
			//Menampung name pada variabel
			$id_orangtua=$_POST['id_orangtua'];
			
			//Mengambil jumlah name pada form
			$count = count($_POST['id_orangtua']);
			$tgl = date('Y-m-d');
			
			//Mengambil id_respon
			$b = $this->db->query("SELECT id_respon id FROM respon order by id_respon desc limit 1")->row_array();
			$id_respon = $b['id'];
			
			//Mengambil Tanggal sekarang
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			$data =array();
			for($i=0; $i<$count; $i++) {
			
			$data[$i] = array(
				'id_respon' => $id_respon, 
				'id_orangtua' => $id_orangtua[$i],
				'd_tanggal_respon' =>$sekarang,
				'notifikasi_T' =>'belum dibaca',
				'notifikasi_O' =>'belum dibaca',
				'notifikasi_W' =>'belum dibaca'
				);
			}

			$this->db->insert_batch('detail_respon', $data);
			}
			
		//Guru
		
		//Guru Kegiatan
		function getAllKegiatanGuru(){
				/*$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.NISN,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.NISN = dk.NISN) Where NIK =$nomor");
				return $query->result();*/
				/*$nomor= $this->session->userdata('nmr');
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
				'kelas' => $this->input->post('kelas'),
				'nama_kegiatan' =>$this->input->post('kegiatan'),
				'status' =>$this->input->post('status')
			);
			
			$this->db->insert('kegiatan',$data);	
		}
		
		function insertDetailKegiatanPersonalGuru(){
			$data=array(
				'NISN' => $this->input->post('NISN'),
				'tahun_ajaran' =>$this->input->post('Tahun')
			);
			
			$this->db->insert('detail_kegiatan',$data);	
		}
		
	//Tata Usaha
	//Respon Tata Usaha
		
		function getAllTanggapan_TU(){
				$this->db->select('distinct((respon.tanggal)),guru.nama,respon.NIK_guru,detail_respon.notifikasi_T');
				$this->db->from('guru');
				$this->db->join('respon','respon.NIK_guru=guru.NIK');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('orang_tua','orang_tua.id_orangtua=detail_respon.id_orangtua');
				$this->db->Where('respon.status','Orang Tua');
				$query = $this->db->get();
				return $query->result();
		}
	
	function getAllTanggapan_TOrtu($NIK,$tanggal){
				$where =("respon.tanggal='$tanggal' and respon.NIK_guru=$NIK and respon.status='Orang Tua'");
				$this->db->select('respon.dari,respon.isi_respon,guru.nama');
				$this->db->from('guru');
				$this->db->join('respon','respon.NIK_guru=guru.NIK');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllTanggapan_TWali($NIK,$tanggal){
				$where =("respon.tanggal='$tanggal' and respon.NIK_guru=$NIK and respon.status='Orang Tua'");
				$this->db->select('distinct((respon.tanggal)),guru.nama,respon.NIK_guru');
				$this->db->from('guru');
				$this->db->join('respon','respon.NIK_guru=guru.NIK');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllTanggapan_TOrtu1($tanggal,$NIK){
				$where =("respon.tanggal='$tanggal' and respon.NIK_guru=$NIK and respon.status='Orang Tua'");
				$this->db->select('respon.tanggal,respon.dari,respon.isi_respon,guru.nama');
				$this->db->from('guru');
				$this->db->join('respon','respon.NIK_guru=guru.NIK');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllTanggapan_TWali1($tanggal,$NIK){
				$where =("respon.tanggal='$tanggal' and respon.NIK_guru=$NIK and respon.status='Orang Tua'");
				$this->db->select('distinct((respon.tanggal)),guru.nama,respon.NIK_guru');
				$this->db->from('guru');
				$this->db->join('respon','respon.NIK_guru=guru.NIK');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllLaporan(){
				$this->db->select('distinct((tanggal_laporan)),id_laporan');
				$this->db->from('laporan');
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
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			$data=array(
				'tanggal_laporan' => $sekarang,
				'isi_laporan' =>$this->input->post('isi'),
				'NIK' =>$this->session->userdata('nmr')
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
				$data = $this->db->query("select * from respon where status='Orang Tua' and notifikasi='belum dibaca'")->num_rows();
				return $data;
	}
	
	
	
	//notif Wali Kelas
	//notif Respon Wali Kelas
	/*function notifikasiPesan(){;
				$nomor= $this->session->userdata('nmr_W');
				$data = $this->db->query("select * from respon where status='Orang Tua' and notifikasi='belum dibaca' and
				NIK_guru=$nomor")->num_rows();
				return $data;
	}
	
	function Ubahnotifikasi(){
				$nomor= $this->session->userdata('nmr_W');
				$query=$this->db->query("update respon set notifikasi='dibaca' where status='Orang Tua' or status='Wali Kelas' and notifikasi='belum dibaca' and
				NIK_guru=$nomor");
	}*/
	
	/*function notifikasiPesan(){;
				$nomor= $this->session->userdata('nmr_W');
				$data = $this->db->query("select distinct(d.id_respon),isi_respon from respon r join detail_respon d on(d.id_respon=r.id_respon)
				where status='Orang Tua' and notifikasi_W='belum dibaca' and
				NIK_guru=$nomor")->num_rows();
				return $data;
	}
	
	function Ubahnotifikasi(){
				$nomor= $this->session->userdata('nmr_W');
				$query=$this->db->query("update detail_respon d join respon r on(r.id_respon=d.id_respon) set notifikasi_W='dibaca' 
				where status='Orang Tua' or status='Wali Kelas' and notifikasi_W='belum dibaca' and
				NIK_guru=$nomor");
	}
	
	//notif Pesan Wali Kelas
	function detail(){;
				$nomor= $this->session->userdata('nmr_W');
				$data = $this->db->query("select * from informasi where NIK=$nomor")->num_rows();
				return $data;
	}
	
	
	
	function notifPesan_Wali(){
				$nomor= $this->session->userdata('nmr_W');
				$nama= $this->session->userdata('nama_W');
				$data = $this->db->query("SELECT * FROM pesan
				WHERE NIK =$nomor AND status =  'Belum Terbaca' AND dari not like'%$nama%'")->num_rows();
				return $data;
	}
	
	function ListNotifPesan_Wali(){
				$nomor= $this->session->userdata('nmr_W');
				$nama= $this->session->userdata('nama_W');
				$where ="NIK =$nomor AND status = 'Belum Terbaca' AND dari not like'%$nama%'";
				$this->db->select('distinct(tanggal_pesan),dari,isi_pesan,nomor,id_pesan');
				$this->db->from('pesan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
	}
	
	function Ubahnotifikasi_PWali($id){
				$nomor= $this->session->userdata('nmr_W');
				$query=$this->db->query("update pesan set status='Terbaca' where id_pesan=$id and status ='Belum Terbaca' and
				NIK=$nomor");
	}
	
	//notif Informasi Wali Kelas
	function notifInformasi_Wali(){
				$nomor= $this->session->userdata('nmr_W');
				$data = $this->db->query("SELECT distinct(i.tanggal),i.subject_informasi,d.id_informasi 
				FROM informasi i join detail_informasi d on(i.id_informasi=d.id_informasi)
				WHERE i.NIK =$nomor AND d.notifikasi_O = 'dibaca' AND d.notifikasi_W='belum dibaca'")->num_rows();
				return $data;
	}
	
	function ListNotifInformasi_Wali(){
				$nomor= $this->session->userdata('nmr_W');
				$data = $this->db->query("SELECT distinct(i.tanggal),i.subject_informasi,d.id_informasi,count(d.id_informasi) as jumlah
				FROM informasi i join detail_informasi d on(i.id_informasi=d.id_informasi)
				WHERE i.NIK =$nomor AND d.notifikasi_O = 'dibaca' AND d.notifikasi_W='belum dibaca'
				group by d.id_informasi;")->result();
				return $data;
	}
	
	function getAllJumlah(){
				$kls= $this->session->userdata('kls_W');
				$this->db->Select('*');
				$this->db->from('siswa');
				$this->db->Where('Kelas',$kls);
				$query = $this->db->get();
				return $query->num_rows();
		}
	
	function Ubahnotifikasi_IWali($id){
				$query=$this->db->query("update detail_informasi set notifikasi_W='dibaca' where id_informasi=$id and notifikasi_O='dibaca'");
	}
	//notif orang tua
	//notif kegiatan orang tua
	function notifKegiatan_Ortu(){
				$nomor= $this->session->userdata('nmr_O');
				$data = $this->db->query("SELECT distinct(k.tanggal_kegiatan), d.NISN FROM kegiatan k 
				JOIN detail_kegiatan d ON ( d.id_kegiatan = k.id_kegiatan ) 
				WHERE d.NISN =$nomor AND d.notifikasi =  'belum dibaca'")->num_rows();
				return $data;
	}
	
	function ListNotifKegiatan_Ortu(){
				$nomor= $this->session->userdata('nmr_O');
				$where ="detail_kegiatan.NISN =$nomor AND detail_kegiatan.notifikasi =  'belum dibaca'";
				$this->db->select('distinct(kegiatan.tanggal_kegiatan),siswa.nama,siswa.NISN');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan','kegiatan.id_kegiatan=detail_kegiatan.id_kegiatan');
				$this->db->join('siswa','siswa.NISN=detail_kegiatan.NISN');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
	}
	
	function Ubahnotifikasi_KOrtu($NISN,$tanggal){
				$nomor= $this->session->userdata('nmr_O');
				$query=$this->db->query("update detail_kegiatan set notifikasi='dibaca' where tanggal_kegiatan='$tanggal' and notifikasi='belum dibaca' and
				NISN=$NISN");
	}
	
	//notif pesan orang tua
	function notifPesan_Ortu(){
				$nomor= $this->session->userdata('Wali');
				$nama= $this->session->userdata('nama_Wali');
				$id= $this->session->userdata('nmr_O');
				$data = $this->db->query("SELECT * FROM pesan
				WHERE NIK =$nomor AND status =  'Belum Terbaca' AND dari like'%$nama%' AND id_orangtua=$id")->num_rows();
				return $data;
	}
	
	function ListNotifPesan_Ortu(){
				$nomor= $this->session->userdata('Wali');
				$nama= $this->session->userdata('nama_Wali');
				$id= $this->session->userdata('nmr_O');
				$where ="NIK =$nomor AND status = 'Belum Terbaca' AND dari like'%$nama%' and id_orangtua=$id";
				$this->db->select('distinct(tanggal_pesan),dari,isi_pesan,nomor,id_pesan');
				$this->db->from('pesan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
	}
	
	function Ubahnotifikasi_POrtu($id){
				$nomor= $this->session->userdata('Wali');
				$query=$this->db->query("update pesan set status='Terbaca' where id_pesan=$id and status ='Belum Terbaca' and
				NIK=$nomor");
	}
	
	function cek_Pesan($nomor){
				$nama= $this->session->userdata('nama_O');
				$data = $this->db->query("SELECT * FROM pesan
				WHERE nomor =$nomor AND dari like'%$nama%' order by nomor desc limit 1")->num_rows();
				return $data;
	}
	
	//notif informasi orang tua
	function notifInformasi_Ortu(){
				$nomor= $this->session->userdata('Wali');
				$id= $this->session->userdata('nmr_O');
				$data = $this->db->query("SELECT d.id_informasi,d.id_orangtua 
				FROM informasi i join detail_informasi d on(i.id_informasi=d.id_informasi)
				WHERE i.NIK =$nomor AND d.notifikasi_O = 'belum dibaca' AND d.id_orangtua=$id")->num_rows();
				return $data;
	}
	
	function ListNotifInformasi_Ortu(){
				$nomor= $this->session->userdata('Wali');
				$id= $this->session->userdata('nmr_O');
				$data = $this->db->query("SELECT i.subject_informasi,i.tanggal,d.id_informasi,d.id_orangtua 
				FROM informasi i join detail_informasi d on(i.id_informasi=d.id_informasi)
				WHERE i.NIK =$nomor AND d.notifikasi_O = 'belum dibaca' AND d.id_orangtua=$id")->result();
				return $data;
	}
	
	function Ubahnotifikasi_IOrtu($id,$nomor){
				$query=$this->db->query("update detail_informasi set notifikasi_O='dibaca' where id_informasi=$id and notifikasi_O='belum dibaca' and
				id_orangtua=$nomor");
	}
	
	//notif Respon orang tua
	function notifRespon_Ortu(){
				$nomor= $this->session->userdata('Wali');
				$id= $this->session->userdata('nmr_O');
				$nama= $this->session->userdata('nama_O');
				$data = $this->db->query("SELECT id_respon, id_orangtua, isi_respon
				FROM detail_respon JOIN respon USING ( id_respon ) WHERE id_orangtua <>$id AND dari NOT LIKE  '%$nama%' 
				AND notifikasi_O =  'belum dibaca' AND NIK_guru=$nomor ")->num_rows();
				return $data;
	}
	
	function Ubahnotifikasi_ROrtu(){
				$id= $this->session->userdata('nmr_O');
				$nama= $this->session->userdata('nama_O');
				$nomor= $this->session->userdata('Wali');
				$query=$this->db->query("update detail_respon d join respon r on(d.id_respon=r.id_respon) set notifikasi_O='dibaca' WHERE id_orangtua <>$id  
				AND notifikasi_O =  'belum dibaca' AND NIK_guru=$nomor ");
	}
	
	//notif Tata Usaha
	//notif Saran
	function notifRespon_TU(){
				$query=$this->db->query("SELECT DISTINCT (respon.tanggal), guru.nama, respon.NIK_guru FROM guru
				JOIN respon ON ( respon.NIK_guru = guru.NIK ) 
				JOIN detail_respon ON ( respon.id_respon = detail_respon.id_respon ) 
				JOIN orang_tua ON ( orang_tua.id_orangtua = detail_respon.id_orangtua ) 
				WHERE respon.status =  'Orang Tua' AND detail_respon.notifikasi_T =  'belum dibaca'")->num_rows();
				return $query;
	}
	
	function ListNotifRespon_TU(){
				$data = $this->db->query("SELECT DISTINCT (respon.tanggal), guru.nama, respon.NIK_guru FROM guru
				JOIN respon ON ( respon.NIK_guru = guru.NIK ) 
				JOIN detail_respon ON ( respon.id_respon = detail_respon.id_respon ) 
				JOIN orang_tua ON ( orang_tua.id_orangtua = detail_respon.id_orangtua ) 
				WHERE respon.status =  'Orang Tua' AND detail_respon.notifikasi_T =  'belum dibaca'")->result();
				return $data;
	}
	
	function Ubahnotifikasi_RTU($NIK,$tanggal){
				$query=$this->db->query("update detail_respon d join respon r on(d.id_respon=r.id_respon) set notifikasi_T='dibaca' 
				WHERE r.tanggal='$tanggal' and r.NIK_guru=$NIK ");
	}*/
	
	}