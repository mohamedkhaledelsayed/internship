@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('messages.add_product') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">{{ __('messages.name') }}</label>
                    <div class="col-sm-10">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="mb-3">
                                <input type="text" class="form-control" name="name[{{ $locale }}]" id="name_{{ $locale }}" value="{{ old('name.' . $locale) }}" placeholder="{{ __('messages.name_') }} ({{ $locale }})">
                                @if($errors->has('name.' . $locale))
                                    <div class="text-danger">{{ $errors->first('name.' . $locale) }}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="description" class="col-sm-2 col-form-label">{{ __('messages.descripation') }}</label>
                    <div class="col-sm-10">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="mb-3">
                                <textarea class="form-control" name="description[{{ $locale }}]" id="description_{{ $locale }}" cols="30" rows="3" placeholder="{{ __('messages.description_') }} ({{ $locale }})">{{ old('description.' . $locale) }}</textarea>
                                @if($errors->has('description.' . $locale))
                                    <div class="text-danger">{{ $errors->first('description.' . $locale) }}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="category_id" class="col-sm-2 col-form-label">{{ __('messages.category') }}</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="category_id" id="category_id">
                            <option value="">{{ __('messages.category_select') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name_ar }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                            <div class="text-danger">{{ $errors->first('category_id') }}</div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">{{ __('messages.price') }}</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}">
                        @if($errors->has('price'))
                            <div class="text-danger">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="image" class="col-sm-2 col-form-label">{{ __('messages.image') }}</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="image" id="image">
                        @if($errors->has('image'))
                            <div class="text-danger">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">{{ __('messages.add') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
