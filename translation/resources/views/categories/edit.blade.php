

@section('content')
@include('layouts.main-header')
    <h1>{{trans('main_translation.Edit Category')}}</h1>

    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">{{trans('main_translation.English Name')}}</label>
            <input type="text" class="form-control" id="name" name="name[en]" value="{{ $category->getTranslation('name', 'en')}}" required>
        </div>

        <div class="form-group">
            <label for="name">{{trans('main_translation.Arabic Name')}}</label>
            <input type="text" class="form-control" id="name" name="name[ar]" value="{{ $category->getTranslation('name', 'ar')}}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{trans('main_translation.Update')}}</button>
    </form>

