<?php
	//File ortu_model.php
class Orang_Tua_model extends CI_Model  {
		function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
		
	function ambil_user($username){
		$query= $this->db->get_where('ortu',array('username'=>$username));
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
		
	function ambil_nip($nip){
		$query= $this->db->query("select distinct(g.nip),g.nama,k.nama kelas from guru g join wali w on(g.nip=w.nip) join kelas k on(k.idkelas=w.idkelas)  where g.nip='$nip' ");
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}
		
	function ambil_bahas($nip,$id_pembahasan){
		$query= $this->db->query("select distinct(id_pembahasan),nama_pembahasan,status_pembahasan from respon join pembahasan using(id_pembahasan) where nip='$nip' and id_pembahasan=$id_pembahasan limit 1 ");
		$query= $query->result_array();
		if($query){
				return $query[0];
			}
		}

	function getAllKegiatan_Ortu(){
				/*$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.nis,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.nis = dk.nis) Where nip =$nomor");
				return $query->result();*/
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id,nama nama from ortu where username='$user' limit 1")->row_array();
				$id = $c['id'];
				
				$this->db->select('distinct(kegiatan.tanggal_kegiatan),siswa.nama,siswa.nis,detail_kegiatan.notifikasi');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan','kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa','siswa.nis = detail_kegiatan.nis');
				$this->db->join('ortu','siswa.idortu = ortu.idortu');
				$this->db->where('siswa.idortu',$id);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllKegiatan_Ortu2($nis,$tanggal){
				$where = "kegiatan.tanggal_kegiatan='$tanggal' and siswa.nis=$nis";
				//$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.nis,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.nis = dk.nis) Where s.nis =$nis");
				$this->db->select('distinct(kegiatan.tanggal_kegiatan),siswa.nis,guru.nama,kegiatan.nama_kegiatan,kegiatan.status,kegiatan.jam_kegiatan,kegiatan.catatan');
				$this->db->from('guru');
				$this->db->join('kegiatan', 'guru.nip = kegiatan.nip');
				$this->db->join('detail_kegiatan', 'kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa', 'siswa.nis = detail_kegiatan.nis');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllKegiatan_Nama($nis,$tanggal){
				$where = "kegiatan.tanggal_kegiatan='$tanggal' and siswa.nis=$nis";
				//$query=$this->db->query("SELECT distinct k.tanggal_kegiatan,s.nama,s.nis,s.kelas FROM kegiatan k JOIN detail_kegiatan dk ON (k.id_kegiatan = dk.id_kegiatan) JOIN siswa s ON (s.nis = dk.nis) Where s.nis =$nis");
				$this->db->select('distinct(kegiatan.tanggal_kegiatan),siswa.nama,kelas.nama kelas');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan', 'kegiatan.id_kegiatan = detail_kegiatan.id_kegiatan');
				$this->db->join('siswa', 'siswa.nis = detail_kegiatan.nis');
				$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');
				$this->db->join('kelas', 'kelas_siswa.idkelas = kelas.idkelas');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	
		
	
		
	//Pesan
		
	function getAllPesan_Ortu(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id,nama nama from ortu where username='$user' limit 1")->row_array();
				$id = $c['id'];
				$nama = $c['nama'];
				
				$where ="pesan.idortu = $id and dari <> '$nama'";
				$this->db->select('distinct(pesan.tanggal_pesan),pesan.id_pesan,pesan.isi_pesan,guru.nama,pesan.status,pesan.nomor,siswa.nama siswa');
				$this->db->from('siswa');
				$this->db->join('pesan','pesan.nis=siswa.nis');
				$this->db->join('guru','guru.nip=pesan.nip');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
	}
	
	function getAllPesan_Wali($id,$tanggal){
				$where = "pesan.tanggal_pesan='$tanggal' and pesan.id_pesan=$id";
				$this->db->select('pesan.isi_pesan,pesan.id_pesan,pesan.tanggal_pesan,pesan.nomor,nip');
				$this->db->from('pesan');
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
				$this->db->select('id_pesan,isi_pesan,nomor,nip,nis');
				$this->db->from('pesan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
	}
	
	function getAllPesanTerkirim_Ortu(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id,nama nama from ortu where username='$user' limit 1")->row_array();
				$id = $c['id'];
				$nama = $c['nama'];
				
				$where="pesan.dari='$nama' and pesan.idortu=$id";
				$this->db->select('distinct(pesan.tanggal_pesan),pesan.id_pesan,pesan.isi_pesan,pesan.idortu,pesan.dari,pesan.nomor');
				$this->db->from('pesan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllPesanHistory_Ortu($nomor){
				$where="pesan.nomor=$nomor";
				$this->db->select('distinct(pesan.tanggal_pesan),pesan.id_pesan,pesan.isi_pesan,pesan.idortu,pesan.dari,pesan.nomor');
				$this->db->from('pesan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getDataPesan($id){
				$where="pesan.id_pesan=$id";
				$this->db->select('pesan.isi_pesan,pesan.id_pesan');
				$this->db->from('pesan');
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
			$nis=$this->input->post('nis');
			
			$b = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $b['sekarang'];
			
			$d = $this->db->query("SELECT o.idortu id,o.nama nama from siswa s join ortu o on(s.idortu=o.idortu) where s.nis='$nis' limit 1")->row_array();
			$id = $d['id'];
			$nama = $d['nama'];
			
			$data=array(
				'tanggal_pesan' =>$sekarang,
				'dari' =>$nama,
				'isi_pesan' =>$this->input->post('isi_pesan'),
				'nis' =>$nis,
				'nip' =>$this->input->post('nip'),
				'idortu' =>$id,
				'nomor' =>$this->input->post('nomor'),
				'status' => $status
			);
			
			$this->db->insert('pesan',$data);
		}
	
	//Informasi
	
	function getInformasi_Ortu($nip){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id from ortu where username='$user' limit 1")->row_array();
				$id = $c['id'];
				
				
				$where="detail_informasi.idortu=$id";
				$this->db->select('distinct(informasi.tanggal),informasi.tanggal_informasi,informasi.subject_informasi,detail_informasi.notifikasi_O,detail_informasi.id_informasi,detail_informasi.idortu');
				$this->db->from('informasi');
				$this->db->join('detail_informasi','detail_informasi.id_informasi=informasi.id_informasi');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
	}
	
	function getInformasi_Ortu2($id,$nip){
				$where = "nip='$nip' and id_informasi=$id ";
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
				$this->db->join('ortu','detail_informasi.idortu=ortu.idortu');
				$this->db->Where('informasi.id_informasi',$id);
				$query = $this->db->get();
				return $query->result();
	}
	
	function cek_Informasi($id){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id from ortu where username='$user' limit 1")->row_array();
				$id = $c['id'];
				
				$data = $this->db->query("SELECT * FROM detail_informasi
				WHERE id_informasi=$id AND idortu=$nomor order by id_informasi desc limit 1")->num_rows();
				return $data;
		}
		
		
	//Respon	
		
	function getAllTanggapan_Ortu($nip){
				$this->db->select('distinct(respon.id_pembahasan),respon.nip,pembahasan.nama_pembahasan');
				$this->db->from('guru');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('pembahasan','respon.id_pembahasan=pembahasan.id_pembahasan');
				$this->db->join('ortu','ortu.idortu=detail_respon.idortu');
				$this->db->Where('respon.nip',$nip);
				$query = $this->db->get();
				return $query->result();
		}
		
	function getAllTanggal_Ortu($nip,$id_pembahasan){
				$where ="respon.nip = '$nip' and respon.id_pembahasan='$id_pembahasan'";
				$this->db->select('distinct(respon.tanggal)');
				$this->db->from('guru');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('ortu','ortu.idortu=detail_respon.idortu');
				$this->db->Where($where);
				$this->db->order_by('respon.tanggal','DESC');
				$query = $this->db->get();
				return $query->result();
		}
		
	

	function getAll_Wali(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id,nama nama from ortu where username='$user' limit 1")->row_array();
				$id = $c['id'];
				$nama = $c['nama'];
				
				$query=$this->db->query("SELECT distinct(g.nip) nip, g.nama,k.nama kelas FROM
				siswa s 
				JOIN kelas_siswa ks ON ( s.nis = ks.nis ) 
				JOIN kelas k ON ( k.idkelas = ks.idkelas ) 
				JOIN wali w ON ( w.idkelas = k.idkelas ) 
				JOIN guru g ON ( w.nip = g.nip ) 
				where s.idortu = $id
				order by k.nama "
				);
				return $query->result();
		}
		
		
		
		
	function getAllOrangtua2($nip){
				$query=$this->db->query("select distinct(o.idortu) from guru g join wali w on(g.nip=w.nip) join kelas k on(w.idkelas=k.idkelas) 
				join kelas_siswa ks on(ks.idkelas=k.idkelas) join siswa s on(ks.nis=s.nis) join ortu o on(s.idortu=o.idortu) where w.nip='$nip' ");
				return $query->result();
	}
	
	function getJumlahOrangtua2($nip){
				$query=$this->db->query("select distinct(o.idortu) from guru g join wali w on(g.nip=w.nip) join kelas k on(w.idkelas=k.idkelas) 
				join kelas_siswa ks on(ks.idkelas=k.idkelas) join siswa s on(ks.nis=s.nis) join ortu o on(s.idortu=o.idortu) where w.nip='$nip' ");
				return $query->num_rows();
	}
	
	function insertPembahasan(){
			$pembahasan=$this->input->post('pembahasan');
			
			$data=array(
				'nama_pembahasan' =>$pembahasan
			);
			
			$this->db->insert('pembahasan',$data);
		}	
	function insertRespon_Ortu(){
			$user= $this->session->userdata('uname');
			$kode = $this->session->userdata('kode');
			$b = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $b['sekarang'];
			
			$c = $this->db->query("SELECT idortu id,nama nama from ortu where username='$user' limit 1")->row_array();
			$id = $c['id'];
			$nama = $c['nama'];
			
			$d = $this->db->query("SELECT nama_group status FROM grup where kode_group=$kode limit 1")->row_array();
			$status = $d['status'];
			
			$e = $this->db->query("SELECT id_pembahasan id_p FROM pembahasan order by id_pembahasan desc limit 1")->row_array();
			$id_pembahasan = $e['id_p'];
			
			$data=array(
				'id_respon' =>$this->input->post('id_res'),
				'dari' =>$this->input->post('dari'),
				'tanggal' =>$sekarang,
				'status' =>$status,
				'tanggal_respon' =>$sekarang,
				'isi_respon' =>$this->input->post('isi_res'),
				'id_pembahasan' =>$id_pembahasan,
				'nip' =>$this->input->post('nip')
			);
			
			$this->db->insert('respon',$data);
		}
		
	function insertRespon_Ortu2(){
			$user= $this->session->userdata('uname');
			$kode = $this->session->userdata('kode');
			$b = $this->db->query("SELECT NOW() sekarang FROM dual limit 1")->row_array();
			$sekarang = $b['sekarang'];
			
			$c = $this->db->query("SELECT idortu id,nama nama from ortu where username='$user' limit 1")->row_array();
			$id = $c['id'];
			$nama = $c['nama'];
			
			$d = $this->db->query("SELECT nama_group status FROM grup where kode_group=$kode limit 1")->row_array();
			$status = $d['status'];
			
			$e = $this->db->query("SELECT id_pembahasan id_p FROM pembahasan order by id_pembahasan desc limit 1")->row_array();
			$id_pembahasan = $e['id_p'];
			
			$data=array(
				'id_respon' =>$this->input->post('id_res'),
				'dari' =>$this->input->post('dari'),
				'tanggal' =>$sekarang,
				'status' =>$status,
				'tanggal_respon' =>$sekarang,
				'isi_respon' =>$this->input->post('isi_res'),
				'id_pembahasan' =>$this->input->post('pembahasan'),
				'nip' =>$this->input->post('nip')
			);
			
			$this->db->insert('respon',$data);
		}
	
	function insertDetailRespon_Ortu(){
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
				'notifikasi_W' =>'belum dibaca'
				);
			}

			$this->db->insert_batch('detail_respon', $data);
			
			}
			
		function  ambil_dataRespon($id){
				$this->db->select('distinct(respon.isi_respon),respon.id_respon,respon.id_pembahasan');
				$this->db->from('guru');
				$this->db->join('respon','respon.nip=guru.nip');
				$this->db->join('detail_respon','respon.id_respon=detail_respon.id_respon');
				$this->db->join('ortu','ortu.idortu=detail_respon.idortu');
				$this->db->Where('respon.id_respon',$id);
				$query = $this->db->get();
				return $query->result();
		}
		
		function ubahRespon(){
			$nomor=$this->input->post('id_res');
			$isi_respon=$this->input->post('isi_res');
			$id_pembahasan=$this->input->post('id_pembahasan');
			$nip=$this->input->post('nip');
			$query=$this->db->query("update respon set isi_respon='$isi_respon' where id_respon=$nomor");
		}
		
		function ubahpembahasan($nip_guru,$bahas){
			$nomor=$this->input->post('id_res');
			$isi_respon=$this->input->post('isi_res');
			$id_pembahasan=$this->input->post('id_pembahasan');
			$pembahasan=$this->input->post('pembahasan');
			$nip=$this->input->post('nip');
			$rplc=str_replace(" ","_","$id_pembahasan");
			$query=$this->db->query("update respon r join pembahasan p on(r.id_pembahasan=p.id_pembahasan) set p.nama_pembahasan='$pembahasan' where r.nip='$nip_guru' and r.id_pembahasan=$bahas
			");
		}
		
		function hapusIdRespon($id){
			$query=$this->db->query("delete from respon where id_respon=$id");
		}
		//notif orang tua
	//notif kegiatan orang tua
	function notifKegiatan_Ortu(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id from ortu where username='$user' limit 1")->row_array();
				$nomor = $c['id'];
				
				$data = $this->db->query("SELECT distinct(k.tanggal_kegiatan), d.nis FROM kegiatan k 
				JOIN detail_kegiatan d ON ( d.id_kegiatan = k.id_kegiatan ) 
				JOIN siswa s on(s.nis=d.nis) 				
				WHERE s.idortu =$nomor AND d.notifikasi =  'belum dibaca'")->num_rows();
				return $data;
	}
	
	function ListNotifKegiatan_Ortu(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id from ortu where username='$user' limit 1")->row_array();
				$nomor = $c['id'];
				
				$where ="siswa.idortu =$nomor AND detail_kegiatan.notifikasi = 'belum dibaca'";
				$this->db->select('distinct(kegiatan.tanggal_kegiatan),siswa.nama,siswa.nis');
				$this->db->from('kegiatan');
				$this->db->join('detail_kegiatan','kegiatan.id_kegiatan=detail_kegiatan.id_kegiatan');
				$this->db->join('siswa','siswa.nis=detail_kegiatan.nis');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
	}
	
	function Ubahnotifikasi_KOrtu($nis,$tanggal){
				$query=$this->db->query("update detail_kegiatan set notifikasi='dibaca' where tanggal_kegiatan='$tanggal' and notifikasi='belum dibaca' and
				nis=$nis");
	}
	
	//notif pesan orang tua
	function notifPesan_Ortu(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id,nama nama from ortu where username='$user' limit 1")->row_array();
				$id = $c['id'];
				$nama = $c['nama'];
				
				$data = $this->db->query("SELECT * FROM pesan
				WHERE status =  'Belum Terbaca' AND idortu=$id and dari not like '%$nama%' ")->num_rows();
				return $data;
	}
	
	function ListNotifPesan_Ortu(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id,nama nama from ortu where username='$user' limit 1")->row_array();
				$id = $c['id'];
				$nama = $c['nama'];
				
				
				$where ="status = 'Belum Terbaca' and idortu=$id and dari not like '%$nama%'";
				$this->db->select('distinct(tanggal_pesan),dari,isi_pesan,nomor,id_pesan');
				$this->db->from('pesan');
				$this->db->Where($where);
				$query = $this->db->get();
				return $query->result();
	}
	
	function Ubahnotifikasi_POrtu($id,$nip){
				$query=$this->db->query("update pesan set status='Terbaca' where id_pesan=$id and status ='Belum Terbaca' and
				nip='$nip'");
	}
	
	function cek_Pesan($nomor){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT nama nama from ortu where username='$user' limit 1")->row_array();
				$nama= $c['nama'];
				
				$data = $this->db->query("SELECT * FROM pesan
				WHERE nomor =$nomor AND dari like'%$nama%' order by nomor desc limit 1")->num_rows();
				return $data;
	}
	
	//notif informasi orang tua
	function notifInformasi_Ortu(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id from ortu where username='$user' limit 1")->row_array();
				$id = $c['id'];
				
				$data = $this->db->query("SELECT d.id_informasi,d.idortu 
				FROM informasi i join detail_informasi d on(i.id_informasi=d.id_informasi)
				WHERE d.notifikasi_O = 'belum dibaca' AND d.idortu=$id")->num_rows();
				return $data;
	}
	
	function ListNotifInformasi_Ortu(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id from ortu where username='$user' limit 1")->row_array();
				$id = $c['id'];
				
				$data = $this->db->query("SELECT i.subject_informasi,i.tanggal,d.id_informasi,d.idortu 
				FROM informasi i join detail_informasi d on(i.id_informasi=d.id_informasi)
				WHERE d.notifikasi_O = 'belum dibaca' AND d.idortu=$id")->result();
				return $data;
	}
	
	function Ubahnotifikasi_IOrtu($id,$nomor){
				$query=$this->db->query("update detail_informasi set notifikasi_O='dibaca' where id_informasi=$id and notifikasi_O='belum dibaca' and
				idortu=$nomor");
	}
	
	//notif Respon orang tua
	function notifRespon_Ortu(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id,nama nama from ortu where username='$user' limit 1")->row_array();
				$id = $c['id'];
				$nama = $c['nama'];
				
				
				$data = $this->db->query("SELECT id_respon, idortu, isi_respon,id_pembahasan
				FROM detail_respon JOIN respon USING ( id_respon ) WHERE idortu = $id AND dari NOT LIKE  '%$nama%' 
				AND notifikasi_O = 'belum dibaca' ")->num_rows();
				return $data;
	}
	
	function LihatNotifRespon_Ortu(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id,nama nama from ortu where username='$user' limit 1")->row_array();
				$id = $c['id'];
				$nama = $c['nama'];
				
				
				$data = $this->db->query("SELECT id_respon,nip,nama,id_pembahasan,nama_pembahasan,count(nip) jumlah
				FROM detail_respon 
				JOIN respon USING( id_respon ) 
				JOIN guru USING(nip)	
				JOIN pembahasan USING(id_pembahasan)
				WHERE idortu = $id AND dari NOT LIKE '%$nama%' AND notifikasi_O = 'belum dibaca' 
				group by id_pembahasan
				order by nip")->result();
				return $data;
	}
	
	
	function Ubahnotifikasi_ROrtu($nip,$id_pembahasan){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id,nama nama from ortu where username='$user' limit 1")->row_array();
				$id = $c['id'];
				$nama = $c['nama'];
				
				$query=$this->db->query("update detail_respon d join respon r on(d.id_respon=r.id_respon) set  notifikasi_O='dibaca' WHERE
				idortu = $id AND notifikasi_O =  'belum dibaca' AND id_pembahasan = $id_pembahasan AND nip='$nip' ");
	}
	
	function getAllTanggapan_Wali(){
				$user= $this->session->userdata('uname');
				$c = $this->db->query("SELECT idortu id,nama nama from ortu where username='$user' limit 1")->row_array();
				$id = $c['id'];
				$nama = $c['nama'];
				
				$query=$this->db->query("SELECT nama,nip, count(nip) jumlah
				FROM detail_respon JOIN respon USING ( id_respon ) 
				JOIN guru USING (nip)				
				WHERE idortu = $id AND dari NOT LIKE '%$nama%' AND notifikasi_O = 'belum dibaca' 
				group by nip
				");
				return $query->result();
		}
	

	
	
}