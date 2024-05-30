@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Role Management
                    @can('role-create')
                    <div class="float-end">

                            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>

                    </div>
                    @endcan
                </h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped table-hover">
        <tr>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>

                        <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                        @endcan
                        @can('role-delete')
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>

                        </form>
                        @endcan

                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center">

    </div>
@endsection
