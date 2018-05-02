<?php $this->load->model('m_katu'); $peg = ($this->m_katu->get_pegawai_by_username($this->session->userdata('username'))); ?>
                        
<script>
    function search(){
        var a = $('#bln').val();
        // var c  = $('#thn').val();
        $.ajax({
            url:"<?php echo base_url()?>index.php/kepala_tu/filterKunjungan/"+a,
            success:function(data){
                // alert(data);
                $('#dataKunjungan').html(data);
                $('#cetak').attr("onClick","window.location = 'http://localhost/arrafi/index.php/kepala_tu/pdf?<?php echo "nip=".$peg['id_pegawai']."&nama=".$peg['nama']."&" ?>bln="+a+"'")
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
					<h2>LAPORAN KUNJUNGAN DI SEKOLAH AR-RAFI</h2>
                    <form role="form" method="post" action="#" enctype="multipart/form-data" >  
                    <div class="form-group">
                                <label>Bulan</label>
                                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th><div class="form-group">    
                                <select style="width:200px" class="form-control" name="tugas" id="bln" onchange="search()" required="true">
                                <option value="0">- Please Select -</option>
                                     <?php foreach ($tgl_kunjungan->result_array() as $row) {?>
                                        <option value="<?php echo $row['bln_kunjungan'];?>">
                                            <?php echo $row['bln_kunjungan'];?>
                                        </option>
                                    <?php }?>
                                   
                                </select>
                                </div>
                                </th>
                            </div>      
                        </form>
                        <button id="cetak" type="submit" class="btn btn-default" value="" onClick='window.location = "http://localhost/arrafi/index.php/kepala_tu/pdf?<?php echo "nip=".$peg['id_pegawai']."&nama=".$peg['nama']."&" ?>bln="'>Cetak</button>
                        <?php $tahun=date('Y');?>
                        <!--<a href="http://localhost/iqbal/index.php/Ka_tu/grafik/<?php echo "2017";?>"><button class="btn btn-default"> Grafik </button></a>-->
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                
                        <tr>
                        <th>NO</th>
                        <th>Tgl_kunjungan</th>
                        <th>Jam_kunjungan</th>
                        <th>Nama</th>
                        <th>Institusi</th>
                         <th>Agenda</th>
                       
                         
                    </tr> 
                    <tbody id="dataKunjungan">    
					<?php
						$no=1;
						foreach($list_mhsw->result() as $row) { 
					?>
            
                    <tr>   
                        <td> <?php echo $no ?></td>
                        <td> <?php echo $row->tgl_kunjungan; ?> </td>
                        <td> <?php echo $row->jam_kunjungan; ?></td>
                        <td> <?php echo $row->nama; ?></td>
                        <td> <?php echo $row->institusi; ?></td>
                        <td> <?php echo $row->agenda; ?></td>
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