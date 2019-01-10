<?php 
// /htdocs/wlib/html/_includes
function get_base($data,$id){
	
	$wrong_bases = array(12,17,404,410,417,425); // базы, из которых нельзя заказать сканирование
	
	$json = json_decode($data[response],1);
	
	$num = explode('\\\\',$id);
	
	foreach($json[response_0] as $item){
	
		if (array_key_exists('id', $item)) {
			
			if(strpos($item[id], $num[2])){
			
				if(in_array($item[sourceIddb], $wrong_bases)){
				
					return 'false';
				
				}
			}
		}
	}
	
	return 'true';
	
	//return $json[response_0];
}

?>
