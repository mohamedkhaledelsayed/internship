
@extends('layout')

@section('content')
    <div class="container" style="margin-top: 50px;">

        <h3 class="text-center text-danger"><b>Laravel CRUD </b> </h3>
        
        <div class="container"  style="max-height:700px; max-width:700px">
            <a href="/categories/create" class="btn btn-outline-success">Add New Category</a>
            
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">الاسم عربي</th>
                    <th class="col-md-4">الاسم انجليزي</th>
                    
                </tr>
            </thead>
            <tbody>


                @foreach ($categories as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name_ar }}</td>
                        <td>{{ $item->name_en }}</td>
                        
                        <td><a href="{{ route('categories.edit', $item->id) }}" class="btn btn-outline-primary">Update</a></td>
                        
                            <td><form action="{{ route('categories.destroy', $item->id) }}" method="post">
                                <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?');"
                                    type="submit">Delete</button>
                                @csrf
                                @method('delete')
                            </form>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        </div>
    </div>
@endsection

