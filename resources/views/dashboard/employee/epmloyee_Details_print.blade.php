<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
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
    <h5 style="text-align:center; margin-top:10px;">Employee Details</h5>
        <div class="amount-box"></div>
    <table class="table table-striped table-hover table-bordered align-middle">
        <thead class="table-primary">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Address</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $key => $val)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $val->name }}</td>
                <td>{{ $val->email }}</td>
                <td>{{ $val->phone }}</td>
                <td>{{ $val->dob }}</td>
                <td>{{ $val->address }}</td>
                <td>
                    @php
                        $roles = [1 => 'Admin', 2 => 'Manager', 3 => 'Waiter', 4 => 'Shafe', 5 => 'Other'];
                    @endphp
                    {{ $roles[$val->role] ?? 'Unknown' }}
                </td>
                <td class="text-center">
                    @if($val->status == 1)
                        <a href="{{url('/update-employee-status/'.$val->id)}}"><button class="btn btn-success btn-sm">Active</button></a>
                    @else
                        <a href="{{url('/update-employee-status/'.$val->id)}}"><button class="btn btn-danger btn-sm">Deactive</button></a>
                    @endif
                </td>
            </tr>
            @endforeach
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