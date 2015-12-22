<?php

class SaveableClass{
	
	public function getFields(){
		$fields = get_object_vars($this);
		var_dump($fields);
		return $fields;
	}
	
	public function generateInsert(){
		$fields = $this->getFields();
		$fieldsQuery = 'INSERT INTO (';
		$valuesQuery = '';
		foreach($fields as $key => $value){
			$fieldsQuery.=$key.',';
			$valuesQuery.= '\''.$value.'\',';
		}
		$fieldsQuery .= ') VALUES('.$valuesQuery.')';
		echo $fieldsQuery;
	}
}