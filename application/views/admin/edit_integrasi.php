
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
					<h4 class="page-title">Edit Integrasi</h4>
                </div>
            </div>
			<br>
			<?php echo $this->session->flashdata('pesan');?>
			<div class="panel">
				<div class="panel-body">
<!-- Starting step -->
						
	                	<form id="myForm" enctype="multipart/form-data" data-toggle="validator" id="integrasi_form" class="steps-basic" method="POST" action="<?php echo site_url('admin/simpan_edit_integrasi/'.$id_integrasi.'/'.$kode_grup);?>">
						<h6>Peraturan</h6>
							<fieldset>
							<div class="col-xs-12" style="position: relative; left:-135px;">
									<!-- Members online -->
									<div class="" style="background: #7BCCB5">
										<div class="panel-body">
											<legend class="no-margin" style="text-align:center; color: white;">SOP Edit Integrasi Aplikasi SD Ar Rafi</legend>
											<br>
											<p style="color: white;">1. Edit integrasi dilakukan jika terdapat perubahan data, misalnya kesalahan penamaan grup, kesalahan jumlah modul dll.</p>
											<p style="color: white;">2. Edit integrasi tidak menangani perubahan folder aplikasi yang telah diupload.</p>
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

								
								
								<div class="row">
								<div class="col-md-4">
										<div class="form-group" align="center">
											<label>Nama Modul (Menu)</label>	
											<?php
												$count=1;
												foreach ($list_modul_integrasi as $modul){	
													if($count % 2==1){
											?>											
													<?php 										
												        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 225,
                                                            'name' => 'nama_modul[]',
                                                            'id' => 'nama_modul',
															'value' => $modul->nama_modul
                                                        ); 
														echo form_input($attributes);
                                                    ?>	
													<br>
													
												<?php 
													
												}
												$count++;
												}
												?>
										</div>
								<!--</div>-->
								
								</div>
								
								<br></br>
								
								<div class="row">
								<div class="col-md-4">
										<div class="form-group" align="center">
											<?php
												$count=1;
												foreach ($list_modul_integrasi as $modul){	
													if($count % 2==0){
											?>											
													<?php 										
												        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 225,
                                                            'name' => 'nama_modul[]',
                                                            'id' => 'nama_modul',
															'value' => $modul->nama_modul
                                                        ); 
														echo form_input($attributes);
                                                    ?>	
													<br>
										<?php	}
												$count++;
												}
												?>
										</div>
								<!--</div>-->
								
								</div>
								
								<?php
									$count=1;
									foreach ($list_modul_integrasi as $modul){	
										if($count==1){
								?>
										<div>
										<a id="plus_nama_modul" class="btn btn-default waves-effect waves-light" ><i class="icon-plus3"></i></a>	
										</div>
								<?php 
									}	
									$count++;
								}?>
								
								
								<div class="modul-kontainer">
								<br></br>
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
	var clicks = 1;
	
	$("a#plus_nama_modul").live('click', function(){
		//alert(clicks);
	
		$(".modul-kontainer").append('<div class="row"><div class="col-md-4"><div class="form-group"><input type="text" name="nama_modul[]" value="" class="form-control" maxlength="225" id="nama_modul" placeholder="Nama Modul" /></div></div><div class="col-md-4"><div class="form-group"><input type="text" name="nama_modul[]" value="" class="form-control" maxlength="225" id="nama_modul" placeholder="Nama Modul" /></div></div><a id="min_nama_modul" class="btn btn-default waves-effect waves-light"><i class="icon-minus2"></i></a></div>');
		clicks++;
	});
	
	$("a#min_nama_modul").live('click', function(){
		$(this).parent().remove();
		clicks--;
	});

	$("a[href='#finish']").live('click', function(e){
		//alert("yeayyy");
		var nama_aplikasi = $("[name='nama_aplikasi']").val();
		var deskripsi_aplikasi = $("[name='deskripsi_aplikasi']").val();
		var username = $("[name='username[]']").val();
		var nama_grup = $("[name='nama_grup']").val();
		var nama_modul = $("[name='nama_modul[]']").val();
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
	});
	

	
	
</script>