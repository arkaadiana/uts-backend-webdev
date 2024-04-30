<?php
require_once '../src/Model/Purchases.php';


class PurchaseController {
    private $purchaseModel;

    public function __construct($pdo) {
        $this->purchaseModel = new Purchases($pdo);
    }

    // Method untuk mendapatkan semua data pembelian
    public function getAllPurchases() {
        return $this->purchaseModel->getAllPurchases();
    }

    // Method untuk mendapatkan data pembelian berdasarkan ID
    public function getPurchaseById($purchaseId) {
        return $this->purchaseModel->getPurchaseById($purchaseId);
    }

    // Method untuk menambahkan data pembelian baru
    public function addPurchase($data) {
        return $this->purchaseModel->addPurchase($data);
    }

    // Method untuk memperbarui data pembelian berdasarkan ID
    public function updatePurchase($purchaseId, $data) {
        return $this->purchaseModel->updatePurchase($purchaseId, $data);
    }

    // Method untuk menghapus data pembelian berdasarkan ID
    public function deletePurchase($purchaseId) {
        return $this->purchaseModel->deletePurchase($purchaseId);
    }
}

