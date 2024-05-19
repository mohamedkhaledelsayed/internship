<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>{{ __('home.Products') }}</title>
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <h1>{{ __('home.Products') }}</h1>
            <div class="justify-end ">
                <div class="col ">
                    <x-language-selector></x-language-selector>
                </div>
                <a class="btn btn-sm btn-success" href={{ route('product.create') }}>{{ __('home.Create Product') }}</a>
                <a class="btn btn-sm btn-success" href='/'>{{ __('home.Home') }}</a>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <label>{{ __('home.name_ar') }}</label>
                            <p class="card-text">{{ $product->name_ar }}</p>
                            <label>{{ __('home.name_en') }}</label>
                            <p class="card-text">{{ $product->name_en }}</p>
                            <label>{{ __('home.description') }}</label>
                            <p class="card-text">{{ $product->description }}</p>
                            <label>{{ __('home.price') }}</label>
                            <p class="card-text">{{ $product->price }}</p>
                            <label>{{ __('home.image') }}</label>
                            <br>
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name_en }}">
                            <br>
                            <label>{{ __('home.Category') }}</label>
                            <p class="card-text">
                                {{ app()->getLocale() === 'ar' ? $product->Category->translate('ar')->name : $product->Category->translate('en')->name }}
                            </p>
                        </div>
                        <div class="col-sm">
                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">{{ __('home.Delete') }}</button>
                            </form>
                            <div class="col-sm">
                                <a href="{{ route('product.edit', $product->id) }}"
                                    class="btn btn-primary btn-sm">{{ __('home.edit') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
