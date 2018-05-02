<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

    public function cek_user($username)
    {
        $query = $this->db->query("select * from user
								where username = '$username'");      
        if($query->num_rows()==1){
            return $query->row();
        }else{
			return "";
        }
    }
	
	public function cek_aktif($username)
    {
        $query = $this->db->query("select * from user
								where username = '$username' and status_user = 'Non-Aktif'");       
        if($query->num_rows()==1){
            return $query->row();
        }else{
			return "";
        }
    }
	
	public function get_login($username, $password)
    {
        $query = $this->db->query("select u.username username, password, status_user, kode_group 
								from user u join grup_user gu on(u.username=gu.username)
								where u.username = '$username' and password = md5('$password')");       
        if($query->num_rows()>=1){
            return $query->row();
        }else{
			return "";
        }
    }
	
	public function cek_user_email($username, $email)
    {
        $query = $this->db->query("select * from user
								where username = '$username' and email = '$email'");       
        if($query->num_rows()==1){
            return $query->row();
        }else{
			return "";
        }
    }
	
	public function get_online($username)
    {
		$time=time();
		$time_check=$time-1200; //pengaturan waktu 20 menit
        $query = $this->db->query("select * from online where username='$username'");       
        if($query->num_rows()==0){
            $query2=$this->db->query("insert into online
								values ('$username', '$time')");
        }else{
			$query3=$this->db->query("update online set time='$time'
								where username='$username'");
        }
    }
	
	function tampil_online(){
		$user=$this->session->userdata('username');
		$query=$this->db->query("select * from online where username!='$user'");
		$rows=$query->row();
		return $query;
	}
	
	function hapus_online($username){
		$query=$this->db->query("delete from online where username='$username'");
	}
	
	function hapus_auto(){
		$time=time();
		$time_check=$time-600; //pengaturan waktu 10 menit
		$query=$this->db->query("delete from online where time<'$time_check'");
	}
	
	function tampil_menu(){
		$user=$this->session->userdata('username');
		$query=$this->db->query("select nama_modul, link
								from user u join grup_user gu on(u.username=gu.username)
								join grup g on(g.kode_group=gu.kode_group)
								join grup_modul gm on(g.kode_group=gm.kode_group)
								join modul m on(m.kode_modul=gm.kode_modul)
								where u.username='$user' and status_group='Aktif' and status='Aktif'
								order by m.kode_modul");
		$rows=$query->row();
		return $query;
	}
	
	function tampil_profil(){
		$user=$this->session->userdata('username');
		$query=$this->db->query("select * from user
								where username='$user'");
		return $query;
	}
	
	function edit_profil(){
		$user=$this->session->userdata('username');
		$pass1=$this->input->post('password1');
		$query=$this->db->query("update user set password = md5('$pass1') 
								where username='$user'");
	}
	
	function edit_pass_history(){
		$user=$this->session->userdata('username');
		$query=$this->db->query("insert into history(jenis, tabel, username, waktu, keterangan) 
								values ('Update', 'User', '$user', now(), 'Ubah password oleh $user')");
	}
	
	function reset_pass_history($user){
		$query=$this->db->query("insert into history(jenis, tabel, username, waktu, keterangan) 
								values ('Update', 'User', '$user', now(), 'Reset password oleh $user')");
	}
	
	function tampil_pass_history(){
		$query=$this->db->query("select * from history where tabel='User'
								order by id desc");
		$rows=$query->row();
		return $query;
	}
	
	function last_login($username){
		$query=$this->db->query("update user set last_login=now()
								where username='$username'");
	}
	/*tipe data date = curdate()
	tipe data timestamp = now()*/
	
	function reset_user($user, $pass1){
		$query=$this->db->query("update user set password = md5('$pass1'), status_user='Non-Aktif'
								where username='$user'");
	}
	
	function aktivasi_user($user, $pass1){
		$query=$this->db->query("update user set status_user='Aktif'
								where username='$user' and password = md5('$pass1')");
		return $this->db->affected_rows();
	}
	
	//Aplikasi Linmas
	function editUser(){
		$user = $this->session->userdata('username');
		$query = $this->db->query("select * from pegawai where username='$user'");
		return $query;
	}
}