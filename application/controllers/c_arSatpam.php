<?php
	class c_arSatpam extends CI_Controller {
		
		public function __construct(){
		parent::__construct();
			session_start();
			$this->load->model('m_katu', '', TRUE);
			$this->load->model('m_satpam','',TRUE);
			$this->load->model('m_login', '', TRUE);
			$this->load->helper(array('url','html','form'));
			header('Cache-Control: no-store, no-cache, must-revalidate');
			header('Cache-Control: post-check=o, pre-check=0', false);
		}
		
		//menu presensi satpam
		function presensi_satpam(){
			$data = array (
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'jadwal' => $this->m_satpam->get_jadwal(),
				'foto' => $this->m_katu->getFoto()
			);
			$data['konten']="v-form_presensi_satpam.php";
			$this->load->view('template',$data);
		}

		/*function simpan_Absen(){			
			if($this->session->userdata('status') == 'satpam'){
			$data['foto'] = $this->m_katu->getFoto();
		//	$id_pegawai 	= $this->m_satpam->checkPresensi($id_pegawai);
			if($this->m_satpam->checkPresensi($data["foto"]->row()->id_pegawai)){
			    $id_pegawai = $this->m_satpam->insert();
			} else {
				echo "o";
			}
			redirect('c_arSatpam/form_presensi');
			}else{
				redirect('user/loginPegawai');
			}
		}*/

		function simpan_Absen(){
			$data['foto'] = $this->m_katu->getFoto();
			$tgl_absen=$this->input->post('tgl_tugas');
			$id_pegawai = $this->input->post('id_pegawai');
			$cek = $this->m_satpam->cekPresensi($id_pegawai);
			if($cek->num_rows() > 0){
				echo "<script>alert('Data Sudah Ada!');history.go(-1);</script>";
			}
			else{
			   $this->m_satpam->insert();
			   $this->session->set_flashdata('pesan','Data Tersimpan');
			   redirect('c_arSatpam/form_presensi');
			}
		}

		/*function form_ketidakhadiran(){
			$data['konten']="v-form_ketidakhadiran.php";
			$this->load->view('v-satpam_template',$data);
		}
		
		function simpan_form_ketidakhadiran(){
			$this->m_satpam->insert_form_ketidakhadiran();
			redirect('c_arSatpam/form_ketidakhadiran');
		}*/

		//menu kunjungan
		function kunjungan(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu->getFoto();
			$data['konten'] = "v-tampil_kunjungan.php";
			$data['list_mhsw'] = $this->m_satpam->get_kunjungan();
			$this->load->view('template',$data);
		}
		
		public function displayform_input_kunjungan(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu->getFoto();
			$data['konten']="v-form_kunjungan.php";
			$this->load->view('template',$data);
		}

		function simpan_form_kunjungan(){
			$data['foto'] = $this->m_katu->getFoto();
			if($this->m_satpam->cek_absen() > 0){
			$this->m_satpam->insert_form_kunjungan();
			$this->session->set_flashdata('pesan','Data Tersimpan');
			redirect('c_arSatpam/display_kunjungan');
			}
			else{
				echo "<script>alert('anda belum absen'); window.history.go(-1);</script>";
			}
		}

		//menu peristiwa
		function peristiwa(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu->getFoto();
			$this->load->model('m_satpam');
			$data['konten'] = "v-tampil_peristiwa.php";
			$data['list_mhsw'] = $this->m_satpam->get_peristiwa();
			$this->load->view('template',$data);
		}
		
		public function displayform_input_peristiwa(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu->getFoto();
			$data['konten']="v-form_peristiwa.php";
			$this->load->view('template',$data);
		}
		
		/*function simpan_form_peristiwa(){
			$this->m_satpam->insert_form_peristiwa();
			redirect('c_arSatpam/displayform_input_peristiwa');
		}*/

  		public function simpan_dan_video(){
	  			$data['foto'] = $this->m_katu->getFoto();
	    		if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
			        unset($config);
			        $date = date("ymd");
			        $configVideo['upload_path'] = './video';
			        $configVideo['max_size'] = '60000000';
			        $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
			        $configVideo['overwrite'] = FALSE;
			        $configVideo['remove_spaces'] = TRUE;
			        // $video_name = $date.$_FILES['video']['name'];
			        $video_name = $this->session->userdata('kodepeg')."".date("ymd");
			        $configVideo['file_name'] = $video_name;

			        $this->load->library('upload', $configVideo);
			        $this->upload->initialize($configVideo);
			        if(!$this->upload->do_upload('video')) {
			            echo $this->upload->display_errors();
			        }else{
			            $videoDetails = $this->upload->data();
			            // echo $configVideo['file_name'];
			            // $this->m_satpam->insert_form_peristiwa($configVideo['file_name']);
			            // echo $configVideo['file_name'];
			            $url = $this->do_upload();
			            $entry = array('id_presensi' => $this->session->userdata('kodepeg'),
			           		'foto' => $url,
			             'tgl_peristiwa' => $this->input->post('tgl_peristiwa'),
			             'jam_peristiwa' => $this->input->post('jam_peristiwa'),
			             'kejadian' => $this->input->post('kejadian'),
			             'bukti' => $this->input->post('bukti'),
			             'deskripsi' => $this->input->post('deskripsi'),
			             'video' => $configVideo['file_name']);
			            if($this->m_satpam->cek_absen() > 0){
						    $this->db->insert('peristiwa',$entry);
						     $this->session->set_flashdata('pesan','Data Tersimpan');
			            	redirect('c_arSatpam/display_peristiwa');
			        	}
						else{
							echo "<script>alert('anda belum absen'); window.history.go(-1);</script>";
						}
			        }

			    }else{
			    	 $url = $this->do_upload();
			        $entry = array('id_presensi' => $this->session->userdata('kodepeg'),
			        		'foto' => $url,
		             'tgl_peristiwa' => $this->input->post('tgl_peristiwa'),
		             'jam_peristiwa' => $this->input->post('jam_peristiwa'),
		             'kejadian' => $this->input->post('kejadian'),
		             'bukti' => $this->input->post('bukti'),
		             'deskripsi' => $this->input->post('deskripsi'),
		             'video' => '');
		            if($this->m_satpam->cek_absen() > 0){
					    $this->db->insert('peristiwa',$entry);
					    $this->session->set_flashdata('pesan','Data Tersimpan');
		            	redirect('c_arSatpam/display_peristiwa');
		        	}else{
						echo "<script>alert('anda belum absen'); window.history.go(-1);</script>";
					}
			    }
		}

		private function do_upload() {
			$type = explode('.', $_FILES["PFOTO"]["name"]);
			$type = strtolower($type[count($type) - 1]);
			$url = "./foto/" . uniqid(rand()) . '.' . $type;
			if (in_array($type, array("jpg", "jpeg", "gif", "png")))
				if (is_uploaded_file($_FILES["PFOTO"]["tmp_name"]))
					if (move_uploaded_file($_FILES["PFOTO"]["tmp_name"], $url))
						return $url;
			return "";
		}

		function edit_kunjungan(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu->getFoto();
			$data['konten']="v-form_edit_kunjungan.php";
			$idkunjungan=$this->uri->segment(3);
			$data['list_kunjungan']=$this->m_satpam->edit_kunjungan($idkunjungan);
			$this->load->view('template',$data);
		}
		
		public function simpan_edit_kunjungan(){
			$data['foto'] = $this->m_katu->getFoto();
			if($this->input->post())
				$this->m_satpam->simpan_edit_kunjungan();
			if($this->db->affected_rows())
				$this->session->set_flashdata('msg','<script>alert("Success")</script>');
			else	
				$this->session->set_flashdata('msg','<script>alert("Failed")</script>');	
			redirect('c_arSatpam/display_kunjungan');
		}

		function edit_peristiwa(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu->getFoto();
			$data['konten']="v-form_edit_peristiwa.php";
			$idperistiwa=$this->uri->segment(3);
			$data['list_peristiwa']=$this->m_satpam->edit_peristiwa($idperistiwa);
			$this->load->view('template',$data);
		}
		
		public function simpan_edit_peristiwa(){
			$data['foto'] = $this->m_katu->getFoto();
			if($this->input->post())
				$this->m_satpam->simpan_edit_peristiwa();
			if($this->db->affected_rows())
				$this->session->set_flashdata('msg','<script>alert("Success")</script>');
			else	
				$this->session->set_flashdata('msg','<script>alert("Failed")</script>');
		
			redirect('c_arSatpam/display_peristiwa');
		}

		public function update_status(){
			$data['foto'] = $this->m_katu->getFoto();
			$id = $this->uri->segment(3);
			$this->m_satpam->setUpdateStatus($id);
			redirect('c_arSatpam/display_peristiwa');
		}

		//menu history presensi 
		function history_presensi(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu->getFoto();
			$data['konten'] = "v-tampil_historyAbsenSatpam.php";
			$data['list_mhsw'] = $this->m_satpam->get_historyAbsenUser();
			$this->load->view('template',$data);
		}

		//menu penilaian satpam
		function penilaian_satpam(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu->getFoto();
			$this->load->model('m_satpam');
			$data['konten'] = "v-tampil_penilaianSatpam.php";
			$data['list'] = $this->m_satpam->getPrestasi();
			$this->load->view('template',$data);
		}
}?>