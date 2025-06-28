<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{$grandTotal->reg}}</title>
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

<div class="invoice-box">
        <h1 style="text-align:center;">Restaurant Management System</h1>
        <p style="text-align:center;">House # 02, Road # 11, Sector # 6, Uttara, Dhaka-1230</p>
        <h3 style="text-align:center;">Sale Due Collection</h3>
        <hr>

        <h2>Invoice #ORD-{{$grandTotal->reg}}</h2>
        <div class="info">
            <p><strong>Date:</strong> {{ $grandTotal->date }}</p>
            <p><strong>Customer:</strong> Shamim Hossain</p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
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

        <div class="total">
            <p><strong>Grand Total: ৳{{ number_format($grandTotal->total, 2) }}</strong></p>
        </div>
    </div>

    <p class="small"><strong>Note:</strong> This Software develop by <strong>BGMIT</strong> created by <strong>SAMIM-HosseN</strong>. Call: +8801 62420 9291. Thank You!</p>

     <script>
        window.onload = function() {
            setTimeout(() => {
                window.print();
            }, 300); 
        };
    </script>
</body>
</html>
