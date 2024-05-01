<?php
require_once __DIR__ . '/../../config/database.php';

class Customers {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllCustomers() {
        $stmt = $this->pdo->query("SELECT * FROM customers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCustomerById($customerId) {
        $stmt = $this->pdo->prepare("SELECT * FROM customers WHERE customer_id = :id");
        $stmt->execute(['id' => $customerId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addCustomer($customerData) {
        $stmt = $this->pdo->prepare("
            INSERT INTO customers 
            (first_name, last_name, gender, email, phone_number, address, education, occupation, date_of_birth, monthly_income, credit_score, marital_status) 
            VALUES 
            (:first_name, :last_name, :gender, :email, :phone_number, :address, :education, :occupation, :date_of_birth, :monthly_income, :credit_score, :marital_status)
        ");

        $stmt->execute([
            'first_name' => $customerData['first_name'],
            'last_name' => $customerData['last_name'],
            'gender' => $customerData['gender'],
            'email' => $customerData['email'],
            'phone_number' => $customerData['phone_number'],
            'address' => $customerData['address'],
            'education' => $customerData['education'],
            'occupation' => $customerData['occupation'],
            'date_of_birth' => $customerData['date_of_birth'],
            'monthly_income' => $customerData['monthly_income'],
            'credit_score' => $customerData['credit_score'],
            'marital_status' => $customerData['marital_status'],
        ]);
    }

    public function updateCustomer($customerId, $customerData) {
        $stmt = $this->pdo->prepare("
            UPDATE customers SET 
            first_name = :first_name, 
            last_name = :last_name, 
            gender = :gender, 
            email = :email, 
            phone_number = :phone_number, 
            address = :address, 
            education = :education, 
            occupation = :occupation, 
            date_of_birth = :date_of_birth, 
            monthly_income = :monthly_income, 
            credit_score = :credit_score, 
            marital_status = :marital_status
            WHERE customer_id = :id
        ");

        $stmt->execute([
            'id' => $customerId,
            'first_name' => $customerData['first_name'],
            'last_name' => $customerData['last_name'],
            'gender' => $customerData['gender'],
            'email' => $customerData['email'],
            'phone_number' => $customerData['phone_number'],
            'address' => $customerData['address'],
            'education' => $customerData['education'],
            'occupation' => $customerData['occupation'],
            'date_of_birth' => $customerData['date_of_birth'],
            'monthly_income' => $customerData['monthly_income'],
            'credit_score' => $customerData['credit_score'],
            'marital_status' => $customerData['marital_status'],
        ]);
    }

    public function deleteCustomer($customerId) {
        $stmt = $this->pdo->prepare("DELETE FROM customers WHERE customer_id = :id");
        $stmt->execute(['id' => $customerId]);
    }
}
