<?php
	//header('Content-Type: application/json');
	$info = array('name'=>'pizza', 'price'=>23.45);
	$jsinfo = json_encode($info);
	echo $jsinfo;

?>