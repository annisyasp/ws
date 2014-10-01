<?php 
	//koneksi database
	$link = mysql_connect('localhost', 'root','')
	or die ('Could not connect: '.mysql_error()); 
	mysql_select_db ('database nya') or die ('Could not select database');
	
?>