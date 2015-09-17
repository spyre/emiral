<?php

include "template.class.php";


$template = new Template;

$template->load("design.html");

$template->replace("title", "My Template Class");

$template->replace("name", "William");

$template->replace("datetime", date("m/d/y"));

$template->publish();

?>