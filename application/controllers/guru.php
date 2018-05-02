<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends CI_Controller {
    
	function __construct() {
        parent::__construct();
        $this->load->model('m_guru','',TRUE);
		 $this->load->model('m_login','',TRUE);
        $this->load->helper(array('url','form'));
        $this->load->library(array('session'));
        //$this->is_logged_in();
		$this->load->database();
    }
	
	
	
	//menu input nilai evaluasli pmp
	public function nilai_evaluasi_pmp(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_input_pilihmapel.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'list' => $this->m_guru->guru_pilihmapel()
					  );
		$this->load->view('template', $data);
	}
	
	public function guru_input_pilihkelas(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_input_pilihkelas.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'list' => $this->m_guru->guru_pilihkelas()
					  );
		$this->load->view('template', $data);
    }
	
	public function guru_input_pilihsemester(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_input_pilihsemester.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						);
		$this->load->view('template', $data);
    }
	
	public function guru_input_pilihbab(){		
		//ambil idbab
		$idbab= $this->m_guru->get_idbab($_GET['idmapel'])->row(0,'array');

		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'idbab' => $idbab['idbab'],
						'konten' => "guru/guru_input_pilihbab",
					  );
					
        $this->load->view('template', $data);
    }
	
	public function guru_input_pilihsiswa(){
		
	    $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_input_pilihsiswa.php",
						'list' => $this->m_guru->guru_siswaeval($_GET['idbab']),
						'bab' => $this->m_guru->guru_pilihbab($_GET['idbab']),
						'guru' => $this->m_guru->data_guru(),
						'idbabnya' => $_GET['idbab'],
						'ortu' => $this->m_guru->data_ortu(),
						'jad' => $this->m_guru->jadwalremed_eval(),
						'eval' => $this->m_guru->kelas_jadwalremed_eval()
					  );
		
        $this->load->view('template', $data);
    }
	
	public function guru_inputnilai_eval()
	{
		$this->m_guru->guru_addeval();
		redirect('guru/guru_input_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&idbab='.$_GET['idbab'].'&bab='.$_GET['bab'].'&semester='.$_GET['semester'].'&tingkat='.$_GET['tingkat'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
	}
	
	public function guru_uploadeval()
	{
		$oldv =$this->db->db_debug;
		$this->db->db_debug = false;
		$this->m_guru->upload_eval();
		$e = $this->db->_error_message();
		$aff = $this->db->affected_rows();
		$this->db->db_debug = $oldv;
		if($aff < 1) {
			echo "<script>alert('harap mengisikan file dengan format yang benar');history.go(-1);</script>";
		} 
		else{
		redirect('guru/guru_input_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&idbab='.$_GET['idbab'].'&bab='.$_GET['bab'].'&semester='.$_GET['semester'].'&tingkat='.$_GET['tingkat'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
		}
	}
	
	public function guru_inputpmp_pilihsiswa(){
		$idkelas = $_GET['idkelas'];
		$semester = $_GET['semester'];
		$idmapel = $_GET['idmapel'];
		
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_inputpmp_pilihsiswa.php",
						'list' => $this->m_guru->guru_siswapmp($idkelas, $semester, $idmapel),
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'jad' => $this->m_guru->jadwalremed_pmp(),
					  	'pmp' => $this->m_guru->kelas_jadwalremed_pmp()
					 );
        $this->load->view('template', $data);
    }
	
	public function guru_inputnilai_pmp()
	{
		$this->m_guru->guru_addnilai_pmp();
		redirect('guru/guru_inputpmp_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&semester='.$_GET['semester'].'&tingkat='.$_GET['tingkat'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
	}
	
	public function guru_uploadpmp()
	{
		$oldv =$this->db->db_debug;
		$this->db->db_debug = false;
		$this->m_guru->upload_pmp();
		$e = $this->db->_error_message();
		$aff = $this->db->affected_rows();
		$this->db->db_debug = $oldv;
		if($aff < 1) {
			echo "<script>alert('harap mengisikan file dengan format yang benar');history.go(-1);</script>";
		} 
		else{
		redirect('guru/guru_inputpmp_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&semester='.$_GET['semester'].'&tingkat='.$_GET['tingkat'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
		}
	}
	
	public function guru_inputskor_pmp()
	{
		$this->m_guru->guru_addskor_pmp();
		redirect('guru/guru_inputpmp_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&semester='.$_GET['semester'].'&tingkat='.$_GET['tingkat'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
	}
	
	//menu input nilai remed
	public function nilai_remed(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_inputremed_pilihmapel.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'list' => $this->m_guru->guru_pilihmapel()
					  );
		$this->load->view('template', $data);
	}
	
	public function guru_inputremed_pilihkelas(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_inputremed_pilihkelas.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'list' => $this->m_guru->guru_pilihkelas()
					  );
        $this->load->view('template', $data);
    }
	
	public function guru_inputremed_pilihsemester(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_inputremed_pilihsemester.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						);
		$this->load->view('template', $data);
    }
	
	public function guru_inputremed_pilihbab(){
		$idbab= $this->m_guru->get_idbab($_GET['idmapel'])->row(0,'array');
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'idbab' => $idbab['idbab'],
						'konten' => "guru/guru_inputremed_pilihbab.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						);
		
        $this->load->view('template', $data);
    }
	
	public function guru_inputremed_pilihsiswa(){
		
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'thnajar' => $_GET['thnajar'],
						'idmapel' => $_GET['idmapel'],
						'idkelas' => $_GET['idkelas'],
						'semester' => $_GET['semester'],
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_inputremed_pilihsiswa.php",
						'guru' => $this->m_guru->data_guru(),
						'bab' => $this->m_guru->guru_pilihbab(),
						'ortu' => $this->m_guru->data_ortu(),
						'list' => $this->m_guru->guru_remed_siswaeval()
					  );	

        $this->load->view('template', $data);
    }
	
	public function guru_inputremed_eval()
	{
		$this->m_guru->guru_remedeval();
		redirect('guru/guru_inputremed_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&idbab='.$_GET['idbab'].'&bab='.$_GET['bab'].'&semester='.$_GET['semester'].'&tingkat='.$_GET['tingkat'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
	}
	
	public function guru_inputremedpmp_pilihsiswa(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_inputremedpmp_pilihsiswa.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'list' => $this->m_guru->guru_remed_siswapmp($_GET['thnajar'],$_GET['semester'],$_GET['idmapel'],$_GET['idkelas'])
					  );
		
        $this->load->view('template', $data);
    }
	
	public function guru_inputskor_remedpmp()
	{
		$this->m_guru->guru_skor_remedpmp();
		redirect('guru/guru_inputremedpmp_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&semester='.$_GET['semester'].'&tingkat='.$_GET['tingkat'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
	}
	
	public function guru_inputnilai_remedpmp()
	{
		$this->m_guru->guru_nilai_remedpmp();
		redirect('guru/guru_inputremedpmp_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&semester='.$_GET['semester'].'&tingkat='.$_GET['tingkat'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
	}
	
	//menu nilai siswa
	public function nilai_siswa(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_pilih_nilaisiswa.php",
						'mapel' => $this->m_guru->guru_pilihmapel(),
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu()
					  );
        $this->load->view('template', $data);
    }
		
	//menu jadwal remedial
	public function jadwal_remed_siswa(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_jadwalremed_mapel.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'list' => $this->m_guru->guru_pilihmapel()
					  );
		$this->load->view('template', $data);
	}
	
	public function guru_info_pilihsiswa(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_info_pilihsiswa.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'list' => $this->m_guru->guru_info_pilihsiswa()
					  );
        $this->load->view('template', $data);
    }
	
	public function guru_info_nilai(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_info_nilai.php",
						'bab' => $this->m_guru->nilaibab(),
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'akhir' => $this->m_guru->nilaiakhir()
					  );
		$this->load->view('template', $data);
	}
	
	public function jadremedeval()
	{
		
		if ($this->m_guru->cekjadeval1() > 0){
			echo "<script>alert('dalam satu hari hanya boleh diadakan satu bab remedial di pelajaran yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_guru->cekjadeval2()->num_rows() > 0){
			foreach($this->m_guru->cekjadeval2()->result() as $row){
			echo "<script>alert('waktu bentrok dengan jadwal remedial di pelajaran ".$row->mapel." bab ".$row->bab." Jam ";
			if ($row->jam < 10 and $row->mnt < 10){
			echo "0".$row->jam.":0".$row->mnt;
			}
			else if ($row->jam > 10 and $row->mnt < 10){
			echo $row->jam.":0".$row->mnt;
			}
			else if ($row->jam < 10 and $row->mnt > 10){
			echo "0".$row->jam.":".$row->mnt;
			}
			else{
			echo $row->jam.":".$row->mnt; 
			}
			echo " [silahkan ganti jam dengan jeda 70 menit sebelum atau 70 menit sesudah jam tersebut] ');history.go(-1);</script>";
			}
		}
		else if ($this->m_guru->cekjadeval3() > 0){
			echo "<script>alert('tidak boleh di semester yang berbeda dilakukan remedial di hari yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_guru->cekjadeval4() > 0){
			echo "<script>alert('tidak boleh di hari yang sama dengan jadwal remedial pmp [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else{
		$this->m_guru->add_jadremedeval();
		redirect('guru/guru_input_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&idbab='.$_GET['idbab'].'&bab='.$_GET['bab'].'&tingkat='.$_GET['tingkat'].'&semester='.$_GET['semester'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
		}
	}
	
	public function all_jadremedeval()
	{
		if ($this->m_guru->cekjadeval1() > 0){
			echo "<script>alert('dalam satu hari hanya boleh diadakan satu bab remedial di pelajaran yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_guru->cekjadeval2()->num_rows() > 0){
			foreach($this->m_guru->cekjadeval2()->result() as $row){
			echo "<script>alert('waktu bentrok dengan jadwal remedial di pelajaran ".$row->mapel." bab ".$row->bab." Jam ";
			if ($row->jam < 10 and $row->mnt < 10){
			echo "0".$row->jam.":0".$row->mnt;
			}
			else if ($row->jam > 10 and $row->mnt < 10){
			echo $row->jam.":0".$row->mnt;
			}
			else if ($row->jam < 10 and $row->mnt > 10){
			echo "0".$row->jam.":".$row->mnt;
			}
			else{
			echo $row->jam.":".$row->mnt; 
			}
			echo " [silahkan ganti jam dengan jeda 70 menit sebelum atau 70 menit sesudah jam tersebut] ');history.go(-1);</script>";
			}
		}
		else if ($this->m_guru->cekjadeval3() > 0){
			echo "<script>alert('tidak boleh di semester yang berbeda dilakukan remedial di hari yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_guru->cekjadeval4() > 0){
			echo "<script>alert('tidak boleh di hari yang sama dengan jadwal remedial pmp [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else{
		$this->m_guru->add_jadremedeval();
		redirect('guru/guru_jadwalremed?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&tingkat='.$_GET['tingkat'].'&semester='.$_GET['semester'].'&tipe='.$_GET['tipe'].'');
		}
	}
	
	public function all_jadremedpmp()
	{
		if ($this->m_guru->cekjadpmp1() > 0){
			echo "<script>alert('dalam satu hari hanya boleh diadakan satu semester remedial di pelajaran yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_guru->cekjadpmp2()->num_rows() > 0){
			foreach($this->m_guru->cekjadpmp2()->result() as $row){
			echo "<script>alert('waktu bentrok dengan jadwal remedial di pelajaran ".$row->mapel." Jam ";
			if ($row->jam < 10 and $row->mnt < 10){
			echo "0".$row->jam.":0".$row->mnt;
			}
			else if ($row->jam > 10 and $row->mnt < 10){
			echo $row->jam.":0".$row->mnt;
			}
			else if ($row->jam < 10 and $row->mnt > 10){
			echo "0".$row->jam.":".$row->mnt;
			}
			else{
			echo $row->jam.":".$row->mnt; 
			}
			echo " [silahkan ganti jam dengan jeda 70 menit sebelum atau 70 menit sesudah jam tersebut] ');history.go(-1);</script>";
			}
		}
		else if ($this->m_guru->cekjadpmp3() > 0){
			echo "<script>alert('tidak boleh di semester yang berbeda dilakukan remedial di hari yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_guru->cekjadpmp4() > 0){
			echo "<script>alert('tidak boleh di hari yang sama dengan jadwal remedial evaluasi [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else{
		$this->m_guru->add_jadremedpmp();
		redirect('guru/guru_jadwalremed?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&tingkat='.$_GET['tingkat'].'&semester='.$_GET['semester'].'&tipe='.$_GET['tipe'].'');
		}
	}
	
	public function jadremedpmp()
	{
		if ($this->m_guru->cekjadpmp1() > 0){
			echo "<script>alert('dalam satu hari hanya boleh diadakan satu semester remedial di pelajaran yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_guru->cekjadpmp2()->num_rows() > 0){
			foreach($this->m_guru->cekjadpmp2()->result() as $row){
			echo "<script>alert('waktu bentrok dengan jadwal remedial di pelajaran ".$row->mapel." Jam ";
			if ($row->jam < 10 and $row->mnt < 10){
			echo "0".$row->jam.":0".$row->mnt;
			}
			else if ($row->jam > 10 and $row->mnt < 10){
			echo $row->jam.":0".$row->mnt;
			}
			else if ($row->jam < 10 and $row->mnt > 10){
			echo "0".$row->jam.":".$row->mnt;
			}
			else{
			echo $row->jam.":".$row->mnt; 
			}
			echo " [silahkan ganti jam dengan jeda 70 menit sebelum atau 70 menit sesudah jam tersebut] ');history.go(-1);</script>";
			}
		}
		else if ($this->m_guru->cekjadpmp3() > 0){
			echo "<script>alert('tidak boleh di semester yang berbeda dilakukan remedial di hari yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_guru->cekjadpmp4() > 0){
			echo "<script>alert('tidak boleh di hari yang sama dengan jadwal remedial evaluasi [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else{
		$this->m_guru->add_jadremedpmp();
		redirect('guru/guru_inputpmp_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&tingkat='.$_GET['tingkat'].'&semester='.$_GET['semester'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
		}
	}
	
	public function guru_info_pilihkelas(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_info_pilihkelas.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'list' => $this->m_guru->guru_pilihkelas()
					  );
    	
        $this->load->view('template', $data);
    }
	
	public function guru_jadwalremed_kelas(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_jadwalremed_kelas.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'list' => $this->m_guru->guru_pilihkelas()
					  );
    	
        $this->load->view('template', $data);
    }
	
	public function guru_jadwalremed(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/guru_jadwalremed.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'eval' => $this->m_guru->all_jadwalremed_eval(),
						'pmp' => $this->m_guru->all_jadwalremed_pmp()
					);
    	
        $this->load->view('template', $data);
    }

	public function formatbab_csv()
	{
		$data = array (
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'list' => $this->m_guru->guru_siswaeval()
					);
		$this->load->view('guru/guru_download_babcsv', $data);
	}
	
	public function formatpmp_csv()
	{
		$data = array (
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'list' => $this->m_guru->guru_siswapmp()
					);
		$this->load->view('guru/guru_download_pmpcsv', $data);
	}
	
	//WALI KELAS
	public function wali_info_pilihkelas(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/wali_info_pilihkelas.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'list' => $this->m_guru->guru_pilihkelas()
					  );
    	
        $this->load->view('template', $data);
    }
	
	public function wali_info_pilihsiswa(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru/wali_info_pilihsiswa.php",
						'guru' => $this->m_guru->data_guru(),
						'ortu' => $this->m_guru->data_ortu(),
						'list' => $this->m_guru->guru_info_pilihsiswa()
					  );
        $this->load->view('template', $data);
    }
	
	function tambah_nilai_siswa(){
		
		
		
		$data = array (
			'list_menu'=>$this->m_login->tampil_menu(),
			'list_online'=>$this->m_login->tampil_online(),
			'konten' => "guru/tambah_nilai_siswa.php",
			'guru' => $this->m_guru->data_guru(),
			'ortu' => $this->m_guru->data_ortu(),
			'list' => $this->m_guru->guru_pilihkelas()
		 );
    	
        $this->load->view('template', $data);
	}
	
	public function simpan_nilai_siswa(){
		
		//insert multiple nilai evaluasi
		//ambil idbab
		$ini_idbab= $this->m_guru->get_idbab($_GET['idmapel'])->row(0,'array');
		$idbab = $ini_idbab['idbab'];
		$nis=$this->input->post('nis');
		$nilai_eval=$this->input->post('nilai_eval');
		$thnajar=$_GET['thnajar'];
		$semester=$_GET['semester'];
		foreach(array_combine($nis,$nilai_eval) as $a=>$value) {
			$data_input= array(
				'nilai'  => $value,
				'idbab'   =>  $idbab,
				'nis' => $a,
				"remidi" => 0.00,
				"cekremed" => 'N',
				"ceknilai" => 'Y',
				"thnajar" => $thnajar,
				'semester' => $semester
			);
			//echo "<pre>";
			//print_r($data_input);
			$this->m_guru->tambah_nilai_siswa($data_input);
		}
		redirect('guru/nilai_evaluasi_pmp');
		
	}
	
}
?>