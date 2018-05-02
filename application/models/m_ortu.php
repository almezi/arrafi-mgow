<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_ortu extends CI_Model {
		
	/*public function getLogin()
    {
        $username = $this->input->post('username');
        $password =  $this->input->post('password');
        $passwordmd5 = md5($password);
        $query = $this->db->query("select * from user where username = '$username' and password = '$passwordmd5'");       
        if($query->num_rows()==1){
                return $query->row();
        }else{
                return "";
        }
    }
	
	public function get_pass()
    {
		$id=$this->session->userdata('id_user');
	    $query = $this->db->query("select distinct password from user where id_user = '$id'");       
        return $query;
    }
	
	public function edit_user()
    {
	 $user = $this->input->post('user');
	 $pass = $this->input->post('newpass1');
	 $id=$this->input->post('iduser');
	 
        $query = $this->db->query("update user set password = md5('$pass') where id_user='$id'");       
                return $query;
    }*/
	
	public function thnajar()
    {
		$query = $this->db->query("select tahun from tahunajar where status='aktif'");
		$thnajar ='';
		foreach ($query->result() as $row){
			$thnajar = $row->tahun;
		}
		return $thnajar;
	}

	public function data_ortu($id)
    {
        $query = $this->db->query("select * from ortu where idortu = '$id'");       
                return $query;
    }
	
	public function get_mapel()
    {
	error_reporting (0);
        $query = $this->db->query("select * from mapel where idmapel = '".$_POST['idmapel']."'");       
        return $query;
    }
	
	public function data_guru($nip)
    {
    $query = $this->db->query("select * from guru where nip = '$nip'");       
    return $query;
    }
	
	//menu nilai siswa (guru)
	public function guru_pilihmapel()
	{
		$id=$this->session->userdata('username');
		$thnajar=$this->thnajar();
		$query=$this->db->query("select distinct m.*,a.thnajar from mapel m
		join ajar a on(m.idmapel=a.idmapel) join guru g on(g.nip=a.nip) join user u on(u.username=g.username)
		where g.username='$id' and a.thnajar='$thnajar'");
		return $query;
	}
	
	public function guru_pilihkelas()
	{
	$thnajar=$this->thnajar();
		$query=$this->db->query
		("select distinct k.* from kelas k 
		join bab b on(k.idkelas=b.idkelas)
		where b.idmapel='".$_GET['idmapel']."' and b.thnajar='$thnajar'");
		return $query;
	}
	
	public function guru_pilihbab()
	{
	$thnajar=$this->thnajar();
		$query=$this->db->query
		("select * from bab
		where idmapel='".$_GET['idmapel']."' and idkelas='".$_GET['idkelas']."' and semester='".$_GET['semester']."' and thnajar='$thnajar'");
		return $query;
	}
	
	public function wali_legerkkm($idmapel)
	{
		$query=$this->db->query
		("select kkm from mapel
		where idmapel='$idmapel'");
		return $query;
	}
	
	public function guru_info_pilihsiswa()
	{
		$idkelas=$this->input->post('idkelas');
		$thnajar=$this->thnajar();
		$query='';
		if ($idkelas != null or $_GET['idkelas'] == null){
		$query=$this->db->query
		("select s.*,k.nama kelas from siswa s
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(k.idkelas=ks.idkelas)
		where k.idkelas='$idkelas' and ks.thnajar='$thnajar'");
		}
		else {
		$query=$this->db->query
		("select s.*,k.nama kelas from siswa s
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(k.idkelas=ks.idkelas)
		where k.idkelas='".$_GET['idkelas']."' and ks.thnajar='$thnajar'");
		}
		return $query;
	}
	
	public function guru_siswaeval()
	{
		$idbab=$this->input->post('idbab');
		$thnajar=$this->thnajar();
		$query='';
		if ($idbab != null or $_GET['idbab'] == null){
		$query=$this->db->query
		("select distinct s.nis, s.nama, b.nama bab, b.idbab idbab, if((select round(nilai,2) from evaluasi where idbab='$idbab' and nis=s.nis and thnajar='$thnajar' and semester=".$_GET['semester'].") is null,'',(select round(nilai,2) from evaluasi where idbab='$idbab' and nis=s.nis and thnajar='$thnajar' and semester=".$_GET['semester'].")) as nilai from siswa s
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(ks.idkelas=k.idkelas)
		join bab b on(b.idkelas=k.idkelas)
		where k.idkelas='".$_GET['idkelas']."'
		AND b.idbab='$idbab' and ks.thnajar='$thnajar' and b.semester=".$_GET['semester']." and b.thnajar='$thnajar'
		");
		}
		else {
		$query=$this->db->query
		("select distinct s.nis, s.nama, b.nama bab, b.idbab idbab, if((select round(nilai,2) from evaluasi where idbab='".$_GET['idbab']."' and nis=s.nis and thnajar='$thnajar') is null,'',(select round(nilai,2) from evaluasi where idbab='".$_GET['idbab']."' and nis=s.nis and thnajar='$thnajar')) as nilai from siswa s
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(ks.idkelas=k.idkelas)
		join bab b on(b.idkelas=k.idkelas)
		where k.idkelas='".$_GET['idkelas']."'
		AND b.idbab='".$_GET['idbab']."' and ks.thnajar='$thnajar' and b.thnajar='$thnajar' and b.semester=".$_GET['semester']."
		");
		}
		return $query;
	}
	
	public function guru_siswapmp()
	{
	$thnajar=$this->thnajar();
		$query=$this->db->query
		("select s.nama,s.nis,if((select ROUND(nilai,2) from pmp where nis=s.nis and idmapel='".$_GET['idmapel']."' and semester=".$_GET['semester']." and thnajar='$thnajar') is null,'',(select ROUND(nilai,2) from pmp where nis=s.nis and idmapel='".$_GET['idmapel']."' and semester=".$_GET['semester']." and thnajar='$thnajar')) as nilai, if((select round(skor,2) from pmp where nis=s.nis and idmapel='".$_GET['idmapel']."' and semester=".$_GET['semester']." and thnajar='$thnajar') is null,'',(select round(skor,2) from pmp where nis=s.nis and idmapel='".$_GET['idmapel']."' and semester=".$_GET['semester']." and thnajar='$thnajar')) as skor from siswa s
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(ks.idkelas=k.idkelas)
		where k.idkelas='".$_GET['idkelas']."' and ks.thnajar='$thnajar'");
		return $query;
	}
	
	public function guru_remed_siswaeval()
	{
		$idbab=$this->input->post('idbab');
		$query='';
		$thnajar=$this->thnajar();
		if ($idbab != null or $_GET['idbab'] == null){
		$query=$this->db->query
		("select s.nis, s.nama, b.nama bab, b.idbab idbab, if(round(r.remidi,2)=0,'',round(r.remidi,2)) as nilai from siswa s
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(ks.idkelas=k.idkelas)
		join evaluasi r on (s.nis=r.nis)
		join bab b on(b.idbab=r.idbab)
		join mapel m on(b.idmapel=m.idmapel)
		where r.nilai < m.kkm and k.idkelas='".$_GET['idkelas']."'
		and r.idbab='$idbab' and ks.thnajar='$thnajar' and r.thnajar='$thnajar' and r.semester=".$_GET['semester']."
		");
		}
		else {
		$query=$this->db->query
		("select s.nis, s.nama, b.nama bab, b.idbab idbab, if(round(r.remidi,2)=0,'',round(r.remidi,2)) as nilai from siswa s
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(ks.idkelas=k.idkelas)
		join evaluasi r on (s.nis=r.nis)
		join bab b on(b.idbab=r.idbab)
		join mapel m on(b.idmapel=m.idmapel)
		where r.nilai < m.kkm and k.idkelas='".$_GET['idkelas']."'
		and r.idbab='".$_GET['idbab']."' and ks.thnajar='$thnajar' and r.thnajar='$thnajar' and r.semester=".$_GET['semester']."
		");
		}
		return $query;
	}
	
	public function nilaibab()
	{
	$thnajar=$this->thnajar();
		$query=$this->db->query
		("select b.nama, round(if(e.remidi=0,e.nilai,
		if(((e.remidi+e.nilai)/2)<m.kkm and e.remidi >= m.kkm,m.kkm,((e.remidi+e.nilai)/2))),2) as nilai 
		from evaluasi e join bab b on(e.idbab=b.idbab)
		join mapel m on(m.idmapel=b.idmapel)
		where e.nis='".$_GET['nis']."'
		and m.idmapel='".$_GET['idmapel']."'
		and b.idkelas='".$_GET['idkelas']."'
		and e.semester=".$_GET['semester']."
		and e.thnajar='$thnajar'
		and b.semester=".$_GET['semester']."
		and b.thnajar='$thnajar'
		");
		return $query;
	}
	
	public function ortu_nilaibab()
	{
		$query=$this->db->query
		("select b.nama, round(if(e.remidi=0,e.nilai,
		if(((e.remidi+e.nilai)/2)<m.kkm and e.remidi >= m.kkm,m.kkm,((e.remidi+e.nilai)/2))),2) as nilai 
		from evaluasi e join bab b on(e.idbab=b.idbab)
		join mapel m on(m.idmapel=b.idmapel)
		where e.nis='".$_GET['nis']."'
		and m.idmapel='".$_GET['idmapel']."'
		and e.semester='".$_GET['semester']."'
		and e.thnajar='".$_GET['thnajar']."'
		");
		return $query;
	}
	
	public function nilaiakhir()
	{
	$thnajar=$this->thnajar();
		$query=$this->db->query
		("select round(if(p.remidi=0,p.nilai,
		if(((p.remidi+p.nilai)/2)<m.kkm and p.remidi >= m.kkm,m.kkm,((p.remidi+p.nilai)/2))),2) as pmp, 
		round(avg(if(e.remidi=0,e.nilai,
		if(((e.remidi+e.nilai)/2)<m.kkm and e.remidi >= m.kkm,m.kkm,((e.remidi+e.nilai)/2)))),2) as rata, 
		round(((0.8*avg(if(e.remidi=0,e.nilai,
		if(((e.remidi+e.nilai)/2)<m.kkm and e.remidi >= m.kkm,m.kkm,((e.remidi+e.nilai)/2)))))+(0.2*if(p.remidi=0,p.nilai,
		if(((p.remidi+p.nilai)/2)<m.kkm and p.remidi >= m.kkm,m.kkm,((p.remidi+p.nilai)/2))))),2) as akhir 
		from evaluasi e join bab b on(e.idbab=b.idbab)
		join mapel m on(m.idmapel=b.idmapel)
		join pmp p on(p.idmapel=m.idmapel)
		where e.nis='".$_GET['nis']."'
		and p.nis='".$_GET['nis']."'
		and m.idmapel='".$_GET['idmapel']."'
		and e.semester=".$_GET['semester']."
		and p.semester=".$_GET['semester']."
		and b.semester=".$_GET['semester']."
		and e.thnajar='$thnajar'
		and p.thnajar='$thnajar'
		and b.thnajar='$thnajar'
		");
		return $query;
	}
	
	public function nilaiakhir_leger($nis,$idmapel)
	{
	$query=$this->db->query
		("select round(if(p.remidi=0,p.nilai,
		if(((p.remidi+p.nilai)/2)<m.kkm and p.remidi >= m.kkm,m.kkm,((p.remidi+p.nilai)/2))),2) as pmp, 
		round(avg(if(e.remidi=0,e.nilai,
		if(((e.remidi+e.nilai)/2)<m.kkm and e.remidi >= m.kkm,m.kkm,((e.remidi+e.nilai)/2)))),2) as rata, 
		round(((0.8*avg(if(e.remidi=0,e.nilai,
		if(((e.remidi+e.nilai)/2)<m.kkm and e.remidi >= m.kkm,m.kkm,((e.remidi+e.nilai)/2)))))+(0.2*if(p.remidi=0,p.nilai,
		if(((p.remidi+p.nilai)/2)<m.kkm and p.remidi >= m.kkm,m.kkm,((p.remidi+p.nilai)/2))))),2) as akhir 
		from evaluasi e join bab b on(e.idbab=b.idbab)
		join mapel m on(m.idmapel=b.idmapel)
		join pmp p on(p.idmapel=m.idmapel)
		where e.nis='$nis'
		and p.nis='$nis'
		and m.idmapel='$idmapel'
		and e.semester=".$_GET['semester']."
		and p.semester=".$_GET['semester']."
		and b.semester=".$_GET['semester']."
		and e.thnajar='".$_GET['thnajar']."'
		and p.thnajar='".$_GET['thnajar']."'
		and b.thnajar='".$_GET['thnajar']."'
		");
		return $query;
	}
	
	public function guru_remed_siswapmp()
	{
	$thnajar=$this->thnajar();
		$query=$this->db->query
		("select s.nis, s.nama, if(round(r.skorremedi,2)=0,'',round(r.skorremedi,2)) as skor, if(round(r.remidi,2)=0,'',round(r.remidi,2)) as nilai from siswa s
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(ks.idkelas=k.idkelas)
		join pmp r on (s.nis=r.nis)
		join mapel m on(r.idmapel=m.idmapel)
		where r.nilai < m.kkm and k.idkelas='".$_GET['idkelas']."'
		and m.idmapel='".$_GET['idmapel']."' and ks.thnajar='$thnajar' and r.thnajar='$thnajar' and r.semester=".$_GET['semester']."
		");
		return $query;
	}
	
	public function guru_addeval()
	{
	$thnajar=$this->thnajar();
		$nis=$this->input->post('nis');
		$idbab=$this->input->post('idbab');
		$nilai=$this->input->post('nilai');
		$semester=$this->input->post('semester');
		if ($nilai < 0) {
		echo "<script>alert('nilai minimum 0');</script>";
		}
		else if ($nilai > 100) {
		echo "<script>alert('nilai maximum 100');</script>";
		}
		else{
		$query=$this->db->query("select COUNT(*) ro from evaluasi where idbab='$idbab' and nis='$nis' and thnajar='$thnajar' and semester=$semester ");
		foreach ($query->result() as $row){
			if ($row->ro == 0){
				$query=$this->db->query("insert into evaluasi values('',$nilai,'$idbab','$nis',0,'n','n','$thnajar',$semester)");			
			}
			else if($row->ro > 0){
				$kkm=$this->db->query("select kkm from mapel m
				join bab b on(b.idmapel=m.idmapel)
				where b.idbab='$idbab' and b.thnajar='$thnajar'");
				foreach ($kkm->result() as $row){
				if ($nilai >= $row->kkm){
					$query=$this->db->query("update evaluasi set nilai=$nilai, remidi=0 where idbab='$idbab' and nis='$nis' and thnajar='$thnajar' and semester=$semester");
				}
				else{
					$query=$this->db->query("update evaluasi set nilai=$nilai where idbab='$idbab' and nis='$nis' and thnajar='$thnajar' and semester=$semester");
				}
				}
			}
		}
		}
	}
	
	public function guru_addnilai_pmp()
	{
	$thnajar=$this->thnajar();
		$nis=$this->input->post('nis');
		$idmapel=$this->input->post('idmapel');
		$nilai=$this->input->post('nilai');
		$semester=$this->input->post('semester');
		if ($nilai < 0) {
		echo "<script>alert('nilai minimum 0');</script>";
		}
		else if ($nilai > 100) {
		echo "<script>alert('nilai maximum 100');</script>";
		}
		else{
		$query=$this->db->query("select count(*) as ro, nilai from pmp where idmapel='$idmapel' and nis='$nis' and semester='$semester' and thnajar = '$thnajar'");
		foreach ($query->result() as $row){
			if ($row->ro == 0){
				$query=$this->db->query("insert into pmp values('',0,'$idmapel','$nis',0,$nilai,0,'n','n',$semester,'$thnajar')");
			}
			else{
				$kkm=$this->db->query("select kkm from mapel where idmapel='$idmapel'");
				foreach ($kkm->result() as $row){
				if ($nilai >= $row->kkm){
					$query=$this->db->query("update pmp set nilai=$nilai, remidi=0 where idmapel='$idmapel' and nis='$nis' and semester='$semester' and thnajar = '$thnajar'");
				}
				else{
					$query=$this->db->query("update pmp set nilai=$nilai where idmapel='$idmapel' and nis='$nis' and semester='$semester' and thnajar = '$thnajar'");
				}
				}
			}
		}
		}
	}
	
	public function guru_addskor_pmp()
	{
	$thnajar=$this->thnajar();
		$nis=$this->input->post('nis');
		$idmapel=$this->input->post('idmapel');
		$skor=$this->input->post('skor');
		if ($skor < 0) {
		echo "<script>alert('skor minimum 0');</script>";
		}
		else{
		$semester=$this->input->post('semester');
		$query=$this->db->query("select count(*) as ro, skor from pmp where idmapel='$idmapel' and nis='$nis' and semester='$semester' and thnajar = '$thnajar'");
		foreach ($query->result() as $row){
			if ($row->ro == 0){
				$query=$this->db->query("insert into pmp values('',$skor,'$idmapel','$nis',0,0,0,'n','n',$semester,'$thnajar')");
			}
			else {
					$query=$this->db->query("update pmp set skor=$skor where idmapel='$idmapel' and nis='$nis' and semester='$semester' and thnajar = '$thnajar'");
			}
		}
		}
	}
	
	public function guru_remedeval()
	{
	$thnajar=$this->thnajar();
		$nis=$_POST['nis'];
		$idbab=$_POST['idbab'];
		$nilai=$_POST['nilai'];
		$semester=$this->input->post('semester');
		if ($nilai < 0) {
		echo "<script>alert('nilai minimum 0');</script>";
		}
		else if ($nilai > 100) {
		echo "<script>alert('nilai maximum 100');</script>";
		}
		else{
		$query=$this->db->query("update evaluasi set remidi=$nilai where idbab='$idbab' and nis='$nis' and thnajar='$thnajar' and semester=$semester ");
		}
	}
	
	public function guru_skor_remedpmp()
	{
	$thnajar=$this->thnajar();
		$nis=$this->input->post('nis');
		$idmapel=$this->input->post('idmapel');
		$skor=$this->input->post('skor');
		$semester=$this->input->post('semester');
		if ($skor < 0) {
		echo "<script>alert('nilai minimum 0');</script>";
		}
		else{
		$query=$this->db->query("update pmp set skorremedi=$skor where idmapel='$idmapel' and nis='$nis' and semester='$semester' and thnajar = '$thnajar'");
		}
	}
	
	public function guru_nilai_remedpmp()
	{
	$thnajar=$this->thnajar();
		$nis=$this->input->post('nis');
		$idmapel=$this->input->post('idmapel');
		$semester=$this->input->post('semester');
		$nilai=$this->input->post('nilai');
		if ($nilai < 0) {
		echo "<script>alert('nilai minimum 0');</script>";
		}
		else if ($nilai > 100) {
		echo "<script>alert('nilai maximum 100');</script>";
		}
		else{
		$query=$this->db->query("update pmp set remidi=$nilai where idmapel='$idmapel' and nis='$nis' and semester='$semester' and thnajar = '$thnajar'");
		}
	}
	
	public function add_jadremedeval()
	{
		$idbab=$this->input->post('idbab');
		$jad=$this->input->post('jad');
		$jam=$this->input->post('jam');
		$mnt=$this->input->post('mnt');
		
		
		$query=$this->db->query("select COUNT(*) ro from jaremedeval where idbab='$idbab'");
		foreach ($query->result() as $row){
			if ($row->ro == 0){
				$query=$this->db->query("insert into jaremedeval values('','$idbab','$jad','$jam','$mnt')");
			}
			else{
		$query=$this->db->query("update jaremedeval set jadwal='$jad',jam='$jam',mnt='$mnt' where idbab='$idbab'");
		}
		}
	}
	
	public function cekjadeval1()
	{
		$idbab=$this->input->post('idbab');
		$jad=$this->input->post('jad');
		$jam=$this->input->post('jam');
		$mnt=$this->input->post('mnt');
		$query=$this->db->query("select * from jaremedeval j
		join bab b on(j.idbab=b.idbab)
		where b.semester= ".$_GET['semester']."
		and b.idkelas='".$_GET['idkelas']."'
		and j.jadwal='$jad'
		and b.idbab!='$idbab'
		and b.idmapel='".$_GET['idmapel']."'
		");
		return $query->num_rows();
	}
	
	public function cekjadeval3()
	{
		$idbab=$this->input->post('idbab');
		$jad=$this->input->post('jad');
		$jam=$this->input->post('jam');
		$mnt=$this->input->post('mnt');
		$query=$this->db->query("select * from jaremedeval j
		join bab b on(j.idbab=b.idbab)
		where b.semester!= ".$_GET['semester']."
		and b.idkelas='".$_GET['idkelas']."'
		and j.jadwal='$jad'
		");
		return $query->num_rows();
	}
	
	public function cekjadeval4()
	{
		$idbab=$this->input->post('idbab');
		$jad=$this->input->post('jad');
		$jam=$this->input->post('jam');
		$mnt=$this->input->post('mnt');
		$query=$this->db->query("select * from jaremedpmp 
		where idkelas='".$_GET['idkelas']."'
		and jadwal='$jad'
		");
		return $query->num_rows();
	}
	
	public function cekjadeval2()
	{
		$idbab=$this->input->post('idbab');
		$jad=$this->input->post('jad');
		$jam=$this->input->post('jam');
		$mnt=$this->input->post('mnt');
		$waktu=($jam*60)+$mnt;
		$query=$this->db->query("select m.nama mapel, b.nama bab, jam, mnt from jaremedeval j
		join bab b on(j.idbab=b.idbab)
		join mapel m on(b.idmapel=m.idmapel)
		where b.semester = ".$_GET['semester']."
		and b.idkelas = '".$_GET['idkelas']."'
		and j.jadwal = '$jad'
		and b.idmapel !='".$_GET['idmapel']."'
		and if(((jam*60)+mnt-70) < $waktu and $waktu<((jam*60)+mnt+70),1,0)=1");
		
		return $query;
	}
	
	public function cekjadpmp1()
	{
		$idmapel=$this->input->post('idmapel');
		$jad=$this->input->post('jad');
		$idkelas=$this->input->post('idkelas');
		$semester=$this->input->post('semester');
		$jam=$this->input->post('jam');
		$mnt=$this->input->post('mnt');
		$query=$this->db->query("select * from jaremedpmp 
		where semester!= $semester
		and idkelas='$idkelas'
		and jadwal='$jad'
		and idmapel='$idmapel'
		");
		return $query->num_rows();
	}
	
	public function cekjadpmp3()
	{
		$idmapel=$this->input->post('idmapel');
		$jad=$this->input->post('jad');
		$idkelas=$this->input->post('idkelas');
		$semester=$this->input->post('semester');
		$jam=$this->input->post('jam');
		$mnt=$this->input->post('mnt');
		$query=$this->db->query("select * from jaremedpmp 
		where semester!= $semester
		and idkelas='$idkelas'
		and jadwal='$jad'
		");
		return $query->num_rows();
	}
	
	public function cekjadpmp4()
	{
		$idmapel=$this->input->post('idmapel');
		$jad=$this->input->post('jad');
		$idkelas=$this->input->post('idkelas');
		$semester=$this->input->post('semester');
		$jam=$this->input->post('jam');
		$mnt=$this->input->post('mnt');
		$query=$this->db->query("select * from jaremedeval j 
		join bab b on(j.idbab=b.idbab)
		where b.idkelas='$idkelas'
		and j.jadwal='$jad'
		");
		return $query->num_rows();
	}
		
	public function cekjadpmp2()
	{
		$idmapel=$this->input->post('idmapel');
		$jad=$this->input->post('jad');
		$idkelas=$this->input->post('idkelas');
		$semester=$this->input->post('semester');
		$jam=$this->input->post('jam');
		$mnt=$this->input->post('mnt');
		$waktu=($jam*60)+$mnt;
		$query=$this->db->query("select m.nama mapel, jam, mnt from jaremedpmp j
		join mapel m on(m.idmapel=j.idmapel)
		where j.semester= $semester
		and j.idkelas='$idkelas'
		and j.jadwal='$jad'
		and j.idmapel !='$idmapel'
		and if(((jam*60)+mnt-70) < $waktu and $waktu<((jam*60)+mnt+70),1,0)=1");
		
		return $query;
	}
	
	public function add_jadremedpmp()
	{
		$idmapel=$this->input->post('idmapel');
		$jad=$this->input->post('jad');
		$idkelas=$this->input->post('idkelas');
		$semester=$this->input->post('semester');
		$jam=$this->input->post('jam');
		$mnt=$this->input->post('mnt');
		$query=$this->db->query("select COUNT(*) ro from jaremedpmp where idmapel='$idmapel' and idkelas ='$idkelas' and semester=$semester");
		foreach ($query->result() as $row){
			if ($row->ro == 0){
				$query=$this->db->query("insert into jaremedpmp values('','$idkelas','$idmapel','$jad',$semester,'$jam','$mnt')");
			}
			else{
		$query=$this->db->query("update jaremedpmp set jadwal='$jad',jam='$jam',mnt='$mnt' where idmapel='$idmapel' and idkelas ='$idkelas' and semester=$semester");
		}
		}
	}
	
	public function jadwalremed_eval()
	{
		$idbab=$this->input->post('idbab');
		$query='';
		if ($idbab != null or $_GET['idbab'] == null){
		$query=$this->db->query
		("select jadwal,jam,mnt from jaremedeval
		where idbab='$idbab'");
		}
		else {
		$query=$this->db->query
		("select jadwal,jam,mnt from jaremedeval
		where idbab='".$_GET['idbab']."'");
		}
		return $query;
	}
	
	public function kelas_jadwalremed_eval()
	{
		
		$query=$this->db->query
		("select j.*,b.nama, m.nama mapel from jaremedeval j
		join bab b on(b.idbab=j.idbab)
		join mapel m on(m.idmapel=b.idmapel)
		where b.idkelas='".$_GET['idkelas']."'
		and b.semester='".$_GET['semester']."'");
		
		return $query;
	}
	
	public function kelas_jadwalremed_pmp()
	{
		$query=$this->db->query
		("select j.*, m.nama from jaremedpmp j
		join mapel m on(m.idmapel=j.idmapel)
		where j.idkelas='".$_GET['idkelas']."'
		");
		return $query;
	}
	
	public function all_jadwalremed_eval()
	{
	
		$semester=$this->input->post('semester');
		$query='';
		if ($semester != null){
		$query=$this->db->query
		("select jadwal,jam,mnt, b.nama, b.idbab 
		from jaremedeval j join bab b on(b.idbab=j.idbab)
		where 
		b.idmapel='".$_GET['idmapel']."'
		and b.idkelas='".$_GET['idkelas']."'
		and b.semester=$semester");
		}
		else if ($_GET['semester']!="''"){
		$query=$this->db->query
		("select jadwal,jam,mnt, b.nama, b.idbab 
		from jaremedeval j join bab b on(b.idbab=j.idbab)
		where 
		b.idmapel='".$_GET['idmapel']."'
		and b.idkelas='".$_GET['idkelas']."'
		and b.semester=".$_GET['semester']."");
		}
		
		return $query;
	}
	
	public function all_jadwalremed_pmp()
	{
	
		$semester=$this->input->post('semester');
		$query='';
		if ($semester != null){
		$query=$this->db->query
		("select jadwal, jam, mnt from jaremedpmp
		where idmapel='".$_GET['idmapel']."' and idkelas='".$_GET['idkelas']."' and semester=$semester");
		}
		else if ($_GET['semester'] != "''"){
		$query=$this->db->query
		("select jadwal, jam, mnt from jaremedpmp
		where idmapel='".$_GET['idmapel']."' and idkelas='".$_GET['idkelas']."' and semester=".$_GET['semester']."");
		}
		return $query;
	}
	
	public function jadwalremed_pmp()
	{
		$query=$this->db->query
		("select jadwal, jam, mnt from jaremedpmp
		where idmapel='".$_GET['idmapel']."' and idkelas='".$_GET['idkelas']."' and semester=".$_GET['semester']."");
		return $query;
	}
	
	//menu nilai siswa (wakel)
	public function wali_pilihkelas()
	{
		$thnajar=$this->thnajar();
		$id=$this->session->userdata('username');
		$query=$this->db->query("select distinct k.*,w.thnajar from kelas k
		join wali w on(w.idkelas=k.idkelas)
		join guru g on(g.nip=w.nip)
		join user u on(u.username=w.username)
		where w.username='$id' and w.thnajar='$thnajar'");
		return $query;
	}
	
	public function wali_pilihmapel()
	{
		$thnajar=$this->thnajar();
		$query=$this->db->query("select distinct m.* from mapel m 
		join bab b on(b.idmapel=m.idmapel)
		join kelas k on(k.idkelas=b.idkelas) 
		where k.idkelas='".$_GET['idkelas']."' and b.thnajar='$thnajar' and b.semester=".$_GET['semester']."");
		return $query;
	}
	
	public function wali_laporan_mapel()
	{
		$thnajar=$this->thnajar();
		$id=$this->session->userdata('username');
		$query=$this->db->query("select distinct m.nama mapel, m.idmapel, k.nama kelas, k.idkelas from mapel m 
		join bab b on(b.idmapel=m.idmapel)
		join kelas k on(k.idkelas=b.idkelas)
		where k.idkelas='".$_GET['idkelas']."' and b.semester=".$_GET['semester']." and b.thnajar='$thnajar'");
		return $query;
	}
		
	public function wali_addsikap()
	{
		$thnajar=$this->thnajar();
		$nomer=$this->input->post('nomer');
		$nis=$this->input->post('nis');
		$semester=$this->input->post('semester');
		$pil=$this->input->post('pil1');
		$query=$this->db->query("select COUNT(*) ro from sikap where nomer=$nomer and nis='$nis' and semester=$semester and thnajar='$thnajar'");
		foreach ($query->result() as $row){
			if ($row->ro == 0){
				$query=$this->db->query("insert into sikap values('','$nis',$nomer,'$pil',$semester,'$thnajar')");			
			}
			else{
				$query=$this->db->query("update sikap set pil='$pil' where nomer=$nomer and nis='$nis' and semester=$semester and thnajar='$thnajar'");
			}
		}
	}
	
	public function wali_ceksikap()
	{
		$thnajar=$this->thnajar();
		$query=$this->db->query("select * from sikap where nis='".$_GET['nis']."' and semester =".$_GET['semester']."
		and thnajar='$thnajar'");
		return $query;
	}
	
	public function wali_laporanpmp()
	{
		$thnajar=$this->thnajar();
		$query=$this->db->query("select s.nis, s.nisn, s.nama siswa, round(p.skor,2) as skor, round(p.nilai,2) as nilai from pmp p 
		join siswa s on(s.nis=p.nis)
		join mapel m on(m.idmapel=p.idmapel)
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(k.idkelas=ks.idkelas)
		where m.idmapel='".$_GET['idmapel']."' and k.idkelas='".$_GET['idkelas']."'
		and ks.thnajar='$thnajar' and p.semester=".$_GET['semester']." and p.thnajar='$thnajar'
		");
		return $query;
	}
		
	public function wali_babdkn()
	{
		$thnajar=$this->thnajar();
		$query=$this->db->query
		("select distinct b.kd, m.ki, m.kkm, b.idbab
		from bab b 
		join mapel m on(m.idmapel=b.idmapel)
		join kelas k on(b.idkelas=k.idkelas)
		join kelas_siswa ks on(ks.idkelas=k.idkelas)
		where m.idmapel='".$_GET['idmapel']."'
		and b.idkelas='".$_GET['idkelas']."'
		and b.semester=".$_GET['semester']."
		and ks.thnajar='$thnajar'
		and b.thnajar='$thnajar'
		");
		return $query;
	}
	
	public function wali_evaldkn($nis,$bab)
	{
		$thnajar=$this->thnajar();
		$query=$this->db->query
		("select distinct round(if(e.remidi=0,e.nilai,
		if(((e.remidi+e.nilai)/2)<m.kkm and e.remidi >= m.kkm,m.kkm,((e.remidi+e.nilai)/2))),2) as nilai 
		from evaluasi e join bab b on(e.idbab=b.idbab)
		join mapel m on(m.idmapel=b.idmapel)
		where m.idmapel='".$_GET['idmapel']."'
		and e.nis='$nis'
		and b.idbab='$bab'
		and b.thnajar='$thnajar'
		and b.semester=".$_GET['semester']."
		and e.thnajar='$thnajar'
		and e.semester=".$_GET['semester']."
		");
	
	return $query;
	}
	
	public function wali_dknindeks($nis)
	{
		$thnajar=$this->thnajar();
		$query=$this->db->query
		("select count(round(if(e.remidi=0,e.nilai,
		if(((e.remidi+e.nilai)/2)<m.kkm and e.remidi >= m.kkm,m.kkm,((e.remidi+e.nilai)/2))),2)) as x from evaluasi e join bab b on(e.idbab=b.idbab) join mapel m on(m.idmapel=b.idmapel) where m.idmapel='".$_GET['idmapel']."' 
		and b.semester=".$_GET['semester']."
		and e.semester=".$_GET['semester']."
		and e.nis='$nis' 
		and round(if(e.remidi=0,e.nilai,
		if(((e.remidi+e.nilai)/2)<m.kkm and e.remidi >= m.kkm,m.kkm,((e.remidi+e.nilai)/2))),2) < m.kkm
		and e.thnajar='$thnajar' 
		and b.thnajar='$thnajar'
		");
		return $query;
	}
	
	public function wali_akhirdkn($nis)
	{
		$thnajar=$this->thnajar();
		$query=$this->db->query
		("select round(if(p.remidi=0,p.nilai,
		if(((p.remidi+p.nilai)/2)<m.kkm and p.remidi >= m.kkm,m.kkm,((p.remidi+p.nilai)/2))),2) as pmp, 
		round(avg(if(e.remidi=0,e.nilai,
		if(((e.remidi+e.nilai)/2)<m.kkm and e.remidi >= m.kkm,m.kkm,((e.remidi+e.nilai)/2)))),2) as rata, 
		round(((0.8*avg(if(e.remidi=0,e.nilai,
		if(((e.remidi+e.nilai)/2)<m.kkm and e.remidi >= m.kkm,m.kkm,((e.remidi+e.nilai)/2)))))+(0.2*if(p.remidi=0,p.nilai,
		if(((p.remidi+p.nilai)/2)<m.kkm and p.remidi >= m.kkm,m.kkm,((p.remidi+p.nilai)/2))))),2) as akhir 
		from evaluasi e join bab b on(e.idbab=b.idbab)
		join mapel m on(m.idmapel=b.idmapel)
		join pmp p on(p.idmapel=m.idmapel)
		where e.nis='$nis'
		and p.nis='$nis'
		and m.idmapel='".$_GET['idmapel']."'
		and p.semester=".$_GET['semester']."
		and b.semester=".$_GET['semester']."
		and e.semester=".$_GET['semester']."
		and p.thnajar='$thnajar'
		and e.thnajar='$thnajar'
		and b.thnajar='$thnajar'
		");
		return $query;
	}
	
	public function wali_mapelrapor()
	{
		$thnajar=$this->thnajar();
		$query=$this->db->query
		("select distinct m.idmapel, m.nama, m.kkm 
		from evaluasi e 
		join bab b on(e.idbab=b.idbab)
		join mapel m on(m.idmapel=b.idmapel)
		join pmp p on(p.idmapel=m.idmapel)
		where e.nis='".$_GET['nis']."'
		and p.nis='".$_GET['nis']."' 
		and b.semester='".$_GET['semester']."'
		and p.semester='".$_GET['semester']."'
		and e.semester='".$_GET['semester']."'
		and p.thnajar='$thnajar'
		and e.thnajar='$thnajar'
		and b.thnajar='$thnajar'
		");
		return $query;
	}
	
	public function wali_nilairapor($mapel)
	{
		$thnajar=$this->thnajar();
		$query=$this->db->query
		("select m.idmapel, m.nama, m.kkm, round(((0.8*avg(if(e.remidi=0,e.nilai,
		if(((e.remidi+e.nilai)/2)<m.kkm and e.remidi >= m.kkm,m.kkm,((e.remidi+e.nilai)/2)))))+(0.2*if(p.remidi=0,p.nilai,
		if(((p.remidi+p.nilai)/2)<m.kkm and p.remidi >= m.kkm,m.kkm,((p.remidi+p.nilai)/2))))),2) as akhir 
		from evaluasi e 
		join bab b on(e.idbab=b.idbab)
		join mapel m on(m.idmapel=b.idmapel)
		join pmp p on(p.idmapel=m.idmapel)
		where e.nis='".$_GET['nis']."'
		and p.nis='".$_GET['nis']."' 
		and m.idmapel='$mapel'
		and b.semester='".$_GET['semester']."'
		and e.semester='".$_GET['semester']."'
		and p.semester='".$_GET['semester']."'
		and p.thnajar='$thnajar'
		and e.thnajar='$thnajar'
		and b.thnajar='$thnajar'
		");
		return $query;
	}
	
	public function ortu_cek_notif()
	{
		$thnajar=$this->thnajar();
		$id=$this->session->userdata('username');
		$query1=$this->db->query
		("select idpmp from pmp p join siswa s on(p.nis=s.nis)
		join ortu o on(o.idortu=s.idortu)
		where o.username='$id' and p.ceknilai='n'
		and p.thnajar='$thnajar'
		");
		$pmp=$query1->num_rows();
		$query2=$this->db->query
		("select ideval from evaluasi e join siswa s on(e.nis=s.nis)
		join ortu o on(o.idortu=s.idortu)
		where o.username='$id' and e.ceknilai='n'
		and e.thnajar='$thnajar'
		");
		$eval=$query2->num_rows();
		$query3=$this->db->query
		("select idpmp from pmp p join siswa s on(p.nis=s.nis)
		join ortu o on(o.idortu=s.idortu)
		where o.username='$id' and p.cekremed='n' and nilai < (select distinct kkm from mapel where idmapel=p.idmapel) and p.remidi > 0
		and p.thnajar='$thnajar'
		");
		$pmpremed=$query3->num_rows();
		$query4=$this->db->query
		("select ideval from evaluasi e join siswa s on(e.nis=s.nis)
		join ortu o on(o.idortu=s.idortu)
		where o.username='$id' and e.cekremed='n' and nilai < (select distinct kkm 
		from mapel m join bab b on(m.idmapel=b.idmapel)
		where b.idbab=e.idbab) and e.remidi > 0
		and e.thnajar='$thnajar'
		");
		$evalremed=$query4->num_rows();
		$cek=$pmp + $eval + $pmpremed + $evalremed;
		if ($cek >0){ 
		return $cek;
		}
	}
	
	public function ortu_notif_remedevaluasi()
	{
		$thnajar=$this->thnajar();
		$id=$this->session->userdata('username');
		$query=$this->db->query
		("select e.ideval, k.idkelas, round(e.remidi,2) as nilai, s.nis, s.nama, m.nama mapel, b.nama bab, m.kkm, b.semester 
		from evaluasi e join siswa s on(e.nis=s.nis)
		join bab b on(b.idbab=e.idbab)
		join mapel m on(m.idmapel=b.idmapel)
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(k.idkelas=ks.idkelas)
		join ortu o on(o.idortu=s.idortu)
		where o.username='$id' and e.nilai < m.kkm and e.cekremed='n' and e.remidi > 0 
		and ks.thnajar='$thnajar' 
		and b.thnajar='$thnajar'
		and e.thnajar='$thnajar'
		LIMIT 1"); 
		return $query;		
	}
	
	public function ortu_allnotif_remedevaluasi()
	{
		$thnajar=$this->thnajar();
		$id=$this->session->userdata('username');
		$query=$this->db->query
		("select e.ideval,k.idkelas, round(e.remidi,2) as nilai, s.nis, s.nama, m.nama mapel, b.nama bab, m.kkm, b.semester 
		from evaluasi e join siswa s on(e.nis=s.nis)
		join bab b on(b.idbab=e.idbab)
		join mapel m on(m.idmapel=b.idmapel)
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(k.idkelas=ks.idkelas)
		join ortu o on(o.idortu=s.idortu)
		where o.username='$id' and e.nilai < m.kkm and e.cekremed='n' and e.remidi > 0 
		and ks.thnajar='$thnajar' 
		and b.thnajar='$thnajar'
		and e.thnajar='$thnajar'
		"); 
		return $query;		
	}
	
	public function ortu_notif_evaluasi()
	{
		$thnajar=$this->thnajar();
		$id=$this->session->userdata('username');
		$query=$this->db->query
		("select e.ideval,k.idkelas, round(e.nilai,2) as nilai, s.nis, s.nama, m.nama mapel, b.nama bab, b.idbab, m.kkm, b.semester 
		from evaluasi e join siswa s on(e.nis=s.nis)
		join bab b on(b.idbab=e.idbab)
		join mapel m on(m.idmapel=b.idmapel)
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(k.idkelas=ks.idkelas)
		join ortu o on(o.idortu=s.idortu)
		where o.username='$id' and e.ceknilai='n' 
		and ks.thnajar='$thnajar' 
		and b.thnajar='$thnajar'
		and e.thnajar='$thnajar'
		LIMIT 1"); 
		return $query;		
	}
	
	public function ortu_allnotif_evaluasi()
	{
		$thnajar=$this->thnajar();
		$id=$this->session->userdata('username');
		$query=$this->db->query
		("select e.ideval, k.idkelas, round(e.nilai,2) as nilai, s.nis, s.nama, m.nama mapel, b.nama bab, b.idbab, m.kkm, b.semester 
		from evaluasi e join siswa s on(e.nis=s.nis)
		join bab b on(b.idbab=e.idbab)
		join mapel m on(m.idmapel=b.idmapel)
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(k.idkelas=ks.idkelas)
		join ortu o on(o.idortu=s.idortu)
		where o.username='$id' and e.ceknilai='n'
		and ks.thnajar='$thnajar' 
		and b.thnajar='$thnajar'
		and e.thnajar='$thnajar'
		"); 
		return $query;		
	}
	
	public function ortu_notif_pmp()
	{
		$thnajar=$this->thnajar();
		$id=$this->session->userdata('username');
		$query=$this->db->query
		("select e.idpmp, k.idkelas, round(e.nilai,2) as nilai, s.nis, s.nama, m.nama mapel, m.kkm, m.idmapel, e.semester 
		from pmp e join siswa s on(e.nis=s.nis)
		join mapel m on(m.idmapel=e.idmapel)
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(k.idkelas=ks.idkelas)
		join ortu o on(o.idortu=s.idortu)
		where o.username='$id' and e.ceknilai='n' 
		and ks.thnajar='$thnajar' 
		and e.thnajar='$thnajar'
		LIMIT 1"); 
		return $query;		
	}
	
	public function ortu_allnotif_pmp()
	{
		$thnajar=$this->thnajar();
		$id=$this->session->userdata('username');
		$query=$this->db->query
		("select e.idpmp, k.idkelas, round(e.nilai,2) as nilai, s.nis, s.nama, m.nama mapel, m.kkm, m.idmapel, e.semester 
		from pmp e join siswa s on(e.nis=s.nis)
		join mapel m on(m.idmapel=e.idmapel)
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(k.idkelas=ks.idkelas)
		join ortu o on(o.idortu=s.idortu)
		where o.username='$id' and e.ceknilai='n' 
		and ks.thnajar='$thnajar' 
		and e.thnajar='$thnajar'
		"); 
		return $query;		
	}
	
	public function ortu_notif_remedpmp()
	{
		$thnajar=$this->thnajar();
		$id=$this->session->userdata('username');
		$query=$this->db->query
		("select e.idpmp, k.idkelas, round(e.remidi,2) as nilai, s.nis, s.nama, m.nama mapel, m.kkm, e.semester
		from pmp e join siswa s on(e.nis=s.nis)
		join mapel m on(m.idmapel=e.idmapel)
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(k.idkelas=ks.idkelas)
		join ortu o on(o.idortu=s.idortu)
		where o.username='$id' and e.cekremed='n' and e.nilai < m.kkm and e.remidi > 0 
		and ks.thnajar='$thnajar' 
		and e.thnajar='$thnajar'
		LIMIT 1"); 
		return $query;		
	}
	
	public function ortu_allnotif_remedpmp()
	{
		$thnajar=$this->thnajar();
		$id=$this->session->userdata('username');
		$query=$this->db->query
		("select e.idpmp, k.idkelas, round(e.remidi,2) as nilai, s.nis, s.nama, m.nama mapel, m.kkm, e.semester
		from pmp e join siswa s on(e.nis=s.nis)
		join mapel m on(m.idmapel=e.idmapel)
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on(k.idkelas=ks.idkelas)
		join ortu o on(o.idortu=s.idortu)
		where o.username='$id' and e.cekremed='n' and e.nilai < m.kkm and e.remidi > 0 
		and ks.thnajar='$thnajar' 
		and e.thnajar='$thnajar'
		"); 
		return $query;		
	}
	
	public function notif_evaluasi_read()
	{
		$id=$this->session->userdata('username');
		$query=$this->db->query
		("update evaluasi set ceknilai ='y' where ideval='".$_GET['ideval']."'"); 
		return $query;
	}
	
	public function notif_remedevaluasi_read()
	{
		$id=$this->session->userdata('username');
		$query=$this->db->query
		("update evaluasi set cekremed ='y' where ideval='".$_GET['ideval']."'"); 
		return $query;
	}
	
	public function notif_pmp_read()
	{
		$id=$this->session->userdata('username');
		$query=$this->db->query
		("update pmp set ceknilai ='y' where idpmp='".$_GET['idpmp']."'"); 
		return $query;
	}
	
	public function notif_remedpmp_read()
	{
		$id=$this->session->userdata('username');
		$query=$this->db->query
		("update pmp set cekremed ='y' where idpmp='".$_GET['idpmp']."'"); 
		return $query;
	}
	
	public function ortu_pilih_anak($thnajar)
	{
		$id=$this->session->userdata('username');
		
		$query=$this->db->query
		("select s.*, k.nama as nama_kelas from siswa s 
		join kelas_siswa ks on(ks.nis=s.nis)
		join kelas k on (k.idkelas=ks.idkelas)
		join ortu o on(o.idortu=s.idortu)
		where o.username='$id' and ks.thnajar='$thnajar'");
		return $query;
	}
	
	public function ortu_pilih_mapel($thnajar,$semester)
	{
		
		if ($_GET['semester'] == "x"){
		$query=$this->db->query("select distinct m.*, b.semester from mapel m
		join bab b on(m.idmapel=b.idmapel)
		join kelas k on(k.idkelas=b.idkelas)
		join kelas_siswa ks on(ks.idkelas=k.idkelas)
		join siswa s on(s.nis=ks.nis)
		where s.nis='".$_GET['nis']."' and b.semester='".$_POST['semester']."' and b.thnajar='".$_GET['thnajar']."'");
		}
		else{
		$query=$this->db->query("select distinct m.*, b.semester from mapel m
		join bab b on(m.idmapel=b.idmapel)
		join kelas k on(b.idkelas=k.idkelas)
		join kelas_siswa ks on(k.idkelas=ks.idkelas)
		join siswa s on(ks.nis=s.nis)
		where s.nis='".$_GET['nis']."' and b.semester='".$semester."' and b.thnajar='".$thnajar."'");
		}
		return $query;
	}
	
	public function ortu_jadwaleval($thnajar)
	{
		$query=$this->db->query
		("select distinct j.jadwal, j.jam, j.mnt, b.semester, b.nama, m.nama mapel from jaremedeval j join bab b on(j.idbab=b.idbab)
		join evaluasi e on(e.idbab=b.idbab)
		join kelas k on(k.idkelas=b.idkelas)
		join kelas_siswa ks on(ks.idkelas=k.idkelas)
		join mapel m on(m.idmapel=b.idmapel)
		where e.nis='".$_GET['nis']."' and ks.nis='".$_GET['nis']."' and e.nilai < m.kkm and ks.thnajar='$thnajar'
		and e.thnajar='$thnajar'");
		return $query;
	}
	
	public function ortu_jadwalpmp($thnajar)
	{
		$query=$this->db->query
		("select distinct j.jadwal, j.jam, j.mnt, j.semester, m.nama from jaremedpmp j 
		join mapel m on(m.idmapel=j.idmapel)
		join pmp p on(p.idmapel=m.idmapel)
		join kelas k on(k.idkelas=j.idkelas)
		join kelas_siswa ks on(ks.idkelas=k.idkelas)
		where ks.nis='".$_GET['nis']."' and p.nis='".$_GET['nis']."' and p.nilai < m.kkm and ks.thnajar='$thnajar'
		and p.thnajar='$thnajar'");
		return $query;
	}
	
	public function ortu_thnajar()
	{
		$query=$this->db->query
		("select distinct b.thnajar from bab b
			join kelas k on(b.idkelas=k.idkelas)
			join kelas_siswa ks on(ks.idkelas=k.idkelas)
			join siswa s on(s.nis=ks.nis)
		where s.nis='".$_GET['nis']."'");
		return $query;
	}
	
	public function ortu_semester()
	{
	error_reporting(0);
	if ($_GET['thnajar'] == "x"){
		$query=$this->db->query
		("select distinct b.semester from bab b
			join kelas k on(b.idkelas=k.idkelas)
			join kelas_siswa ks on(ks.idkelas=k.idkelas)
			join siswa s on(s.nis=ks.nis)
		where s.nis='".$_GET['nis']."' and b.thnajar='".$_POST['thnajar']."'");
	
	}
	else{
	$query=$this->db->query
		("select distinct b.semester from bab b
			join kelas k on(b.idkelas=k.idkelas)
			join kelas_siswa ks on(ks.idkelas=k.idkelas)
			join siswa s on(s.nis=ks.nis)
		where s.nis='".$_GET['nis']."' order by b.semester asc");
	}
	return $query;
	}
	
	public function ortu_nilaiakhir()
	{
		$query=$this->db->query
		("select round(if(p.remidi=0,p.nilai,
		if(((p.remidi+p.nilai)/2)<m.kkm and p.remidi >= m.kkm,m.kkm,((p.remidi+p.nilai)/2))),2) as pmp, 
		round(avg(if(e.remidi=0,e.nilai,
		if(((e.remidi+e.nilai)/2)<m.kkm and e.remidi >= m.kkm,m.kkm,((e.remidi+e.nilai)/2)))),2) as rata, 
		round(((0.8*avg(if(e.remidi=0,e.nilai,
		if(((e.remidi+e.nilai)/2)<m.kkm and e.remidi >= m.kkm,m.kkm,((e.remidi+e.nilai)/2)))))+(0.2*if(p.remidi=0,p.nilai,
		if(((p.remidi+p.nilai)/2)<m.kkm and p.remidi >= m.kkm,m.kkm,((p.remidi+p.nilai)/2))))),2) as akhir 
		from evaluasi e join bab b on(e.idbab=b.idbab)
		join mapel m on(m.idmapel=b.idmapel)
		join pmp p on(p.idmapel=m.idmapel)
		where e.nis='".$_GET['nis']."'
		and p.nis='".$_GET['nis']."'
		and m.idmapel='".$_GET['idmapel']."'
		and e.semester=".$_GET['semester']."
		and p.semester=".$_GET['semester']."
		and e.thnajar='".$_GET['thnajar']."'
		and p.thnajar='".$_GET['thnajar']."'
		");
		return $query;
	}
	
	public function upload_eval()
	{
	$thnajar=$this->thnajar();
	$idbab=$_POST['idbab'];
	$semester=$this->input->post('semester');
	if (isset($_POST['submit'])) {//Script akan berjalan jika di tekan tombol submit..
	$handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	$query=$this->db->query("select COUNT(*) ro from evaluasi where idbab='$idbab' and nis='$data[0]' and thnajar='$thnajar' and semester=$semester ");
	
		foreach ($query->result() as $row){
			if ($row->ro == 0){
				 $import=$this->db->query("INSERT into evaluasi (ideval,nis,idbab,nilai,remidi,ceknilai,cekremed,thnajar,semester) values('','$data[0]','$idbab',$data[2],0,'n','n','$thnajar',$semester)");			
			}
			else if($row->ro > 0){
				$kkm=$this->db->query("select kkm from mapel m
				join bab b on(b.idmapel=m.idmapel)
				where b.idbab='$idbab' and b.thnajar='$thnajar'");
				foreach ($kkm->result() as $row){
				if ($data[2] >= $row->kkm){
					$query=$this->db->query("update evaluasi set nilai=$data[2], remidi=0 where idbab='$idbab' and nis='$data[0]' and thnajar='$thnajar' and semester=$semester");
				}
				else{
					$query=$this->db->query("update evaluasi set nilai=$data[2] where idbab='$idbab' and nis='$data[0]' and thnajar='$thnajar' and semester=$semester");
				}
				}
			}
		}
	}
	
	fclose($handle); //Menutup CSV file
    }
	else 
	{ 
	
	} mysql_close(); //Menutup koneksi SQL
	}
	
	public function upload_pmp()
	{
	$thnajar=$this->thnajar();
	$idmapel=$_POST['idmapel'];
	$semester=$this->input->post('semester');
	if (isset($_POST['submit'])) {//Script akan berjalan jika di tekan tombol submit..
	$handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	$query=$this->db->query("select count(*) as ro, nilai from pmp where idmapel='$idmapel' and nis='$data[0]' and semester='$semester' and thnajar = '$thnajar'");
	
		foreach ($query->result() as $row){
			if ($row->ro == 0){
				$import=$this->db->query("INSERT into pmp (idpmp,nis,idmapel,skor,nilai,skorremedi,remidi,ceknilai,cekremed,thnajar,semester) 
				values('','$data[0]','$idmapel',$data[2],$data[3],0,0,'n','n','$thnajar',$semester)");
			}
			else{
				$kkm=$this->db->query("select kkm from mapel where idmapel='$idmapel'");
				foreach ($kkm->result() as $row){
				if ($data[3] >= $row->kkm){
					$query=$this->db->query("update pmp set skor=$data[2], nilai=$data[3], remidi=0 where idmapel='$idmapel' and nis='$data[0]' and semester='$semester' and thnajar = '$thnajar'");
				}
				else{
					$query=$this->db->query("update pmp set skor=$data[2], nilai=$data[3] where idmapel='$idmapel' and nis='$data[0]' and semester='$semester' and thnajar = '$thnajar'");
				}
				}
			}
		}
       
	}
	
	fclose($handle); //Menutup CSV file
    }
	else 
	{ 
	
	} mysql_close(); //Menutup koneksi SQL
	}
	
	public function ceksikap()
	{
		$query=$this->db->query
		("select * from sikap
					where nis='".$_GET['nis']."'
					and semester='".$_GET['semester']."'
					and thnajar='".$_GET['thnajar']."'");
		$cek=$query->num_rows();
		return $cek;
	}
	
	
	//Aplikasi Linmas
	function tambahFoto($nama_file){
        $id = $this->input->post('idp');
        $query = $this->db->query("insert into foto (id_pengguna,nama_foto)"
                . " values ('$id','$nama_file')");
        return $query;
    }
	
	function viewFoto(){
        $query = $this->db->query("select id_pengguna, nama_foto from foto");
        return $query;
    }
}

?>