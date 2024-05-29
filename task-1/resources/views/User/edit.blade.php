<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Edit user</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">

    <div class="container-fluid">
        <h1>User</h1>
        @include('layouts.trans-selector')
    </div>
</nav>
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>update user</h3>
            <form action="{{ route('user.update',$user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">{{trans('main.name')}}</label>
                    <input type="text" class="form-control" name="name"  value="{{$user->name}}">
                    @if($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">email</label>
                    <input type="email" class="form-control"  name="email" value="{{$user->email}}">
                    @if($errors->has('email'))
                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">password</label>
                    <input type="password" class="form-control"  name="password" value="{{$user->password}}" >
                    @if($errors->has('password'))
                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">confirm_password</label>
                    <input type="password" class="form-control"  name="confirm_password" value="{{$user->password}}">
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
                <input type="hidden" name="id" value="{{$user->id}}">
                <br>
                <button type="submit" class="btn btn-primary">update user</button>

            </form>
            <a href="{{route('user.index')}}" class="btn btn-success "> {{trans('main.back')}}</a>

        </div>
    </div>
</div>
</body>

</html>
