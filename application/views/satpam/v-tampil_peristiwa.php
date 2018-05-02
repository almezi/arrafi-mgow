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
            <h3>Data Peristiwa Sekolah</h3>
        </div>
        <div class="panel-body">
            <div class="row">
          
                <div class="col-lg-12">
                 <?php echo anchor('satpam/display_form_input_peristiwa','<button class="btn btn-primary"><i class="fa fa-plus">&nbsp;<label>Tambah Peristiwa</label></i></button>')?>
                <br><br>
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        Aktivitas Peristiwa Sekolah Ar-Rafi
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>

                   <tr>
                    <th>NO</th>
                    <th>Tgl Kejadian</th>
                    <th>Jam Kejadian</th>
                    <th>Kejadian</th>
                    <th>Bukti / Saksi</th>
                    <th>Deskripsi</th>
                    <th>Video</th>
                    <!-- <th>Foto</th> -->
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>   
                </thead> 
                    <tbody>

                        <?php
                           $no=1;
                            foreach($list_mhsw->result()as $row) {
                            if ($row->status_penyelesaian == 'selesai'){
                        ?> 
            
                    <tr style="background-color:green">   
                    <td> <?php echo $no; ?></td>
                    <td> <?php echo $row->tgl_peristiwa; ?> </td>
                    <td> <?php echo $row->jam_peristiwa; ?></td>
                    <td> <?php echo $row->kejadian; ?></td>
                    <td> <?php echo $row->bukti; ?></td>
                    <td> <?php echo $row->deskripsi; ?></td>
                    <td> <a href="<?php echo base_url().'/video/'.$row->video.'.mp4' ?>" target="_blank"><?php echo $row->video; ?></a></td>

                    <?php  if($row->foto==null){ ?>
                    <td></td>
                    <?php  } else { ?>
                     <td> <img src="<?php  echo base_url().'/'.$row->foto?>" style="width:80px;height:80px"></td>
                    <?php  } ?>

                   <td > 
                        <a href="<?=base_url()?>index.php/satpam/edit_peristiwa/<?=$row->id_peristiwa?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil">Edit</i></a> 
                        
                        </td>
                    <td> 
                       
                        <a href="<?php echo base_url() ?>index.php/satpam/update_status/<?php echo $row->id_peristiwa ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil">Selesai</i></a>
                        </td>
                   
                </tr>

                 <?php
                                }
                                else{
                        ?> 
                        <tr >   
                    <td> <?php echo $no; ?></td>
                    <td> <?php echo $row->tgl_peristiwa; ?> </td>
                    <td> <?php echo $row->jam_peristiwa; ?></td>
                    <td> <?php echo $row->kejadian; ?></td>
                    <td> <?php echo $row->bukti; ?></td>
                    <td> <?php echo $row->deskripsi; ?></td>
                    <td> <a href="<?php echo base_url().'/video/'.$row->video.'.mp4' ?>" target="_blank"><?php echo $row->video; ?></a></td>
                    <?php if($row->foto==null){ ?>
                    <td></td>
                    <?php } else { ?>
                    <td> <img src="<?php echo base_url().'/'.$row->foto?>" style="width:80px;height:80px"></td>
                    <?php } ?>
                   <td > 
                   
                        <a href="<?=base_url()?>index.php/satpam/edit_peristiwa/<?=$row->id_peristiwa?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil">Edit</i></a>
                        
                    
                     </td>
                      <td > 
                   
                        
                        <a href="<?php echo base_url() ?>index.php/satpam/update_status/<?php echo $row->id_peristiwa ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil">Selesai</i></a>
                    
                     </td>
                        
                </tr>
                    
                                 <?php
                                }
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