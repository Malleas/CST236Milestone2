<?php
include_once "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        .searchBox {
            width: 500px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }



    </style>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Product Search</h1>
<form class="searchBox" action="presentation/handlers/product/SearchHandler.php" method="post">
    <div class="form-group">
        <label for="productName">Product Name</label>
        <input type="text" class="form-control" name="productName" id="productName" aria-describedby="nameHelp">
        <small id="nameHelp" class="form-text text-muted">Product name.  You can search for a letter or a word.</small>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description" aria-describedby="descriptionHelp">
        <small id="descriptionHelp" class="form-text text-muted">Product description.  You can search for a letter or a word.</small>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price" id="price" aria-describedby="priceHelp">
        <small id="priceHelp" class="form-text text-muted">Product price in USD</small>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
</form>



</body>
</html>
