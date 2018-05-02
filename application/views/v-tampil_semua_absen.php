<?php $this->load->model('m_katu'); $peg = ($this->m_katu->get_pegawai_by_username($this->session->userdata('username'))); ?>
                        
<script>
    function search(){
        var a = $('#bln').val();
        // var c  = $('#thn').val();
        $.ajax({
            url:"<?php echo base_url()?>index.php/c_arAdmin/filterPeriodeAbsen/"+a,
            success:function(data){
                // alert(data);
                $('#dataKunjungan').html(data);
                //$('#cetak').attr("onClick","window.location = 'http://localhost/ArRafiBR/index.php/c_arAdmin/pdf?<?php echo "nip=".$peg['id_pegawai']."&nama=".$peg['nama']."&" ?>bln="+a+"'")
            }
        });
    }
</script>

<script>

    function searchnama(){
        var a = document.getElementById('tugas').value;
        $.ajax({
            url:"<?php echo base_url()?>index.php/c_arAdmin/filterNamaAbsen/"+a,
            method: 'GET',
            data: { nama: a }, 
            success:function(data){
                // alert(data);
                $('#dataKunjungan').html(data);
                //$('#cetak').attr("onClick","window.location = 'http://localhost/ArRafiBR/index.php/c_arAdmin/pdf?<?php echo "nip=".$peg['id_pegawai']."&nama=".$peg['nama']."&" ?>bln="+a+"'")
            }
        });
    }
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
        <div class="panel-heading">
            <h3>Data Absensi</h3>
        </div>
		<div class="panel-body">
			<form role="form" method="post" action="#" enctype="multipart/form-data" >  			
				<label>Periode</label>
				<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th>
					<div class="form-group">    
						<select style="width:200px" class="form-control" name="tugas" id="bln" onchange="search()" required="true">
							<option value="0">- Please Select -</option>
							<?php foreach ($tgl_absen->result_array() as $row) {?>
							<option value="<?php echo $row['bln_absen'];?>">
								<?php echo $row['bln_absen'];?>
							</option>
							<?php }?>       
						</select>
					</div>
				</th>
				<label>Nama</label>
				<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th>
					<div class="form-group">    
						<select style="width:200px" class="form-control" name="tugas" id="tugas" onchange="searchnama()" required="true">
							<option value="0">- Please Select -</option>
                            <?php foreach ($nama->result_array() as $row) {?>
								<option value="<?php echo $row['nama'];?>">
									<?php echo $row['nama'];?>
								</option>
							<?php }?>      
						</select>
					</div>
				</th>
            </form>
		</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                <?php echo anchor('c_arAdmin/form_ketidakhadiran','<button class="btn btn-primary"><i class="fa fa-plus">&nbsp;<label>Tambah Ketidakhadiran</label></i></button>')?>
                 
                <?php echo anchor('c_arAdmin/form_pergantian','<button class="btn btn-primary"><i class="fa fa-plus">&nbsp;<label>Tambah Pergantian</label></i></button>')?>
                <br><br>
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NP</th> 
                         <th>Nama</th> 
                         <th>Bagian</th>
                        <th>Tanggal</th>
                        <th>Status Presensi</th>
                        <th>Alasan</th>
                    </tr>  
                    <tbody id="dataKunjungan">                               
                                 <?php
                                        $no=1;
                                        foreach($list_mhsw->result()as $row) { 
                                ?> 
            
            
                    <tr>
                        <td> <?php echo $no; ?></td>  
                        <td> <?php echo $row->id_pegawai; ?></td> 
                        <td> <?php echo $row->nama; ?></td>
                         <td> <?php echo $row->bagian; ?></td>
                        <td> <?php echo $row->tgl_absen; ?></td>
                        
                        <td>
                            <label class="radio-inline">
                            <input type="checkbox" name="status" value="Membaca" disabled <?php if($row->status_presensi=='hadir'){echo "checked";} ?>/>Hadir</label>
                            <label class="radio-inline">
                            <input type="checkbox" name="status" value="Membaca" disabled <?php if($row->status_presensi=='sakit'){echo "checked";} ?>/>Sakit</label>
                            <label class="radio-inline">
                            <input type="checkbox" name="status" value="Membaca" disabled <?php if($row->status_presensi=='izin'){echo "checked";} ?>/>Izin</label>
                        </td>
                        <td> <?php echo $row->alasan; ?></td>
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