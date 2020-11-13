<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../../../Autoloader.php';
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
        for ($i = 0; $i < count($product); $i++){
            echo "<h5 class='card-title' align='center'>".$product[$i]['PRODUCTNAME']."</h5>";
            echo "<img class='card-img-top' src='https://picsum.photos/200' alt='Card image cap'>";
            echo "<p class='card=text'>".$product[$i]['DESCRIPTION']."</p>";
            echo "<p class='card=text'>"."$".$product[$i]['PRICE']."</p>";
            echo "<a href='../searchPortal/_productSearchResults.php' class='card-link'>Products</a>>";
        }
        ?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
