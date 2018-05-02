<?php
    if(isset($status)) {
        if($status == 'tersimpan') {
            echo "<script>alert('Pengajuan telah tersimpan');</script>";
        }
    }
?>

<script type="text/javascript" language="javascript">
                    function validasi() {
                        var myForm = document.form;
                        var nama = document.getElementById('nama');
                        
                    
                        
                        if (!isAlphabet(nama, "Nama mata kuliah hanya boleh diisi dengan huruf")){
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
                    */
					 var p =1;
					function tambahBarang(){
					var jml = $('#jumlah').val();
					if(jml<=10){
					for (i=0;i<jml;i++){
					$('#brg').append(
							'<fieldset id="fbrg'+i+'">'+
							'<legend>Barang '+ p++ +' <a href="#" class="btn btn-danger" onclick="hapusBarang('+i+')">Batal</a></legend>'+
							'<div class="form-group">'+
							'<label>Nama Barang</label>'+	
							'<select class="form-control" name="namab[]">'+
							<?php foreach($brg->result() as $br1){?>
							'<option value="<?php echo $br1->kode_barang?>"> <?php echo $br1->nama_barang;?> </barang>'+
							<?php } ?>
							'</select>'+
							'</div>'+
							'<div class="form-group">'+
							'<label>Jumlah Barang</label>'+	
							'<input class="form-control" placeholder="Isi Dengan Angka" type="number"  name="jmlb[]">'+
							'</div>'+
							'<div class="form-group">'+
							'<label>Keterangan</label>'+	
							'<input class="form-control" placeholder="Keterangan Pengajuan" type="text"  name="ketb[]">'+
							'</div>'+
							'</fieldset>');
							}
							}
							else{
							alert('Jumlah Pengajuan Max 10 kali !!');
							}
					}
					
					function hapusBarang(a){
					$('#fbrg'+a).remove();
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
                        <form role="form" method="post" action="<?php echo site_url()?>/c_arCaraka/simpan_pengajuan" enctype="multipart/form-data" >
                            <h3 style="margin-left:70px"><label><center>Form Pengajuan Barang</center></label></h3>
                            
										<div class="form-group">
                                            <label>Tanggal Pengajuan</label>
											<input class="form-control" placeholder="Enter text" type="date" name="tgl_pengajuan">
                                        </div>
										<div class="form-group">
											<label>Jumlah Pengajuan</label>
                                            <input class="form-control" placeholder="Enter text" type="number" id="jumlah" name="jumlah">
											<div><button type="button" class="btn btn-success" style="margin-top:15px;" onclick="tambahBarang()">Tambah</button></div>
										</div>
										<div id="brg">
										
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