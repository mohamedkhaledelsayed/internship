<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Category</title>
</head>
<body>
<form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="category_name_en">Category English Name</label>
    <input type="text" id="category_name_en" name="name[en]" value="{{ old('name.en', $category->translate('en')->name) }}">
    @error('name.en')
        <span class="error">{{ $message }}</span>
    @enderror

    <label for="category_name_ar">Category Arabic Name</label>
    <input type="text" id="category_name_ar" name="name[ar]" value="{{ old('name.ar', $category->translate('ar')->name) }}">
    @error('name.ar')
        <span class="error">{{ $message }}</span>
    @enderror

    <input type="submit" value="Update">
</form>
</body>
</html>
