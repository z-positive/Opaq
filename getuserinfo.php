<?php
///htdocs/wlib/html/_modules/privat
function getuserinfo($session){
	
	
	
	$handle = fopen(THEHISTORYPATH."/".$session."/user.conf", "r");
	
	while (!feof($handle)) {
		$buffer[] = fgets($handle, 4096);
		
	}
	fclose($handle);
	
	$str = http_build_query($buffer);
	
	
	
	return $str;
}

?>