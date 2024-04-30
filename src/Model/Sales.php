<?php
include 'config/database.php';

class Sales {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllSales() {
        $stmt = $this->pdo->query("SELECT * FROM sales");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSaleById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM sales WHERE order_id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addSale($data) {
        $stmt = $this->pdo->prepare("
            INSERT INTO sales 
            (product_name, product_description, gross_product_price, tax_per_product, quantity_purchased, gross_revenue, total_tax, net_revenue, product_category, sku_number, weight, color, size, rating, stock, sales_rep, address, zipcode, phone, email, loyalty_points, customer_id, country_id) 
            VALUES 
            (:product_name, :product_description, :gross_product_price, :tax_per_product, :quantity_purchased, :gross_revenue, :total_tax, :net_revenue, :product_category, :sku_number, :weight, :color, :size, :rating, :stock, :sales_rep, :address, :zipcode, :phone, :email, :loyalty_points, :customer_id, :country_id)
        ");

        $stmt->execute([
            'product_name' => $data['product_name'],
            'product_description' => $data['product_description'],
            'gross_product_price' => $data['gross_product_price'],
            'tax_per_product' => $data['tax_per_product'],
            'quantity_purchased' => $data['quantity_purchased'],
            'gross_revenue' => $data['gross_revenue'],
            'total_tax' => $data['total_tax'],
            'net_revenue' => $data['net_revenue'],
            'product_category' => $data['product_category'],
            'sku_number' => $data['sku_number'],
            'weight' => $data['weight'],
            'color' => $data['color'],
            'size' => $data['size'],
            'rating' => $data['rating'],
            'stock' => $data['stock'],
            'sales_rep' => $data['sales_rep'],
            'address' => $data['address'],
            'zipcode' => $data['zipcode'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'loyalty_points' => $data['loyalty_points'],
            'customer_id' => $data['customer_id'],
            'country_id' => $data['country_id']
        ]);
    }

    public function updateSale($id, $data) {
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
            'id' => $id,
            'product_name' => $data['product_name'],
            'product_description' => $data['product_description'],
            'gross_product_price' => $data['gross_product_price'],
            'tax_per_product' => $data['tax_per_product'],
            'quantity_purchased' => $data['quantity_purchased'],
            'gross_revenue' => $data['gross_revenue'],
            'total_tax' => $data['total_tax'],
            'net_revenue' => $data['net_revenue'],
            'product_category' => $data['product_category'],
            'sku_number' => $data['sku_number'],
            'weight' => $data['weight'],
            'color' => $data['color'],
            'size' => $data['size'],
            'rating' => $data['rating'],
            'stock' => $data['stock'],
            'sales_rep' => $data['sales_rep'],
            'address' => $data['address'],
            'zipcode' => $data['zipcode'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'loyalty_points' => $data['loyalty_points'],
            'customer_id' => $data['customer_id'],
            'country_id' => $data['country_id']
        ]);
    }

    public function deleteSale($id) {
        $stmt = $this->pdo->prepare("DELETE FROM sales WHERE order_id = :id");
        $stmt->execute(['id' => $id]);
    }
}