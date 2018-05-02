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
            <h3>Data Kunjungan Sekolah</h3>
        </div>
        <div class="panel-body">
            <div class="row">
          
                <div class="col-lg-12">
                <?php echo anchor('satpam/display_form_input_kunjungan','<button class="btn btn-primary"><i class="fa fa-plus">&nbsp;<label>Tambah Kunjungan</label></i></button>')?>
                <br><br>
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        Aktivitas Kunjungan Sekolah Ar-Rafi
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>

                    <tr>
                        <th>NO</th>
                        <th>Tgl_kunjungan</th>
                        <th>Jam_kunjungan</th>
                        <th>Nama</th>
                        <th>Institusi</th>
                         <th>Agenda</th>
                         <th>Aksi</th>
                    </tr>  
                </thead> 
                    <tbody>                               
                        <?php
                           $no=1;
                            foreach($list_mhsw->result()as $row) { 
                        ?> 
            
            
                    <tr>   
                        <td> <?php echo $no ?></td>
                        <td> <?php echo $row->tgl_kunjungan; ?> </td>
                        <td> <?php echo $row->jam_kunjungan; ?></td>
                        <td> <?php echo $row->nama; ?></td>
                        <td> <?php echo $row->institusi; ?></td>
                        <td> <?php echo $row->agenda; ?></td>
                        <td style="width:10px"> 
                        <a href="<?=base_url()?>index.php/satpam/edit_kunjungan/<?=$row->id_kunjungan?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil">Edit</i></a>
                        </td>
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

<script>
<?php if($this->session->flashdata('pesan')!=null) { ?>
$(document).ready(function(){
alert('Terimakasih, Data Tersimpan');
});
<?php } ?>
</script>