<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class wali_kelas extends CI_Controller {
    
	function __construct() {
        parent::__construct();
        $this->load->model('m_wali','',TRUE);
		 $this->load->model('m_login','',TRUE);
        $this->load->helper(array('url','form'));
        $this->load->library(array('session'));
        //$this->is_logged_in();
		$this->load->database();
    }
	
	//menu input nilai eval    || guru_input_pilihmapel
	public function nilai_eval(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_input_pilihmapel.php",
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_pilihmapel()
					  );
		$this->load->view('template', $data);
	}
	
	public function guru_input_pilihkelas(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_input_pilihkelas.php",
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_pilihkelas()
					  );
		$this->load->view('template', $data);
    }
	
	public function guru_input_pilihsemester(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_input_pilihsemester.php",
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						);
		$this->load->view('template', $data);
    }
	
	public function guru_input_pilihbab(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_input_pilihbab.php",
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu()
					  );
        $this->load->view('template', $data);
    }
	
	public function guru_input_pilihsiswa(){
	    $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_input_pilihsiswa.php",
						'list' => $this->m_wali->guru_siswaeval(),
						'bab' => $this->m_wali->guru_pilihbab(),
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'jad' => $this->m_wali->jadwalremed_eval(),
						'eval' => $this->m_wali->kelas_jadwalremed_eval()
					  );
        $this->load->view('template', $data);
    }
	
	public function guru_inputnilai_eval()
	{
		$this->m_wali->guru_addeval();
		redirect('guru/guru_input_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&idbab='.$_GET['idbab'].'&bab='.$_GET['bab'].'&semester='.$_GET['semester'].'&tingkat='.$_GET['tingkat'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
	}
	
	public function guru_uploadeval()
	{
		$oldv =$this->db->db_debug;
		$this->db->db_debug = false;
		$this->m_wali->upload_eval();
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
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_inputpmp_pilihsiswa.php",
						'list' => $this->m_wali->guru_siswapmp(),
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'jad' => $this->m_wali->jadwalremed_pmp(),
					  	'pmp' => $this->m_wali->kelas_jadwalremed_pmp()
					 );
        $this->load->view('template', $data);
    }
	
	public function guru_inputnilai_pmp()
	{
		$this->m_wali->guru_addnilai_pmp();
		redirect('guru/guru_inputpmp_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&semester='.$_GET['semester'].'&tingkat='.$_GET['tingkat'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
	}
	
	public function guru_uploadpmp()
	{
		$oldv =$this->db->db_debug;
		$this->db->db_debug = false;
		$this->m_wali->upload_pmp();
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
		$this->m_wali->guru_addskor_pmp();
		redirect('guru/guru_inputpmp_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&semester='.$_GET['semester'].'&tingkat='.$_GET['tingkat'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
	}
	
	//menu input nilai remed || guru_inputremed_pilihmapel
	public function nilai_remed(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_inputremed_pilihmapel.php",
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_pilihmapel()
					  );
		$this->load->view('template', $data);
	}
	
	public function guru_inputremed_pilihkelas(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_inputremed_pilihkelas.php",
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_pilihkelas()
					  );
    	
        $this->load->view('template', $data);
    }
	
	public function guru_inputremed_pilihsemester(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_inputremed_pilihsemester.php",
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						);
		$this->load->view('template', $data);
    }
	
	public function guru_inputremed_pilihbab(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_inputremed_pilihbab.php",
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						);
        $this->load->view('template', $data);
    }
	
	public function guru_inputremed_pilihsiswa(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_inputremed_pilihsiswa.php",
						'guru' => $this->m_wali->data_guru(),
						'bab' => $this->m_wali->guru_pilihbab(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_remed_siswaeval()
					  );
        $this->load->view('template', $data);
    }
	
	public function guru_inputremed_eval()
	{
		$this->m_wali->guru_remedeval();
		redirect('guru/guru_inputremed_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&idbab='.$_GET['idbab'].'&bab='.$_GET['bab'].'&semester='.$_GET['semester'].'&tingkat='.$_GET['tingkat'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
	}
	
	public function guru_inputremedpmp_pilihsiswa(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_inputremedpmp_pilihsiswa.php",
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_remed_siswapmp()
					  );
        $this->load->view('template', $data);
    }
	
	public function guru_inputskor_remedpmp()
	{
		$this->m_wali->guru_skor_remedpmp();
		redirect('guru/guru_inputremedpmp_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&semester='.$_GET['semester'].'&tingkat='.$_GET['tingkat'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
	}
	
	public function guru_inputnilai_remedpmp()
	{
		$this->m_wali->guru_nilai_remedpmp();
		redirect('guru/guru_inputremedpmp_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&semester='.$_GET['semester'].'&tingkat='.$_GET['tingkat'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
	}
	
//menu nilai siswa || guru_pilih_nilaisiswa
	public function nilai_siswa(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_pilih_nilaisiswa.php",
						'mapel' => $this->m_wali->guru_pilihmapel(),
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu()
					  );
        $this->load->view('template', $data);
    }
	
	//menu nilai anak wali || wali_pilih_nilaisiswa
	public function nilai_anak_wali(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_pilih_nilaisiswa.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'kelas' => $this->m_wali->wali_pilihkelas()
					  );
        $this->load->view('template', $data);
    }
	
	//menu jadwal remedial || guru_jadwalremed_mapel
	public function jadwal_remedial(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_jadwalremed_mapel.php",
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_pilihmapel()
					  );
		$this->load->view('template', $data);
	}
	
	public function guru_info_pilihsiswa(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_info_pilihsiswa.php",
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_info_pilihsiswa()
					  );
        $this->load->view('template', $data);
    }
	
	public function guru_info_nilai(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_info_nilai.php",
						'bab' => $this->m_wali->nilaibab(),
						'guru' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'akhir' => $this->m_wali->nilaiakhir()
					  );
		$this->load->view('template', $data);
	}
	
	public function jadremedeval()
	{
		if ($this->m_wali->cekjadeval1() > 0){
			echo "<script>alert('dalam satu hari hanya boleh diadakan satu bab remedial di pelajaran yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_wali->cekjadeval2()->num_rows() > 0){
			foreach($this->m_wali->cekjadeval2()->result() as $row){
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
		else if ($this->m_wali->cekjadeval3() > 0){
			echo "<script>alert('tidak boleh di semester yang berbeda dilakukan remedial di hari yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_wali->cekjadeval4() > 0){
			echo "<script>alert('tidak boleh di hari yang sama dengan jadwal remedial pmp [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else{
		$this->m_wali->add_jadremedeval();
		redirect('guru/guru_input_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&idbab='.$_GET['idbab'].'&bab='.$_GET['bab'].'&tingkat='.$_GET['tingkat'].'&semester='.$_GET['semester'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
		}
	}
	
	public function all_jadremedeval()
	{
		if ($this->m_wali->cekjadeval1() > 0){
			echo "<script>alert('dalam satu hari hanya boleh diadakan satu bab remedial di pelajaran yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_wali->cekjadeval2()->num_rows() > 0){
			foreach($this->m_wali->cekjadeval2()->result() as $row){
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
		else if ($this->m_wali->cekjadeval3() > 0){
			echo "<script>alert('tidak boleh di semester yang berbeda dilakukan remedial di hari yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_wali->cekjadeval4() > 0){
			echo "<script>alert('tidak boleh di hari yang sama dengan jadwal remedial pmp [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else{
		$this->m_wali->add_jadremedeval();
		redirect('guru/guru_jadwalremed?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&tingkat='.$_GET['tingkat'].'&semester='.$_GET['semester'].'&tipe='.$_GET['tipe'].'');
		}
	}
	
	public function all_jadremedpmp()
	{
		if ($this->m_wali->cekjadpmp1() > 0){
			echo "<script>alert('dalam satu hari hanya boleh diadakan satu semester remedial di pelajaran yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_wali->cekjadpmp2()->num_rows() > 0){
			foreach($this->m_wali->cekjadpmp2()->result() as $row){
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
		else if ($this->m_wali->cekjadpmp3() > 0){
			echo "<script>alert('tidak boleh di semester yang berbeda dilakukan remedial di hari yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_wali->cekjadpmp4() > 0){
			echo "<script>alert('tidak boleh di hari yang sama dengan jadwal remedial evaluasi [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else{
		$this->m_wali->add_jadremedpmp();
		redirect('guru/guru_jadwalremed?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&tingkat='.$_GET['tingkat'].'&semester='.$_GET['semester'].'&tipe='.$_GET['tipe'].'');
		}
	}
	
	public function jadremedpmp()
	{
		if ($this->m_wali->cekjadpmp1() > 0){
			echo "<script>alert('dalam satu hari hanya boleh diadakan satu semester remedial di pelajaran yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_wali->cekjadpmp2()->num_rows() > 0){
			foreach($this->m_wali->cekjadpmp2()->result() as $row){
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
		else if ($this->m_wali->cekjadpmp3() > 0){
			echo "<script>alert('tidak boleh di semester yang berbeda dilakukan remedial di hari yang sama [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else if ($this->m_wali->cekjadpmp4() > 0){
			echo "<script>alert('tidak boleh di hari yang sama dengan jadwal remedial evaluasi [silahkan ganti tanggal]');history.go(-1);</script>";
		}
		else{
		$this->m_wali->add_jadremedpmp();
		redirect('guru/guru_inputpmp_pilihsiswa?idmapel='.$_GET['idmapel'].'&namamapel='.$_GET['namamapel'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&tingkat='.$_GET['tingkat'].'&semester='.$_GET['semester'].'&tipe='.$_GET['tipe'].'&thnajar='.$_GET['thnajar'].'');
		}
	}
	
	public function wali_info_pilihkelas(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_info_pilihkelas.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_pilihkelas()
					  );
    	
        $this->load->view('template', $data);
    }
	
	public function guru_info_pilihkelas(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_info_pilihkelas.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_pilihkelas()
					  );
    	
        $this->load->view('template', $data);
    }
	
	public function guru_jadwalremed_kelas(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_jadwalremed_kelas.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_pilihkelas()
					  );
    	
        $this->load->view('template', $data);
    }
	
	public function guru_jadwalremed(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "guru_jadwalremed.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'eval' => $this->m_wali->all_jadwalremed_eval(),
						'pmp' => $this->m_wali->all_jadwalremed_pmp()
					);
    	
        $this->load->view('template', $data);
    }
	
	public function wali_info_pilihsiswa(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_info_pilihsiswa.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_info_pilihsiswa()
					  );
        $this->load->view('template', $data);
    }
	
	public function wali_sikap_siswa(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_sikap_siswa.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_info_pilihsiswa()
					  );
        $this->load->view('template', $data);
    }
	
	public function wali_sikap_form(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_sikap_form.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'cek' => $this->m_wali->wali_ceksikap(),
				      );
        $this->load->view('template', $data);
    }

	public function wali_info_nilai(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_info_nilai.php",
						'bab' => $this->m_wali->nilaibab(),
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'akhir' => $this->m_wali->nilaiakhir()
					  );
		$this->load->view('template', $data);
	}
	
	public function wali_infokelas_nilai(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_infokelas_nilai.php",
						'bab' => $this->m_wali->nilaibab(),
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'akhir' => $this->m_wali->nilaiakhir()
					  );
		$this->load->view('template', $data);
	}
	
	public function wali_laporan_mapel(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_laporan_mapel.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'map' => $this->m_wali->wali_laporan_mapel(),
					);
		$this->load->view('template', $data);
	}
	
	//menu laporan nilai siswa || wali_laporan_semester
	public function laporan_nilai_siswa(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_laporan_semester.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->wali_pilihkelas(),
					);
		$this->load->view('template', $data);
	}
	
	public function wali_laporanpmp(){
	    $data = array (
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->wali_laporanpmp()
					);
		$this->load->view('wali_download_pmp', $data);
	}
	
	public function formatbab_csv()
	{
		$data = array (
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_siswaeval()
					);
		$this->load->view('guru_download_babcsv', $data);
	}
	
	public function formatpmp_csv()
	{
		$data = array (
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_siswapmp()
					);
		$this->load->view('guru_download_pmpcsv', $data);
	}
	
	public function wali_laporandkn(){
	
	    $data = array (
						'siswa' => $this->m_wali->guru_info_pilihsiswa(),
						'isi'=> "wali_kelas\wali_isilaporan_dkn.php",
						'bab' => $this->m_wali->wali_babdkn(),
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
					);
		$this->load->view('wali_download_dkn', $data);
	}
	
	public function wali_laporanleger(){
	
	    $data = array (
						'siswa' => $this->m_wali->guru_info_pilihsiswa(),
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'map' => $this->m_wali->wali_laporan_mapel()
					);
		$this->load->view('wali_kelas/wali_download_leger', $data);
	}
	
	public function cek_dkn(){
	$cek = isset($_REQUEST['cek']) ? $_REQUEST['cek'] : '';
	if ($cek <> '') {
	$this->wali_laporandkn();
	}
	}
	
	public function cek_leger(){
	$cek = isset($_REQUEST['cek']) ? $_REQUEST['cek'] : '';
	if ($cek <> '') {
	$this->wali_laporanleger();
	}
	}
	
	public function wali_laporan_pilih(){
		$data = array (
						'konten' => "wali_kelas\wali_laporan_pilih.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						);
        $this->load->view('template', $data);
	}

	
	public function wali_inputsikap()
	{
		$this->m_wali->wali_addsikap();
		redirect('guru/wali_sikap_form?thnajar='.$_GET['thnajar'].'&tingkat='.$_GET['tingkat'].'&idkelas='.$_GET['idkelas'].'&kelas='.$_GET['kelas'].'&nis='.$_GET['nis'].'&nama='.$_GET['nama'].'&semester='.$_GET['semester'].'');
	}
	
	public function wali_infokelas_siswa(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_infokelas_siswa.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'mapel' => $this->m_wali->wali_pilihmapel(),
						'getmapel' => $this->m_wali->get_mapel(),
						'list' => $this->m_wali->guru_info_pilihsiswa()
					  );
        $this->load->view('template', $data);
    }
	
	public function wali_infokelas_semester(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_infokelas_semester.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						);
        $this->load->view('template', $data);
    }
	
	//menu raport siswa || wali_rapor_semester
	public function rapor_siswa(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_rapor_semester.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->wali_pilihkelas()
					  );
        $this->load->view('template', $data);
    }
	
	//menu input nilai sikap || wali_sikap_semester
	public function nilai_sikap(){
        $data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_sikap_semester.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->wali_pilihkelas()
					  );
        $this->load->view('template', $data);
    }
	
	public function wali_rapor_siswa(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_rapor_siswa.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'list' => $this->m_wali->guru_info_pilihsiswa()
					  );
        $this->load->view('template', $data);
    }
	
	public function wali_rapor_view(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "wali_kelas\wali_rapor_view.php",
						'isi' => "wali_isirapor.php",
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'mapel' => $this->m_wali->wali_mapelrapor()
					  );
        $this->load->view('template', $data);
    }
	
	public function wali_download_rapor(){
		$data = array (
						'wali_kelas' => $this->m_wali->data_guru(),
						'isi' => "wali_isirapor.php",
						'ortu' => $this->m_wali->data_ortu(),
						'mapel' => $this->m_wali->wali_mapelrapor()
					  );
        $this->load->view('wali_download_rapor', $data);
    }
	public function wali_sikap_download(){
		$data = array (
						'wali_kelas' => $this->m_wali->data_guru(),
						'ortu' => $this->m_wali->data_ortu(),
						'cek' => $this->m_wali->wali_ceksikap()
					  );
		if ($this->m_wali->ceksikap() < 19){
			echo "<script>alert('lengkapi dulu form nilai sikap dan karakter');history.go(-1);</script>";
		}
		else{
        $this->load->view('wali_download_sikap', $data);
		}
    }
	/*function is_logged_in() {
        $login = $this->session->userdata('logged_in');
		$status = $this->session->userdata('status');
        if (!isset($login) || $login != true || $status != 'wali' and $status != 'guru' ) {
             $this->session->sess_destroy();
			redirect('user/loginPegawai');
			die();
        }
    }*/
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>