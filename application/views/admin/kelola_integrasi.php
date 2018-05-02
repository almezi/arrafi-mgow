
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
					<div class="row">
						<div class="col-sm-6">
							<div class="m-b-30">
								<a href="<?php echo base_url('admin/tambah_integrasi');?>" class="btn btn-default waves-effect waves-light">
									<i class="fa fa-plus"></i> Tambah Integrasi
								</a>
							</div>
						</div>
					</div>
                              
					<div class="">
						<table class="table table-striped" id="datatable">
							<thead>
								<tr>
									<th>Nama Aplikasi</th>
	                                <th>Group</th>
									<th>Jumlah Modul</th>
									<th>Group User</th>
									<th>Upgrade</th>
									<th>Edit</th>
									<th>Lihat Detail</th>
	                            </tr>
	                        </thead>
							<tbody>
							<?php
								foreach($list_integrasi->result()as $row) { ?>
								<tr class="gradeX">
									<td><?php echo $row->nama_aplikasi;?></td>
									<td><?php echo str_replace("-"," ",strtolower($row->nama_group));?></td>
									<td><?php echo $row->jumlah_modul;?></td>
									<td><?php echo $row->jumlah_user;?></td>
									<td>
										<?php echo anchor('/admin/upgrade_integrasi/'.$row->id_integrasi.'/'.$row->kode_grup.'/'.str_replace("-","_",strtolower($row->nama_group)),
										 '<div class="btn btn-danger waves-effect waves-light">Upgrade</div>');
										?>
									</td>
									<td>
										<?php echo anchor('/admin/edit_integrasi/'.$row->id_integrasi.'/'.$row->kode_grup,
										'<div class="btn btn-success waves-effect waves-light"><i class="fa fa-pencil"></i></div>');
										?>
									</td>
									<td>
										<a id="untuk_modal" href="#"
											data-id-integrasi="<?php echo $row->id_integrasi;?>"
                                            data-nama-aplikasi="<?php echo $row->nama_aplikasi;?>"
                                            data-deskripsi-aplikasi="<?php echo $row->deskripsi_aplikasi;?>"
                                            data-nama-grup="<?php echo $row->nama_group;?>"
											data-created-name="<?php echo $row->created_name;?>"
											data-created-date="<?php echo $row->created_date;?>"
											data-modified-name="<?php echo $row->modified_name;?>"
											data-modified-date="<?php echo $row->modified_date;?>"
											data-kode-grup="<?php echo $row->kode_grup;?>"
                                            data-toggle="modal"
                                            data-target="#lihat_detail_integrasi"
										><div class="btn btn-primary waves-effect waves-light"><i class="fa fa-search-plus" enabled = TRUE ></i></div></a>
										<input type="hidden" name="id_integrasi" value="<?php echo $row->id_integrasi;?>">
									</td>
	                            </tr>
							<?php
								}
							?>
	                        </tbody>
						</table>
					</div>
				</div><!-- end: page -->
			</div> <!-- end Panel -->
			
		</div> <!-- container -->
	</div> <!-- content -->
</div> <!-- content page -->


<!-- ============================================================== -->
<!-- Lihat Detail Integrasi -->
<!-- ============================================================== -->

                <div id="lihat_detail_integrasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" data-parsley-validate novalidate>
                    <div class="modal-dialog"> 
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Detail Data Integrasi</h4>
                            </div>
                            <div class="modal-body">
							<input type="hidden" name="id_integrasi2" value="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Nama Aplikasi</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'nama_aplikasi',
															'rows' => '2',
                                                            'parsley-trigger' => 'change',
															'readonly' => true,
															'value' => ''
                                                        );

                                                         echo form_textarea($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Deskripsi Aplikasi</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'rows' => '5',
                                                            'name' => 'deskripsi_aplikasi',
                                                            'parsley-trigger' => 'change',
                                                            'readonly' => true,
															'value' => ''
                                                        );

                                                        echo form_textarea($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Group</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'nama_group',
                                                            'parsley-trigger' => 'change',
                                                            'required' => true,
															'readonly' => true,
															'value' => ''
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                         </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Modul</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                        <?php
                                                            $attributes = array(
                                                                'name' => 'nama_modul',
                                                                'class' => 'form-control',
                                                                'parsley-trigger' => 'change',
                                                                'readonly' => true,
																'value' => '',
																'row' => 3
                                                            );

                                                             echo form_textarea($attributes);
                                                        ?>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Group User</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                        <?php
                                                            $attributes = array(
                                                                'name' => 'username',
                                                                'class' => 'form-control',
                                                                'parsley-trigger' => 'change',
                                                                'readonly' => true,
																'value' => '',
																'row' => 3
                                                            );

                                                             echo form_textarea($attributes);
                                                        ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Username Pembuat</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'created_name',
                                                            'parsley-trigger' => 'change',
															'readonly' => true,
															'value' => ''
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
								<br>
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Tanggal Dibuat</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'created_date',
                                                            'parsley-trigger' => 'change',
															'readonly' => true,
															'value' => ''
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            <br>
							<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Username Pengubah</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'modified_name',
                                                            'parsley-trigger' => 'change',
															'readonly' => true,
															'value' => ''
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
								<br>
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Tanggal Diubah</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'modified_date',
                                                            'parsley-trigger' => 'change',
															'readonly' => true,
															'value' => ''
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
								<br>
                            <div class="modal-footer">
                             
                            </div>
                        </div>
                    </div>
                </div></div>

<script>
	$('#untuk_modal').live('click',function(e){
		var nama_aplikasi=$(this).data('nama-aplikasi');
		var deskripsi_aplikasi=$(this).data('deskripsi-aplikasi');
		var nama_grup=$(this).data('nama-grup');
		var created_name=$(this).data('created-name');
		var created_date=$(this).data('created-date');
		var modified_name=$(this).data('modified-name');
		var modified_date=$(this).data('modified-date');
		var kode_grup=$(this).data('kode-grup');
		
		$("[name='nama_aplikasi']").val(nama_aplikasi);
		$("[name='deskripsi_aplikasi']").val(deskripsi_aplikasi);
		$("[name='nama_group']").val(nama_grup);
		$("[name='created_name']").val(created_name);
		$("[name='created_date']").val(created_date);
		$("[name='modified_name']").val(modified_name);
		$("[name='modified_date']").val(modified_date);
		
		e.preventDefault(); // <------------------ stop default behaviour of button
		var element = this; 
			$.ajax({
				url: "http://localhost/arrafi/admin/ajax_lihat_integrasi/",
				type: "POST",
				data: 'kode_grup='+kode_grup,
				dataType: "html",
				success: function (data) {
					$("[name='nama_modul']").val(data);
				},
				error: function () {
					alert("An error has occured!!!");
				}
			});
			$.ajax({
				url: "http://localhost/arrafi/admin/ajax_lihat_integrasi2/",
				type: "POST",
				data: 'kode_grup='+kode_grup,
				dataType: "html",
				success: function (data) {
					$("[name='username']").val(data);
				},
				error: function () {
					alert("An error has occured!!!");
				}
			});
});
</script>				
				