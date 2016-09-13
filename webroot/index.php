<?php
/*** include the core.php file ***/
include_once ('../Config/core.php');

$dispatch = new Dispatcher($_SERVER["REQUEST_URI"]);
$dispatch->dispatcher();
?>
