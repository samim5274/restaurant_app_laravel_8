<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>INV # {{$reg->reg}}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        h2 { margin-bottom: 0; }
        p { margin-top: 2px; margin-bottom: 5px; }
    </style>
</head>
<body>
    <h2>Invoice # {{$reg->reg}}</h2>
    <p><strong>Date:</strong> {{$reg->date}}</p>
    <p><strong>Customer:</strong> Shamim Hossain</p>

    <table>
        <thead>
            <tr>
                <th>SL</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit Price (৳)</th>
                <th>Total (৳)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice as $key => $val)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $val->food->name ?? '' }}</td>
                <td>{{ $val->quantity }} pcs</td>
                <td>৳{{ $val->price }}/-</td>
                <td>৳{{ $val->quantity * $val->food->price }}/-</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" style="text-align:right"><strong>Total</strong></td>
                <td><strong>৳{{$grandTotal->total}}/-</strong></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:right"><strong>Discount</strong></td>
                <td><strong>৳{{$grandTotal->discount}}/-</strong></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:right"><strong>Due</strong></td>
                <td><strong>৳{{$grandTotal->due}}/-</strong></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:right"><strong>Pay</strong></td>
                <td><strong>৳{{$grandTotal->pay}}/-</strong></td>
            </tr>
        </tbody>
    </table>
    <p class="small"><strong>Note:</strong> This Software develop by <strong>BGMIT</strong> created by <strong>SAMIM-HosseN</strong>. Call: +8801 62420 9291. Thank You!</p>
</body>
</html>
