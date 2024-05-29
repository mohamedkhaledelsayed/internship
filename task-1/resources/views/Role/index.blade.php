<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>User</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">

    <div class="container-fluid">
        <h1>User</h1>
        @include('layouts.trans-selector')
    </div>
</nav>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-5">
    @can('add role')
        <a class="btn btn-sm btn-success" href={{ route('role.create') }}>add role</a>
    @endcan
        <div class="row">
        @foreach ($roles as $role)
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <label>name</label>
                        <p class="card-text">{{ $role->name }}</p>
                    </div>
                     <div class="card-body">
                        <label>Permission</label>

                         <select>
                             @foreach($role->getAllPermissions() as $permission)
                                 <option value="{{$permission->id}}">
                                     {{$permission->name}}
                                 </option>
                            @endforeach
                         </select>
                    </div>


                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm">
                                @can('edit role')
                                <a href="{{ route('role.edit', $role->id) }}"
                                   class="btn btn-primary btn-sm">{{trans('main.edit')}}</a>
                                @endcan
                            </div>

                            <div class="col-sm">
                                <form action="{{ route('role.destroy', $role->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    @can('delete role')
                                    <button type="submit" class="btn btn-danger btn-sm">{{trans('main.delete')}}</button>
                                    @endcan()
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


