<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="product_name_ar">Product Name (Arabic)</label>
        <input type="text" id="product_name_ar" name="name_ar" value="{{ old('name_ar', $product->name_ar) }}">
        @if ($errors->has('name_ar'))
            <span class="error">{{ $errors->first('name_ar') }}</span>
        @endif

        <label for="product_name_en">Product Name (English)</label>
        <input type="text" id="product_name_en" name="name_en" value="{{ old('name_en', $product->name_en) }}">
        @if ($errors->has('name_en'))
            <span class="error">{{ $errors->first('name_en') }}</span>
        @endif

        <label for="category_id">Category</label>
        <select id="category_id" name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                    {{ $category->name_en }}-{{ $category->name_ar }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('category_id'))
            <span class="error">{{ $errors->first('category_id') }}</span>
        @endif

        <label for="description_ar">Product Description (Arabic)</label>
        <textarea id="description_ar" name="description_ar">{{ old('description_ar', $product->description_ar) }}</textarea>
        @if ($errors->has('description_ar'))
            <span class="error">{{ $errors->first('description_ar') }}</span>
        @endif

        <label for="description_en">Product Description (English)</label>
        <textarea id="description_en" name="description_en">{{ old('description_en', $product->description_en) }}</textarea>
        @if ($errors->has('description_en'))
            <span class="error">{{ $errors->first('description_en') }}</span>
        @endif

        <label for="image">Product Image</label>
        <input type="file" id="image" name="image">
        @if ($errors->has('image'))
           <span class="error">{{ $errors->first('image') }}</span>
        @endif

        @if(!$errors->has('image') && $product->image) <!-- Check if there are no errors and there's an existing image -->
           <p>Current Image:</p>
           <img src="{{ asset($product->image) }}" alt="Current Image" style="max-width: 100%;">
        @endif

        <label for="price">Product Price</label>
        <input type="text" id="price" name="price" value="{{ old('price', $product->price) }}">
        @if ($errors->has('price'))
            <span class="error">{{ $errors->first('price') }}</span>
        @endif

        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
