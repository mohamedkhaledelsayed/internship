

@section('content')
@include('layouts.main-header')
    <h1>{{trans('main_translation.Products')}}</h1>

    <a href="{{ route('categories.index') }}" class="btn btn-primary mb-3"> <p>{{trans('main_translation.Categories')}} </p></a>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">     {{trans('main_translation.Add Products')}}</a>


    @if ($products->isEmpty())

        <p>    {{trans('main_translation.No products found')}}</p>
    @else
        <table class="table">
            <thead>
                <tr>

                    <th>{{trans('main_translation.Name')}}</th>
                    <th>    {{trans('main_translation.Description')}}</th>
                    <th>{{trans('main_translation.Categories')}}</th>

                    <th> {{trans('main_translation.Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->getTranslation('name', LaravelLocalization::getCurrentLocale()) }}</td>
                        <td>   {{ $product->getTranslation('description', LaravelLocalization::getCurrentLocale()) }}</td>
                        <td>    {{ $product->category->getTranslation('name', LaravelLocalization::getCurrentLocale())}}</td> <!-- Assuming $product has a 'category' relationship -->
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">{{trans('main_translation.Update')}}</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">{{trans('main_translation.Delete')}}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

