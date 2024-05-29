<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Edit role</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">

    <div class="container-fluid">
        <h1>Role</h1>
        @include('layouts.trans-selector')
    </div>
</nav>
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>update user</h3>
            <form action="{{ route('role.update',$role->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">{{trans('main.name')}}</label>
                    <input type="text" class="form-control" name="name" value="{{$role->name}}">
                    @if($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">

                    <label for="title">assign permission</label>
                    <br>
                    <select name="permission[]" multiple>
                        @foreach($permissions as $permission)
                            <option value="{{$permission->id}}">
                                {{$permission->name}}
                            </option>
                        @endforeach
                        @if($errors->has('permission'))
                            <div class="alert alert-danger">{{ $errors->first('permission') }}</div>
                        @endif
                    </select>
                </div>
                <input type="hidden" name="id" value="{{$role->id}}">
                <br>
                <button type="submit" class="btn btn-primary">update role</button>

            </form>
            <a href="{{route('role.index')}}" class="btn btn-success "> {{trans('main.back')}}</a>

        </div>
    </div>
</div>
</body>

</html>
