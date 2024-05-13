<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="category_name">Category English Name</label>
    <input type="text" id="category_name" name="name_en" value="{{ old('name', $category->name_en) }}">
    @if ($errors->has('name_en'))
        <span class="error">{{ $errors->first('name_en') }}</span>
    @endif
    <label for="category_name">Category Arabic Name</label>
    <input type="text" id="category_name" name="name_ar" value="{{ old('name_ar', $category->name) }}">
    @if ($errors->has('name_ar'))
        <span class="error">{{ $errors->first('name_ar') }}</span>
    @endif
    <input type="submit">
</form>


</body>
</html>
