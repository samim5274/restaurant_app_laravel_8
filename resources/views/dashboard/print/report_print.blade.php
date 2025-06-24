<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print Day wise Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h1 {
            margin-bottom: 5px;
            font-size: 18px;
        }
        p {
            margin: 0 0 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #999;
            padding: 4px 6px;
            text-align: center;
            font-size: 11px;
        }
        th {
            background-color: #e0e0e0;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .footer-note {
            margin-top: 15px;
            font-size: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Restaurant Management System</h1>
    <p style="text-align:center;">House # 02, Road # 11, Sector # 6, Uttara, Dhaka-1230</p>
    <h3 style="text-align:center;">Sale Report</h3>
    <hr>

    <table>
        <thead>
            <tr>
                <th>SL</th>
                <th>Date</th>
                <th>Reg</th>
                <th>Table</th>
                <th>Total ($)</th>
                <th>Discount ($)</th>
                <th>Payable ($)</th>
                <th>Pay ($)</th>
                <th>Due ($)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order as $key => $val)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $val->date }}</td>
                <td>{{ $val->reg }}</td>
                <td>{{ $val->table->tName }}</td>
                <td>${{ $val->total }}/-</td>
                <td>${{ $val->discount }}/-</td>
                <td>${{ $val->payable }}/-</td>
                <td>${{ $val->pay }}/-</td>
                <td>${{ $val->due }}/-</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p class="footer-note"><strong>Note:</strong> This software is developed by <strong>BGMIT</strong>, created by <strong>SAMIM HOSSEIN</strong>. Call: +8801 62420 9291. Thank You!</p>
</body>
</html>
