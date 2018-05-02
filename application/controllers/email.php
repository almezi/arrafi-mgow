<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class email extends CI_Controller {

	public function send(){  

		$config = Array(  
			'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
			'smtp_user' => 'lailaarashian@gmail.com',   
			'smtp_pass' => 'Ra1raArash1',
			'mailtype'  => 'html',
            'starttls'  => true
		);  
		
		$this->load->library('email'); 
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");  
		$this->email->from('lailaarashian@gmail.com', 'Laila');   
		$this->email->to('lailaarashian@gmail.com');   
		$this->email->subject('Percobaan email');   
		$this->email->message('Bismillah');
		//$result = $this->email->send();
		if (!$this->email->send()) {  
			show_error($this->email->print_debugger());   
		}else{  
			echo 'SUCCESS';   
		}
	}
	
	
	
}