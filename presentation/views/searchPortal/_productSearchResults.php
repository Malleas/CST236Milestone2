<?php
include_once  "../../../header.php";
require_once "../../../Autoloader.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    </style>
</head>
<body>
<div align="center">
    <H1>Product Listing</H1>
</div>


<table id="products" class="display">
    <thead>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if($_SESSION['products'] != null){
        $products = $_SESSION['products'];
        for ($i = 0; $i < count($products); $i++) {
            echo "<tr>";
            echo "<td>" . $products[$i]['ID'] . "</td>";
            echo "<td>" . $products[$i]['PRODUCTNAME'] . "</td>";
            $productId = $products[$i]['ID'];
            echo "<td>" .
                "<form action='../product/_productDescription.php' method='post'>" .
                "<input type='submit' name='productDescription' id='productDescription' value='Product Description'>".

                "<input type='hidden' name='productID' id='productID' value='$productId'>" .
                "</form>" .
                "</td>";

            echo "<td>" ."$". $products[$i]['PRICE'] . "</td>";
            echo "</tr>";
        }

    }else{
        include 'Search.html';
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
