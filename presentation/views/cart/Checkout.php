<?php
require_once '../../../Autoloader.php';
require_once '../../../header.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
$c = $_SESSION['cart'];
$productService = new ProductBusinessService();
$fmt = new NumberFormatter('us_US', NumberFormatter::CURRENCY);

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
        #products {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #products td, #products th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #products tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #products tr:hover {
            background-color: #ddd;
        }

        #products th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }


    </style>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body>
<h1>Checkout</h1>
<form class="inputForm" action="../../handlers/cart/CheckoutHandler.php" method="post">
    <table id="products" class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price Each</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($c->getItems() as $productID => $qty) {
            $product = $productService->findProductByID($productID);
            echo "<tr>";
            echo "<td>" . $product->getProductName() . "</td>";
            echo "<td>" . $qty."</td>";
            echo "<td>" . $fmt->formatCurrency($product->getPrice(), "USD") . "</td>";
            echo "<td>" . $fmt->formatCurrency($qty * $product->getPrice(), "USD") . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
            <br/>
        </div>
        <div class="col">
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" id="number" name="number" placeholder="Credit Card Number">
            <br/>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <select class="form-control" id="expirationMonth" name="expirationMonth">
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select>
        </div>
        <div class="col">
            <select class="form-control" id="expirationYear" name="expirationYear">
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
            </select>
        </div>
        <div class="col">
            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV">
            <br/>
        </div>
    </div>
    <br/>

    <?php echo "<h3>Total Price" . $fmt->formatCurrency($c->getTotalPrice(), "USD") . "</h3>" ?>
    <button type="submit" class="btn btn-primary">Purchase</button>
    <input type="button" class="btn btn-secondary" value="Continue Shopping" onclick="continueShopping()">


</form>

<script>
    function continueShopping() {
        location.href = "../product/_productSearchResults.php"
    }
</script>

<script>
    function applyDiscount() {
        location.href = "../../handlers/cart/DiscountHandler.php"
    }
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>