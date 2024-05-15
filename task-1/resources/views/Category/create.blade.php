<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Create category</title>
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
            <h3>{{trans('main.add category')}}</h3>
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">{{trans('main.name_ar')}} </label>
                    <input type="text" class="form-control" name="name" >
                    @if($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">{{trans('main.name_en')}}</label>
                    <input type="text" class="form-control"  name="name_en" >
                    @if($errors->has('name_en'))
                        <div class="alert alert-danger">{{ $errors->first('name_en') }}</div>
                    @endif
                </div>
        <div class="form-group">
                    <label for="title">{{trans('main.description')}}</label>
                   <textarea type="text" class="form-control"  name="description" >
                            </textarea>

                </div>


                <br>
                <button type="submit" class="btn btn-primary">{{trans('main.Create category')}}</button>
                <a href="{{route('category.index')}}" class="btn btn-success "> {{trans('main.back')}}</a>
            </form>
        </div>
    </div>
</div>
</body>

</html>
