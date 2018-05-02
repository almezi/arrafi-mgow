<?php
	//File Wali_Kelas_model.php
	class Wali_Kelas_model extends CI_Model  {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	} 
		
	/*function cek_user_W($username="",$password=""){
		$query= $this->db->get_where('user_W',array('username'=>$username,'password'=>$password));
		$query= $query->result_array();
		return $query;
		}*/
	
	/*function ambil_user_W($username){
		$query= $this->db->get_where('user_W',array('username'=>$username));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}*/
		
	function ambil_user($username){
		$query= $this->db->get_where('guru',array('username'=>$username));
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
		
	function ambil_jumlah($username){
		$user= $this->session->userdata('uname');
		$data = $this->db->query("select * from grup_user where username ='$user'")->num_rows();
		return $data;
		}

	function ambil_kelas($kelas){
		$query= $this->db->get_where('kelas',array('nama'=>$kelas));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
	function ambil_bahas($pembahasan){
		$user= $this->session->userdata('uname');
		$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
		$nomor = $c['NIP'];
		$query= $this->db->query("select distinct(id_pembahasan),nama_pembahasan,status_pembahasan from respon join pembahasan using(id_pembahasan) where nip='$nomor' and id_pembahasan=$pembahasan limit 1 ");
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
	function ambil_kegiatan($id){
		//$query= $this->db->get_where('kegiatan',array('id_kegiatan'=>$id));
		$query= $this->db->query("select k.nama_kegiatan,dk.nis from kegiatan k join detail_kegiatan dk on(k.id_kegiatan=dk.id_kegiatan) where dk.id_kegiatan=$id ");
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
	function ambil_pesan($id){
		$query= $this->db->get_where('pesan',array('id_pesan'=>$id));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
	function ambil_laporan($id){
		$query= $this->db->get_where('laporan',array('id_laporan'=>$id));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
	
	function ambil_informasi($id){
		$query= $this->db->get_where('informasi',array('id_informasi'=>$id));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
		
	function getAllMahasiswa(){
				$user= $this->session->userdata('uname');
				$b = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $b['NIP'];
				if(!$this->input->get('kelas')){
				$query=$this->db->query("select distinct(s.nis),s.nama nama_siswa,k.nama from siswa s join kelas_siswa ks on(s.nis=ks.nis) 
				join kelas k on(ks.idkelas=k.idkelas) join bab b on(b.idkelas=k.idkelas) join ajar a on(a.idmapel=b.idmapel) where a.NIP='$nomor'");
				return $query->result();
			}
				$kelas = $this->input->get('kelas');
				$query=$this->db->query("select distinct(s.nis),s.nama nama_siswa,k.nama from siswa s join kelas_siswa ks on(s.nis=ks.nis) 
				join kelas k on(ks.idkelas=k.idkelas) join bab b on(b.idkelas=k.idkelas) join ajar a on(a.idmapel=b.idmapel) where a.NIP='$nomor' and k.nama like '%$kelas%'");
				return $query->result();
		}
		
	function getAllPelajaran(){
				//$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.nis,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.nis = dk.nis) Where s.nis =$nis");
				
				$user= $this->session->userdata('uname');
				$b = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $b['NIP'];
				
				if(!$this->input->get('kelas')){
				$this->db->select("distinct(m.idmapel),m.nama nama_mapel,k.nama kelas,b.nama nama_bab");
				$this->db->from("mapel m join ajar a on(m.idmapel=a.idmapel) 
				join guru g on(g.NIP=a.NIP) 
				join bab b on(b.idmapel=a.idmapel) 
				join kelas k on(b.idkelas=k.idkelas)
				where g.NIP='$nomor' ");
				$query = $this->db->get();
				return $query->result();
				} 
				$kelas = $this->input->get('kelas');
				$this->db->select("m.idmapel,m.nama nama_mapel,k.nama kelas,b.nama nama_bab");
				$this->db->from("mapel m join ajar a on(m.idmapel=a.idmapel) 
				join guru g on(g.NIP=a.NIP) 
				join bab b on(b.idmapel=a.idmapel) 
				join kelas k on(b.idkelas=k.idkelas)
				where g.NIP='$nomor' and k.nama like '%$kelas%' ");
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllKelas(){
				$user= $this->session->userdata('uname');
				$b = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $b['NIP'];
				$query=$this->db->query("select distinct(k.nama) from ajar a join bab b on(a.idmapel=b.idmapel) join kelas k on(k.idkelas=b.idkelas) where a.nip='$nomor'");
				return $query->result();
		}
		
		
		
	function insertKegiatan(){
			$user= $this->session->userdata('uname');
			$b = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
			$nomor = $b['NIP'];
			$kelas=$_POST['KLS'];
			$status=$_POST['status'];
			$catatan=$_POST['catatan'];
			$tgl = $_POST['tgl_kegiatan'];
			$kegiatan = $_POST['kegiatan'];
			
			//Mengambil jumlah name pada form
			$count = count($_POST['KLS']);
			
			$d = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $d['sekarang'];
			
			$data =array();
			for($i=0; $i<$count; $i++) {
			$data[$i] = array(
				'NIP' => $nomor,
				'tanggal_kegiatan' => $tgl,
				'jam_kegiatan' => $sekarang,
				'kelas' => $kelas[$i],
				'nama_kegiatan' =>$kegiatan,
				'status' =>$status[$i],
				'catatan' =>$catatan[$i]
				);
			}

			$this->db->insert_batch('kegiatan', $data);
			
		}
		
			function insertDetailKegiatan(){
			
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			$nis =$_POST['nis'];
			$count = count($_POST['nis']);
			$total = 0;
			
			$data =array();
			for($i=0; $i<$count; $i++) {
			$data[$i] = array(
				'nis' => $nis[$i],
				'tanggal_kegiatan' => $sekarang,
				'tahun_ajaran' =>$this->input->post('Tahun'),
				'notifikasi' =>'belum dibaca'
				);
			}
			
			$this->db->insert_batch('detail_kegiatan', $data);
			}
			
			
		
	function getAllKegiatan(){
				/*$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.nis,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.nis = dk.nis) Where NIP ='$nomor'");
				return $query->result();*/
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				
				$where = "kegiatan.NIP='$nomor' order by kegiatan.tanggal_kegiatan DESC ";
				$this->db->select('distinct(kegiatan.tanggal_kegiatan),kelas.nama');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan', 'kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa', 'siswa.nis= detail_kegiatan.nis');
				$this->db->join('kelas_siswa', 'kelas_siswa.nis= siswa.nis');
				$this->db->join('kelas', 'kelas.idkelas= kelas_siswa.idkelas');
				$this->db->where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllKegiatan2(){
				$tanggal = $this->input->get('tgl');
				$kelas = $this->input->get('kls');
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$where = "kegiatan.tanggal_kegiatan='$tanggal' and kelas.nama='$kelas' and kegiatan.NIP='$nomor'";
				//$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.nis,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.nis = dk.nis) Where s.nis =$nis");
				$this->db->select('distinct(kegiatan.nama_kegiatan),siswa.nis,siswa.nama nama_siswa,kegiatan.tanggal_kegiatan,kegiatan.status,kegiatan.id_kegiatan,detail_kegiatan.tahun_ajaran,kegiatan.catatan,kelas.nama');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan', 'kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa', 'siswa.nis = detail_kegiatan.nis');
				$this->db->join('kelas_siswa', 'kelas_siswa.nis= siswa.nis');
				$this->db->join('kelas', 'kelas.idkelas= kelas_siswa.idkelas');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function ambil_nis($nis){
		$query= $this->db->get_where('siswa',array('nis'=>$nis));
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
	function ambil_dataKegiatan($id){
				$this->db->select('kegiatan.id_kegiatan,kegiatan.nip,kelas.nama kelas,siswa.nama,siswa.nis,detail_kegiatan.tahun_ajaran,kegiatan.status,kegiatan.nama_kegiatan,kegiatan.catatan');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan', 'kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa', 'siswa.nis = detail_kegiatan.nis');
				$this->db->join('kelas_siswa', 'kelas_siswa.nis= siswa.nis');
				$this->db->join('kelas', 'kelas.idkelas= kelas_siswa.idkelas');
				$this->db->where('kegiatan.id_kegiatan',$id);
				$query = $this->db->get();
				return $query->result();
		}
		
	
		
	function ambil_dataKegiatan2(){
				$id = $this->input->get('id');
				$where = "kegiatan.id_kegiatan=$id";
				$this->db->select('kegiatan.id_kegiatan,kegiatan.nip,kelas.nama kelas,siswa.nama,siswa.nis,detail_kegiatan.tahun_ajaran,kegiatan.status,kegiatan.catatan');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan', 'kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa', 'siswa.nis = detail_kegiatan.nis');
				$this->db->join('kelas_siswa', 'kelas_siswa.nis= siswa.nis');
				$this->db->join('kelas', 'kelas.idkelas= kelas_siswa.idkelas');
				$this->db->where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function updatedetailKegiatan(){
			$id=$this->input->post('id');
			$NIP=$this->input->post('NIP');
			$nama=$this->input->post('kegiatan');
			$kelas=$this->input->post('KLS');
			$catatan=$this->input->post('catatan');
			$status=$this->input->post('status');
			if($status == "TUNTAS"){
			$query=$this->db->query("update kegiatan set NIP='$NIP',nama_kegiatan='$nama',Kelas='$kelas',status='$status',catatan='(Tidak Ada Catatan)' where id_kegiatan=$id");
			} else {
			$query=$this->db->query("update kegiatan set NIP='$NIP',nama_kegiatan='$nama',Kelas='$kelas',status='$status',catatan='$catatan' where id_kegiatan=$id");
			}
			
			$id=$this->input->post('id');
			$thn=$this->input->post('Tahun');
			$nis=$this->input->post('nis');
			$query=$this->db->query("update detail_kegiatan set tahun_ajaran='$thn', nis=$nis  where id_kegiatan=$id");
			
		}
	
	function hapusIdKegiatan($id){
			$query=$this->db->query("delete from kegiatan where id_kegiatan=$id");
		}
		
	
		
	/*function getAllEditPelajaran($id){
				//$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.nis,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.nis = dk.nis) Where s.nis =$nis");
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
	}*/
	
	//Pesan
	function getAllMahasiswa_W(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$query=$this->db->query("select s.nama, k.nama kelas, s.nis,o.idortu from guru g join wali w on(g.nip=w.nip) join kelas k on(w.idkelas=k.idkelas) 
				join kelas_siswa ks on(ks.idkelas=k.idkelas) join siswa s on(ks.nis=s.nis) join ortu o on(s.idortu=o.idortu) where w.nip='$nomor' ");
				return $query->result();
		}
		
	function insertPesan(){
			
			
			$user= $this->session->userdata('uname');
			$nis=$this->input->post('id_ortu');
			
			$a = $this->db->query("SELECT NIP NIP, nama nama FROM guru where username='$user' limit 1")->row_array();
			$nomor = $a['NIP'];
			$nama = $a['nama'];
			
			$b = $this->db->query("SELECT id_pesan id FROM pesan order by id_pesan desc limit 1")->row_array();
			$id_pesan = $b['id'];
			
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			$d = $this->db->query("SELECT idortu ortu FROM siswa where nis='$nis' limit 1")->row_array();
			$ortu = $d['ortu'];
			
			$status='Belum Terbaca';
			
			/*$query=$this->db->query("INSERT INTO pesan(tanggal_pesan,dari, isi_pesan, NIP, idortu,nomor,status) 
			VALUES (NOW(),'$dari','$isi_pesan',$NIP,$idortu,$id_pesan+1,'$status')");*/
			
			$data=array(
				'tanggal_pesan' =>$sekarang,
				'dari' =>$nama,
				'isi_pesan' =>$this->input->post('isi_p'),
				'nis' =>$nis,
				'NIP' =>$nomor,
				'idortu' =>$ortu,
				'nomor' =>$id_pesan+1,
				'status' => $status
			);
			
			$this->db->insert('pesan',$data);
		}
		
	function getAllPesan(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP,nama nama FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$nama = $c['nama'];
				$where="pesan.dari='$nama' and pesan.NIP='$nomor'";
				$this->db->select('distinct(pesan.tanggal_pesan),pesan.nis,pesan.id_pesan,pesan.isi_pesan,pesan.idortu,ortu.nama,pesan.status');
				$this->db->from('guru');
				$this->db->join('pesan','pesan.nip=guru.nip');
				$this->db->join('ortu','ortu.idortu=pesan.idortu');
				$this->db->Where($where);
				$this->db->order_by('id_pesan','DESC');
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllPesanMasuk(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$d = $this->db->query("SELECT nama nama FROM guru where username='$user' limit 1")->row_array();
				$nama = $d['nama'];
				$where="pesan.NIP='$nomor' and pesan.dari <> '$nama'";
				$this->db->select('distinct(pesan.tanggal_pesan),pesan.id_pesan,pesan.isi_pesan,pesan.idortu,pesan.dari,pesan.nomor,pesan.status');
				$this->db->from('Pesan');
				$this->db->Where($where);
				$this->db->order_by('tanggal_pesan','DESC');
				$query = $this->db->get();
				return $query->result();
	}
		
	function ambil_dataPesan($id,$id_o){
				$where = "pesan.id_pesan=$id and ortu.idortu=$id_o";
				$this->db->select('pesan.id_pesan,pesan.isi_pesan,pesan.nis');
				$this->db->from('guru');
				$this->db->join('pesan','pesan.nip=guru.nip');
				$this->db->join('ortu','ortu.idortu=pesan.idortu');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function ambil_dataPesan2(){
				$id_pesan=$this->input->get('id_p2');
				$this->db->select('pesan.id_pesan,pesan.isi_pesan');
				$this->db->from('Pesan');
				$this->db->join('ortu','ortu.idortu=pesan.idortu');
				$this->db->join('guru','guru.NIP=pesan.NIP');
				$this->db->Where('pesan.id_pesan',$id_pesan);
				$query = $this->db->get();
				return $query->result();
		}
	function ambil_HistoryPesan($nomor){
				$where = "pesan.nomor='$nomor'";
				$this->db->select('pesan.id_pesan,pesan.isi_pesan,pesan.dari,pesan.tanggal_pesan');
				$this->db->from('Pesan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
		function updatePesan(){
			$id_pesan=$this->input->post('id_p');
			$isi_pesan=$this->input->post('isi_p');
			$nis=$this->input->post('idortu');
			
			$d = $this->db->query("SELECT idortu ortu FROM siswa where nis='$nis' limit 1")->row_array();
			$ortu = $d['ortu'];
			
			
			$query=$this->db->query("update pesan set isi_pesan='$isi_pesan',nis='$nis', idortu=$ortu where id_pesan=$id_pesan");
		}
	
		function hapusIdPesan($id){
			$query=$this->db->query("delete from pesan where id_pesan=$id");
		}
		
		
		
	//Informasi
	
		function insertInformasi(){
			$user= $this->session->userdata('uname');
			$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
			$nomor = $c['NIP'];
			$tanggal_informasi=$this->input->post('tgl_info');
			$isi_informasi=$this->input->post('isi_info');
			$subject_informasi=$this->input->post('subject_info');
			
			
			$b = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $b['sekarang'];
			
			$data=array(
				'tanggal' =>$sekarang,
				'tanggal_informasi' =>$tanggal_informasi,
				'isi_informasi' =>$isi_informasi,
				'subject_informasi' =>$subject_informasi,
				'NIP' =>$nomor
			);
			
			$this->db->insert('informasi',$data);
		}
		
		function insertInformasiDetail(){
			//Menampung name pada variabel
			$idortu=$_POST['idortu'];
			
			//Mengambil jumlah name pada form
			$count = count($_POST['idortu']);
			
			//Mengambil id_respon
			$b = $this->db->query("SELECT id_informasi id FROM informasi order by id_informasi desc limit 1")->row_array();
			$id_informasi = $b['id'];
			
			//Mengambil Tanggal sekarang
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			$data =array();
			for($i=0; $i<$count; $i++) {
			
			$data[$i] = array(
				'idortu' => $idortu[$i], 
				'id_informasi' => $id_informasi,
				'd_tanggal_informasi' =>$sekarang,
				'notifikasi_O' =>'belum dibaca',
				'notifikasi_W' =>'belum dibaca'
				);
			}

			$this->db->insert_batch('detail_informasi', $data);

	}
	
		function getAllInformasi(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$this->db->select('distinct(informasi.tanggal),informasi.subject_informasi,informasi.tanggal_informasi,informasi.id_informasi');
				$this->db->from('Informasi');
				$this->db->join('guru','guru.NIP=informasi.NIP');
				$this->db->Where('guru.NIP',$nomor);
				$this->db->order_by('id_informasi','desc');
				$query = $this->db->get();
				return $query->result();
		}
		
		function  ambil_dataInformasi($id){
				$this->db->select('informasi.subject_informasi,informasi.NIP,informasi.tanggal_informasi,informasi.isi_informasi,informasi.id_informasi');
				$this->db->from('Informasi');
				$this->db->join('guru','guru.NIP=informasi.NIP');
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
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$query = $this->db->query("SELECT DISTINCT (i.tanggal), i.tanggal_informasi,i.subject_informasi, d.id_informasi,count(d.id_informasi) as jumlah FROM informasi i
				JOIN detail_informasi d ON ( i.id_informasi = d.id_informasi ) 
				WHERE i.NIP ='$nomor' AND notifikasi_O =  'dibaca' AND d.notifikasi_W in('belum dibaca','dibaca')
				group by d.id_informasi;");
				return $query->result();
		}
	
		function getInformasiTerbaca($id){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$query = $this->db->query("SELECT distinct(i.tanggal),i.tanggal_informasi,i.subject_informasi,d.id_informasi,count(d.id_informasi) as jumlah
				FROM informasi i join detail_informasi d on(i.id_informasi=d.id_informasi)
				WHERE i.NIP ='$nomor' AND d.notifikasi_O = 'dibaca' AND d.notifikasi_W='dibaca' AND i.id_informasi =$id
				group by d.id_informasi;");
				return $query->result();
	}
	
	function getOrangTuaTerbaca($id){
				$query = $this->db->query("SELECT DISTINCT (d.id_informasi), o.nama, d.notifikasi_O,i.subject_informasi,i.tanggal_informasi
				FROM ortu o
				JOIN detail_informasi d ON ( o.idortu = d.idortu ) 
				JOIN informasi i ON (i.id_informasi=d.id_informasi) 
				WHERE d.id_informasi =$id");
				return $query->result();
	}
	
	function getOrangTua(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$query=$this->db->query("select DISTINCT (o.idortu), o.nama from guru g join wali w on(g.nip=w.nip) join kelas k on(w.idkelas=k.idkelas) 
				join kelas_siswa ks on(ks.idkelas=k.idkelas) join siswa s on(ks.nis=s.nis) join ortu o on(s.idortu=o.idortu)  where w.nip='$nomor' ");
				return $query->result();
		}
	
	function getOrangTuaTerbaca2($id){
				$query = $this->db->query("SELECT DISTINCT (d.id_informasi),i.subject_informasi,i.tanggal_informasi
				FROM ortu o
				JOIN detail_informasi d ON ( o.idortu = d.idortu ) 
				JOIN informasi i ON (i.id_informasi=d.id_informasi) 
				WHERE d.id_informasi =$id");
				return $query->result();
	}
	
	/*function getJumlahInformasiTerbaca(){
				'$nomor'= $this->session->userdata('nmr_W');
				$query = $this->db->query("SELECT i.tanggal,i.tanggal_informasi,i.subject_informasi,d.id_informasi,count(d.id_informasi) as jumlah
				FROM informasi i join detail_informasi d on(i.id_informasi=d.id_informasi)
				WHERE i.NIP ='$nomor' AND d.notifikasi_O = 'dibaca' AND d.notifikasi_W='dibaca' 
				group by d.id_informasi;");
				return $query->num_rows();
	}*/
	
	
		
		//Respon
		/*function getAllTanggapan(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$this->db->select('distinct(respon.dari),respon.isi_respon,respon.id_respon,HOUR(respon.tanggal_respon) as jam,MINUTE(respon.tanggal_respon) as menit,DAY(respon.tanggal_respon) as tanggal,MONTH(respon.tanggal_respon) as bulan,YEAR(respon.tanggal_respon) as tahun');
				$this->db->from('guru');
				$this->db->join('respon','respon.NIP=guru.NIP');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('ortu','ortu.idortu=detail_respon.idortu');
				$this->db->Where('respon.nip',$nomor);
				$this->db->order_by('respon.id_respon','DESC');
				$query = $this->db->get();
				return $query->result();
		}*/
		function getAllTanggapan_Pembahasan(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$this->db->select('distinct(respon.id_pembahasan),respon.nip,pembahasan.nama_pembahasan');
				$this->db->from('guru');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('ortu','ortu.idortu=detail_respon.idortu');
				$this->db->join('pembahasan','pembahasan.id_pembahasan=respon.id_pembahasan');
				$this->db->Where('respon.nip',$nomor);
				$query = $this->db->get();
				return $query->result();
		}
		
		function getAllTanggal($pembahasan){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$query = $this->db->query("SELECT DISTINCT(r.tanggal) FROM guru g
				JOIN respon r ON ( r.NIP = g.NIP ) 
				JOIN detail_respon d ON ( r.id_respon = d.id_respon ) 
				JOIN ortu o ON ( o.idortu = d.idortu ) 
				WHERE r.NIP='$nomor' and r.id_pembahasan='$pembahasan'
				order by r.tanggal desc")->result();
				return $query;
		}
		
		function getAllOrangtua(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$query=$this->db->query("select distinct(o.idortu) from guru g join wali w on(g.nip=w.nip) join kelas k on(w.idkelas=k.idkelas) 
				join kelas_siswa ks on(ks.idkelas=k.idkelas) join siswa s on(ks.nis=s.nis) join ortu o on(s.idortu=o.idortu) where w.nip='$nomor' ");
				return $query->result();
		}
		
		function getJumlahOrangtua(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$query=$this->db->query("select distinct(o.idortu) from guru g join wali w on(g.nip=w.nip) join kelas k on(w.idkelas=k.idkelas) 
				join kelas_siswa ks on(ks.idkelas=k.idkelas) join siswa s on(ks.nis=s.nis) join ortu o on(s.idortu=o.idortu) where w.nip='$nomor' ");
				return $query->num_rows();
		}
		
		
		function insertRespon(){
			
			$tgl = date('Y-m-d');
			$user= $this->session->userdata('uname');
			$kode= $this->session->userdata('kode');
			
			$b = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $b['sekarang'];
			
			$c = $this->db->query("SELECT NIP NIP,nama nama FROM guru where username='$user' limit 1")->row_array();
			$nip = $c['NIP'];
			$nama = $c['nama'];
			
			$d = $this->db->query("SELECT nama_group status FROM grup join grup_user using(kode_group) where username='$user' order by kode_group asc limit 1")->row_array();
			$status = $d['status'];
			
			$e = $this->db->query("SELECT id_respon id FROM respon order by id_respon desc limit 1")->row_array();
			$nomor = $e['id'];
			
			$data = array(
				'dari' =>$nama,
				'tanggal' =>$sekarang,
				'status' =>$status,
				'tanggal_respon' =>$sekarang,
				'id_pembahasan' =>$this->input->post('pembahasan'),
				'isi_respon' =>$this->input->post('isi_res'),
				'nip' =>$nip
				);
			

			$this->db->insert('respon', $data);
		}
		
			function insertDetailRespon(){
			//extract($postdata);
			//$data  = array();
			
			//Menampung name pada variabel
			$idortu=$_POST['idortu'];
			
			//Mengambil jumlah name pada form
			$count = count($_POST['idortu']);
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
				'idortu' => $idortu[$i],
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
				$this->db->join('respon','respon.NIP=guru.NIP');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('ortu','ortu.idortu=detail_respon.idortu');
				$this->db->Where('respon.id_respon',$id);
				$query = $this->db->get();
				return $query->result();
		}
		
		function ubahStatusPembahasan($pembahasan){
			$query=$this->db->query("update pembahasan set status_pembahasan='Tutup' where id_pembahasan=$pembahasan");
		}
		
		function ubahRespon(){
			$id_respon=$this->input->post('id_res');
			$isi_respon=$this->input->post('isi_res');
			$query=$this->db->query("update respon set isi_respon='$isi_respon' where id_respon=$id_respon");
		}
		
		
		function hapusIdRespon($id){
			$query=$this->db->query("delete from respon where id_respon=$id");
		}
		
		
	
	function Ubahnotifikasi($pembahasan){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$query=$this->db->query("update detail_respon d join respon r on(r.id_respon=d.id_respon) set notifikasi_W='dibaca' 
				where d.notifikasi_W='belum dibaca' and r.nip='$nomor' and r.id_pembahasan='$pembahasan'");
	}
	
	function getAllTanggapan_TU(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$where ="respon.nip ='$nomor' AND respon.status = 'Orang-Tua' and detail_respon.notifikasi_T in('belum dibaca','dibaca')";
				$this->db->select('DISTINCT(respon.tanggal), guru.nama, respon.nip,respon.id_pembahasan,detail_respon.notifikasi_T, kelas.nama kelas');
				$this->db->from('siswa');
				$this->db->join('kelas_siswa','siswa.nis=kelas_siswa.nis');
				$this->db->join('kelas','kelas.idkelas=kelas_siswa.idkelas');
				$this->db->join('wali','kelas.idkelas=wali.idkelas');
				$this->db->join('guru','guru.nip=wali.nip');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('ortu','ortu.idortu=detail_respon.idortu');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllTanggapan_TWali($nip,$tanggal,$pembahasan){
				$where =("respon.tanggal='$tanggal' and respon.nip='$nip' and respon.id_pembahasan=$pembahasan and respon.status='Orang-Tua'");
				$this->db->select('distinct((respon.tanggal)),guru.nama,respon.nip,kelas.nama kelas,respon.id_pembahasan,pembahasan.nama_pembahasan');
				$this->db->from('siswa');
				$this->db->join('kelas_siswa','siswa.nis=kelas_siswa.nis');
				$this->db->join('kelas','kelas.idkelas=kelas_siswa.idkelas');
				$this->db->join('wali','kelas.idkelas=wali.idkelas');
				$this->db->join('guru','guru.nip=wali.nip');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->join('pembahasan','respon.id_pembahasan=pembahasan.id_pembahasan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllTanggapan_TOrtu($nip,$tanggal,$pembahasan){
				$where =("respon.tanggal='$tanggal' and respon.nip='$nip' and respon.id_pembahasan=$pembahasan and respon.status='Orang-Tua'");
				$this->db->select('distinct(respon.tanggal),respon.nip,respon.dari,respon.isi_respon');
				$this->db->from('respon');
				$this->db->join('detail_respon','detail_respon.id_respon=respon.id_respon');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	
		
	function Ubahnotifikasi_RTU($nip,$tanggal,$pembahasan){
				$query=$this->db->query("update detail_respon d join respon r on(d.id_respon=r.id_respon) set notifikasi_T='dibaca' 
				WHERE r.tanggal='$tanggal' and r.nip='$nip' and r.id_pembahasan=$pembahasan");
	}
	
	function getAllTanggapan_TOrtu2($nip,$awal,$akhir,$pembahasan){
				
				$where =("respon.tanggal between '$awal' and '$akhir' and respon.nip='$nip' and respon.status='Orang-Tua' and respon.id_pembahasan=$pembahasan");
				$this->db->select('distinct(respon.tanggal),respon.nip,respon.dari,respon.isi_respon');
				$this->db->from('respon');
				$this->db->join('detail_respon','detail_respon.id_respon=respon.id_respon');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function jumlahAllTanggapan_TOrtu2($nip,$awal,$akhir,$pembahasan){
				
				$where =("respon.tanggal between '$awal' and '$akhir' and respon.nip='$nip' and respon.status='Orang-Tua' and respon.id_pembahasan=$pembahasan");
				$this->db->select('distinct(respon.tanggal),respon.nip,respon.dari,respon.isi_respon');
				$this->db->from('respon');
				$this->db->join('detail_respon','detail_respon.id_respon=respon.id_respon');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->num_rows();
		}
		
	function getAllTanggapan_TWali2($nip,$tanggal,$pembahasan){
				$where =("respon.tanggal='$tanggal' and respon.nip='$nip' and respon.status='Orang-Tua' and respon.id_pembahasan=$pembahasan");
				$this->db->select('distinct(respon.tanggal),guru.nama,respon.nip,kelas.nama kelas,respon.id_pembahasan,pembahasan.nama_pembahasan');
				$this->db->from('siswa');
				$this->db->join('kelas_siswa','siswa.nis=kelas_siswa.nis');
				$this->db->join('kelas','kelas.idkelas=kelas_siswa.idkelas');
				$this->db->join('wali','kelas.idkelas=wali.idkelas');
				$this->db->join('guru','guru.nip=wali.nip');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->join('pembahasan','respon.id_pembahasan=pembahasan.id_pembahasan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllTanggapan_TOrtu1($awal,$akhir,$nip,$pembahasan){
				$where =("respon.tanggal between '$awal' and '$akhir' and respon.nip='$nip' and respon.status='Orang-Tua' and respon.id_pembahasan=$pembahasan");
				$this->db->select('distinct(respon.tanggal),respon.nip,respon.dari,respon.isi_respon');
				$this->db->from('respon');
				$this->db->join('detail_respon','detail_respon.id_respon=respon.id_respon');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllPembahasan_Laporan(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$where="respon.nip='$nomor' and pembahasan.status_pembahasan='Tutup'";
				$this->db->select('distinct(respon.id_pembahasan),respon.nip,pembahasan.nama_pembahasan');
				$this->db->from('guru');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('ortu','ortu.idortu=detail_respon.idortu');
				$this->db->join('pembahasan','pembahasan.id_pembahasan=respon.id_pembahasan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllTanggapan_TWali1($nip,$pembahasan){
				$where =("respon.nip='$nip' and respon.status='Orang-Tua' and respon.id_pembahasan=$pembahasan");
				$this->db->select('distinct(respon.tanggal),guru.nama,respon.nip,kelas.nama kelas,respon.id_pembahasan,pembahasan.nama_pembahasan');
				$this->db->from('siswa');
				$this->db->join('kelas_siswa','siswa.nis=kelas_siswa.nis');
				$this->db->join('kelas','kelas.idkelas=kelas_siswa.idkelas');
				$this->db->join('wali','kelas.idkelas=wali.idkelas');
				$this->db->join('guru','guru.nip=wali.nip');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->join('pembahasan','respon.id_pembahasan=pembahasan.id_pembahasan');
				$this->db->limit('1');
				$query = $this->db->get();
				return $query->result();
		}
		
	 function ambil_bahas_awal($pembahasan){
		$user= $this->session->userdata('uname');
		$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
		$nomor = $c['NIP'];
		$query= $this->db->query("SELECT  respon.dari nama_ortu, respon.tanggal tgl,DATE_FORMAT(respon.tanggal_respon,'%a' ) as hari,HOUR(respon.tanggal_respon) as jam,
		MINUTE(respon.tanggal_respon) as menit
		FROM detail_respon JOIN respon USING ( id_respon ) 
		JOIN guru USING (nip)				
		WHERE respon.id_pembahasan=$pembahasan
		order by id_respon asc limit 1");
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
		function ambil_bahas_akhir($pembahasan){
		$user= $this->session->userdata('uname');
		$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
		$nomor = $c['NIP'];
		$query= $this->db->query("SELECT  respon.dari nama_ortu, respon.tanggal tgl,DATE_FORMAT( respon.tanggal_respon,'%a' ) as hari,HOUR(respon.tanggal_respon) as jam,
		MINUTE(respon.tanggal_respon) as menit
		FROM detail_respon JOIN respon USING ( id_respon ) 
		JOIN guru USING (nip)				
		WHERE respon.id_pembahasan=$pembahasan
		order by id_respon desc limit 1");
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
	function getAllTanggapan_LJumlah($pembahasan){
				$user= $this->session->userdata('uname');
				$b = $this->db->query("SELECT nip id from guru where username='$user' limit 1")->row_array();
				$id = $b['id'];
				$where =("respon.nip='$id' and respon.id_pembahasan=$pembahasan and respon.status='Orang-Tua'");
				$this->db->select('distinct(respon.dari),respon.nip');
				$this->db->from('respon');
				$this->db->join('detail_respon','detail_respon.id_respon=respon.id_respon');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->num_rows();
		}
		
	function insertLaporan(){
			$user= $this->session->userdata('uname');
			$b = $this->db->query("SELECT nip id from guru where username='$user' limit 1")->row_array();
			$id = $b['id'];
			
			$c = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $c['sekarang'];
			
			$data=array(
				'tanggal_laporan' => $sekarang,
				'isi_laporan' =>$this->input->post('isi'),
				'nip' =>$id,
				'id_pembahasan' =>$this->input->post('id_pembahasan')
			);
			
			$this->db->insert('Laporan',$data);	
		}
		
	function updateLaporan(){
				$id= $this->input->post('id');
				$isi_laporan= $this->input->post('isi');
				$pembahasan= $this->input->post('pembahasan');
				$query=$this->db->query("update laporan set isi_laporan='$isi_laporan',id_pembahasan=$pembahasan where id_laporan=$id");
	}
	
	function hapusLaporan($id){
				$query=$this->db->query("delete from laporan where id_laporan=$id");
	}
	
	function getAllLaporan(){
				$user= $this->session->userdata('uname');
				$b = $this->db->query("SELECT nip id from guru where username='$user' limit 1")->row_array();
				$id = $b['id'];
				
				$this->db->select('distinct(laporan.tanggal_laporan),laporan.id_laporan,laporan.id_pembahasan,laporan.nip,pembahasan.nama_pembahasan');
				$this->db->from('laporan');
				$this->db->join('pembahasan','laporan.id_pembahasan=pembahasan.id_pembahasan');
				$this->db->where('laporan.nip',$id);
				$this->db->order_by('laporan.id_laporan','DESC');
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllDetailLaporan($id){
				$this->db->select('distinct(laporan.tanggal_laporan),laporan.isi_laporan,laporan.id_laporan,pembahasan.nama_pembahasan');
				$this->db->from('laporan');
				$this->db->join('pembahasan','laporan.id_pembahasan=pembahasan.id_pembahasan');
				$this->db->Where('laporan.id_laporan',$id);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllTanggapan_LOrtu($nip,$pembahasan){
				$where =("respon.nip='$nip' and respon.id_pembahasan=$pembahasan and respon.status='Orang-Tua'");
				$this->db->select('distinct(respon.tanggal),respon.nip,respon.dari,respon.isi_respon');
				$this->db->from('respon');
				$this->db->join('detail_respon','detail_respon.id_respon=respon.id_respon');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
	
	//notif Pesan Wali Kelas
	function detail(){;
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$data = $this->db->query("select * from informasi where NIP='$nomor'")->num_rows();
				return $data;
	}
	
	
	
	function notifPesan_Wali(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$d = $this->db->query("SELECT nama nama FROM guru where username='$user' limit 1")->row_array();
				$nama = $d['nama'];
				$data = $this->db->query("SELECT * FROM pesan
				WHERE NIP ='$nomor' AND status =  'Belum Terbaca' AND dari not like'%$nama%'")->num_rows();
				return $data;
	}
	
	function ListNotifPesan_Wali(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$d = $this->db->query("SELECT nama nama FROM guru where username='$user' limit 1")->row_array();
				$nama = $d['nama'];
				$where ="NIP ='$nomor' AND status = 'Belum Terbaca' AND dari not like'%$nama%'";
				$this->db->select('distinct(tanggal_pesan),dari,isi_pesan,nomor,id_pesan');
				$this->db->from('Pesan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
	}
	
	function Ubahnotifikasi_PWali($id){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$d = $this->db->query("SELECT nama nama FROM guru where username='$user' limit 1")->row_array();
				$nama = $d['nama'];
				$query=$this->db->query("update pesan set status='Terbaca' where id_pesan=$id and status ='Belum Terbaca' and
				NIP='$nomor'");
	}
	
	//notif Informasi Wali Kelas
	function notifInformasi_Wali(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$data = $this->db->query("SELECT distinct(i.tanggal),i.subject_informasi,d.id_informasi 
				FROM informasi i join detail_informasi d on(i.id_informasi=d.id_informasi)
				WHERE i.NIP ='$nomor' AND d.notifikasi_O = 'dibaca' AND d.notifikasi_W='belum dibaca'")->num_rows();
				return $data;
	}
	
	function ListNotifInformasi_Wali(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$data = $this->db->query("SELECT distinct(i.tanggal),i.subject_informasi,d.id_informasi,count(d.id_informasi) as jumlah
				FROM informasi i join detail_informasi d on(i.id_informasi=d.id_informasi)
				WHERE i.NIP ='$nomor' AND d.notifikasi_O = 'dibaca' AND d.notifikasi_W='belum dibaca'
				group by d.id_informasi;")->result();
				return $data;
	}
	
	function getAllJumlah(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$query=$this->db->query("select DISTINCT (s.idortu) from guru g join wali w on(g.nip=w.nip) join kelas k on(w.idkelas=k.idkelas) 
				join kelas_siswa ks on(ks.idkelas=k.idkelas) join siswa s on(ks.nis=s.nis) where w.nip='$nomor' ");
				return $query->num_rows();
		}
	
	function Ubahnotifikasi_IWali($id){
				$query=$this->db->query("update detail_informasi set notifikasi_W='dibaca' where id_informasi=$id and notifikasi_O='dibaca'");
	}
	
	//Notif Respon
	function notifikasiPesan(){;
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$data = $this->db->query("select distinct(d.id_respon),isi_respon from respon r join detail_respon d on(d.id_respon=r.id_respon)
				where status='Orang-Tua' and notifikasi_W='belum dibaca' and
				NIP='$nomor'")->num_rows();
				return $data;
	}
	
	function LihatNotifRespon_Wali(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT NIP NIP ,nama nama FROM guru where username='$user' limit 1")->row_array();
				$nomor = $c['NIP'];
				$nama = $c['nama'];
				
				
				$data = $this->db->query("SELECT distinct(d.id_respon),r.nip,g.nama,r.id_pembahasan,p.nama_pembahasan,count(r.nip) jumlah
				FROM detail_respon d 
				JOIN respon r on(r.id_respon=d.id_respon ) 
				JOIN pembahasan p on(r.id_pembahasan=p.id_pembahasan)
				JOIN guru g on(g.nip=r.nip)				
				WHERE r.status='Orang-Tua' and d.notifikasi_W='belum dibaca' and r.nip='$nomor' 
				group by r.id_pembahasan
				order by r.nip")->result();
				return $data;
	}
}