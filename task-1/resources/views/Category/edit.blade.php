<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Edit Category</title>
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
        <div class="col-10 col-md-8 col-lg-6">
            <h3>{{trans('main.Update category')}}</h3>
            <form action="{{ route('category.update', $category->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">{{trans('main.name_ar')}}</label>
                    <input type="text" class="form-control" id="title" name="name_ar"
                           value="{{ $category->name_ar }}" >
                </div>
                <div class="form-group">
                    <label for="body">{{trans('main.name_en')}}</label>
                    <textarea class="form-control" id="body" name="name_en" rows="3" >{{ $category->name_en }}</textarea>
                </div>
                <div class="form-group">
                    <label for="title">{{trans('main.description')}}</label>
                    <textarea type="text" class="form-control"  name="description" >
                            {{$category->description}}
                            </textarea>


                </div>

                <button type="submit" class="btn btn-primary">{{trans('main.Update category')}}</button>

            </form>
            <a href="{{route('category.index')}}" class="btn btn-success "> {{trans('main.back')}}</a>

        </div>

    </div>

</div>

</body>

</html>
