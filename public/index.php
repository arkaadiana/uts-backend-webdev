<?php

include_once '../src/Controller/CustomerController.php';

// Membuat instance dari CustomerController
$customerController = new CustomerController($pdo);

// Mengambil semua data pelanggan
$customers = $customerController->getAllCustomers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Pelanggan</h2>
    <table>
        <thead>
            <tr>
                <th>ID Pelanggan</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= $customer['customer_id']; ?></td>
                    <td><?= $customer['first_name']; ?></td>
                    <td><?= $customer['last_name']; ?></td>
                    <td><?= $customer['email']; ?></td>
                    <td><?= $customer['phone_number']; ?></td>
                    <td><?= $customer['address']; ?></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
