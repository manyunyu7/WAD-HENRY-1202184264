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
        .product-wrap {
            margin-bottom: 40px;
        }

        img {
            width: 100%;
            height: 200px;
        }
    </style>
</head>

<body>
    @include('layouts.v_nav_bar')


    <br><br>
    <h1 style="text-align: center;">Order</h1>
    <br>

    <div class="container">
        @if($post)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img class="card-img-top" src="{{ Storage::url('public/products/').$post->img_path }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <h1>{{$post->name}}</h1>
                        <p class="card-text">{{$post->description}}</p>
                        <p class="card-text">Stock : {{$post->stock}}</p>
                        <h2>${{$post->price}}.00</h2>
                    </div>
                </div>

            </div>
        </div>

        <br><br>
        <div class="card">
            <div class="card-body">
                <h1 class="card-title" style="text-align: center;">Buyer Information</h1>
                <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('cust_name') is-invalid @enderror" name="cust_name" value="{{ old('cust_name') }}" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <label>Contact</label>
                        <input type="number" class="form-control @error('cust_name') is-invalid @enderror" name="cust_contact" value="{{ old('cust_contact') }}" placeholder="Enter Your Contact">
                    </div>

                    <input type="hidden" name="product_id" value="{{$post->id}}">
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label>Quantity</label>
                        <input type="number"  class="form-control @error('cust_cuan') is-invalid @enderror" min="0" max="{{$post->stock}}" name="cust_cuan" value="{{ old('cust_cuan') }}" placeholder="Enter Quantity">
                    </div>
                    </div>

                    <button type="submit" class="btn btn-md btn-primary">Submit</button>

                </form>
            </div>
        </div>
        <br><br><br>


        @endif


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



</body>

</html>