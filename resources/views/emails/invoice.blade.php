<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - Laravel Restaurant Management System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 30px;
            background-color: #f4f4f4;
            color: #333;
        }

        .invoice-box {
            background: #fff;
            padding: 25px 30px;
            border: 1px solid #ddd;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1, h2, h3, h4 {
            margin: 0;
            padding-bottom: 10px;
        }

        .invoice-header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .invoice-details {
            margin-bottom: 25px;
        }

        .invoice-details p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
        }

        .total-row {
            font-weight: bold;
            background-color: #fafafa;
        }

        .summary-box {
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 400px;
            margin-top: 10px;
        }

        .summary-box p {
            margin: 6px 0;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 40px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <div class="invoice-box">
        <div class="invoice-header">
            <h1>Invoice</h1>
            <h3>Laravel Restaurant Management System</h3>
        </div>

        <div class="invoice-details">
            <p><strong>Billing Office:</strong> {{ $data['name'] }}</p>
            <p><strong>Order No:</strong> ORD-{{ $data['reg'] }}</p>
            <p><strong>Date:</strong> {{ $data['date'] }}</p>
        </div>

        <h3>Ordered Items</h3>
        <table>
            <thead>
                <tr>
                    <th>Food Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data['items'] as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['qty'] }} pcs</td>
                        <td>৳{{ number_format($item['price'], 2) }}/-</td>
                        <td>৳{{ number_format($item['qty'] * $item['price'], 2) }}/-</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="3" style="text-align: right;">Grand Total</td>
                    <td>৳{{ number_format(collect($data['items'])->sum(fn($i) => $i['qty'] * $i['price']), 2) }}</td>
                </tr>
            </tbody>
        </table>

        <h3>Payment Summary</h3>
        <div class="summary-box">
            <p><strong>Table:</strong> {{ $data['totals'][0]['table'] }}/-</p>
            <p><strong>Total:</strong> ৳{{ number_format($data['totals'][0]['total'], 2) }}/-</p>
            <p><strong>Discount:</strong> ৳{{ number_format($data['totals'][0]['discount'], 2) }}/-</p>
            <p><strong>Payable:</strong> ৳{{ number_format($data['totals'][0]['payable'], 2) }}/-</p>
            <p><strong>Paid:</strong> ৳{{ number_format($data['totals'][0]['pay'], 2) }}/-</p>
            <p><strong>Due:</strong> ৳{{ number_format($data['totals'][0]['due'], 2) }}/-</p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} Laravel RMS. All rights reserved.
        </div>
    </div>

</body>
</html>
