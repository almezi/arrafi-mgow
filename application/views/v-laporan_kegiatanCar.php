<?php $this->load->model('m_katu'); $peg = ($this->m_katu->get_pegawai_by_username($this->session->userdata('username'))); ?>
                        
<script>
    function search(){
        var a = $('#bln').val();
        // var c  = $('#thn').val();
        $.ajax({
            url:"http://localhost/arrafi/index.php/c_arAdmin/displayLaporanKegiatanTable/"+a,
            success:function(data){
                // alert(data);
                $('#dt-keg').html(data);
               // $('#cetak').attr("onClick","window.location = 'http://localhost/ArRafiBR/index.php/c_arAdmin/pdf?<?php echo "nip=".$peg['id_pegawai']."&nama=".$peg['nama']."&" ?>bln="+a+"'")
            }
        });
    }

    function hapus_kegiatan(a){
        $.ajax({
            url:"http://localhost/arrafi/index.php/c_arAdmin/hapusKegiatan/"+a,
            success:function(data){
               search();
            },
            error:function(data){
                alert('Error');
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
                    <h2>Informasi Kegiatan Caraka DI SEKOLAH AR-RAFI <?php echo date("Y-m-d");?></h2>
                    <form role="form" method="post" action="#" enctype="multipart/form-data" >  
                    <div class="form-group">
                                <label>Nama</label>
                                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th><div class="form-group">    
                                <select style="width:200px" class="form-control" name="tugas" id="bln" onchange="search()" required="true">
                                <option value="0">- Please Select -</option>
                                     <?php foreach ($pega->result() as $rw) {?>
                                        <option value="<?php echo $rw->id_pegawai;?>">
                                            <?php echo $rw->nama?>
                                        </option>
                                    <?php }?>
                                   
                                </select>
                                </div>
                                </th>
                            </div>      
                        </form>
					<div class="table-responsive">
						<table class="table table-bordered table-hover">         
                        <tr>
							<th>No</th>
							<th>Tgl Kegiatan</th>
							<th>Nama Kegiatan</th>
							<th>Action</th>
						</tr> 
						<tbody id="dt-keg">
                   
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div> <!-- container -->
	</div> <!-- content -->
</div> <!-- content page -->