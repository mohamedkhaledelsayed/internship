<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>{{ __('Home') }}</title>
</head>
<body>

<header class="mb-3">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <a class="navbar-brand" href="#">{{ __('Home') }}</a>
        <div class="mr-auto"></div>
        <form class="form-inline" action="{{ route('categories.create') }}">
            <button class="btn btn-primary mr-2">{{ __('Create Category') }}</button>
        </form>
        <form class="form-inline" action="{{ route('products.create') }}">
            <button class="btn btn-primary">{{ __('Create Product') }}</button>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item">
                        <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>

<main class="container">
    <section class="categories">
        <h2 class="text-center my-5 mb-3">{{ __('Categories') }}</h2> <!-- Added mb-3 class for bottom margin -->
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <a href="{{ route('products.index', ['category' => $category->translate(app()->getLocale())->name]) }}" class="category">
                                <h5 class="card-title text-primary">{{ $category->translate(app()->getLocale())->name }}</h5>
                            </a>
                            <form action="{{ route('categories.edit', $category->id) }}" method="get" class="mt-2">
                                <button class="btn btn-primary btn-block">{{ __('Update') }}</button>
                            </form>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="post" class="mt-2">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-block">{{ __('Delete') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
