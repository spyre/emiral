<?php
$languages = simplexml_load_file("languages.xml");

foreach ($languages->lang as $lang) {
	printf(
			"<p>%s appeared in %d and was created by %s.</p>",
			$lang["name"],
			$lang->appeared,
			$lang->creator
			);
}

echo '<hr/>';

print_r($languages);

echo '<hr/>';
$dc = $languages->lang[1]->children("http://purl.org/dc/elements/1.1/");
print_r($dc);

echo '<hr/>';

$namespaces = $languages->getNamespaces(true);
print_r($namespaces);

echo '<hr/>';
foreach($languages as $lang){
	
	print_r($lang);
}

