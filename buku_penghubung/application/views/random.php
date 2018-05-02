<!DOCTYPE html>
<html>
<head>
<script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/reload.js"></script>
<script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/reload1.js"></script>
<script language="JavaScript">
	setInterval("SANAjax();", 1000 );  // set berapa detik melakukan refresh div

	$(function() {
		SANAjax = function(){
		$('#AutodataDisplay').load("<?php echo base_url(); ?>Random/random.php").fadeIn("slow");  // load berarti melakukan load file
	}
	});
</script>

<script>
      //setTimeout(function() {location.reload() },1000);
</script>

</head>
<body>
<p style="color:Blue;"><?php
$number = rand(1000,10000);
echo $number;
?></p>
</body>
</html>