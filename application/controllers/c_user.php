<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_user extends CI_Controller {

    function __construct() {
       parent::__construct();
       session_start();
         $this->load->model('m_katu', '', TRUE);    
        $this->load->model('m_database', '', TRUE);
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('session'));
        
    }

    public function home() {
        
             $data['foto'] = $this->m_katu->getFoto();
            $data['content_view'] = "v_content.php";
            $data['list_mhsw'] = $this->m_katu->get_info();
            $this->load->view('index',$data);
      
       
    }

    /*function displaydata(){
            $data['content_view'] = "v-tampil_pegawai.php";
            $data['list_mhsw'] = $this->m_katu->get_list_data();
            $this->load->view('index',$data);
        }*/

    function doLogout() {
        $this->session->sess_destroy();
        redirect('user/loginPegawai');
        session_start();
        session_destroy();
        
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */