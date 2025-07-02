<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>INV # {{$cart->reg}}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        h2 { margin-bottom: 0; }
        p { margin-top: 2px; margin-bottom: 5px; }
        .qrCode {display: flex; justify-content: space-between; align-items: flex-start;}
        .qrImg {padding: 1rem;}
    </style>
</head>
<body>

    <h1 style="text-align:center;">Restaurant Management System</h1>
    <p style="text-align:center;">House # 02, Road # 11, Sector # 6, Uttara, Dhaka-1230</p>
    <h3 style="text-align:center;">Sale Invoice</h3>
    <hr>

    <div class="qrCode">
        <div>
            <h2>Invoice # {{ $cart->reg }}</h2>
            <p><strong>Date:</strong> {{ $cart->date }}</p>
            <p><strong>Billing Office:</strong> {{$user->name}}</p>
        </div>
        <div class="qrImg">
            {!! QrCode::size(60)->generate($cart->reg) !!}
        </div>
    </div>


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


    <script>
        window.onload = function() {
            setTimeout(() => {
                window.print();
            }, 300); 
        };
    </script>
</body>
</html>
