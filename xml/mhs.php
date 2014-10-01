<?php
	//header untuk format xml, jika dihilangkan maka akan berbentuk string
	header ('Content-Type= text/xml; charset=ISO-8859-1');
	include "koneksi.php";
	
	//check for path elements
	$path_params=array();
	$self = $_SERVER['PHP_SELF'];
	$extension = substr  ($self, strlen($self)-3);
	$path =($extension=='php') ? NULL : $_SERVER['PATH_INFO'];
	
	if($path !=null) {
	$path_params = spliti ("/", $path);
	}
	//metode request untuk GET
	
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (isset($path_params [1])&& $path_params[1] != NULL){
		$query = "select nim, nama,alamat, prodi from mahasiswa where nim=$path_param[1]";
	$query - sprintf($query, mysql_real_escape_string($path_params[1]));
	}
	else {
		$query = "select 
		nim,
		nama,
		alamat,
		prodi from mahasiswa";
	}
	$result= mysql_query ($query) or die ('Query failed: '. mysql_error());
	
	echo "<data>";
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "<mahasiswa>";
    foreach ($line as $key => $col_value) {
      echo "<$key>$col_value</$key>";
    }
    echo "</mahasiswa>";
  }
	echo "</data>";
	
	
	mysql_free_result($result);
}

	// metode untuk request delete
	mysql_close($link);
?>