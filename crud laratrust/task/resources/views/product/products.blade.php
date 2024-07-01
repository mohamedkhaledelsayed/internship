<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/subCategories.css') }}">
    <title>Product List</title>
</head>
<body>

<div class="card-container">
    <div class="products-container">
        @forelse ($products as $product)
            <div class="card">
                <div class="category-image">
                    <img src="{{ asset('/' . $product->image) }}" alt="{{ $product->name }}">
                </div>
                <h1>{{ $product->name_en }} - {{ $product->name_ar }}</h1>
                <p>{{ $product->description_en }}</p>
                <p>{{ $product->description_ar }}</p>
                <p>Price: {{ $product->price }}</p>
                <p>Category: {{ $product->category->name_en }} - {{ $product->category->name_ar }}</p>
                <form action="{{ route('products.edit', $product->id) }}" method="GET">
                    <button type="submit">Update</button>
                </form>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </div>
        @empty
            <p>No products found.</p>
        @endforelse
    </div>
