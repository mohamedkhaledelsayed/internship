<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Create Product</title>
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
            <h3>add user</h3>
            <form action="{{ route('user.store') }}" method="post" >
                @csrf
                <div class="form-group">
                    <label for="title">{{trans('main.name')}}</label>
                    <input type="text" class="form-control" name="name" >
                    @if($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">email</label>
                    <input type="email" class="form-control"  name="email" >
                    @if($errors->has('email'))
                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">password</label>
                    <input type="password" class="form-control"  name="password" >
                    @if($errors->has('password'))
                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">confirm_password</label>
                    <input type="password" class="form-control"  name="confirm_password" >
                    @if($errors->has('confirm_password'))
                        <div class="alert alert-danger">{{ $errors->first('confirm_password') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">assign role</label>
                    <select name="role">
                   @foreach($roles as $role)
                        <option value="{{$role->id}}">
                            {{$role->name}}
                        </option>
                   @endforeach
                    </select>

                </div>


                <br>
                <button type="submit" class="btn btn-primary">add user</button>

            </form>
            <a href="{{route('user.index')}}" class="btn btn-success "> {{trans('main.back')}}</a>

        </div>

    </div>
</div>
</body>

</html>
