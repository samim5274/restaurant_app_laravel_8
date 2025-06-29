<!DOCTYPE html>
<html>
<head>
    <title>Daily Expenses Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: DejaVu Sans, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        h2, p { text-align: center; margin: 0; }
        .amount-box {
            text-align: right;
            font-size: 2.2rem;
            font-weight: 800;
            color: #0d6efd;
            border-top: 2px dashed #dee2e6;
        }
    </style>
</head>
<body>
    <h2>Restaurant Management System</h2>
    <p>House # 02, Road # 11, Sector # 6, Uttara, Dhaka-1230</p>
    <h5 style="text-align:center; margin-top:10px;">Daily Expenses Report</h5>
        <div class="amount-box"></div>
    <table class="table table-striped table-hover table-bordered align-middle">
        <thead class="table-primary">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Category</th>
            <th scope="col">Subcategory</th>
            <th scope="col">Remark</th>
            <th scope="col" class="text-end">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $key => $val)
            <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{ $val->date }}</td>
            <td>{{ $val->category->name ?? '' }}</td>
            <td>{{ $val->subcategory->name ?? '' }}</td>
            <td>{{ $val->remark ?? '' }}</td>
            <td class="text-end">৳{{ $val->amount }}/-</td>
            </tr>
            @endforeach
            <tr class="fw-bold table-secondary">
            <td colspan="5" class="text-end">Total:</td>
            <td class="text-end">৳{{$total}}/-</td>
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