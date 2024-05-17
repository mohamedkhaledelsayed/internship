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
<div class="container mt-5">
    <a class="btn btn-sm btn-success" href={{ route('product.create') }}>{{trans('main.add product')}}</a>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <label>{{trans('main.name')}}</label>
                        <p class="card-text">{{ $product->name }}</p>
                        <label>{{trans('main.price')}}</label>
                        <p class="card-text">{{$product->price }}</p>
                        <label>{{trans('main.image')}}</label>
                        <p class="card">{{$product->image }}</p>
                        <label>{{trans('main.Category')}}</label>
                        <p class="card-text">{{$product->Category->name }}</p>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm">
                                <a href="{{ route('product.edit', $product->id) }}"
                                   class="btn btn-primary btn-sm">{{trans('main.edit')}}</a>
                            </div> <div class="col-sm">
                                <a href="{{ route('product.show', $product->id) }}"
                                   class="btn btn-success btn-sm">{{trans('main.show')}}</a>
                            </div>
                            <div class="col-sm">
                                <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">{{trans('main.delete')}}</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
    <a href="{{route('index')}}" class="btn btn-success "> {{trans('main.back')}}</a>

</div>
</body>

</html>


