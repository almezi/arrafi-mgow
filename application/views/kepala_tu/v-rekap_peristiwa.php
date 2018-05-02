<?php $this->load->model('m_katu'); $peg = ($this->m_katu->get_pegawai_by_username($this->session->userdata('username'))); ?>
                        
<script>
    function search(){
        var b = $('#bln').val();
        // var c  = $('#thn').val();
        $.ajax({
            url:"<?php echo base_url()?>index.php/kepala_tu/filterPeristiwa/"+b,
            success:function(data){
                // alert(data);
                $('#dataPeristiwa').html(data);
                $('#cetak').attr("onClick","window.location = 'http://localhost/arrafi/index.php/kepala_tu/pdf_peristiwa?<?php echo "nip=".$peg['id_pegawai']."&nama=".$peg['nama']."&" ?>bln="+b+"'")
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
			<div class="row">
				<div class="col-lg-12">
					<h2>LAPORAN PERISTIWA DI SEKOLAH AR-RAFI</h2>
                    <form role="form" method="post" action="#" enctype="multipart/form-data" >  
                    <div class="form-group">
                                <label>Bulan</label>
                                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th><div class="form-group">    
                                <select style="width:200px" class="form-control" name="tugas" id="bln" onchange="search()" required="true">
                                <option value="0">- Please Select -</option>
                                     <?php foreach ($tgl_peristiwa->result_array() as $row) {?>
                                        <option value="<?php echo $row['bln_peristiwa'];?>">
                                            <?php echo $row['bln_peristiwa'];?>
                                        </option>
                                    <?php }?>
                                   
                                </select>
                                </div>
                                </th>
                            </div>      
                        </form>
                        <button id="cetak" type="submit" class="btn btn-default" value="" onClick="window.location = 'http://localhost/arrafi/index.php/kepala_tu/pdf_peristiwa?<?php echo "nip=".$peg['id_pegawai']."&nama=".$peg['nama']."&" ?>bln='">Cetak</button>    
                        <?php $tahun=date('Y');?>
                        <!--<a href="http://localhost/arrafi/index.php/Ka_tu/grafikPeristiwa/<?php echo $tahun;?>"><button class="btn btn-default"> Grafik </button></a>-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                
                        <tr>
                        <th>NO</th>
                        <th>Tgl_Peristiwa</th>
                        <th>Jam_Peristiwa</th>
                        <th>Kejadian</th>
                        <th>Bukti</th>
                        <th>Deskripsi</th>
                        <th>Video</th>
                         
                    </tr>  
                    <tbody id="dataPeristiwa">   
					<?php
						$no=1;
						foreach($list_mhsw->result() as $row) { 
					?>
            
                    <tr>   
                    <td> <?php echo $no; ?></td>
                    <td> <?php echo $row->tgl_peristiwa; ?> </td>
                    <td> <?php echo $row->jam_peristiwa; ?></td>
                    <td> <?php echo $row->kejadian; ?></td>
                    <td> <?php echo $row->bukti; ?></td>
                    <td> <?php echo $row->deskripsi; ?></td>
                    <td> <a href="<?php echo base_url().'video/'.$row->video.'.mp4' ?>" target="_blank"><?php echo $row->video; ?></a></td>
					</tr>	
                    
					<?php   
						$no++;
						}
					?>
					</tbody>            
					</table>
                </div>
				</div>
			</div>
		</div> <!-- container -->
	</div> <!-- content -->
</div> <!-- content page -->