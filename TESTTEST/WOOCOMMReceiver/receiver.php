<?php

require_once 'logger/Lemn.php';

$lm = new Lemn();

echo 'Lemnul este activ<br/>';

$lm->scrie('----------------------------------------');
$informatiiReq = print_r($_REQUEST, true);
$informatiiGet = print_r($_GET, true);
$informatiiPost = print_r($_POST, true);

$lm->scrie('Informatii REQ: '.$informatiiReq);
$lm->scrie('Informatii GET: '.$informatiiGet);
$lm->scrie('Informatii POST: '.$informatiiPost);

$lm->scrie('HEADERS:');
foreach (getallheaders() as $name => $value) {
	echo "$name: $value\n";
	$lm->scrie($name.': '.$value);
}