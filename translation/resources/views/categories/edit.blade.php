

@section('content')
@include('layouts.main-header')
    <h1>{{trans('main_translation.Edit Category')}}</h1>

    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
    <label for="name">{{ trans('main_translation.Name') }}</label>
    <input type="text" id="name" name="name[{{ LaravelLocalization::getCurrentLocale() }}]" value="{{ $category->name}}" required>
</div>





        <button type="submit" class="btn btn-primary">{{trans('main_translation.Update')}}</button>
    </form>

