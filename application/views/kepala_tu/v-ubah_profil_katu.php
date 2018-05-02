
			<div class="row" >
				<div class="col-lg-12" >					
					<div class="row" >
                <div class="col-lg-12" >
                    <div class="panel panel-default" >
                <!-- /.panel-heading -->
                <div class="panel-body" >
                    <div class="table-responsive" >
                    <script type="text/javascript" language="javascript">
					<!--
					/*function validasi() {
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
					//-->*/
					</script> 
					<div class="col-lg-6" >
						<?php foreach ($list_mhsw->result() as $key => $value) {
						?>
						<form role="form" method="post" action="<?php echo site_url()?>/kepala_tu/edit_profil/<?php echo $value->username;?>" enctype="multipart/form-data" >
							<h3 style="margin-left:70px"><label><center>Form Ubah Pegawai</center></label></h3>
							
							<div class="form-group">
								<label>Username</label>
								<input class="form-control" name="username" id="username" value="<?php echo $value->username;?>" required readonly>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" name="password" id="password" value="<?php echo $value->password;?>" required>
							</div>
							<div class="form-group">
                                <label>Status User</label>
                                <select class="form-control" name="status_user1" id="status_user1" value="<?php echo $value->status;?>" required="true">
				                    <option value="">- Please Select -</option>
				                    <option value="KaTu" <?php echo ($value->status=='KaTu' ? 'selected':'');?>>KaTu</option>
				                    <option value="caraka" <?php echo ($value->status=='caraka' ? 'selected':'');?>>caraka</option>
				                    <option value="satpam" <?php echo ($value->status=='satpam' ? 'selected':'');?>>satpam</option>
			                    </select>
                            </div>
							<div class="form-group">
								<label for="id_pegawai">NP </label>
                    			<input type="text" class="form-control" name="id_pegawai" value="<?php echo $value->id_pegawai;?>" placeholder="" required readonly>
							</div>
							<div class="form-group">
								<label for="nama">Nama </label>
                   				<input type="text" class="form-control" name="nama" value="<?php echo $value->nama;?>" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="tgl_lahir">Tgl Lahir </label>
                    			<input type="text" class="form-control" name="tgl_lahir" value="<?php echo $value->tgl_lahir;?>" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
    							<textarea name="alamat" class="form-control" cols="30" rows="6" value="" required><?php echo $value->alamat;?></textarea>
							</div>
							<div class="form-group">
								 <label for="no_hp">No HP </label>
                    			<input type="text" name="no_hp" class="form-control" size="15" maxlength="15" value="<?php echo $value->no_hp;?>" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="bagian">Bagian </label>
                    			<input type="text" name="bagian" class="form-control" size="15" maxlength="15" value="<?php echo $value->bagian;?>" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="foto">Foto</label>
                    			<input type="file" cols="30" class="form-control" rows="6" name="userfile" value="<?php echo $value->foto;?>" />
							</div>
							
							<button type="submit" class="btn btn-default" onClick="return validasi()">Simpan</button>
							<button type="reset" class="btn btn-default">Reset</button>&nbsp;&nbsp;&nbsp;&nbsp;
							
						</form>
						<?php } ?>
					</div>
							<!-- /.row -->
						</div>
					</div>

