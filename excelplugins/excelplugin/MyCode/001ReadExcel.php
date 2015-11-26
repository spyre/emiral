<?php
// include 'path/to/PHPExcel/IOFactory.php';
// require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';
require_once dirname(__FILE__) . '/../Classes/PHPExcel/IOFactory.php';

function getSheetAsArray(){
	
	// Let IOFactory determine the spreadsheet format
	$document = PHPExcel_IOFactory::load(dirname(__FILE__).'\000_sample_data.xls');
	
	// Get the active sheet as an array
	$activeSheetData = $document->getActiveSheet()->toArray(null, true, true, true);
	
	// var_dump($activeSheetData);
	return $activeSheetData;
	
}

function getTitles(){
	
	$rownumber = 1;
	
	$document = PHPExcel_IOFactory::load(dirname(__FILE__).'\000_sample_data.xls');
	$row = $document->getActiveSheet()->getRowIterator($rownumber)->current();
	
	$cellIterator = $row->getCellIterator();
	$cellIterator->setIterateOnlyExistingCells(true); // false
	
	$titles = array();
	
	foreach ($cellIterator as $cell) {
		// echo $cell->getValue().'---';
		$titles[] = $cell->getValue();
	}
	return $titles;
}

function displayInfo(){
	echo '<h2>INCLUDE INFO FOR 001ReadExcel.php</h2>';
	echo __FILE__;
	echo '<br/>';
	echo dirname(__FILE__);
	echo '<br/>';
	echo realpath(dirname(__FILE__));
	echo '<br/>';
	
	// 
	echo '<br/><br/><br/>';
}