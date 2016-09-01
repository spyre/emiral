<?php
	include 'Clasa.php';
	include 'Test.php';
	
	set_include_path(get_include_path() . PATH_SEPARATOR .'D:/temp2');
	
	$c = new Clasa();
	$c->test();
	
	$t = new Test();
	$t->test2();
	echo '<hr/>';
	echo '-------include path<br/>';
	print_r(get_include_path());
	echo '<hr/>';
	echo '-------include path 2<br/>';
	