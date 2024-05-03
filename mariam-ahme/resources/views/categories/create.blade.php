@section('content')
    <h1>Add Category</h1>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="name_arabic">Arabic Name</label>
            <input type="text" class="form-control" id="name_arabic" name="name_arabic" required>
        </div>
        <div class="form-group">
            <label for="name_english">English Name</label>
            <input type="text" class="form-control" id="name_english" name="name_english" required>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

