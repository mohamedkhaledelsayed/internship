<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Edit Product</title>
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
        <div class="col-10 col-md-8 col-lg-6">
            <h3>{{trans('main.Update Product')}}</h3>
            <form action="{{ route('product.update', $product->id) }}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">{{trans('main.name')}}</label>
                    <input type="text" class="form-control" name="name" required value="{{$product->name}}">
                    @if($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">{{trans('main.price')}}</label>
                    <input type="text" class="form-control"  name="price" required value="{{$product->price}}">
                    @if($errors->has('price'))
                        <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                    @endif
                </div>
                <div class="form-group">
                        <label for="title">{{trans('main.image')}}</label>
                    <input type="file" class="form-control"  name="image" value="{{$product->image}}">

                </div>
                <div class="form-group col-md-6">
                    <label >{{trans('main.Category')}}</label>
                    <select name="category_id"  class="form-control">
                        <
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name_ar }} </option>
                        @endforeach
                    </select>

                </div>
                <button type="submit" class="btn btn-primary">{{trans('main.Update Product')}}</button>
            </form>
            <a href="{{route('product.index')}}" class="btn btn-success "> {{trans('main.back')}}</a>

        </div>
    </div>
</div>
</body>

</html>
