

@section('content')
    <h1>Edit Category</h1>
    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name_arabic">Arabi Name</label>
            <input type="text" class="form-control" id="name_arabic" name="name_arabic" value="{{ $category->name_arabic }}" required>
        </div>
        <div class="form-group">
            <label for="name_english">English Name</label>
            <input type="text" class="form-control" id="name_english" name="name_english" value="{{ $category->name_english }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

