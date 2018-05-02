<!--
<script>

    function search(){
        var a = $('#bln').val();
        // var c  = $('#thn').val();
        $.ajax({
            url:"<?php echo base_url()?>index.php/c_arAdmin/filterBulanPengajuan/"+a,
            success:function(data){
                // alert(data);
                $('#TBLPENGAJUAN').html(data);
            }
        });
    }
</script>-->
<div class="row">
<div class="col-lg-12">
   
          <h2>REKAP PENGAJUAN BARANG DI SEKOLAH AR-RAFI</h2>
                    <form role="form" method="post" action="#" enctype="multipart/form-data" >  
                    <div class="form-group">
                                <label>Bulan</label>
                                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th>
                                <div class="form-group">    
                                <!--<select style="width:200px" class="form-control" name="tugas" id="bln" onchange="search()" required="true">
                                <option value="0">- Please Select -</option>
                                    <?php foreach ($bln->result_array() as $row) {?>
                                        <option value="<?php echo $row['bln'];?>">
                                            <?php echo $row['bln'];?>
                                        </option>
                                    <?php }?>
                                </select>-->
                                </div>

                                </th>
                            </div>      
                        </form>
              <div class="table-responsive">
            <div id="TBLPENGAJUAN">
           <table class="table table-striped table-bordered table-hover" >
                                <thead>

                    <tr>
                        <th>NO</th>
                        <th>Id Pengajuan</th>
                        <th>Kode Barang</th>
                        <th>Jumlah Permintaan</th>
                        <th>Keterangan Permintaan</th>
                       
                      
                    </tr>  
                </thead> 

                    <tbody>    
                        <?php
                $no=1;
                foreach($list->result() as $row) { 
            ?>
                     <tr>
                        <td><?php echo $no?></td>
                        <td><?php echo $ls->id_pengajuan?></td>
                        <td><?php echo $ls->kode_barang?></td>
                        <td><?php echo $ls->jumlah_permintaan?></td>
                        <td><?php echo $ls->ket_permintaan?></td>
                         
                        
                    </tr>                         
                        <?php   
                    $no++;
                }
                ?>
                      
                                </tbody>
				<tfoot>

                   <!-- <tr>
                        <th colspan="5">Total Permintaan</th>
                        <th><div id="totalpermintaan"><?php echo $total->total;?></div></th>
                      
                    </tr>  -->
                </tfoot> 
            
                            </table>
                        </div>
                    </div>
                        </div>
                    
                    <!-- /.panel-body -->
           
                
    </div>