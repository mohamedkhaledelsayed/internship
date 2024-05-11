@extends('layout')

@section('content')
    <div class="container" style="margin-top: 50px;">

        <h3 class="text-center text-danger"><b>Laravel CRUD </b> </h3>
        
        <div class="container" style="max-height:700px; max-width:700px">
            <a href="/products/create" class="btn btn-outline-success">Add New Product</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-3">الاسم عربي</th>
                        <th class="col-md-4">الاسم انجليزي</th>
                        <th class="col-md-4"> السعر</th>
                        <th class="col-md-4">الصورة </th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($products as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name_ar }}</td>
                            <td>{{ $item->name_en }}</td>
                            <td>{{ $item->price }}</td>
                            <td><img src="images/{{ $item->image }}" class="img-responsive"
                                    style="max-height:50px; max-width:50px" alt="" srcset=""></td>
                            <td><a href="{{ route('products.edit', $item->id) }}" class="btn btn-outline-primary">Update</a>
                            </td>
                            <td>
                                <form action="{{ route('products.destroy', $item->id) }}" method="post">
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
