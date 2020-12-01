<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Shop</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <header>
    <div class="logo">
      <h2>Product list</h2>
    </div>
    <div class="buttons">
      <button  class="button">
        <a href="/product-add.php" class="button">Add<a>
        </button>
        <button  class="button" type="submit" form="mass-delete">Mass delete</button>
      </div>
    </header>

    <form name="mass-delete" id="mass-delete" action="App/mass-delete.php" method="post">
    </form>
    <main class="main-page">
      <?php
      require_once "App/databaseConfig.php";
      $mysqli = new \mysqli(HOST, USERNAME, USERPASSWORD, DATABASENAME);
      // check connect
      if ($mysqli->connect_errno) {
        printf("Error: %s\n", $mysqli->connect_error);
        exit();
      }
      $query = "SELECT * FROM `products` LEFT JOIN `categories`
      ON products.category_id = categories.id";
      if ($result = $mysqli->query($query)) {

        while ($row = $result->fetch_assoc()) {
          $optionsDecoded = json_decode($row['options'], true);
          switch ($row['category_id']) {
            case '1':
            $optionsText = 'Size: ' . $optionsDecoded['size'] . ' MB';
            break;

            case '2':
            $optionsText = 'Weight: ' . $optionsDecoded['weight'] . ' KG';
            break;

            case '3':
            $optionsText = 'Dimension: ' . $optionsDecoded['height'] . 'x'
            . $optionsDecoded['width']. 'x' . $optionsDecoded['lenght'] . ' CM';
            break;

            default:
            break;
        }
        //formating price to money format
        $price = number_format($row['price'], 2, '.', '');

        // echo "<pre>";
        // var_dump($row);
        // echo "</pre>";

        echo "<div class='item'>
        <input type='checkbox' form='mass-delete' name='{$row['product_id']}'>
        <p>{$row['sku']}</p>
        <p>{$row['name']}</p>
        <p>{$price} $</p>
        <p>{$optionsText}</p>
        </div>
        ";
        }

      } else {
        echo "No items";
      }

      $mysqli->close();
      ?>
    </main>

<?php include "./footer.php" ?>

  </body>
  </html>
