

@section('content')

    <h1>    {{trans('main_translation.Add Products')}} </h1>
    @include('layouts.main-header')
    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="form-group">
            <label for="name"> {{trans('main_translation.English Name')}}</label>
            <input type="text" class="form-control" id="name" name="name[en]" required>
        </div>
        <div class="form-group">
            <label for="name"> {{trans('main_translation.Arabic Name')}}</label>
            <input type="text" class="form-control" id="name" name="name[ar]" required>
        </div>
        <div class="form-group">
            <label for="description">{{trans('main_translation.Arabic description')}}</label>
            <input type="text" class="form-control" id="description" name="description[en]"  required>
        </div>
        <div class="form-group">
            <label for="description">{{trans('main_translation.English description')}}</label>
            <input type="text" class="form-control" id="description" name="description[ar]"  required>
        </div>
        <div class="form-group">
            <label for="category_id">{{trans('main_translation.Categories')}}</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->getTranslation('name', 'en')}}   {{ $category->getTranslation('name', 'ar') }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{trans('main_translation.Add')}}</button>
    </form>

