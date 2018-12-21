<?php
///htdocs/wlib/html/_modules/privat
function getuserinfo($session){
	
	$user_structure = file_get_contents(THEHISTORYPATH."/".$session."/user.conf");
	
	$user_structure = str_replace("\"","'",$user_structure);
	
	return $user_structure;
}

?>