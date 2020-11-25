<?php
include_once '../../../header.php';
require_once  '../../../Autoloader.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .inputForm {
            width: 500px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }



    </style>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body>
<h1>Add New Item</h1>
    <form class="inputForm" action="../../handlers/product/NewProductHandler.php" method="post">
        <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description">
    </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" >
        </div>


    <button type="submit" class="btn btn-primary">Submit</button>

    </form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>