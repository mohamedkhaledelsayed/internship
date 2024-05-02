<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Product</title>
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <h1>Product</h1>
            <div class="justify-end ">
                <div class="col ">

                    <a class="btn btn-sm btn-success" href={{ route('product.create') }}>Add product</a>
                </div>
            </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <label>الاسم</label>
                        <p class="card-text">{{ $product->name_ar }}</p>
                        <label>Name</label>
                        <p class="card-text">{{ $product->name_en }}</p>
                        <label>الوصف</label>
                        <p class="card-text">{{ $product->description}}</p>
                        <label>السعر</label>
                        <p class="card-text">{{$product->price }}</p>
                        <label>الصورة</label>
                        <br>
                        <img src="{{ $product->image }}" alt="{{ $product->name_en }}">
                        <br>
                        <label>الصنف</label>
                        <p class="card-text">{{$product->Category->name_ar }}</p>

                    </div>
                    <div class="col-sm">
                        <form action="{{ route('product.destroy', $product->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>