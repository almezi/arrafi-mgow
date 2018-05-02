
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
					function validasi() {
						var myForm = document.form;
						var nama = document.getElementById('nama');
						
					
						
						if (!isAlphabet(nama, "Nama hanya boleh diisi dengan huruf")){
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
					//-->
					</script> 
					<div class="col-lg-6" >
						<form role="form" method="post" action="<?php echo site_url()?>/kepala_tu/simpan" enctype="multipart/form-data" >
							<h3 style="margin-left:70px"><label><center>Form Tambah Pegawai</center></label></h3>
							
							<div class="form-group">
								<label for="username">Username</label>
								<input class="form-control" name="username" id="username" placeholder="username" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input class="form-control" name="password" id="password" placeholder="Password" required>
							</div>
							<div class="form-group">
                                <label for="status_user1">Status User</label>
                                <select class="form-control" name="status_user1" id="status_user1" required="true">
				                    <option value="">- Please Select -</option>
				                    <option value="KaTu">KaTu</option>
				                    <option value="caraka">caraka</option>
				                    <option value="satpam">satpam</option>
			                    </select>
                            </div>
							<div class="form-group">
								<label for="id_pegawai">NP </label>
                    			<input type="text" class="form-control" name="id_pegawai" placeholder="Max 10 Character" required>
							</div>
							<div class="form-group">
								<label for="nama">Nama </label>
                   				<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pegawai" required>
							</div>
							<div class="form-group">
								<label for="tgl_lahir">Tgl Lahir </label>
                    			<input type="date" class="form-control" name="tgl_lahir" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
    							<textarea name="alamat" class="form-control" cols="30" rows="6" placeholder="Domisili" required></textarea>
							</div>
							<div class="form-group">
								 <label for="no_hp">No HP </label>
                    			<input name="no_hp" type="number" class="form-control" size="15" maxlength="15" placeholder="Dapat Dihubungi" required>
							</div>
							<div class="form-group">
								<label for="bagian">Bagian </label>
                    			<input type="text" name="bagian" class="form-control" size="15" maxlength="15" placeholder="Bagian Kerja" required>
							</div>
							<div class="form-group">
								<lable> foto </lable>
								<input type="file" class="form-control" placeholder="" name="userfile">
								<h6 style="color:black;">Max Ukuran foto 100kb</h6>
										
							</div>


							<button type="submit" class="btn btn-default" onClick="return validasi()">Simpan</button>
							<button type="reset" class="btn btn-default">Reset</button>&nbsp;&nbsp;&nbsp;&nbsp;
							
						</form>
					</div>
							<!-- /.row -->
						</div>
					</div>