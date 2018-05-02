<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Log In</title>

</head>
<body>
<form action="<?php echo base_url().'mycontroller/login'; ?>" method="post">
	<p><input type="text" name="username" value=""></p>
	<p><input type="password" name="password" value=""></p>
	<p><input type="submit" name="submit" value="Login"></p>
</form>

</body>
</html>