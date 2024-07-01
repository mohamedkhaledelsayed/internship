<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="category_name">Category English Name</label>
    <input type="text" id="category_name" name="name_en" >
    @if ($errors->has('name_en'))
        <span class="error">{{ $errors->first('name_en') }}</span>
    @endif
    <label for="category_name">Category Arabic Name</label>
    <input type="text" id="category_name" name="name_ar" >
    @if ($errors->has('name_ar'))
        <span class="error">{{ $errors->first('name_ar') }}</span>
    @endif

    <input type="submit" >
</form>

</body>
</html>
