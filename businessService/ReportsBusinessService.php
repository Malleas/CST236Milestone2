<?php


class ReportsBusinessService
{
    public function getSales($startDate, $endDate){
        $db = new Database();
        $conn = $db->getConnection();
        $reportService = new ReportsDataService($conn);
        return $reportService->getSales($startDate, $endDate);
    }

}