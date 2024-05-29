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
<div class="container mt-5">
    @can('add user')
        <a class="btn btn-sm btn-success" href={{ route('user.create') }}>add user</a>
    @endcan
        <div class="row">
        @foreach ($users as $user)
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <label>name</label>
                        <p class="card-text">{{ $user->name }}</p>
                        <label>email</label>
                        <p class="card-text">{{$user->email }}</p>

                        <label>role</label>
                        <p class="card-text">{{$user->getRoleNames()->first()}}</p>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm">
                                @can('edit user')
                                <a href="{{ route('user.edit', $user->id) }}"
                                   class="btn btn-primary btn-sm">{{trans('main.edit')}}</a>
                                @endcan
                            </div>

                            <div class="col-sm">
                                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    @can('delete user')
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


