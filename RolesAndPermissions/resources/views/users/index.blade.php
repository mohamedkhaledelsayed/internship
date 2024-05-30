@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
            <h2>Users Management
                <div class="float-end">
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
                </div>
            </h2>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success my-2">
  <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-hover table-striped">
 <tr>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge bg-secondary text-dark">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
        @can('user-list')
       <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
       @endcan
       @can('user-edit')
      <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
      @endcan
      @can('user-delete')


       <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
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
    {!! $data->links() !!}
</div>

@endsection
