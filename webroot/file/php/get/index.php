<?php
// localhost/index.php?name=Martin
$name = (!$_GET['name']) ? "platipus" : $_GET['name'];
echo "Hello ".$name;
?>
