<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>category</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">

        <h1>{{trans('main.Categories')}}</h1>

        @include('layouts.trans-selector')

       </div>
</nav>
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">

        <div class="card">
            <div class="card-body">
                <label>{{trans('main.name')}}</label>
                <p class="card-title">{{ $category->name }}</p>

                <label>{{trans('main.Products')}}</label>

                <select>

                    @foreach($category->products as $products)

                        <option value="{{$products->id}}">
                            {{$products->name}}
                        </option>

                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">{{trans('main.description')}}</label>
                <input type="text" class="form-control"  name="description" readonly value="{{$category->description}}" >


            </div>

            <div class="card-footer">
                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">{{trans('main.edit')}}</a>

                <form action="{{ route('category.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <br>
                    <button type="submit" class="btn btn-danger btn-sm">{{trans('main.delete')}}</button>
                </form>
            </div>

        </div>

    </div>
    <a href="{{route('category.index')}}" class="btn btn-success "> {{trans('main.back')}}</a>
</div>
</body>

</html>
