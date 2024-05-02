<?php
require_once __DIR__ . '/../Model/Purchases.php';

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
    public function addPurchase($purchaseData) {
        return $this->purchaseModel->addPurchase($purchaseData);
    }

    // Method untuk memperbarui data pembelian berdasarkan ID
    public function updatePurchase($purchaseId, $purchaseData) {
        return $this->purchaseModel->updatePurchase($purchaseId, $purchaseData);
    }

    // Method untuk menghapus data pembelian berdasarkan ID
    public function deletePurchase($purchaseId) {
        return $this->purchaseModel->deletePurchase($purchaseId);
    }
}