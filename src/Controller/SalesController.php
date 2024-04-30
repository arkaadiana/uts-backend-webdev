<?php
require_once '../Model/Sales.php';

class SalesController {
    private $salesModel;

    public function __construct($pdo) {
        $this->salesModel = new Sales($pdo);
    }

    // Method untuk mendapatkan semua data penjualan
    public function getAllSales() {
        return $this->salesModel->getAllSales();
    }

    // Method untuk mendapatkan data penjualan berdasarkan ID
    public function getSalesById($orderId) {
        return $this->salesModel->getSalesById($orderId);
    }

    // Method untuk menambahkan data penjualan baru
    public function addSales($data) {
        return $this->salesModel->addSales($data);
    }

    // Method untuk memperbarui data penjualan berdasarkan ID
    public function updateSales($orderId, $data) {
        return $this->salesModel->updateSales($orderId, $data);
    }

    // Method untuk menghapus data penjualan berdasarkan ID
    public function deleteSales($orderId) {
        return $this->salesModel->deleteSales($orderId);
    }
}