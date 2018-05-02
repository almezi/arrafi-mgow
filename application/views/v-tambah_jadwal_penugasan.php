<script type="text/javascript" language="javascript">
					function validasi() {
						var myForm = document.form;
						var kode = document.getElementById('kode');
						var nama_matkul = document.getElementById('nama_matkul');
					
						
						if (!isAlphabet(nama_matkul, "Nama mata kuliah hanya boleh diisi dengan huruf")){
							return (false);
						}
						return (true);
					}
						
						/////// Validator \\\\\\
					
						function isNumeric(elem, helperMsg){
							var numericExpression = /^[0-9]+$/;
							if(elem.value.match(numericExpression)){
								return true;
							}else{
								alert(helperMsg);
								elem.focus();
								return false;
							}
						}
						
						function isAlphabet(elem, helperMsg){
							var alphaExp = /^[a-z A-Z]+$/;
							if(elem.value.match(alphaExp)){
								return true;
							}else{
								alert(helperMsg);
								elem.focus();
								return false;
							}
						}
						
						function madeSelection(elem, helperMsg){
							if(elem.value == ""){
								alert(helperMsg);
								elem.focus();
								return false;
							}else{
								return true;
							}
						}
						
						function isAlphanumeric(elem, helperMsg){
							var alphaExp = /^[0-9 a-z A-Z]+$/;
							if(elem.value.match(alphaExp)){
								return true;
							}else{
								alert(helperMsg);
								elem.focus();
								return false;
							}
						}
						
						function emailValidator(elem, helperMsg){
							var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
							if(elem.value.match(emailExp)){
								return true;
							}else{
								alert(helperMsg);
								elem.focus();
								return false;
							}
						}
						
						function getCheckedVal(elem, helperMsg) {
							var element;
							var len = document.form.length;
							var str = "";
							for (i = 0; i < len; i++) {
								element = document.form[i];
								if (element.type == "checkbox") {
									if (element.checked == true) {
										str = str + element.value + "\n";
									}
								}
							}
							if (str.length == 0) {
								alert(helperMsg);
								elem.focus();
								return false;
							}else{
								return true;
							}
						}
</script>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
			<div class="row" >
                <!-- /.panel-heading -->
                <div class="panel-body" >
					<div class="col-lg-6" >
						<form role="form" method="post" action="<?php echo site_url()?>/c_arAdmin/simpan_pembg_tugas" enctype="multipart/form-data" >
							<h3 style="margin-left:70px"><label><center>Form Tambah Jadwal Penugasan</center></label></h3>
							<div class="form-group">
                                 	<label for="nama">Nama </label>
				                    <select class="form-control" name="nama" id="nama" required="true" onchange="getAbsensi()">
				                    <option value="0">- Please Select -</option>
				                   	
				                    <?php foreach($pgw as $row){ ?>
				                    <option value="<?php echo $row->id_pegawai; ?>" ><?php echo $row->nama; ?></option>
				                    <?php } ?>
				                    </select>
                            </div>
							<div class="form-group">
								<label for="tgl_mulai">Tgl Mulai</label>
			                    <input type="hidden" name="id_jadwal" id="id_jadwal">
			                    <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai" onchange="cekdate(this.value)" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="tgl_selesai">Tgl Selesai</label>
			                    <input type="hidden" name="id_jadwal" id="id_jadwal">
			                    <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai" placeholder="" required>
							</div>
							
							<div class="form-group">
								<label>Penugasan</label>
			                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			                    <th><div class="form-group">    
			                    <select class="form-control" name="tugas" id="tugas" required="true">
			                    <option value="">- Please Select -</option>
			                    <option value="Gedung A">Gedung A</option>
			                    <option value="Gedung B">Gedung B</option>
			                    <option value="Gedung C">Gedung C</option>
			                    <option value="Gedung D">Gedung D</option>
			                    <option value="Satpam Pagi">Satpam Pagi</option>
			                    <option value="Satpam Malam">Satpam Malam</option>
			                     <option value="Sopir">Sopir</option>
			                    </select>
			                    </div>
			                    </th>
							</div>
							
							<button type="submit" class="btn btn-default" onClick="return validasi()">Simpan</button>
							<button type="reset" class="btn btn-default">Reset</button>&nbsp;&nbsp;&nbsp;&nbsp;
							
						</form>
					</div>
				</div>
			</div>
		</div> <!-- container -->
	</div> <!-- content -->
</div> <!-- content page -->

<script type="text/javascript" language="javascript">
	function cekdate(tgl) {
		document.getElementById('tgl_selesai').setAttribute("min", tgl);
	}
</script>

<script>
function getAbsensi(){
	var year 		= $("#periode").val().split("-")[0];
	var month 		= $("#periode").val().split("-")[1];
	var id_pegawai 	= $("#nama").val();

	$.get("<?= base_url('index.php/c_arAdmin/getAbsensi') ?>", {year: year, month:month, id_pegawai: id_pegawai}, function(response){
		$("#abs").val($.trim(response));
	});
}
</script>

<script>
<?php if($this->session->flashdata('pesan')!=null) { ?>
$(document).ready(function(){
alert('Terimakasih, Data Tersimpan');
});
<?php } ?>
</script>