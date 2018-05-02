
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
					<h4 class="page-title">Upgrade Integrasi</h4>
                </div>
            </div>
			<br>
			<?php echo $this->session->flashdata('pesan');?>
			<div class="panel">
				<div class="panel-body">
<!-- Starting step -->
						
	                	<form id="myForm" enctype="multipart/form-data" data-toggle="validator" id="integrasi_form" class="steps-basic" method="POST" action="<?php echo site_url('admin/simpan_upgrade_integrasi/'.$id_integrasi.'/'.$kode_grup.'/'.str_replace("-","_",strtolower($nama_grup)));?>">
						<h6>Peraturan</h6>
							<fieldset>
							<div class="col-xs-12" style="position: relative; left:-135px;">
									<!-- Members online -->
									<div class="" style="background: #7BCCB5">
										<div class="panel-body">
											<legend class="no-margin" style="text-align:center; color: white;">SOP Upgrade Integrasi Aplikasi SD Ar Rafi</legend>
											<br>
											<p style="color: white;">1. Upgrade aplikasi dilakukan jika terdapat penambahan modul atau pengembangan aplikasi.</p>
											<p style="color: white;">2. Upgrade aplikasi dilakukan jika ada folder aplikasi yang belum diupload, salah upload, atau menambah file aplikasi.</p>
										</div>

										<div class="container-fluid">
											<div id="members-online"></div>
										</div>
									</div>
									<!-- /members online -->
								</div>
							</fieldset>
							<h6>Aplikasi dan User</h6>
							<fieldset align="center"><div class="row" align="center">
							
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
                                                            'required' => true,
															'align' => 'center',
															'value' => $nama_aplikasi
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
                                                            'required' => true,
															'value'=>$deskripsi_aplikasi
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
											<select name="username[]" id="username" class="bootstrap-select" multiple="multiple" required>
											<?php 
											$tamp="";
											foreach($list_user->result() as $rowuser){
												foreach($list_user_integrasi as $user){
													if($rowuser->username == $user->username){
														$tamp=$rowuser->username;
											?>
														<option selected="selected" value="<?php echo $rowuser->username;?>"><?php echo $rowuser->username;?></option>
											<?php
													}
												}
												if($tamp <> $rowuser->username){?>
													<option value="<?php echo $rowuser->username;?>"><?php echo $rowuser->username;?></option>
											<?php	}
												
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
                                                            'required' => true,
															'value' => str_replace("-"," ",strtolower($nama_grup))
                                                        ); 
														echo form_input($attributes);
                                                    ?>
										</div>
										</div>
								</div>
								
								
								
								<div class="row" >
								<div class="col-xs-8">
										<div class="form-group" align="center">
											<label>Nama Modul (Menu)</label>	
											<?php
												$count=1;
												foreach ($list_modul_integrasi as $modul){	
													if($count==1){
											?>											
													<?php 										
												        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 225,
                                                            'name' => 'nama_modul[]',
                                                            'id' => 'nama_modul',
                                                            'required' => true,
															'value' => $modul->nama_modul
                                                        ); 
														echo form_input($attributes);
                                                    ?>	
													<br>
													
												<?php 
													$count++;
												}
												}?>												
										</div>
								</div>
								<?php
									$count=1;
									foreach ($list_modul_integrasi as $modul){	
										if($count==1){
								?>
									<br><br>
										<div>
										<a id="plus_nama_modul" class="btn btn-default waves-effect waves-light" ><i class="icon-plus3"></i></a>	
										</div>
								<?php 
									}	
									$count++;
								}?>
								</div>
								<?php
								$count=1;
									foreach ($list_modul_integrasi as $modul){	
										if($count<>1){?>
											<div class="row">
												<div class="col-xs-8">
													<div class="form-group">
														<input type="text" name="nama_modul[]" value="<?php echo $modul->nama_modul?>" class="form-control" maxlength="225" id="nama_modul" placeholder="Nama Modul" required="1"/>
													</div>
												</div><a id="min_nama_modul" class="btn btn-default waves-effect waves-light"><i class="icon-minus2"></i></a>
											</div>
								<?php }
										$count++;
									}
								?>
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
	$("a#plus_nama_modul").live('click', function(){
		$(".modul-kontainer").append('<div class="row"><div class="col-xs-8"><div class="form-group"><input type="text" name="nama_modul[]" value="" class="form-control" maxlength="225" id="nama_modul" placeholder="Nama Modul" required="1"/></div></div><a id="min_nama_modul" class="btn btn-default waves-effect waves-light"><i class="icon-minus2"></i></a></div>');
	});
	$("a#min_nama_modul").live('click', function(){
		$(this).parent().remove();
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
        }else{
		e.preventDefault(); // <------------------ stop default behaviour of button
		var element = this; 
			$.ajax({
				//url: "http://localhost/arrafi/admin/simpan_upgrade_integrasi/",
				type: "POST",
				data: '',
				dataType: "html",
				success: function (data) {
					if($(element).closest("form").submit()){
						if((nama_aplikasi=='') || (deskripsi_aplikasi=='') || (username=='') || (nama_grup=='')|| (nama_modul=='')){
							alert("Ada field yang kosong"); 
							return false; 
						}
					}else{
						$(element).closest("form").submit();
					}
					 //<------------ submit form
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