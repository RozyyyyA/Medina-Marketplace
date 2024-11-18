<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .footer {
            text-align: right;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <h1>Purchase Report</h1>
    <p><strong>Username:</strong> <?= esc($customer['username']) ?></p>
    <p><strong>Email:</strong> <?= esc($customer['email']) ?></p>
    <p><strong>Date of Birth:</strong> <?= esc($customer['dob']) ?></p>
    <p><strong>Gender:</strong> <?= esc($customer['gender']) ?></p>
    <p><strong>Address:</strong> <?= esc($customer['address']) ?></p>
    <p><strong>City:</strong> <?= esc($customer['city']) ?></p>
    <p><strong>Contact No:</strong> <?= esc($customer['contact_no']) ?></p>
    <p><strong>PayPal ID:</strong> <?= esc($customer['paypal_id']) ?></p>

    <h2>Order Details</h2>
    <table class="table">
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Amount</th>
        </tr>
        <tr>
            <td><?= esc($order['product_name']) ?></td>
            <td><?= esc($order['quantity']) ?></td>
            <td>Rp <?= number_format($totalHarga, 2) ?></td>
        </tr>
    </table>

    <h3>Total Harga: Rp <?= number_format($totalHarga, 2) ?></h3>

    <div class="footer">
        <p>Signature:</p>
        <p><strong>Medina</strong></p>
    </div>
</body>

</html>