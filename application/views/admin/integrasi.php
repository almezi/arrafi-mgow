
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">

			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Integrasi</h4>
                </div>
            </div>
			<br>
			<?php echo $this->session->flashdata('pesan');?>
			<div class="panel">
				<div class="panel-body">
<!-- Starting step -->
						
	                	<form id="myForm" enctype="multipart/form-data" data-toggle="validator" id="integrasi_form" class="steps-basic" method="POST" action="simpan_integrasi">
						<h6>Peraturan</h6>
							<fieldset style="position: relative;">
							<div class="col-xs-12" style="position: relative; left:-135px;">
									<!-- Members online -->
									<div class="" style="background: #7BCCB5">
										<div class="panel-body">
											<legend class="no-margin" style="text-align:center; color: white;">SOP Integrasi Aplikasi SD Ar Rafi</legend>
											<br>
											<p style="color: white;">1. Tidak diperkenankan memakai autoload untuk load library dan helper. Hanya boleh di controller.</p>
											<p style="color: white;">2. Semua file view harus disimpan di dalam satu folder dengan ketentuan nama folder pada peraturan ketiga.</p>							
											<p style="color: white;">3. Penulisan nama controller dan nama folder view, sama dengan nama grup (otoritas) yang ditulis dengan huruf kecil. Jika nama tersebut terdiri lebih dari 1 kata, maka dipisah dengan tanda underscore ('_').</p>
											<p style="color: white;">4. Semua file controller disimpan di folder controllers.</p>
											<p style="color: white;">5. Semua file model disimpan di folder models.</p>
											<p style="color: white;">6. Penulisan nama function controller sama dengan nama modul yang ditulis dengan huruf kecil. Jika nama tersebut terdiri lebih dari 1 kata, maka dipisah dengan tanda underscore ('_').</p>
											<p style="color: white;">7. Tidak diperkenankan memakai javascript, css, dan lain-lain (assets) selain dari yang disediakan aplikasi utama. Jika ingin memakai diluar itu, maka hanya boleh mamakai url online.</p>
										</div>

										<div class="container-fluid">
											<div id="members-online"></div>
										</div>
									</div>
									<!-- /members online -->
								</div>
							</fieldset>
							<h6>Aplikasi dan User</h6>
							<fieldset align="center">
							<div class="row" align="center">
									<div class="col-xs-8" align="center">
										<div class="form-group" align="center">
											<label>Nama Aplikasi</label>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 100,
                                                            'name' => 'nama_aplikasi',
                                                            'id' => 'nama_aplikasi',
                                                            'placeholder' => 'Nama Aplikasi',
                                                            'required' => true,
															'align' => 'center'
                                                        );
                                                        echo form_input($attributes);
                                                    ?>
										</div>
									</div>
								</div>
								<div class="row" align="center">
									<div class="col-xs-8">
										<div class="form-group">
											<label>Deskripsi Aplikasi</label>
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 225,
															'rows' => 3,
                                                            'name' => 'deskripsi_aplikasi',
                                                            'id' => 'deskripsi_aplikasi',
                                                            'placeholder' => 'Deskripsi Aplikasi',
                                                            'required' => true
                                                        ); 
                                                        echo form_textarea($attributes);
                                                    ?>
										</div>
									</div>
								</div>
								<div class="row" align="center">
								<div class="col-xs-8">
									<div class="form-group">
										<label>User yang dapat mengakses aplikasi ini</label>
										<div class="multi-select-full">
											<select name="username[]" id="username"  class="bootstrap-select" multiple="multiple" required>
											<?php foreach($list_user->result() as $rowuser){?>
											<option value="<?php echo $rowuser->username;?>"><?php echo $rowuser->username;?></option>
											<?php	
											}
										?>
										</select>
										</div>
		                            </div>
								</div>
							</div>
							</fieldset>

							<h6>Otoritas dan Modul</h6>
							<fieldset>
							<div class="row" align="center">
								<div class="col-xs-8">
										<div class="form-group">
											<label>Nama Group (Otoritas)</label>								
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 225,
                                                            'name' => 'nama_grup',
                                                            'id' => 'nama_grup',
                                                            'placeholder' => 'Nama Group',
                                                            'required' => true
                                                        ); 
														echo form_input($attributes);
                                                    ?>
										</div>
										</div>
								</div>
								<div class="row" >
								<div class="col-md-4" >
										<div class="form-group" align="center">
											<label align="center">Nama Modul (Menu)</label>					
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 225,
                                                            'name' => 'nama_modul[]',
                                                            'id' => 'nama_modul',
                                                            'placeholder' => 'Nama Modul',
                                                            'required' => true
                                                        ); 
														echo form_input($attributes);
                                                    ?>			
										</div>
										
											
								</div>
								<br></br>
								
								<div class="col-md-4" >
										<div class="form-group" align="center">
															
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 225,
                                                            'name' => 'nama_modul[]',
                                                            'id' => 'nama_modul',
                                                            'placeholder' => 'Nama Modul',
                                                            'required' => true
                                                        ); 
														echo form_input($attributes);
                                                    ?>			
										</div>
										
											
								</div>
								<a id="plus_nama_modul" class="btn btn-default waves-effect waves-light"><i class="icon-plus3"></i></a>	
							</div>
								<div class="modul-kontainer"></div>
								
								
							</fieldset>
													
							<h6>Upload Aplikasi</h6>
							<fieldset>
								<div class="row" align="center">
								<div class="col-xs-8">
									<div class="form-group">
										<label>Upload Folder Controller</label>
										<a id="icon_controller"></a>
		                                <?php
                                            $attributes = array(
															'class' => 'file-styled',
                                                            'data-buttonname' => 'btn-primary',
                                                            'name' => 'controller[]',
                                                            'id' => 'controller',
                                                            'type' => 'file',
															'webkitdirectory' => true,
															'directory' => true,
															'multiple' => true
                                                        );
                                            echo form_input($attributes);
                                        ?>
										
		                            </div>
								</div>
								</div>
								<div class="row" align="center">
								<div class="col-xs-8">
									<div class="form-group">
										<label>Upload Folder Model</label>
										<a id="icon_model"></a>
		                                <?php
                                            $attributes = array(
															'class' => 'file-styled',
                                                            'data-buttonname' => 'btn-primary',
                                                            'name' => 'model[]',
                                                            'id' => 'model',
                                                            'type' => 'file',
															'webkitdirectory' => true,
															'directory' => true,
															'multiple' => true
                                                        );
                                            echo form_input($attributes);
											
                                        ?>
		                            </div>
								</div>
								</div>
								<div class="row" align="center">
								<div class="col-xs-8">
									<div class="form-group">
										<label>Upload Folder View</label>
										<a id="icon_view"></a>
		                                <?php
                                            $attributes = array(
															'class' => 'file-styled',
                                                            'data-buttonname' => 'btn-primary',
                                                            'name' => 'view[]',
                                                            'id' => 'view',
                                                            'type' => 'file',
															'webkitdirectory' => true,
															'directory' => true,
															'multiple' => true
                                                        );
                                            echo form_input($attributes);
                                        ?>
		                            </div>
								</div>
								</div>
							</fieldset>
						</form>
						</div> 
	</div>
		  </div> <!-- container -->
	</div> <!-- content -->
</div> <!-- content page -->
		            <!-- /starting step -->
					
<script>
	var clicks = 0;
	$("a#plus_nama_modul").live('click', function(){
	if(clicks < 5){
		$(".modul-kontainer").append('<div class="row"><div class="col-md-4"><div class="form-group"><input type="text" name="nama_modul[]" value="" class="form-control" maxlength="225" id="nama_modul" placeholder="Nama Modul" required="1"/></div></div><div class="col-md-4"><div class="form-group"><input type="text" name="nama_modul[]" value="" class="form-control" maxlength="225" id="nama_modul" placeholder="Nama Modul" required="1"/></div></div><a id="min_nama_modul" class="btn btn-default waves-effect waves-light"><i class="icon-minus2"></i></a></div>');
		clicks++;
	}
	});
	$("a#min_nama_modul").live('click', function(){
		$(this).parent().remove();
		clicks--;
	});
	$("a[href='#finish']").live('click', function(e){
		//alert("yeayyy");
		var controller = $("[name='controller[]']").val();
		var model = $("[name='model[]']").val();
		var view = $("[name='view[]']").val();
		var nama_aplikasi = $("[name='nama_aplikasi']").val();
		var deskripsi_aplikasi = $("[name='deskripsi_aplikasi']").val();
		var username = $("[name='username[]']").val();
		var nama_grup = $("[name='nama_grup']").val();
		var nama_modul = $("[name='nama_modul[]']").val();
        if((controller=='') || (model=='') || (view==''))
        { 
            alert("Silakan upload folder aplikasi"); 
            return false; 
        }else
		if((nama_aplikasi=='') || (deskripsi_aplikasi=='') || (username=='') || (nama_grup=='')|| (nama_modul=='')){
			alert("Ada field yang kosong"); 
            return false; 
		}else{
		e.preventDefault(); // <------------------ stop default behaviour of button
		var element = this; 
			$.ajax({
				//url: "http://localhost/arrafi/admin/tambah_integrasi/",
				type: "POST",
				data: 'nama_aplikasi='+nama_aplikasi,
				dataType: "html",
				success: function (data) {
					$(element).closest("form").submit(); //<------------ submit form
				},
			error: function () {
				alert("An error has occured!!!");
			}
			});
		}
	});
	
	var clicks_controller = 0;
	$("#controller").live('change', function(){
		//alert("yes");
		if(clicks_controller == 0){
			$("a#icon_controller").append('<i id="cek_controller" class="fa fa-check"></i>');
			clicks_controller++;
		}else{
			$('#cek_controller').remove();
            clicks_controller--;
		}
	});
	
	var clicks_model = 0;
	$("#model").live('change', function(){
		if(clicks_model == 0){
			$("a#icon_model").append('<i id="cek_model" class="fa fa-check"></i>');
			clicks_model++;
		}else{
			$('#cek_model').remove();
            clicks_model--;
		}
		
	});
	
	var clicks_view = 0;
	$("#view").live('change', function(){
		if(clicks_view == 0){
			$("a#icon_view").append('<i id="cek_view" class="fa fa-check"></i>');
			clicks_view++;
		}else{
			$('#cek_view').remove();
            clicks_view--;
		}
		
	});
	
	
</script>