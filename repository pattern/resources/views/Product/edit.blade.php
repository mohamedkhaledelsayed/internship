<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>{{ __('home.Edit Product') }}</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar ">

        <div class="container-fluid">
            <h1>{{ __('home.Products') }}</h1>
            <div class="justify-end ">
                <div class="col ">
                    <x-language-selector></x-language-selector>
                </div>
            </div>
    </nav>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>{{ __('home.Edit Product') }}</h3>
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">{{ __('home.name_ar') }}</label>
                        <input type="text" class="form-control" name="name_ar" required
                            value="{{ $product->name_ar }}">
                        @if ($errors->has('name_ar'))
                            <div class="alert alert-danger">{{ $errors->first('name_ar') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">{{ __('home.name_en') }}</label>
                        <input type="text" class="form-control" name="name_en" required
                            value="{{ $product->name_en }}">
                        @if ($errors->has('name_en'))
                            <div class="alert alert-danger">{{ $errors->first('name_en') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">{{ __('home.description') }}</label>
                        <input type="text" class="form-control" name="description" required
                            value="{{ $product->description }}">
                        @if ($errors->has('description'))
                            <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="title">{{ __('home.price') }}</label>
                        <input type="text" class="form-control" name="price" required
                            value="{{ $product->price }}">
                        @if ($errors->has('price'))
                            <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">{{ __('home.image') }}</label>
                        <input type="file" class="form-control" name="image" value="{{ $product->image }}">

                    </div>
                    <div class="form-group col-md-6">
                        <label>{{ __('home.Category') }}</label>
                        <select name="category_id" class="form-control">
                            <option>{{ __('home.Select category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_ar }} </option>
                            @endforeach
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('home.Update Product') }}</button>
                </form>
                <a href="{{ route('product.index') }}" class="btn btn-success ">{{ __('home.back') }}</a>

            </div>
        </div>
    </div>
</body>

</html>
