<?php
require_once "databaseConfig.php";

$mysqli = new \mysqli(HOST, USERNAME, USERPASSWORD, DATABASENAME);
// check connect
if ($mysqli->connect_errno) {
  printf("Error: %s\n", $mysqli->connect_error);
  exit();
}
$selectedID = [];
foreach($_POST as $key => $value) {
  $selectedID[] = $key;
}
$query = "DELETE FROM `products` WHERE `product_id` IN (" . implode(',', array_map('intval', $selectedID)) . ")";
$mysqli->query($query);
$mysqli->close();
//var_dump($_POST);
header( 'Location: /');
