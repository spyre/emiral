<?php

class XMLToPhp{
	
	private $content;
	
	public function __construct(){
		echo 'CONSTRUCTING<br/>';
	}
	
	public function setContentXML($xml){
		$this->content = $xml;
	}
	
	public function setContentString($string){
		$xml = simplexml_load_string($string);
		$this->content = $xml;
	}
	
	public function display(){
		print_r($this->content);
	}
	
	public function display2(){
		$namespaces = $this->content->channel->getNamespaces(true);
		print_r($namespaces);
		
		foreach($this->content->channel->item as $item){
			echo '<hr/>';
			$namespaces = $item->getNamespaces(true);
			echo 'NAMESPACES: ';
			print_r($namespaces);
			echo'<br/>ITEM: <br/>';
			print_r($item);
		}
	}
}

$parsator = new XMLToPhp();

$xmlString = '<?xml version="1.0" encoding="UTF-8"?><Request PartnerID="asasdsadsa" Type="TrackSearch"> <TrackSearch> <Title>love</Title>    <Tags> <MainGenre>Blues</MainGenre> </Tags> <Page Number="1" Size="20"/> </TrackSearch> </Request>';
// $xml = simplexml_load_string($xmlString);
$xml = simplexml_load_file('dummy-data.xml');

$parsator->setContentXML($xml);


$parsator->display2();
echo '<hr/>';
echo '<hr/>';
echo '<hr/>';
$parsator->display();


