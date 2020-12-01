<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Shop</title>
  <link rel="stylesheet" href="/css/style.css">
  <script type="text/javascript" src="/js/jquery-3.5.1.min.js"></script>
</head>
<body>
  <header>
    <div class="logo">
      <h2>Product Add</h2>
    </div>
    <div class="buttons">
      <button  class="button" type="submit" form="productAddForm">Save</button>
      <button  class="button"><a href="/">Cancel</a> </button>
    </div>
  </header>

  <main>
    <form id="productAddForm" class="productAddForm" action="App/add.php" method="post">
      <fieldset id="main">
        <label for="sku">SKU</label>
        <input type="text" name="sku" value="" required minlength="2" maxlength="10">

        <label for="name">Name</label>
        <input type="text" name="name" value="" required minlength="2" maxlength="50">

        <label for="price">Price ($)</label>
        <input type="text" name="price" value="" required minlength="1" maxlength="50">

        <label for="categoryID">Type Switcher</label>
        <select name="categoryID" id="categoryID">
          <option value="none" hidden="">Type Switcher</option>
          <option value="1">DVD</option>
          <option value="2">Book</option>
          <option value="3">Furniture</option>
        </select>
      </fieldset>
    </form>

    <script type="text/javascript">
    $(document).ready(function(){
      let option1 = '<fieldset id="options-fieldset"><label for="size">Size (MB)</label>\
        <input type="text" name="size" required><p class="description">Please provide size</p></fieldset>';
      let option2 = '<fieldset id="options-fieldset"><label for="weight">Weight (in Kg)</label>\
        <input type="text" name="weight" required><p class="description">Please provide weight</p></fieldset>';
      let option3 = '<fieldset id="options-fieldset">\
        <label for="height">Height (CM)</label>\
        <input type="text" name="height" required>\
        <label for="width">Width (CM)</label>\
        <input type="text" name="width" required>\
        <label for="lenght">Lenght (CM)</label>\
        <input type="text" name="lenght" required>\
        <p class="description">Please provide dimensions</p>\
        </fieldset>';

      $("select[name=categoryID]").change(function() {
        let optionNum = $("select[name=categoryID]").val();
      $("#options-fieldset").detach();
        switch (optionNum) {
          case '1':
          $("#productAddForm").append(option1);
          break;
          case '2':
          $("#productAddForm").append(option2);
          break;
          case '3':
          $("#productAddForm").append(option3);
          break;
          default:
          break;
        }
      });
    });
    </script>

  </main>

<?php include "./footer.php" ?>

</body>
</html>
