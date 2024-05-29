<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <title>{{trans('main.Categories')}}</title>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-warning">

    <div class="container-fluid">
        <h1>{{trans('main.Categories')}}</h1>
        @include('layouts.trans-selector')
     </div>
</nav>
<div class="container mt-5">
    <div class="col ">
        @can('add category')
        <a class="btn btn-sm btn-success" href={{ route('category.create') }}>{{trans('main.add category')}}</a>
        @endcan
    </div>

    <div class="row">

        @foreach ($categories as $category)
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <label>{{trans('main.name')}}</label>
                        <p class="card-text">{{ $category->name }}</p>



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
                        <div class="row">
                            <div class="col-sm">
                                @can('edit category')
                                <a href="{{ route('category.edit', $category->id) }}"
                                   class="btn btn-primary btn-sm">{{trans('main.edit')}}</a>
                                @endcan

                            <div class="col-sm">
                                <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    @can('delete category')
                                        <button type="submit" class="btn btn-danger btn-sm">{{trans('main.delete')}}</button>
                                    @endcan
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{route('dashboard')}}" class="btn btn-success "> {{trans('main.back')}}</a>
</div>
</body>

</html>


