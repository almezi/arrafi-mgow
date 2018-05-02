<?php
	class satpam extends CI_Controller {
		
		public function __construct(){
		parent::__construct();
			session_start();
			$this->load->model('m_katu2', '', TRUE);
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
				'foto' => $this->m_katu2->getFoto()
			);
			$data['konten']="satpam/v-form_presensi_satpam.php";
			$this->load->view('template',$data);
		}


		function simpan_absen(){
			$data['foto'] = $this->m_katu2->getFoto();
			$tgl_absen=$this->input->post('tgl_tugas');
			$id_pegawai = $this->input->post('id_pegawai');
			$cek = $this->m_satpam->cekPresensi($id_pegawai);
			if($cek->num_rows() > 0){
				echo "<script>alert('Data Sudah Ada!');history.go(-1);</script>";
			}
			else{
			   $this->m_satpam->insert();
			   $this->session->set_flashdata('pesan','Data Tersimpan');
			   redirect('satpam/presensi_satpam');
			}
		}

		//menu kunjungan
		function kunjungan(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu2->getFoto();
			$data['konten'] = "satpam/v-tampil_kunjungan.php";
			$data['list_mhsw'] = $this->m_satpam->get_kunjungan();
			$this->load->view('template',$data);
		}
		
		public function display_form_input_kunjungan(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu2->getFoto();
			$data['konten']="satpam/v-form_kunjungan.php";
			$this->load->view('template',$data);
		}

		function simpan_form_kunjungan(){
			$data['foto'] = $this->m_katu2->getFoto();
			if($this->m_satpam->cek_absen() > 0){
			$this->m_satpam->insert_form_kunjungan();
			$this->session->set_flashdata('pesan','Data Tersimpan');
			redirect('satpam/kunjungan');
			}
			else{
				echo "<script>alert('anda belum absen'); window.history.go(-1);</script>";
			}
		}

		//menu peristiwa
		function peristiwa(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu2->getFoto();
			$this->load->model('m_satpam');
			$data['konten'] = "satpam/v-tampil_peristiwa.php";
			$data['list_mhsw'] = $this->m_satpam->get_peristiwa();
			$this->load->view('template',$data);
		}
		
		public function display_form_input_peristiwa(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu2->getFoto();
			$data['konten']="satpam/v-form_peristiwa.php";
			$this->load->view('template',$data);
		}
		
  		public function simpan_dan_video(){
	  			$data['foto'] = $this->m_katu2->getFoto();
	    		if (isset($_FILES['video']['name']) && $_FILES['PFOTO']['name'] != '') {
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
			            $url = $this->do_upload();
			            $entry = array('id_presensi' => $this->session->userdata('kodepeg'),
			           		'foto' => $url,
			             'tgl_peristiwa' => $this->input->post('tgl_peristiwa'),
			             'jam_peristiwa' => $this->input->post('jam_peristiwa'),
			             'kejadian' => $this->input->post('kejadian'),
			             'bukti' => $this->input->post('bukti'),
			             'deskripsi' => $this->input->post('deskripsi'),
			             'video' => $configVideo['file_name'],
			             'status_penyelesaian' => '');
			            if($this->m_satpam->cek_absen() > 0){
						    $this->db->insert('peristiwa',$entry);
						    
						     // $this-> m_satpam->insert_form_peristiwa();
						     $this->session->set_flashdata('pesan','Data Tersimpan');
			            	redirect('satpam/peristiwa');
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
		         	 // 'status_penyelesaian' => '');
		            if($this->m_satpam->cek_absen() > 0){
					    $this->db->insert('peristiwa',$entry);
					    $this->session->set_flashdata('pesan','Data Tersimpan');
		            	redirect('satpam/peristiwa');
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
			$data['foto'] = $this->m_katu2->getFoto();
			$data['konten']="satpam/v-form_edit_kunjungan.php";
			$idkunjungan=$this->uri->segment(3);
			$data['list_kunjungan']=$this->m_satpam->edit_kunjungan($idkunjungan);
			$this->load->view('template',$data);
		}
		
		public function simpan_edit_kunjungan(){
			$data['foto'] = $this->m_katu2->getFoto();
			if($this->input->post())
				$this->m_satpam->simpan_edit_kunjungan();
			if($this->db->affected_rows())
				$this->session->set_flashdata('msg','<script>alert("Success")</script>');
			else	
				$this->session->set_flashdata('msg','<script>alert("Failed")</script>');	
			redirect('satpam/kunjungan');
		}

		function edit_peristiwa(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu2->getFoto();
			$data['konten']="satpam/v-form_edit_peristiwa.php";
			$idperistiwa=$this->uri->segment(3);
			$data['list_peristiwa']=$this->m_satpam->edit_peristiwa($idperistiwa);
			$this->load->view('template',$data);
		}
		
		public function simpan_edit_peristiwa(){
			$data['foto'] = $this->m_katu2->getFoto();
			if($this->input->post())
				$this->m_satpam->simpan_edit_peristiwa();
			if($this->db->affected_rows())
				$this->session->set_flashdata('msg','<script>alert("Success")</script>');
			else	
				$this->session->set_flashdata('msg','<script>alert("Failed")</script>');
		
			redirect('satpam/peristiwa');
		}

		public function update_status(){
			$data['foto'] = $this->m_katu2->getFoto();
			$id = $this->uri->segment(3);
			$this->m_satpam->setUpdateStatus($id);
			redirect('satpam/peristiwa');
		}

		//menu history presensi (spm)
		function history_presensi(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu2->getFoto();
			$data['konten'] = "satpam/v-tampil_historyAbsenSatpam.php";
			$data['list_mhsw'] = $this->m_satpam->get_historyAbsenUser();
			$this->load->view('template',$data);
		}

		//menu penilaian (spm)
		function penilaian_satpam(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu2->getFoto();
			$this->load->model('m_satpam');
			$data['konten'] = "satpam/v-tampil_penilaianSatpam.php";
			$data['list'] = $this->m_satpam->getPrestasi();
			$this->load->view('template',$data);
		}
}?>