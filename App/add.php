<?php
require_once "databaseConfig.php";

$mysqli = new \mysqli(HOST, USERNAME, USERPASSWORD, DATABASENAME);
// check connect
if ($mysqli->connect_errno) {
  printf("Error: %s\n", $mysqli->connect_error);
  exit();
}

//validation
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$post = $_POST;
foreach ($post as $key => $value) {
  $post[$key] = test_input($value);
}

//options handling
$options = [];

switch ($post['categoryID']) {
  case '1':
  $options['size'] = $post['size'];
  break;

  case '2':
  $options['weight'] = $post['weight'];
  break;

  case '3':
  $options['height'] = $post['height'];
  $options['width'] = $post['width'];
  $options['lenght'] = $post['lenght'];
  break;

  default:

  break;
}

//validation data
$errorsMesage = [];
foreach ($options as $value) {
  if(!((float) $value)) $errorsMesage[] = "the options must be a number";
}
if ((count($options) == 0)) $errorsMesage[] = "options not entered";
if(empty($post['sku']) || empty($post['name']) || empty($post['price'])) $errorsMesage[] = "sku, name ore price not entered";

$inputPrice = str_replace(",", ".", $post['price']);
$price = (float) $inputPrice;
if(!$price) $errorsMesage[] = "the price must be a number";
//end validation

if(count($errorsMesage) == 0) {
  //encode options to json
  $optionEncode = json_encode($options);
  //SQL query
  $query = "INSERT INTO `products` (`sku`, `name`, `price`, `category_id`, `options`)"
  . "VALUES ('{$post['sku']}', '{$post['name']}', '{$price}', '{$post['categoryID']}', '{$optionEncode}')";

  if (!$mysqli->query($query)) {
    printf("Error: %s\n", $mysqli->error);
  }
  $mysqli->close();
  header( 'Location: /');
} else {
  echo "<h3>Incorrect input data:</h3>";
  foreach ($errorsMesage as $value) {
    echo "<p>" . $value . "</p>";
  }
  echo "<a href='/product-add.php'>Try again<a>";
}
