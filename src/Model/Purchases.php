<?php
require_once __DIR__ . '/../../config/database.php';

class Purchases {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllPurchases() {
        $stmt = $this->pdo->query("SELECT * FROM purchases");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPurchaseById($purchaseId) {
        $stmt = $this->pdo->prepare("SELECT * FROM purchases WHERE purchase_id = :id");
        $stmt->execute(['id' => $purchaseId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addPurchase($purchaseData) {
        $stmt = $this->pdo->prepare("
            INSERT INTO purchases 
            (supplier, last_visited, return_status, warranty, purchase_date, return_policy, feedback, order_id) 
            VALUES 
            (:supplier, :last_visited, :return_status, :warranty, :purchase_date, :return_policy, :feedback, :order_id)
        ");

        $stmt->execute([
            'supplier' => $purchaseData['supplier'],
            'last_visited' => $purchaseData['last_visited'],
            'return_status' => $purchaseData['return_status'],
            'warranty' => $purchaseData['warranty'],
            'purchase_date' => $purchaseData['purchase_date'],
            'return_policy' => $purchaseData['return_policy'],
            'feedback' => $purchaseData['feedback'],
            'order_id' => $purchaseData['order_id']
        ]);
    }

    public function updatePurchase($purchaseId, $purchaseData) {
        $stmt = $this->pdo->prepare("
            UPDATE purchases SET 
            supplier = :supplier, 
            last_visited = :last_visited, 
            return_status = :return_status, 
            warranty = :warranty, 
            purchase_date = :purchase_date, 
            return_policy = :return_policy, 
            feedback = :feedback, 
            order_id = :order_id 
            WHERE purchase_id = :id
        ");

        $stmt->execute([
            'id' => $purchaseId,
            'supplier' => $purchaseData['supplier'],
            'last_visited' => $purchaseData['last_visited'],
            'return_status' => $purchaseData['return_status'],
            'warranty' => $purchaseData['warranty'],
            'purchase_date' => $purchaseData['purchase_date'],
            'return_policy' => $purchaseData['return_policy'],
            'feedback' => $purchaseData['feedback'],
            'order_id' => $purchaseData['order_id']
        ]);
    }

    public function deletePurchase($purchaseId) {
        $stmt = $this->pdo->prepare("DELETE FROM purchases WHERE purchase_id = :id");
        $stmt->execute(['id' => $purchaseId]);
    }

}
