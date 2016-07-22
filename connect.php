<?php
	$link = mysql_connect('127.0.0.1:3307', 'root', 'usbw')
		or die('Database selection failed: '.mysql_error());
	mysql_set_charset('utf8');
?>
