<?php
require_once '../../../Autoloader.php';
require_once '../../../header.php';
$addressService = new AddressBusinessService();
$userService = new UserBusinessService();
$address = $addressService->getAddress($_SESSION['userID']);
$user = $userService->findUserByID($_SESSION['userID']);

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
    <H1>Order Details </H1>
</div>

<div align="left">
    <h2><?php echo $user->getFirstName()." ".$user->getLastName()?></h2>
    <h4><?php echo $address->getStreet() ?></h4>
    <h4><?php echo $address->getCity()." ".$address->getState(). " ".$address->getZipcode() ?></h4>
</div>
<div align="right">
    <h2><?php echo "Order ID: ".$orderID?></h2>
</div>


<?php
if ($order != null){
    ?>
    <table id="products" class="display">
        <thead>
        <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($order); $i++) {
            echo "<tr>";
            echo "<td>" . $order[$i]['PRODUCTS_ID'] . "</td>";
            echo "<td>" . $order[$i]['PRODUCTNAME'] . "</td>";
            echo "<td>" . $order[$i]['DESCRIPTION'] . "</td>";
            echo "<td>" . $order[$i]['CURRENT_PRICE'] . "</td>";
            echo "<td>" . $order[$i]['QUANTITY'] . "</td>";
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