<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
<div class="row">
    <div class="col-lg-12">

        <h2>Kegiatan Kebersihan Harian Caraka</h2>

<?php  if($cekAB->num_rows()>0){ ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">

             <tr>
                <th>Nama Kegiatan</th>

            </tr>   
	<form id="form-cek">
           <?php
		   $a=0;
            foreach($listKegiatan as $row) {  $a++;
                ?>
                <tr>
				<td>
				
				
				<input type="checkbox" name="idk[]" id="idk[]" value="<?php echo $row->id_nama?>" onclick="getCheckboxValues()" <?php echo ($row->check_status=='ada' ? 'checked' : '');?>><?php echo $row->nama_kegiatan?>
				
				</td>
				</tr>
                    
               <?php   
                   
                }
                ?>
				<input type="hidden" nama="p" id="p" value="<?php echo $a?>">
		</form>
            </table>
        </div>
    </div>
    <?php } else { ?>

    	<?php } ?>
</div>
</div> <!-- container -->
</div> <!-- content -->
</div> <!-- content page -->

<script>
function tryMe(source){
    var radio = $(source).find("input");    
    $.post("<?= base_url('index.php/c_arCaraka/simpanKegiatan') ?>", {nama_kegiatan: radio.val()}, function(response){});
}

function saveDetail(){
	var data = $("#form-cek").serialize();
	$.ajax({
	url: "http://localhost/arrafi/index.php/c_arCaraka/simpanKegiatan",
	type:"POST",
	data:data,
	success:function(data){
	 alert('Sukses');
	},
	error:function(data){
	 alert('Error');
	}
	});
}
function getCheckboxValues() {
  var cboxes = document.getElementsByName('idk[]');
    var len = cboxes.length;
	var total = 0;

    for (var i=0; i<len; i++) {
		if (cboxes[i].checked){
			//total = (+total)+(+cboxes[i].value);
			$.ajax({
				url: 'http://localhost/arrafi/index.php/c_arCaraka/simpanKegiatan',
				type: 'post',
				data: 'value='+cboxes[i].value,
				success: function(output){
					//alert('success, server says '+output);
				},
				error: function(){
					//alert('something went wrong, save failed');
				}
			});
		}
		else{
			$.ajax({
				url: 'http://localhost/arrafi/index.php/c_arCaraka/hapusKegiatan',
				type: 'post',
				data: 'value='+cboxes[i].value,
				success: function(output){
					//alert('success, server says '+output);
				},
				error: function(){
					//alert('something went wrong, save failed');
				}
			});
		} 
    }
	//alert(total);
	//document.getElementById('total_pemb').value = total;
}
</script>