<?php

require_once '../../../Autoloader.php';
require_once '../../../header.php';

?>

<!DOCTYPE html>
<html>
<body>
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
<h1>Sales Report</h1>
<form class="inputForm" action="../../handlers/reports/SalesReportsHandler.php" method="post">
    <div class="form-group">
        <label for="startDate">Start Date</label>
        <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start Date">
    </div>
    <div class="form-group">
        <label for="endDate">End Date</label>
        <input type="date" class="form-control" id="endDate" name="endDate" placeholder="End Date">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>


</form>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>
