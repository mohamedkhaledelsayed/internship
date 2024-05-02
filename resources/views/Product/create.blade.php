<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Create Product</title>
</head>

<body>

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Add a Product</h3>
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">name_ar</label>
                        <input type="text" class="form-control" name="name_ar" required>
                        @if($errors->has('name_ar'))
                        <div class="alert alert-danger">{{ $errors->first('name_ar') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">name_en</label>
                        <input type="text" class="form-control" name="name_en" required>
                        @if($errors->has('name_en'))
                        <div class="alert alert-danger">{{ $errors->first('name_en') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">description</label>
                        <input type="text" class="form-control" name="description" required>
                        @if($errors->has('description'))
                        <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">price</label>
                        <input type="text" class="form-control" name="price" required>
                        @if($errors->has('price'))
                        <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">image</label>
                        <input type="file" class="form-control" name="image">

                    </div>
                    <div class="form-group col-md-6">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            <option>--- Select category ---</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name_ar }} </option>
                            @endforeach
                        </select>

                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create Product</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>