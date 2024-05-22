@extends('layout')

@section('content')
    <div class="container" style="margin-top: 50px;">

        <h3 class="text-center text-danger"><b>{{ __('messages.product_all') }} </b> </h3>

        
        <div class="container" style="max-height:700px; max-width:700px">
            <a href="/products/create" class="btn btn-outline-success">{{ __('messages.add_product') }}</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="col-md-1">{{ __('messages.no') }}</th>
                        <th class="col-md-3">{{ __('messages.name') }} </th>
                        <th class="col-md-4">{{ __('messages.descripation') }} </th>
                        <th class="col-md-4"> {{ __('messages.price') }}</th>
                        <th class="col-md-4">{{ __('messages.image') }} </th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($products as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <img src="{{ asset('images/' . $item->image) }}" class="img-responsive" style="max-height:50px; max-width:50px" alt="{{ $item->name }}">
                            </td>
                            
                            <td><a href="{{ route('products.edit', $item->id) }}" class="btn btn-outline-primary">{{ __('messages.update') }}</a>
                            </td>
                            <td>
                                <form action="{{ route('products.destroy', $item->id) }}" method="post">
                                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?');"
                                        type="submit">{{ __('messages.delete') }}</button>
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
