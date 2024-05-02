<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Home</title>
    @include('store')
</head>
<body>


    <main>
        <section class="categories">
            <h2>Categories</h2>
            <div class="category-list">
                @foreach ($categories as $category)
                    <a href="{{ route('products.index', ['category' => $category->name_en]) }}" class="category">
                        <div class="category-name">{{ $category->name_en }} {{ $category->name_ar }}</div>
                <form action="{{route('categories.edit',$category->id)}}">
                  <button>Update</button>
                </form>
                <form action="{{route('categories.destroy',$category->id)}}" method="post">
                  @method('DELETE')
                  @csrf
                 <button>Delete</button>
                </form>
                    </a>
                @endforeach
            </div>
        </section>
    </main>
</body>
</html>
