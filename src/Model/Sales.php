<?php
require_once __DIR__ . '/../../config/database.php';

class Sales {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllSales() {
        $stmt = $this->pdo->query("SELECT * FROM sales");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSalesById($orderId) {
        $stmt = $this->pdo->prepare("SELECT * FROM sales WHERE order_id = :id");
        $stmt->execute(['id' => $orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addSales($salesData) {
        $stmt = $this->pdo->prepare("
            INSERT INTO sales 
            (product_name, product_description, gross_product_price, tax_per_product, quantity_purchased, gross_revenue, total_tax, net_revenue, product_category, sku_number, weight, color, size, rating, stock, sales_rep, address, zipcode, phone, email, loyalty_points, customer_id, country_id) 
            VALUES 
            (:product_name, :product_description, :gross_product_price, :tax_per_product, :quantity_purchased, :gross_revenue, :total_tax, :net_revenue, :product_category, :sku_number, :weight, :color, :size, :rating, :stock, :sales_rep, :address, :zipcode, :phone, :email, :loyalty_points, :customer_id, :country_id)
        ");

        $stmt->execute([
            'product_name' => $salesData['product_name'],
            'product_description' => $salesData['product_description'],
            'gross_product_price' => $salesData['gross_product_price'],
            'tax_per_product' => $salesData['tax_per_product'],
            'quantity_purchased' => $salesData['quantity_purchased'],
            'gross_revenue' => $salesData['gross_revenue'],
            'total_tax' => $salesData['total_tax'],
            'net_revenue' => $salesData['net_revenue'],
            'product_category' => $salesData['product_category'],
            'sku_number' => $salesData['sku_number'],
            'weight' => $salesData['weight'],
            'color' => $salesData['color'],
            'size' => $salesData['size'],
            'rating' => $salesData['rating'],
            'stock' => $salesData['stock'],
            'sales_rep' => $salesData['sales_rep'],
            'address' => $salesData['address'],
            'zipcode' => $salesData['zipcode'],
            'phone' => $salesData['phone'],
            'email' => $salesData['email'],
            'loyalty_points' => $salesData['loyalty_points'],
            'customer_id' => $salesData['customer_id'],
            'country_id' => $salesData['country_id']
        ]);
    }

    public function updateSales($orderId, $salesData) {
        $stmt = $this->pdo->prepare("
            UPDATE sales SET 
            product_name = :product_name, 
            product_description = :product_description, 
            gross_product_price = :gross_product_price, 
            tax_per_product = :tax_per_product, 
            quantity_purchased = :quantity_purchased, 
            gross_revenue = :gross_revenue, 
            total_tax = :total_tax, 
            net_revenue = :net_revenue, 
            product_category = :product_category, 
            sku_number = :sku_number, 
            weight = :weight, 
            color = :color, 
            size = :size, 
            rating = :rating, 
            stock = :stock, 
            sales_rep = :sales_rep, 
            address = :address, 
            zipcode = :zipcode, 
            phone = :phone, 
            email = :email, 
            loyalty_points = :loyalty_points, 
            customer_id = :customer_id, 
            country_id = :country_id 
            WHERE order_id = :id
        ");

        $stmt->execute([
            'id' => $orderId,
            'product_name' => $salesData['product_name'],
            'product_description' => $salesData['product_description'],
            'gross_product_price' => $salesData['gross_product_price'],
            'tax_per_product' => $salesData['tax_per_product'],
            'quantity_purchased' => $salesData['quantity_purchased'],
            'gross_revenue' => $salesData['gross_revenue'],
            'total_tax' => $salesData['total_tax'],
            'net_revenue' => $salesData['net_revenue'],
            'product_category' => $salesData['product_category'],
            'sku_number' => $salesData['sku_number'],
            'weight' => $salesData['weight'],
            'color' => $salesData['color'],
            'size' => $salesData['size'],
            'rating' => $salesData['rating'],
            'stock' => $salesData['stock'],
            'sales_rep' => $salesData['sales_rep'],
            'address' => $salesData['address'],
            'zipcode' => $salesData['zipcode'],
            'phone' => $salesData['phone'],
            'email' => $salesData['email'],
            'loyalty_points' => $salesData['loyalty_points'],
            'customer_id' => $salesData['customer_id'],
            'country_id' => $salesData['country_id']
        ]);
    }

    public function deleteSales($orderId) {
        $stmt = $this->pdo->prepare("DELETE FROM sales WHERE order_id = :id");
        $stmt->execute(['id' => $orderId]);
    }
}
