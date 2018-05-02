<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
      
    function __construct() {
        parent::__construct();
        session_start();
        $this->load->model('m_login','',TRUE);
        $this->load->helper(array('url'));
        $this->load->library(array('session'));
        if ($this->session->userdata('username') == ' '){
        	redirect('user/loginPegawai');
        }
    }

    public function loginPegawai(){      
    	/*if ($this->session->userdata('berhasil')) 
    	{
    	  	if ($this->session->userdata('status')=='KaTu') 
    	  	{
    	  		redirect('c_user/home');
    	  	}
    	  	elseif ($this->session->userdata('status')=='caraka') {
    	  		redirect('c_user/home');
    	  	}
    	  	elseif ($this->session->userdata('status')=='satpam') 
    	  	{
    	  		redirect('c_user/home');
    	  	}
    	}
    	else
    	{
    		$this->session->set_flashdata('msg','<p class="alert alert-warning">Login Gagal.</p>');
			//redirect('user/loginPegawai');
    	}*/ 
        $data['content_login'] = "form_login_pegawai.php";
        $this->load->view('login',$data);
    }  
   	public function loginProcess()
	{
		$this->load->model('m_login');
		$hasil = $this->m_login->cek_user() ;
			
		if(isset($hasil)) 
		{
			$newdata = array(
				'berhasil' =>true,
				'username'=>$hasil->username,
				'status'=>$hasil->status,
				'kodepeg'=>$hasil->kodepeg
               );
			$this->session->set_userdata($newdata);
			
			$this->m_login->edit_history();
			redirect($user['userRole']);
		}
		else
		{
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		
		}
	}
   	/*public function checking ()
	{
		$this->load->model('m_login'); // load model_user
		$hasil = $this->m_login->cek_user() ;
		if($hasil == true){
			$data = array(
				'berhasil' =>true,
				'username'=>$hasil->username,
				'status'=>$hasil->status,
				'kodepeg'=>$hasil->kodepeg
			);
			$this->session->set_userdata($data);
			
			if ($data['status'] =='KaTu') {
				echo "<script>alert('Login berhasil!');history.go(-1);</script>";
				redirect('c_user/home');
			}
			else if ($data['status']=='satpam') {
				echo "<script>alert('Login berhasil!');history.go(-1);</script>";
				redirect('c_user/home');
			}
			else if ($data['status'] =='caraka') {
				echo "<script>alert('Login berhasil!');history.go(-1);</script>";
				redirect('c_user/home');
			}
			
		}else{
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}*/

	
	public function doLogout(){
		$this->session->sess_destroy();
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('kodepeg');
		redirect('user/loginPegawai');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */