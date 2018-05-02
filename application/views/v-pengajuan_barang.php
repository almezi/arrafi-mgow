<script>
			$(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true,
                });
            });
            $(document).ready(function() {
                $('#dataTables-example100').DataTable({
                    responsive: true,
                });
            });
</script>
		
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">	
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading" >
										Data Pengajuan Barang
									</div>

									<!-- /.panel-heading -->
									<div class="panel-body">
										<div class="dataTable_wrapper">
											<table class="table table-striped table-bordered table-hover" id="dataTables-example">
												<thead>
													<tr>
														<th>NO</th>
														<th>Nama</th>
														<th>Id pengajuan</th>
														<th>Id detail</th>
														<th>Tgl Pengajuan</th>
														<th>Nama Barang</th>
														<th>Merk Barang</th>
														<th>Jumlah Permintaan</th>
														<th>Aksi</th>
													</tr>  
												</thead> 
												<tbody>                               
												<?php
													$no=1;
													foreach($list->result()as $row) { ?> 
													<tr>
														<?php  if($row->progress==null){ ?>
														<td><?php echo $no?></td>
														<td><?php echo $row->NAMA?></td>
														<td><?php echo $row->ID_PENGAJUAN?></td>
														<td><?php echo $row->IDDETAIL?></td>
														<td><?php echo $row->TGL_PENGAJUAN?></td>
														<td><?php echo $row->NAMA_BARANG?></td>
														<td><?php echo $row->MERK_BARANG?></td>
														<td><?php echo $row->JUMLAH_PERMINTAAN?></td>
														<td><a class="btn btn-success" onclick="upd_progress(<?php echo $row->iddetail; ?>)">Progress</a></td>
														<?php } else{?>
														<td bgcolor="#5cb85c" style="color:white"><?php echo $no?></td>
														<td bgcolor="#5cb85c" style="color:white"><?php echo $row->NAMA?></td>
														<td bgcolor="#5cb85c" style="color:white"><?php echo $row->ID_PENGAJUAN?></td>
														<td bgcolor="#5cb85c" style="color:white"><?php echo $row->IDDETAIL?></td>
														<td bgcolor="#5cb85c" style="color:white"><?php echo $row->TGL_PENGAJUAN?></td>
														<td bgcolor="#5cb85c" style="color:white"><?php echo $row->NAMA_BARANG?></td>
														<td bgcolor="#5cb85c" style="color:white"><?php echo $row->MERK_BARANG?></td>
														<td bgcolor="#5cb85c" style="color:white"><?php echo $row->JUMLAH_PERMINTAAN?></td>
														<td bgcolor="#5cb85c" style="color:white"><a class="btn btn-success" onclick="upd_progress(<?php echo $row->iddetail; ?>)">Progress</a></td>
														<?php }?>
													</tr>
												<?php   
													$no++;
													}
												?>
												</tbody>
											</table>
										</div>
									</div>
								<!-- /.panel-body -->
								</div>
								
								<div class="panel panel-default">
									<div class="panel-heading" >
										Data Pengajuan Barang
									</div>

									<!-- /.panel-heading -->
									<div class="panel-body">
										<div class="dataTable_wrapper">
											<table class="table table-striped table-bordered table-hover" id="dataTables-example100">
												<thead>
													<tr>
														<th>NO</th>
														<th>Nama</th>
														<th>Id pengajuan</th>
														<th>Id detail</th>
														<th>Tgl Pengajuan</th>
														<th>Nama Barang</th>
														<th>Merk Barang</th>
														<th>Jumlah Permintaan</th>
														<th>Tanggal Progres</th>
														<th>Aksi</th>
													</tr>  
												</thead> 
												<tbody>                               
												<?php
													$no=1;
													foreach($list_progress->result()as $row) { 
												?>  
													<tr>
													<?php  if($row->progress==null){ ?>
														<td><?php echo $no?></td>
														<td><?php echo $row->NAMA?></td>
														<td><?php echo $row->ID_PENGAJUAN?></td>
														<td><?php echo $row->IDDETAIL?></td>
														<td><?php echo $row->TGL_PENGAJUAN?></td>
														<td><?php echo $row->NAMA_BARANG?></td>
														<td><?php echo $row->MERK_BARANG?></td>
														<td><?php echo $row->JUMLAH_PERMINTAAN?></td>
														<td><a class="btn btn-success" onclick="upd_progress(<?php echo $row->iddetail; ?>)">Progress</a></td>
														<?php } else if($row->progress!=null && $row->barang_tersedia==null){?>
														<td ><?php echo $no?></td>
														<td ><?php echo $row->NAMA?></td>
														<td ><?php echo $row->ID_PENGAJUAN?></td>
														<td ><?php echo $row->IDDETAIL?></td>
														<td ><?php echo $row->TGL_PENGAJUAN?></td>
														<td ><?php echo $row->NAMA_BARANG?></td>
														<td ><?php echo $row->MERK_BARANG?></td>
														<td ><?php echo $row->JUMLAH_PERMINTAAN?></td>
														<td><?php echo $row->TGL_PROGRES?></td>
														<td ><a class="btn btn-success" onclick="upd_tersedia(<?php echo $row->iddetail; ?>)">Tersedia</a></td>
													<?php }?>
													</tr>
												<?php   
													$no++;
													}
												?>
												</tbody>
											</table>
										</div>
									</div>
								<!-- /.panel-body -->
								</div>
							<!-- /.panel -->
							</div>
						</div> 
					</div>
				</div>
			</div>
		</div> <!-- container -->
	</div> <!-- content -->
</div> <!-- content page -->

<script type="text/javascript">
$(document).ready(function(){

});

function upd_progress(id){
    $.ajax({
        url:"http://localhost/arrafi/index.php/c_arAdmin/getProgress/"+id,
        success:function(data){
             location.reload();
        },
        error:function(data){
            alert('error');
        }
    });
}

function upd_tersedia(id){
    $.ajax({
        url:"http://localhost/arrafi/index.php/c_arAdmin/setKetersediaan/"+id,
        success:function(data){
             location.reload();
        },
        error:function(data){
            alert('error');
        }
    });
}
</script>