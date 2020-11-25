<?php
include_once '../../../header.php';
require_once '../../../Autoloader.php';

$service = new ProductBusinessService();

$products = $service->getAllProducts();
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>


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
<h1>Product Admin</h1>
<table id="products" class="display">
    <thead>
    <tr>
        <th>Product ID</th>
        <th></th>
        <th></th>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i = 0; $i < count($products); $i++) {
        $productId = $products[$i]['ID'];
        echo "<tr>";
        echo "<td>" . $products[$i]['ID']."</td>";
        echo "<td>".
            "<form action='EditProductForm.php' method='post'>" .
            "<input type='submit' name='Edit' id='Edit' value='Edit'>".
            "<input type='hidden' name='productID' id='productID' value='$productId'>".
            "</form>".
            "</td>";
        echo "<td>".
            "<form action='../../handlers/product/DeleteProductHandler.php' method='post'>" .
            "<input type='submit' name='Delete' id='Delete' value='Delete'>".
            "<input type='hidden' name='productID' id='productID' value='$productId'>".
            "</form>".
            "</td>";
        echo "<td>" . $products[$i]['PRODUCTNAME'] . "</td>";

        echo "<td>" .
            "<form action='_productDescription.php' method='post'>" .
            "<input type='submit' name='productDescription' id='productDescription' value='Product Description'>" .

            "<input type='hidden' name='productID' id='productID' value='$productId'>" .
            "</form>" .
            "</td>";

        echo "<td>" . "$" . $products[$i]['PRICE'] . "</td>";
        echo "</tr>";
    }
    ?>

    </tbody>
    <script>
        $(document).ready(function () {
            $('#products').DataTable();
        });
    </script>
</body>
</html>



