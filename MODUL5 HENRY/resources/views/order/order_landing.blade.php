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
        .product-wrap{
            margin-bottom: 40px;
        }

        img{
            width: 100%;
            height: 200px;
        }

    </style>
</head>

<body>
    @include('layouts.v_nav_bar')

    <br><br>
    <h1 style="text-align: center;">Order</h1>

    <div class="container mt-5">
        <div class="row">
                @forelse ($product as $productz)
                <div class="col-md-4 product-wrap">
                    <div class="card h-100 border-pda">
                        <img class="card-img-top" src="{{ Storage::url('public/products/').$productz->img_path }}" alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{ $productz->name }}</h4>
                            <p class="card-text">{{ $productz->description }}</p>
                            <h1 class="card-text">${{ $productz->price}}.00</h1>
                            <!-- <a href="{{ route('product.edit', $productz->id) }}" class="btn btn-success">Order Now</a> -->
                            <a href="{{ url('order',$productz->id) }}" class="btn btn-success">Order Now</a>
                        </div>
                    </div>
                </div>
        

            @empty
            <div class="container">
                <p style="text-align: center;">There is No Data</p>
                <p style="text-align: center;">
                    <a href="{{ route('product.create') }}" class="btn btn-md btn-dark mb-3">Add Product</a>
                </p>
            </div>
            @endforelse

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session() -> has('success'))

        toastr.success('{{ session('
            success ') }}', 'BERHASIL MEMESAN MAKANAN HAHAHA!');

        @elseif(session() -> has('error'))

        toastr.error('{{ session('
            error ') }}', 'GAGAL!');

        @endif
    </script>

</body>

</html>