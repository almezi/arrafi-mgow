<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class orang_tua extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('m_ortu','',TRUE);
		$this->load->model('m_login','',TRUE);
        $this->load->helper(array('url','form'));
        $this->load->library(array('session'));
        //$this->is_logged_in();
    }
	
	public function notif() {
	 foreach($this->m_ortu->ortu_notif_evaluasi()->result() as $row){
	 echo "
	 <li>
	 <a href='".base_url()."index.php/orang_tua/detail_notif_evaluasi?idbab=$row->idbab&nis=$row->nis&nama=$row->nama&nilai=$row->nilai&mapel=$row->mapel&bab=$row->bab&kkm=$row->kkm&ideval=$row->ideval&semester=$row->semester&idkelas=$row->idkelas'>
                                <div>
                                    <div>
                                    <span >
                                        <em>Nama:$row->nama</em>
                                    	<br>
										
                                    </span>
									</div>
                                </div>
                                <div style='color:blue'>Nilai Evaluasi $row->mapel Bab $row->bab</div>
     </a>
	 </li>";
	 }
	 foreach($this->m_ortu->ortu_notif_remedevaluasi()->result() as $row){
	 echo "
	 <li >
	 <a href='".base_url()."index.php/orang_tua/detail_notif_remedevaluasi?nis=$row->nis&nama=$row->nama&nilai=$row->nilai&mapel=$row->mapel&bab=$row->bab&ideval=$row->ideval&semester=$row->semester&kkm=$row->kkm&idkelas=$row->idkelas'>
                                <div>
                                   
									<div>
                                    <span >
                                        <em>Nama:$row->nama</em>
                                    	<br>
										
                                    </span>
									</div>
                                </div>
                                <div style='color:	#ff00ff'>Nilai Remedi Evaluasi $row->mapel Bab $row->bab</div>
     </a>
	 </li>";
	 }
	 foreach($this->m_ortu->ortu_notif_pmp()->result() as $row){
	 echo "
	 <li>
	 <a href='".base_url()."index.php/orang_tua/detail_notif_pmp?idmapel=$row->idmapel&nis=$row->nis&nama=$row->nama&nilai=$row->nilai&mapel=$row->mapel&kkm=$row->kkm&idpmp=$row->idpmp&semester=$row->semester&idkelas=$row->idkelas'>
                                <div>
                                    
									<div>
                                    <span >
                                        
										<em>Nama:$row->nama</em>
                                    	<br>
										
                                    </span>
									</div>
                                </div>
                                <div style='color:#33cc33'>Nilai PMP $row->mapel Semester:$row->semester</div>
     </a>
	 </li>";
	 }
	 foreach($this->m_ortu->ortu_notif_remedpmp()->result() as $row){
	 echo "
	 <li>
	 <a href='".base_url()."index.php/orang_tua/detail_notif_remedpmp?nis=$row->nis&nama=$row->nama&nilai=$row->nilai&mapel=$row->mapel&kkm=$row->kkm&idpmp=$row->idpmp&semester=$row->semester&idkelas=$row->idkelas'>
                                <div>
                                    
									<div>
                                    <span >
                                        
										<em>Nama:$row->nama</em>
										<br>
										
                                    </span>
									</div>
                                </div>
                                <div style='color:#ffbf00'>Nilai Remidi PMP $row->mapel Semester:$row->semester</div>
     </a>
	 </li>	  
	 ";
	 }
	 echo "<li>
                            <a class='text-center' href='".base_url()."index.php/orang_tua/all_notif'>
                                <strong>Semua Pemberitahuan</strong>
                                <i class='fa fa-angle-right'></i>
                            </a>
                        </li>";
	 
    }
	
	public function all_notif(){
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "orang_tua/ortu_all_notif.php",
						'eval' => $this->m_ortu->ortu_allnotif_evaluasi(),
						'remedeval' => $this->m_ortu->ortu_allnotif_remedevaluasi(),
						'guru' => $this->m_ortu->data_guru(),
						'orang_tua' => $this->m_ortu->data_ortu(),
						'pmp' => $this->m_ortu->ortu_allnotif_pmp(),
						'remedpmp' => $this->m_ortu->ortu_allnotif_remedpmp()
					  );
        $this->load->view('template', $data);
	}
	
	public function detail_notif_evaluasi(){
		$this->m_ortu->notif_evaluasi_read();
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "orang_tua/ortu_detailnotif_evaluasi.php",
						'guru' => $this->m_ortu->data_guru(),
						'orang_tua' => $this->m_ortu->data_ortu(),
						'list' => $this->m_ortu->jadwalremed_eval()
					  );
        $this->load->view('template', $data);
    }
	
	public function detail_notif_remedevaluasi(){
		$this->m_ortu->notif_remedevaluasi_read();
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "orang_tua/ortu_detailnotif_remedevaluasi.php",
						'guru' => $this->m_ortu->data_guru(),
						'orang_tua' => $this->m_ortu->data_ortu(),
						
					  );
        $this->load->view('template', $data);
    }
	
	public function detail_notif_pmp(){
		$this->m_ortu->notif_pmp_read();
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "orang_tua/ortu_detailnotif_pmp.php",
						'guru' => $this->m_ortu->data_guru(),
						'orang_tua' => $this->m_ortu->data_ortu(),
						'list' => $this->m_ortu->jadwalremed_pmp()
					  );
        $this->load->view('template', $data);
    }
	
	public function detail_notif_remedpmp(){
		$this->m_ortu->notif_remedpmp_read();
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "orang_tua/ortu_detailnotif_remedpmp.php",
						'guru' => $this->m_ortu->data_guru(),
						'orang_tua' => $this->m_ortu->data_ortu(),
						
					  );
        $this->load->view('template', $data);
    }
	
	//menu nilai anak
	public function nilai_anak(){
		$username=$this->session->userdata('username');
		$hasil = $this->m_login->get_id_user($username)->row(0,'array');
		$hasil2 = $this->m_login->get_id_ortu($username)->row(0,'array');
		$thnajar=$this->m_ortu->thnajar();
		
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "orang_tua/ortu_info_pilihsiswa.php",
						'guru' => $this->m_ortu->data_guru($hasil['nip']),
						'orang_tua' => $this->m_ortu->data_ortu($hasil2['idortu']),
						'list' => $this->m_ortu->ortu_pilih_anak($thnajar)
					  );
	
		//echo "<pre>";
		//print_r($data['list']->result());die;
        $this->load->view('template', $data);
    }
	
	//menu jadwal remed anak
	public function jadwal_remed_anak(){
		$username=$this->session->userdata('username');
		$hasil = $this->m_login->get_id_user($username)->row(0,'array');
		$hasil2 = $this->m_login->get_id_ortu($username)->row(0,'array');
		$thnajar=$this->m_ortu->thnajar();
		
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "orang_tua/ortu_inforemed_pilihsiswa.php",
						'guru' => $this->m_ortu->data_guru($hasil['nip']),
						'orang_tua' => $this->m_ortu->data_ortu($hasil2['idortu']),
						'list' => $this->m_ortu->ortu_pilih_anak($thnajar)
					  );
		
        $this->load->view('template', $data);
    }
	
	public function info_jadwalremed(){
		$username=$this->session->userdata('username');
		$hasil = $this->m_login->get_id_user($username)->row(0,'array');
		$hasil2 = $this->m_login->get_id_ortu($username)->row(0,'array');
		
		$thnajar=$this->m_ortu->thnajar();
		
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "orang_tua/ortu_info_jadwalremed.php",
						'eval' => $this->m_ortu->ortu_jadwaleval($thnajar),
						'pmp' => $this->m_ortu->ortu_jadwalpmp($thnajar),
						'guru' => $this->m_ortu->data_guru($hasil['nip']),
						'orang_tua' => $this->m_ortu->data_ortu($hasil2['idortu'])
						);
	
        $this->load->view('template', $data);
    }
	
	public function info_pilih_mapel(){
		$username=$this->session->userdata('username');
		$hasil = $this->m_login->get_id_user($username)->row(0,'array');
		$hasil2 = $this->m_login->get_id_ortu($username)->row(0,'array');
		$tahunajar=$this->m_ortu->ortu_thnajar()->row(0,'array');
		$semester=$this->m_ortu->ortu_semester()->row(0,'array');
		
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "orang_tua/ortu_info_pilihmapel.php",
						'guru' => $this->m_ortu->data_guru($hasil['nip']),
						'orang_tua' => $this->m_ortu->data_ortu($hasil2['idortu']),
						'thn' => $this->m_ortu->ortu_thnajar(),
						'sem' => $this->m_ortu->ortu_semester(),
						'list' => $this->m_ortu->ortu_pilih_mapel($tahunajar['thnajar'],$semester['semester'])
					  );
					  
		
        $this->load->view('template', $data);
	}
	
	public function info_detil_nilai(){
		$username=$this->session->userdata('username');
		$hasil = $this->m_login->get_id_user($username)->row(0,'array');
		$hasil2 = $this->m_login->get_id_ortu($username)->row(0,'array');
		
		$data = array (
						'list_menu'=>$this->m_login->tampil_menu(),
						'list_online'=>$this->m_login->tampil_online(),
						'konten' => "orang_tua/ortu_info_detailnilai.php",
						'guru' => $this->m_ortu->data_guru($hasil['nip']),
						'orang_tua' => $this->m_ortu->data_ortu($hasil2['idortu']),
						'bab' => $this->m_ortu->ortu_nilaibab(),
						'akhir' => $this->m_ortu->ortu_nilaiakhir()
					  );
		//echo "<pre>";
		//print_r($data['akhir']->result());die;
        $this->load->view('template', $data);
	}
	
	public function ceknotif(){
		echo $this->m_ortu->ortu_cek_notif();
	}
	
	/*function is_logged_in() {
        $login = $this->session->userdata('logged_in');
        if (!isset($login) || $login != true) {
            redirect('user/loginPegawai');
            die();
        }
    }*/
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>