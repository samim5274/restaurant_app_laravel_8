<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stock List Download</title>
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
        <h1 style="text-align:center;">Restaurant Management System</h1>
        <p style="text-align:center;">House # 02, Road # 11, Sector # 6, Uttara, Dhaka-1230</p>
        <h3 style="text-align:center;">Stock Report</h3>
        <hr>

    <table>
        <thead>
            <tr>
                <th>SL</th>
                <th>Date</th>
                <th class="">Food</th>
                <th class="text-center">Stock In</th>
                <th class="text-center">Stock Out</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @if($stock)
            @foreach($stock as $key => $val)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{$val->date}}</td>
                <td class="">{{$val->food->name}}</td>
                <td class="text-center">{{$val->stockIn}} pcs</td>
                <td class="text-center">{{$val->stockOut}} pcs</td>
                <td class="text-center">
                    @if($val->status == 1)
                        <span class="text-success">Stock Out</span>
                    @elseif($val->status == 2)
                        <span class="text-danger">Stock In</span>
                    @else
                        <span class="text-secondary">Unknown</span>
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
            <tr>
                <td colspan="3">Total: </td>
                <td class="text-center"> {{$totalIn}} pcs</td>
                <td class="text-center"> {{$totalOut}} pcs</td>
                <td class="text-center"> {{$netStock}} pcs</td>
            </tr>
        </tbody>
    </table>
    <br>
    <p class="small"><strong>Note:</strong> This Software develop by <strong>BGMIT</strong> created by <strong>SAMIM-HosseN</strong>. Call: +8801 62420 9291. Thank You!</p>
</body>
</html>
