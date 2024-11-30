<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>cashier dashboard</title>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link" style="color: red; text-decoration: none;">Logout</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <div class="row">
                    <table class="table-resposnive table border table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th>Service Name</th>
                                <th>Service Date</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($availed_services as $availed_service)
                            <tr>
                                <td>{{ $availed_service->guest_name }}</td>
                                <td>{{ $availed_service->service ? $availed_service->service->service_name : 'N/A' }}</td>
                                <td>{{ $availed_service->service_date }}</td>
                                <td>{{ $availed_service->payment_method }}</td>
                                <td class="text-center">
                                    <p class="{{ $availed_service->payment_status == 'pending' ? 'bg-warning text-white' : 'bg-success text-white' }} p-2 rounded-pill">
                                        {{ $availed_service->payment_status }}
                                    </p>
                                </td>

                                <td>{{ $availed_service->total_price }}</td>
                                <td class="d-flex">
                                    <form action="{{ route('service.destroy', $availed_service->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                    <form action="{{ route('mark.as.paid', $availed_service->id) }}" method="POST" class="d-inline-block ms-2">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Paid</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>