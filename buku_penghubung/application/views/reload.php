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
	$(document).ready(function(){
		$('#Get').click(function() {
		$('#div1').load("<?php echo base_url(); ?>Random/random.php").fadeIn("slow");
	});
	});
</script>
</head>
<body>
<div id="AutodataDisplay"><h2>Let jQuery AJAX Change This Text</h2></div>
<div id="div1"><h2>Let j</h2></div>

<button id="Get">Get External Content</button>

</body>
</html>