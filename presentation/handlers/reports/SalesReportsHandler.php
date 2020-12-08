<?php
require_once '../../../header.php';
require_once '../../../Autoloader.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$reportService = new ReportsBusinessService();
$sales = $reportService->getSales($startDate, $endDate);
$_SESSION['salesReportStartDate'] = $startDate;
$_SESSION['salesReportEndDate'] = $endDate;
include '../../views/reports/_salesByDate.php';





