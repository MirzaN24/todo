<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Idemooo web";

require_once("rest/dao/TodoDao.class.php");

$dao = new TodoDao();
$results = $dao->getAll();
print_r($results);

?>
