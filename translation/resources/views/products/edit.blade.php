

@section('content')
    <h1>{{trans('main_translation.Edit Product')}}</h1>
    @include('layouts.main-header')
    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')


        <div class="form-group">
            <label for="name">{{trans('main_translation.Arabic Name')}}</label>
            <input type="text" class="form-control" id="name" name="name[{{ LaravelLocalization::getCurrentLocale() }}]" value="{{ $product->name}}" required>
        </div>


        <div class="form-group">
            <label for="description">{{trans('main_translation.Arabic description')}}</label>
            <input type="text" class="form-control" id="description" name="description[{{ LaravelLocalization::getCurrentLocale() }}]" value="{{ $product->description}}" required>
        </div>

        <div class="form-group">
    <label for="category_id">{{ trans('main_translation.Categories') }}</label>
    <select class="form-control" id="category_id" name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

        <button type="submit" class="btn btn-primary">{{trans('main_translation.Update')}}</button>
    </form>

