<?php
require_once '../../../Autoloader.php';
require_once '../../../header.php';
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
    <H1>Sales Report</H1>
</div>


<?php
if ($sales != null){
    ?>
    <table id="products" class="display">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Date</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($sales); $i++) {
            echo "<tr>";
            echo "<td>" . $sales[$i]['ORDERS_ID'] . "</td>";
            /* echo "<td>" .
                 "<form action='../../handlers/cart/addToCart.php' method='post'>" .
                 "<input type='submit' name='Add' id='Add' value='Add'>" .
                 "<input type='hidden' name='productID' id='productID' value='$productId'>" .
                 "</form>" .
                 "</td>";*/
            $date = $sales[$i]['DATE'];
            $orderID = $sales[$i]['ORDERS_ID'];
            echo "<td>" .
                  "<form action='/Milestone/presentation/handlers/reports/SalesByDateHandler.php' method='post'>" .
                  "<input type='submit' class='btn btn-primary' name='orderDate' id='orderDate' value='$date'>" .

                  "<input type='hidden' name='orderID' id='orderID' value='$orderID'>" .
                  "</form>" .
                  "</td>";

            echo "<td>". $sales[$i]['PRODUCTS_ID']."</td>";
            echo "<td>" . $sales[$i]['PRODUCTNAME'] . "</td>";
            echo "<td>" . $sales[$i]['DESCRIPTION'] . "</td>";
            echo "<td>" . $sales[$i]['CURRENT_PRICE'] . "</td>";
            echo "<td>" . $sales[$i]['QUANTITY'] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <?php
} else {
    echo "No sales found in that given range, please try again" . "<br>";
    ?>
    <input type="button" class="btn btn-primary" onclick="goBack()" value="Back">
    <?php
}
?>
<form action="../../handlers/reports/getSales.php" method="post">
    <button type="submit" class="btn btn-primary">JSON</button>
</form>
<script>
    $(document).ready(function () {
        $('#products').DataTable();

    });
</script>

<script>
    function goBack() {
        location.href = "../../views/reports/Sales.php"
    }
</script>
</body>
</html>
