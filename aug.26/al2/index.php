<?php
  function __autoload($class_name) {
      require_once $class_name . '.php';
  }
   
  $a = new Test();
  $b = new Image();
?>