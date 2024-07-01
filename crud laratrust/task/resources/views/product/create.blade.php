<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    <style>
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        select,
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .error {
            color: red;
            font-size: 12px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Create Product</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name_ar">Product Name (Arabic)</label>
        <input type="text" id="name_ar" name="name_ar">
        @if ($errors->has('name_ar'))
            <span class="error">{{ $errors->first('name_ar') }}</span>
        @endif

        <label for="name_en">Product Name (English)</label>
        <input type="text" id="name_en" name="name_en">
        @if ($errors->has('name_en'))
            <span class="error">{{ $errors->first('name_en') }}</span>
        @endif

        <label for="description_ar">Product Description (Arabic)</label>
        <textarea id="description_ar" name="description_ar"></textarea>
        @if ($errors->has('description_ar'))
            <span class="error">{{ $errors->first('description_ar') }}</span>
        @endif

        <label for="description_en">Product Description (English)</label>
        <textarea id="description_en" name="description_en"></textarea>
        @if ($errors->has('description_en'))
            <span class="error">{{ $errors->first('description_en') }}</span>
        @endif

        <label for="image">Product Image</label>
        <input type="file" id="image" name="image">
        @if ($errors->has('image'))
            <span class="error">{{ $errors->first('image') }}</span>
        @endif

        <label for="price">Product Price</label>
        <input type="text" id="price" name="price">
        @if ($errors->has('price'))
            <span class="error">{{ $errors->first('price') }}</span>
        @endif

        <label for="category_id">Category</label>
        <select id="category_id" name="category_id">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name_en }}-{{ $category->name_ar }}</option>
            @endforeach
        </select>
        @if ($errors->has('category_id'))
            <span class="error">{{ $errors->first('category_id') }}</span>
        @endif

        <input type="submit" value="Create Product">
    </form>
</body>
</html>
