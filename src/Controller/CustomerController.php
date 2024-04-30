<?php
require_once 'Customers.php';

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
    public function addCustomer($data) {
        return $this->customerModel->addCustomer($data);
    }

    // Method untuk memperbarui data customer berdasarkan ID
    public function updateCustomer($customerId, $data) {
        return $this->customerModel->updateCustomer($customerId, $data);
    }

    // Method untuk menghapus data customer berdasarkan ID
    public function deleteCustomer($customerId) {
        return $this->customerModel->deleteCustomer($customerId);
    }
}

