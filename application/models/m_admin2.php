<?php
class m_admin2 extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
		
	////////////////PRODUK//////////////////
	public function tambah_produk($object){
		return $this->db->insert('produk',$object);
	}
	
	public function detail_produk(){
		$this->db->select('p.nama_produk, p.keterangan, k.nama_kategori, p.modified_date, p.id_produk');
		$this->db->from('produk p');
		$this->db->join('kategori k','p.id_kategori=k.id_kategori');
		return $this->db->get();
	}
	
	//AMBIL SELURUH NAMA KATEGORI
	public function data_nama_kategori(){
		$this->db->select('nama_kategori, id_kategori');
		return $this->db->get("kategori");
	}
	
	//AMBIL SALAH SATU DATA PRODUK
	public function data_produk($primarykey){
		$this->db->where("id_produk",$primarykey);
		return $this->db->get("produk");
	}
	
	public function edit_produk($primarykey,$object){
		$this->db->where("id_produk",$primarykey);
		return $this->db->update("produk",$object);
	}
	
	public function view_detail_produk($primarykey){
		$this->db->select('p.nama_produk, p.keterangan, k.nama_kategori, p.modified_date, p.id_produk');
		$this->db->from('produk p');
		$this->db->join('kategori k','p.id_kategori=k.id_kategori');
		$this->db->where("id_produk",$primarykey);
		return $this->db->get();
	}
	
	public function hapus_produk($id_produk){
		$this->db->where("id_produk",$id_produk);
		return $this->db->delete("produk");
	}
	
	//////////////PRODUK JADWAL///////////////
	public function get_id_produk($nama){
		$this->db->select('id_produk');
		$this->db->where("nama_produk",$nama);
		return $this->db->get("produk");
	}
	
	//AJAX MODAL PRODUK JADWAL VIEW DETAIL
	//AMBIL SALAH SATU DATA PRODUK JADWAL PAKET
	public function data_produk_jadwal_paket($id_produk_jadwal){
		$this->db->where("id_produk_jadwal",$id_produk_jadwal);
		return $this->db->get("produk_jadwal_paket");
	}
	
	//AMBIL SALAH SATU DATA PRODUK JADWAL KEGIATAN
	public function data_produk_jadwal_kegiatan($id_produk_jadwal){
		$this->db->where("id_produk_jadwal",$id_produk_jadwal);
		return $this->db->get("produk_jadwal_kegiatan");
	}
	
	//AMBIL SALAH SATU DATA PRODUK JADWAL BIAYA
	public function data_produk_jadwal_biaya($id_produk_jadwal){
		$this->db->where("id_produk_jadwal",$id_produk_jadwal);
		return $this->db->get("produk_jadwal_biaya");
	}
	
	//AMBIL SALAH SATU DATA PRODUK JADWAL
	public function data_produk_jadwal($id_produk_jadwal){
		$this->db->where("id_produk_jadwal",$id_produk_jadwal);
		return $this->db->get("produk_jadwal");
	}
	
	public function get_id_produk_jadwal($tanggal_awal){
		$this->db->select('id_produk_jadwal');
		$this->db->where("tanggal_awal",$tanggal_awal);
		return $this->db->get("produk_jadwal");
	}
	
	public function tambah_produk_jadwal($object){
		return $this->db->insert('produk_jadwal',$object);
	}
	
	public function tambah_produk_jadwal_paket($object){
		return $this->db->insert('produk_jadwal_paket',$object);
	}
	
	public function tambah_produk_jadwal_kegiatan($object){
		return $this->db->insert('produk_jadwal_kegiatan',$object);
	}
	
	public function tambah_produk_jadwal_biaya($object){
		return $this->db->insert('produk_jadwal_biaya',$object);
	}
	
	public function edit_produk_jadwal($primarykey,$object){
		$this->db->where("id_produk_jadwal",$primarykey);
		return $this->db->update("produk_jadwal",$object);
	}
	
	public function hapus_produk_jadwal_paket($id_produk_jadwal){
		$this->db->where("id_produk_jadwal",$id_produk_jadwal);
		return $this->db->delete("produk_jadwal_paket");
	}
	
	public function hapus_produk_jadwal($id_produk_jadwal){
		$this->db->where("id_produk_jadwal",$id_produk_jadwal);
		return $this->db->delete("produk_jadwal");
	}
	
	public function detail_produk_jadwal($primarykey){
		$this->db->select('tanggal_awal, tanggal_akhir, kuota_awal, id_produk_jadwal');
		$this->db->from('produk_jadwal');
		$this->db->where("id_produk",$primarykey);
		return $this->db->get();
	}
	
	/////////////////////////TRANSAKSI///////////////////
	
	///TRANSAKSI DAFTAR
	public function dropdown_produk($tanggal_today){
		$this->db->select('p.id_produk, p.nama_produk, pj.tanggal_awal');
		$this->db->from('produk p');
		$this->db->join('produk_jadwal pj','p.id_produk=pj.id_produk');
		$this->db->where('pj.tanggal_awal >',$tanggal_today);
		return $this->db->get();
	}
	
	public function dropdown_produk_jadwal($produk=null, $tanggal_today){
		$this->db->select('id_produk_jadwal, tanggal_awal, tanggal_akhir');
 
		if($produk != NULL){
			$this->db->where('id_produk', $produk);
			$this->db->where('tanggal_awal >',$tanggal_today);
		}
 
		$query = $this->db->get('produk_jadwal');
 		$produk_jadwal = array();
 
		if($query->result()){
			foreach ($query->result() as $row1) {
			$produk_jadwal[$row1->id_produk_jadwal] = $row1->tanggal_awal.' s.d. '.$row1->tanggal_akhir;
		}
			return $produk_jadwal;
		}else{
			return FALSE;
		}
	}
	
	public function dropdown_produk_jadwal_paket($produk_jadwal=null){
		$this->db->select('id_produk_jadwal_paket, nama');
 
		if($produk_jadwal != NULL){
			$this->db->where('id_produk_jadwal', $produk_jadwal);
		}
 
		$query = $this->db->get('produk_jadwal_paket');
 		$produk_jadwal_paket = array();
 
		if($query->result()){
			foreach ($query->result() as $row) {
			$produk_jadwal_paket[$row->id_produk_jadwal_paket] = $row->nama;
		}
			return $produk_jadwal_paket;
		}else{
			return FALSE;
		}
	}
	
	public function dropdown_member(){
		$this->db->select('id_member, nama_lengkap');
		$query = $this->db->get('member');
		$produk = array();
 
		if ($query -> result()) {
			foreach ($query->result() as $row) {
				$member[$row -> id_member] = $row -> nama_lengkap;
		}
			return $member;
		} else {
			return FALSE;
		}
	}
	
	public function harga_paket_dinamis($produk_jadwal_paket=null){
		$this->db->select('id_produk_jadwal_paket, harga');
 
		if($produk_jadwal_paket != NULL){
			$this->db->where('id_produk_jadwal_paket', $produk_jadwal_paket);
		}
 
		$query = $this->db->get('produk_jadwal_paket');
		$harga_paket = array();
 
		if($query->result()){
			foreach ($query->result() as $row) {
			$harga_paket['harga'] = $row->harga;
		}
			return $harga_paket;
		}else{
			return FALSE;
		}
	}
	
	public function detail_transaksi(){
		$this->db->select('t.id_transaksi, t.tanggal_transaksi, t.total, t.bayar, t.id_member, m.nama_lengkap, p.nama_produk, t.sisa');
		$this->db->from('produk p');
		$this->db->join('transaksi t','p.id_produk=t.id_produk');
		$this->db->join('member m','t.id_member=m.id_member');
		$this->db->where("batal_flag",'0');
		return $this->db->get();
	}
	
	public function tambah_transaksi_daftar($object){
		return $this->db->insert('transaksi',$object);
	}
	
	public function tambah_transaksi_biaya($object){
		return $this->db->insert('transaksi_biaya',$object);
	}
	
	public function hapus_transaksi_bayar($id_transaksi){
		$this->db->where("id_transaksi",$id_transaksi);
		return $this->db->delete("transaksi_bayar");
	}
	
	public function tambah_transaksi_bayar($object){
		return $this->db->insert('transaksi_bayar',$object);
	}
	
	public function dropdown_member_by_id($id_transaksi){
		$this->db->select('m.id_member, m.nama_lengkap');
		$this->db->from('member m');
		$this->db->join('transaksi t','m.id_member = t.id_member');
		$this->db->where("t.id_transaksi",$id_transaksi);
		$query = $this->db->get();
		$member = array();
 
		if ($query -> result()) {
			foreach ($query->result() as $row) {
				$member[$row -> id_member] = $row -> nama_lengkap;
		}
			return $member;
		} else {
			return FALSE;
		}
	}
	
	public function view_detail_transaksi($id_transaksi){
		$this->db->select('t.id_transaksi, t.id_produk, t.tanggal_transaksi, t.id_produk_jadwal, t.id_produk_jadwal_paket, m.nama_lengkap, p.nama_produk, pj.tanggal_awal, pj.tanggal_akhir, pjp.nama, t.harga_paket, t.harga_lain, t.sub_total, t.diskon, t.total, t.bayar, t.sisa');
		$this->db->from('produk p');
		$this->db->join('produk_jadwal pj','p.id_produk=pj.id_produk');
		$this->db->join('produk_jadwal_paket pjp','pj.id_produk_jadwal=pjp.id_produk_jadwal');
		$this->db->join('transaksi t','pjp.id_produk_jadwal=t.id_produk_jadwal');
		$this->db->join('member m','t.id_member=m.id_member');
		$this->db->where("id_transaksi",$id_transaksi);
		$this->db->limit(1);
		return $this->db->get();
	}
	
	//UPDATE STATUS PEMBATALAN
	public function update_transaksi($id_transaksi,$object){
		$this->db->where("id_transaksi",$id_transaksi);
		return $this->db->update("transaksi",$object);
	}
	
	///TRANSAKSI BAYAR
	public function member_belum_lunas(){
		$this->db->select('t.id_member, m.nama_lengkap');
		$this->db->from('member m');
		$this->db->join('transaksi t','m.id_member = t.id_member');
		$this->db->where('t.total !=','t.bayar');
		$this->db->where('t.batal_flag','0');
		return $this->db->get();
	}
	
	public function hapus_transaksi($id_transaksi){
		$this->db->where("id_transaksi",$id_transaksi);
		return $this->db->delete("transaksi");
	}
	
	public function hapus_produk_jadwal_kegiatan($id_produk_jadwal){
		$this->db->where("id_produk_jadwal",$id_produk_jadwal);
		return $this->db->delete("produk_jadwal_kegiatan");
	}
	
	//AJX TRANSAKSI BAYAR
	public function get_transaksi_by_member($id_member){
		$this->db->select('t.id_transaksi, t.tanggal_transaksi, t.total, t.bayar, p.nama_produk, t.sisa');
		$this->db->from('produk p');
		$this->db->join('transaksi t','p.id_produk=t.id_produk');
		$this->db->where("id_member",$id_member);
		$this->db->limit(1);
		return $this->db->get();
	}
	
	public function get_member_by_member($id_member){
		$this->db->where("id_member",$id_member);
		return $this->db->get("member");
	}
	
	public function get_bayar_by_member($id_transaksi){
		$this->db->where("id_transaksi",$id_transaksi);
		return $this->db->get("transaksi_bayar");
	}
	
	public function get_id_transaksi($tanggal_transaksi, $id_member){
		$this->db->select('id_transaksi');
		$this->db->where("tanggal_transaksi",$tanggal_transaksi);
		$this->db->where("id_member",$id_member);
		return $this->db->get("transaksi");
	}
	
	public function data_transaksi_biaya($id_transaksi){
		$this->db->where("id_transaksi",$id_transaksi);
		return $this->db->get("transaksi_biaya");
	}
	
	public function hapus_transaksi_biaya($id_transaksi){
		$this->db->where("id_transaksi",$id_transaksi);
		return $this->db->delete("transaksi_biaya");
	}
	
	///////////DROPDOWN AJX TRANSAKSI DAFTAR/////////////////
	public function dropdown_produk_jadwal_biaya($id_produk_jadwal){
		$this->db->select('id_produk_jadwal_biaya, keterangan, jumlah');
		$this->db->where('id_produk_jadwal',$id_produk_jadwal);
		$query = $this->db->get('produk_jadwal_biaya');
		$hasil = array();
		foreach($query->result() as $row){
			$hasil[] = array(
				'id_produk_jadwal_biaya' => $row->id_produk_jadwal_biaya,
				'keterangan' => $row->keterangan,
				'jumlah' => $row->jumlah
			);
		}		
		return $hasil;
	}
	
	public function registration_insert($data) {

// Query to check whether username already exist or not
$condition = "user_name =" . "'" . $data['user_name'] . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('user_login', $data);
if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
}

	public function detail_user(){
		$this->db->select('id, user_name, nama_user, user_password, modified_date');
		$this->db->from('user_login');
		return $this->db->get();
	}
	
	public function data_user($id){
		$this->db->select('id, user_name, nama_user, user_password, id_role, modified_date');
		$this->db->from('user_login');
		$this->db->where('id',$id);
		return $this->db->get();
	}
	
	public function edit_user($primarykey,$object){
		$this->db->where("id",$primarykey);
		return $this->db->update("user_login",$object);
	}
	
	public function hapus_user($id){
		$this->db->where("id",$id);
		return $this->db->delete("user_login");
	}
	
	public function tambah_role($object){
		return $this->db->insert('role',$object);
	}
	
	public function get_id_role($nama_role){
		$this->db->select('id_role');
		$this->db->where("nama_role",$nama_role);
		return $this->db->get("role");
	}
	
	public function tambah_akses_role($object){
		return $this->db->insert('role_akses',$object);
	}
	
	public function get_nama_role($id_role){
		$this->db->select('nama_role');
		$this->db->where("id_role",$id_role);
		return $this->db->get("role");
	}
	
	public function detail_role_akses(){
		$this->db->select('r.nama_role, r.id_role, a.nama_aksi, r.status');
		$this->db->from('akses a');
		$this->db->join('role_akses ra','a.id_akses = ra.id_akses');
		$this->db->join('role r','ra.id_role = r.id_role');
		$this->db->order_by('r.nama_role', 'DESC');
		return $this->db->get();
	}
	
	public function hapus_role($id_role){
		$this->db->where("id_role",$id_role);
		return $this->db->delete("role");
	}
	
	public function hapus_role_akses($id_role){
		$this->db->where("id_role",$id_role);
		return $this->db->delete("role_akses");
	}
	
	public function data_role(){
		$this->db->select('nama_role, id_role');
		return $this->db->get("role");
	}
	
	public function ubah_status_role($id_role, $object){
		$this->db->where("id_role",$id_role);
		return $this->db->update("role",$object);
	}
	
	public function data_akses($id_role){
		$sql = "SELECT id_akses, nama_controller, nama_aksi, page, CASE WHEN id_role IS NOT NULL THEN id_role ELSE '0' END id_rolenya 
		FROM akses a
			LEFT JOIN (
				SELECT id_akses as id, id_role FROM role_akses WHERE id_role = ".$id_role."
			) AS ra
		ON a.id_akses = ra.id
			ORDER BY nama_controller DESC;
		";
		return $this->db->query($sql)->result();
	}
	
	public function data_akses2(){
		$this->db->select('id_akses, nama_controller, nama_aksi, page');
		$this->db->from('akses');
		$this->db->order_by('nama_controller', 'DESC');
		return $this->db->get();
	}
	
	public function update_nama_role_user($id_role, $object){
		$this->db->where("id_role",$id_role);
		return $this->db->update("user_login",$object);
	}
	
	public function cek_role($id_role){
		$this->db->select('id_role');
		$this->db->where("id_role",$id_role);
		$query = $this->db->get('user_login');
		if ($query->num_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	
	public function cek_permission_page($user_role, $page){
		
		$this->db->where('id_role',$user_role);
		$this->db->where('page',$page);
		$query = $this->db->get("role_akses");
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	public function get_user_role_by_id($id){
		$this->db->select('user_role');
		$this->db->where('id',$id);
		return $this->db->get("user_login");
	}
	
	public function get_nilai_parameter(){
		$sql ='SELECT nilai_parameter as nilai_parameter2, CASE WHEN nilai_parameter = 1 THEN "dalam dollar" ELSE "dalam rupiah" END nilai_parameter FROM parameter';
		return $this->db->query($sql);
	}
	
	//GERI
		function simpan_kategori($data){
		$this->db->insert('kategori',$data);
		return $this->db->insert_id();
	}

	function simpan_pesan($data){
		$this->db->insert('pesan',$data);
		return $this->db->insert_id();
	}

	public function get_table($select,$from){
		$this->db->select($select);
		$this->db->from($from);
		
		$query = $this->db->get();
		return $query->result();
	}

	function insert_one_table($table_name,$data){
		$this->db->insert($table_name,$data);
		return $this->db->insert_id();
	}
	function update_one_table($var,$primary_key,$table_name,$data){
		$this->db->where($var,$primary_key);
		$this->db->update($table_name,$data);
	}

	function simpan_kategori_checklist($data){
		$this->db->insert('kategori_ceklist',$data);
	}
	function delete($table_name,$var,$get_id){
		$this->db->delete($table_name, array( $var => $get_id));
    }

    public function get_table_where($select,$from,$where){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}
	public function get_table_where_manyrow($select,$from,$where){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}
	function update_kategori_ceklist($data){
		$this->db->insert('kategori_ceklist',$data);
		
	}
	public function join_onetable_nonwhere($select,$from,$join,$condition){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->join($join,$condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function join_onetable_where($select,$from,$join,$condition,$where){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->join($join,$condition,'left outer');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}
	public function join_onetable_where_nonleft($select,$from,$join,$condition,$where){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->join($join,$condition);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	public function join_two_table($select,$from,$join,$condition,$join1,$condition1){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->join($join,$condition);
		$this->db->join($join1,$condition1);
		$query = $this->db->get();
		return $query->result();
	}

	public function join_two_table_order($select,$from,$join,$condition,$join1,$condition1,$order){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->join($join,$condition);
		$this->db->join($join1,$condition1);
		$this->db->order_by($order,'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function join_two_table_where($select,$from,$join,$condition,$join1,$condition1,$where){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->join($join,$condition);
		$this->db->join($join1,$condition1);
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}

	public function join_two_table_where_manyrow($select,$from,$join,$condition,$join1,$condition1,$where){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->join($join,$condition);
		$this->db->join($join1,$condition1);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	public function join_two_table_where_ljoin($select,$from,$join,$condition,$join1,$condition1,$where){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->join($join,$condition,'left outer');
		$this->db->join($join1,$condition1,'left outer');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	public function join_two_table_2where_ljoin($select,$from,$join,$condition,$join1,$condition1,$where){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->join($join,$condition,'left outer');
		$this->db->join($join1,$condition1,'left outer');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	public function run_query($query){
		$query=$this->db->query($query);
		return $query;
	}
	public function join_three_table($select,$from,$join,$condition,$join1,$condition1,$join2,$condition2){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->join($join,$condition);
		$this->db->join($join1,$condition1);
		$this->db->join($join2,$condition2);
		$query = $this->db->get();
		return $query->result();
	}

	public function join_3table_2where_group($selectA,$fromA,$joinA,$conditionA,$joinB,$conditionB,$joinC,$conditionC,$whereA,$whereB,$group){

		$this->db->select($selectA);
		$this->db->from($fromA);
		$this->db->join($joinA,$conditionA);
		$this->db->join($joinB,$conditionB);
		$this->db->join($joinC,$conditionC);
		$this->db->where($whereA);
		$this->db->where($whereB);
		$this->db->group_by($group);
		$query = $this->db->get();
		return $query->result();
	}	

	public function join_three_table_where_manyrow($select,$from,$joinAA,$conditionAA,$join,$condition,$join1,$condition1,$where){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->join($joinAA,$conditionAA);
		$this->db->join($join,$condition,'left outer');
		$this->db->join($join1,$condition1,'left outer');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_2table_two_where_manyrow($select,$from1,$join1,$condition1,$where1,$where2){
		$this->db->select($select);
		$this->db->from($from1);
		$this->db->join($join1,$condition1);
		$this->db->where($where1);
		$this->db->where($where2);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function hitung_row_transaksi_bayar($id_transaksi){
		$this->db->where('id_transaksi',$id_transaksi);
		$query = $this->db->get('transaksi_bayar');
		if ($query->num_rows()==1) {
			return "1";
		} else 	if ($query->num_rows()==2){
			return "2";
		}else 	if ($query->num_rows()==3){
			return "3";
		}else{
			return "4";
		}
	}
	
	public function detail_laporan($tanggal_awal, $tanggal_akhir, $id_kategori){
		$this->db->select('t.tanggal_transaksi, p.nama_produk, t.bayar, t.batal_jumlah, k.nama_kategori');
		$this->db->from('kategori k');
		$this->db->join('produk p','k.id_kategori=p.id_kategori');
		$this->db->join('transaksi t','p.id_produk=t.id_produk');
		$this->db->where('p.id_kategori',$id_kategori);
		$this->db->where('t.tanggal_transaksi>=',$tanggal_awal);
		$this->db->where('t.tanggal_transaksi<=',$tanggal_akhir);
		return $this->db->get();
	}
	
	public function sum_harga($tanggal_awal, $tanggal_akhir, $id_kategori){
		$this->db->select('SUM(t.bayar+t.batal_jumlah) as total_pendapatan');
		$this->db->from('kategori k');
		$this->db->join('produk p','k.id_kategori=p.id_kategori');
		$this->db->join('transaksi t','p.id_produk=t.id_produk');
		$this->db->where('p.id_kategori',$id_kategori);
		$this->db->where('t.tanggal_transaksi>=',$tanggal_awal);
		$this->db->where('t.tanggal_transaksi<=',$tanggal_akhir);
		return $this->db->get();
	}
	
	public function detail_laporan_lunas($id_produk, $id_produk_jadwal, $status){
		if($id_produk_jadwal=='all' AND $status=='BATAL'){
			$sql = "SELECT DISTINCT t.tanggal_transaksi, p.nama_produk, m.nama_lengkap, t.bayar, t.sisa, CASE WHEN t.sisa=0 THEN 'LUNAS' ELSE 'BELUM LUNAS' END AS status
			FROM member m
			JOIN transaksi t ON m.id_member=t.id_member
			JOIN produk p ON t.id_produk=p.id_produk
			WHERE t.id_produk=".$id_produk." AND t.batal_flag=1";
		}
		if($id_produk_jadwal=='all' AND $status=='LUNAS'){
			$sql = "SELECT t.tanggal_transaksi, p.nama_produk, m.nama_lengkap, t.bayar, t.sisa, CASE WHEN t.sisa=0 THEN 'LUNAS' ELSE 'BELUM LUNAS' END AS status
			FROM member m
			JOIN transaksi t ON m.id_member=t.id_member
			JOIN produk p ON t.id_produk=p.id_produk
			WHERE t.id_produk=".$id_produk." AND t.sisa=0 AND t.batal_flag=0";
		}
		if($id_produk_jadwal=='all' AND $status=='BELUM LUNAS'){
			$sql = "SELECT t.tanggal_transaksi, p.nama_produk, m.nama_lengkap, t.bayar, t.sisa, CASE WHEN t.sisa=0 THEN 'LUNAS' ELSE 'BELUM LUNAS' END AS status
			FROM member m
			JOIN transaksi t ON m.id_member=t.id_member
			JOIN produk p ON t.id_produk=p.id_produk
			WHERE t.id_produk=".$id_produk." AND t.sisa!=0 AND t.batal_flag=0";
		}
		if($id_produk_jadwal!='all' AND $status=='BATAL'){
			$sql = "SELECT t.tanggal_transaksi, p.nama_produk, m.nama_lengkap, t.bayar, t.sisa, CASE WHEN t.sisa=0 THEN 'LUNAS' ELSE 'BELUM LUNAS' END AS status
			FROM member m
			JOIN transaksi t ON m.id_member=t.id_member
			JOIN produk p ON t.id_produk=p.id_produk
			WHERE t.id_produk=".$id_produk." AND t.id_produk_jadwal=".$id_produk_jadwal."  AND t.batal_flag=1";
		}
		if($id_produk_jadwal!='all' AND $status=='LUNAS'){
			$sql = "SELECT t.tanggal_transaksi, p.nama_produk, m.nama_lengkap, t.bayar, t.sisa, CASE WHEN t.sisa=0 THEN 'LUNAS' ELSE 'BELUM LUNAS' END AS status
			FROM member m
			JOIN transaksi t ON m.id_member=t.id_member
			JOIN produk p ON t.id_produk=p.id_produk
			WHERE t.id_produk=".$id_produk." AND t.id_produk_jadwal=".$id_produk_jadwal." AND t.sisa=0  AND t.batal_flag=0";
		}
		if($id_produk_jadwal!='all' AND $status=='BELUM LUNAS'){
			$sql = "SELECT t.tanggal_transaksi, p.nama_produk, m.nama_lengkap, t.bayar, t.sisa, CASE WHEN t.sisa=0 THEN 'LUNAS' ELSE 'BELUM LUNAS' END AS status
			FROM member m
			JOIN transaksi t ON m.id_member=t.id_member
			JOIN produk p ON t.id_produk=p.id_produk
			WHERE t.id_produk=".$id_produk." AND t.id_produk_jadwal=".$id_produk_jadwal." AND t.sisa!=0  AND t.batal_flag=0";
		}
		return $this->db->query($sql);
	}
	
	public function dropdown_produk2(){
		$this->db->select('id_produk, nama_produk');
		return $this->db->get('produk');
	}
	
	public function dropdown_produk_jadwal2($produk=null){
		$this->db->select('id_produk_jadwal, tanggal_awal, tanggal_akhir');
 
		if($produk != NULL){
			$this->db->where('id_produk', $produk);
		}
 
		$query = $this->db->get('produk_jadwal');
 		$produk_jadwal = array();
 
		if($query->result()){
			foreach ($query->result() as $row1) {
			$produk_jadwal[$row1->id_produk_jadwal] = $row1->tanggal_awal.' s.d. '.$row1->tanggal_akhir;
		}
			return $produk_jadwal;
		}else{
			return FALSE;
		}
	}
	
}
?>