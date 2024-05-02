<?php
require_once __DIR__ . '/../Model/Customers.php';

class CustomerController {
    private $customerModel;

    public function __construct($pdo) {
        $this->customerModel = new Customers($pdo);
    }

    // Method untuk mendapatkan semua data customer
    public function getAllCustomers() {
        return $this->customerModel->getAllCustomers();
    }

    // Method untuk mendapatkan data customer berdasarkan ID
    public function getCustomerById($customerId) {
        return $this->customerModel->getCustomerById($customerId);
    }

    // Method untuk menambahkan data customer baru
    public function addCustomer($customerData) {
        return $this->customerModel->addCustomer($customerData);
    }

    // Method untuk memperbarui data customer berdasarkan ID
    public function updateCustomer($customerId, $customerData) {
        return $this->customerModel->updateCustomer($customerId, $customerData);
    }

    // Method untuk menghapus data customer berdasarkan ID
    public function deleteCustomer($customerId) {
        return $this->customerModel->deleteCustomer($customerId);
    }
}