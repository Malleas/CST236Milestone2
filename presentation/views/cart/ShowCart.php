<?php
require_once '../../../Autoloader.php';
require_once '../../../header.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);
$productService = new ProductBusinessService();
$userService = new UserBusinessService();
if (isset($_SESSION['cart'])) {
    $c = $_SESSION['cart'];
} else {
    echo "Nothing in your cart yet. <br>";
    exit;
}

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
} else {
    echo "You are not logged in yet, please log in to view cart. <br>";
    echo "<input type='button' class='btn btn-primary' value='Login' onclick='login()' >";
    exit;
}

if ($c->getUserID() != $userID) {
    echo "This cart is not yours, please log in to ensure there are no errors in checkout. <br>";
    exit;
}
$fmt = new NumberFormatter('us_US', NumberFormatter::CURRENCY);
$user = $userService->findUserByID($userID);
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>


    <style>
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

        h1 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
<h1>View Cart</h1>
<h2><?php echo "Cart for user: " . $user->getFirstName() . " " . $user->getLastName(); ?></h2>
<table id="products" class="table table-hover">
    <thead>
    <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Photo</th>
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
        echo "<td>" . $product->getId() . "</td>";
        echo "<td>" . $product->getProductName() . "</td>";
        echo "<td>" . $product->getDescription() . "</td>";
        echo "<td>" . "<img src='https://picsum.photos/100'>" . "</td>";
        echo "<td>" . "<label for='quantity'></label>" .
            "<form action='../../handlers/cart/UpdateQtyHandler.php' method='post'>" .
            "<input type='text' class='form-control' id='quantity' name='quantity' value='$qty'>" .
            "<input type='hidden' name='productID' value=" . $product->getId() . ">" .
            "<input type='submit' class='btn btn-secondary' value='Update'>" .
            "</form>" .
            "</td>";
        echo "<td>" . $fmt->formatCurrency($product->getPrice(), "USD") . "</td>";
        echo "<td>" . $fmt->formatCurrency($qty * $product->getPrice(), "USD") . "</td>";
        echo "</tr>";
    }


    ?>

    </tbody>
</table>
<?php echo "<h3>Total Price" . $fmt->formatCurrency($c->getTotalPrice(), "USD") . "</h3>" ?>

<input type="button" class="btn btn-primary" value="Continue Shopping" onclick="continueShopping()">


<input type="button" class="btn btn-success" value="Checkout" onclick="checkout()">

<script>
    function continueShopping() {
        location.href = "../product/_productSearchResults.php"
    }
</script>
<script>
    function checkout() {
        location.href = "CheckoutHandler.php"
    }
</script>

<script>
    function login() {
        location.href = "../login/Login.php"
    }
</script>

</body>
</html>
