<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        .container {
            margin-bottom: 120px;
        }
    </style>
</head>

<body>
    @include('layouts.v_nav_bar')

    <br><br>
    <h1 style="text-align: center;">Order History</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Buyer Name</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order as $orderz)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $orderz->product->name}}</td>
                                    <td>{{ $orderz->buyer_name }}</td>
                                    <td>{{ $orderz->buyer_contact}}</td>
                                    <td>{{ $orderz->amount }}</td>
                                </tr>
                                @empty
                                <div class="container">
                                    <p style="text-align: center;">There is No Data</p>
                                    <p style="text-align: center;">
                                        <a href="{{ route('product.create') }}" class="btn btn-md btn-dark mb-3">Add Product</a>
                                    </p>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- //PRODUCT YE -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



</body>

</html>