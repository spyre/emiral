<?php
Header('Content-type: text/xml');
require_once 'XMLUtil.php';

// TEST

$dao = new XMLUtil();
$prod = new Produs();
$prod->id = 123;
$prod->nume = "Pizza";
$prod->pret = 33.23;

echo $dao->saveOne($prod);