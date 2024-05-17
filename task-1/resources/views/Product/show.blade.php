<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Product</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">

        <h1>{{trans('main.Products')}}</h1>

        @include('layouts.trans-selector')

    </div>
</nav>
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">

        <div class="card">
            <div class="card-body">
                <label>{{trans('main.name')}}</label>

                <p class="card-title">{{ $product->name }}</p>
                <label>{{trans('main.price')}}</label>
                <p class="card-text">{{ $product->price }}</p>
                <label>{{trans('main.image')}}</label>
                <br>
                <img class="h-14 w-25" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" srcset="">
                <br>
                <label>{{trans('main.Category')}}</label>
               <p>{{ $product->category->name }}</p>
                <p class="card-text"></p>
            </div>


            <div class="card-footer">
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">{{trans('main.edit')}}</a>

                <form action="{{ route('product.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <br>
                    <button type="submit" class="btn btn-danger btn-sm">{{trans('main.delete')}}</button>
                </form>
            </div>
        </div>
    </div>
    <a href="{{route('product.index')}}" class="btn btn-success "> {{trans('main.back')}}</a>

</div>
</body>

</html>
