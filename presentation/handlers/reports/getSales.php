<?php
require_once '../../../Autoloader.php';
require_once '../../../header.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
$startDate = $_SESSION['salesReportStartDate'];
$endDate = $_SESSION['salesReportEndDate'];
$reportService = new ReportsBusinessService();
$sales = $reportService->getSales($startDate, $endDate);

json_encode($sales);

echo '<pre>';
print_r($sales);
echo "</pre>";

