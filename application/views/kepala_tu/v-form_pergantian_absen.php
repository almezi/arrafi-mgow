<script type="text/javascript" language="javascript">
					function validasi() {
						var myForm = document.form;
						var jadwal = document.getElementById('jadwal');
					
						
						if (!madeSelection(jadwal, "Anda belum mempunyai jadwal!")){
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
						<form role="form" method="post" action="<?php echo site_url()?>kepala_tu/simpan_pergantian" enctype="multipart/form-data" >
							<h3 style="margin-left:70px"><label><center>Form Pergantian Presensi</center></label></h3>
							
							<div class="form-group">
								<label for="tgl_tugas">Tgl Tugas</label>
			                    <input type="date" name="tgl_tugas" class="form-control" value="<?php echo date('Y-m-d')?>" readonly="readonly" required>
							</div>
							<div class="form-group">
                                 	<label for="nama">Jadwal Penugasan </label>
                                 	<?php $id_pegawai=$this->session->userdata('kodepeg');?>

                                 	<select class="form-control" name="jadwal" id="jadwal" required>
                                 	<option value="">- Please Select -</option>
				                    <?php foreach($jadwal->result() as $row){ ?>
				                    <option value="<?php echo $row->id_jadwal; ?>" <?= $id_pegawai==$row->id_pegawai ? 'selected="selected"' : '';?>><?php echo $row->tugas; ?></option>
				                    <?php } ?>
				                    </select>
                            </div>
                            <div class="form-group">
                                 	<label for="nama">Nama </label>
				                    <select class="form-control" name="nama" id="nama" required="true" onchange="getAbsensi()">
				                    <option value="0">- Please Select -</option>
				                   	
				                    <?php foreach($pgw as $row){ ?>
				                    <option value="<?php echo $row->id_pegawai; ?>" ><?php echo $row->nama; ?></option>
				                    <?php } ?>
				                    </select>
                            </div>
                            <input type="submit" value="Simpan" class="btn btn-default">
							<button type="reset" class="btn btn-default">Reset</button>&nbsp;&nbsp;&nbsp;&nbsp;
							
						</form>
					</div>
				</div>
			</div>
		</div> <!-- container -->
	</div> <!-- content -->
</div> <!-- content page -->
			
<script>
	<?php if($this->session->flashdata('pesan')!=null) { ?>
		$(document).ready(function(){
			alert('Terimakasih, Data Tersimpan');
		});
	<?php } ?>
</script>

<script>
function getAbsensi(){
	var year 		= $("#periode").val().split("-")[0];
	var month 		= $("#periode").val().split("-")[1];
	var id_pegawai 	= $("#nama").val();

	$.get("<?= base_url('index.php/kepala_tu/getAbsensi') ?>", {year: year, month:month, id_pegawai: id_pegawai}, function(response){
		$("#abs").val($.trim(response));
	});
}
</script>