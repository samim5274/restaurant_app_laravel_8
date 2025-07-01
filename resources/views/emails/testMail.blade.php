<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Restaurant Management System Mail</title>
</head>
<body>
    <h1>Hello, I'm {{ $data['name'] }}!</h1>
    <h3>Order No: ORD-{{$data['reg']}}</h3>
    <p><strong>Date:</strong> {{ $data['date'] }}</p>
    <hr>

<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Item</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['items'] as $item)
        <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['qty'] }}pcs</td>
            <td>৳{{ $item['price'] }}/-</td>
            <td>৳{{ $item['qty'] * $item['price'] }}/-</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3"><strong>Grand Total</strong></td>
            <td>
                ৳{{ collect($data['items'])->sum(fn($i) => $i['qty'] * $i['price']) }}/-
            </td>
        </tr>
    </tbody>
</table>

</body>
</html>