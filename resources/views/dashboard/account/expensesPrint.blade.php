<!DOCTYPE html>
<html>
<head>
    <title>Daily Expenses Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        h2, p { text-align: center; margin: 0; }
    </style>
</head>
<body>
    <h2>Restaurant Management System</h2>
    <p>House # 02, Road # 11, Sector # 6, Uttara, Dhaka-1230</p>
    <h3 style="text-align:center; margin-top:10px;">Daily Expenses Report</h3>
    <hr>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Remark</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $key => $val)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $val->date }}</td>
                    <td>{{ $val->category->name ?? '' }}</td>
                    <td>{{ $val->subcategory->name ?? '' }}</td>
                    <td>{{ $val->remark ?? '' }}</td>
                    <td>৳{{ $val->amount }}/-</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5">Total:</td>
                <td class="text-center">৳{{$total}}/-</td>
            </tr>
        </tbody>
    </table>

    <script>
        window.onload = function () {
            window.print();
            setTimeout(function () {
                window.close();
            }, 500);
        };
    </script>
</body>
</html>