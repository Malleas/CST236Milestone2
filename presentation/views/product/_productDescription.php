<?php

include_once '../../../header.php';
require_once '../../../Autoloader.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$productID = $_POST['productID'];

$service = new ProductBusinessService();
$product = $service->findProductByID($productID);


?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<body>
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <?php

            echo "<h5 class='card-title' align='center'>".$product->getProductName()."</h5>";
            echo "<img class='card-img-top' src='https://picsum.photos/200' alt='Card image cap'>";
            echo "<p class='card=text'>".$product->getDescription()."</p>";
            echo "<p class='card=text'>"."$".$product->getPrice()."</p>";
            echo "<a href='_productSearchResults.php' class='card-link'>Products</a>";

        ?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
