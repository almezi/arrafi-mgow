<!-- 
<div class="row">

                    <div class="col-lg-12">
                        <h2>Bordered Table</h2>
                        <hr color:"#fff000">

                    
                
                    <left>
                        
                        <form class="search" method="post" action="<?php echo base_url()?>index.php/c_arAdmin/cari_pegawai">
                             <input placeholder="Enter text by name" type="text" name="nama" id=""
                             style="width:400px; height:30px; border-radius:6px;">
                            <input type="submit" value="SEARCH" name="search" class="btn btn-primary"/>
                            <td>
                    <?php echo anchor('kepala_tu/form','<button class="btn btn-primary"><i class="fa fa-plus">&nbsp;<label>Tambah Pegawai</label></i></button>')?>
                    </td>
                        </form>
                     </left>
                     </br>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="bootstrap-table">
                               
                                    <tr>
                                        <th>NP</th>
                                        <th>Nama</th>
                                        <th>Tgl Lahir</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Bagian</th>
                                        <th>Foto</th>
                                    </tr>   
                          
                                <?php
                                        $no=1;
                                        foreach($list_mhsw->result()as $row) { 
                                ?>
            
                                    <tr>   
                                        <td> <?php echo $row->id_pegawai; ?></td>
                                        <td> <?php echo $row->nama; ?></td>
                                        <td> <?php echo $row->tgl_lahir; ?></td>
                                        <td> <?php echo $row->alamat; ?></td>
                                        <td> <?php echo $row->no_hp; ?></td>
                                        <td> <?php echo $row->bagian; ?></td>
                                        <td> <image style="height:100px;width:100px;" src="<?php echo base_url();?>/foto/<?php  echo $row->foto;?>" /></td>
                                    </tr>
                    
                                <?php   
                                    $no++;
                                }
                                ?>
                                
                                
                            </table>
                        </div>
                    </div>
        </div>
      

 -->
 <div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Form Data Pegawai</h3>
        </div>
        <div class="panel-body">
            <div class="row">
          
                <div class="col-lg-12">
                <?php echo anchor('kepala_tu/form','<button class="btn btn-primary"><i class="fa fa-plus">&nbsp;<label>Tambah Pegawai</label></i></button>')?>
                <br><br>
                <div class="panel panel-default">
                   

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>

                                  <tr>
                                        <th>NP</th>
                                        <th>Nama</th>
                                        <th>Tgl Lahir</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Bagian</th>
                                        <th>Foto</th>
                                    </tr>   
                                </thead> 
                                <tbody>                               
                                 <?php
                                        $no=1;
                                        foreach($list_mhsw->result()as $row) { 
                                ?>
            
                                    <tr>   
                                        <td> <?php echo $row->id_pegawai; ?></td>
                                        <td> <?php echo $row->nama; ?></td>
                                        <td> <?php echo $row->tgl_lahir; ?></td>
                                        <td> <?php echo $row->alamat; ?></td>
                                        <td> <?php echo $row->no_hp; ?></td>
                                        <td> <?php echo $row->bagian; ?></td>
                                        <td> <image style="height:100px;width:100px;" src="<?php echo base_url();?>/foto/<?php  echo $row->foto;?>" /></td>
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
<script>
<?php if($this->session->flashdata('pesan')!=null) { ?>
$(document).ready(function(){
alert('Terimakasih, Data Tersimpan');
});
<?php } ?>
</script>