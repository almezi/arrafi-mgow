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
            <h3>Pembagian Tugas</h3>
        </div>
        <div class="panel-body">
            <div class="row">
          
                <div class="col-lg-12">
                <?php echo anchor('c_arAdmin/displayform_input_pembg_tugas','<button class="btn btn-primary"><i class="fa fa-plus">&nbsp;<label>Tambah Penugasan</label></i></button>')?>
                <br><br>
                <div class="panel panel-default">
                    

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>

                    <tr>
                        <th>NO</th>
                         <th>Nama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Tugas</th>
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
                        <td> <?php echo $row->nama; ?></td>
                        <td> <?php echo $row->tgl_mulai; ?> </td>
                        <td> <?php echo $row->tgl_selesai; ?></td>
                        <td> <?php echo $row->tugas; ?></td>
                        <td style="width:10px"> 
                        <a href="<?=base_url()?>index.php/c_arAdmin/edit_jadwal/<?=$row->id_jadwal?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil">Edit</i></a>
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
<script>
<?php if($this->session->flashdata('update')!=null) { ?>
$(document).ready(function(){
alert('Terimakasih, Data Terupdate');
});
<?php } ?>
</script>