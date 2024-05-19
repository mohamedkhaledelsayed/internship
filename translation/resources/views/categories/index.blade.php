
@section('content')
@include('layouts.main-header')

    <h1>{{trans('main_translation.Categories')}}</h1>
    <a href="{{ route('products.index') }}" class="btn btn-primary mb-3"><p>{{trans('main_translation.Products')}} </p></a>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">{{trans('main_translation.Add Category')}}</a>

    @if($categories->isEmpty())
        <p>No categories found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th> {{trans('main_translation.Name')}}</th>
                    <td></td>
                    <td></td>
                    <th>{{trans('main_translation.Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>


                        <td>{{ $category->name  }}</td>

                        <td></td>

                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">{{trans('main_translation.Delete')}}</button>
                            </form>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">{{trans('main_translation.Edit')}}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

