<?php
include 'config/database.php';

class Purchases {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllPurchases() {
        $stmt = $this->pdo->query("SELECT * FROM purchases");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPurchaseById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM purchases WHERE purchase_id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addPurchase($data) {
        $stmt = $this->pdo->prepare("
            INSERT INTO purchases 
            (supplier, last_visited, return_status, warranty, purchase_date, return_policy, feedback, order_id) 
            VALUES 
            (:supplier, :last_visited, :return_status, :warranty, :purchase_date, :return_policy, :feedback, :order_id)
        ");

        $stmt->execute([
            'supplier' => $data['supplier'],
            'last_visited' => $data['last_visited'],
            'return_status' => $data['return_status'],
            'warranty' => $data['warranty'],
            'purchase_date' => $data['purchase_date'],
            'return_policy' => $data['return_policy'],
            'feedback' => $data['feedback'],
            'order_id' => $data['order_id']
        ]);
    }

    public function updatePurchase($id, $data) {
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
            'id' => $id,
            'supplier' => $data['supplier'],
            'last_visited' => $data['last_visited'],
            'return_status' => $data['return_status'],
            'warranty' => $data['warranty'],
            'purchase_date' => $data['purchase_date'],
            'return_policy' => $data['return_policy'],
            'feedback' => $data['feedback'],
            'order_id' => $data['order_id']
        ]);
    }

    public function deletePurchase($id) {
        $stmt = $this->pdo->prepare("DELETE FROM purchases WHERE purchase_id = :id");
        $stmt->execute(['id' => $id]);
    }
}
