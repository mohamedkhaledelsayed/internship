@section('content')
@include('layouts.main-header')
    <h1>{{trans('main_translation.Add Category')}}</h1>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf



        <div class="form-group">
            <label for="name">{{trans('main_translation.English Name')}}</label>
            <input type="text" class="form-control" id="name" name="name[en]" required>
        </div>
        <div class="form-group">
            <label for="name">{{trans('main_translation.Arabic Name')}}</label>
            <input type="text" class="form-control" id="name" name="name[ar]" required>
        </div>
        <button type="submit" class="btn btn-primary">{{trans('main_translation.Add')}}</button>
    </form>

