    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <title>{{ __('home.Category') }}</title>
    </head>

    <body>
        <nav class="navbar">
            <div class="container-fluid">
                <h1>{{ __('home.Category') }}</h1>
                <div class="justify-end ">
                    <div class="col ">
                        <div class="justify-end ">
                            <div class="col ">
                                <x-language-selector></x-language-selector>
                            </div>
                        </div>
                        @can('create category')
                            <a class="btn btn-sm btn-success"
                                href={{ route('category.create') }}>{{ __('home.Add category') }}</a>
                        @endcan
                        <a class="btn btn-sm btn-success" href='/'>{{ __('home.Home') }}</a>
                    </div>
                </div>
        </nav>
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->translate('en')->name }}</h5>
                                <p class="card-text">{{ $category->translate('ar')->name }}</p>
                                <h3 class="card-title">{{ $category->description }}</h3>
                            </div>
                            <div class="card-footer bg-transparent border-top-0">
                                <div class="d-flex justify-content-between">
                                    <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        @can('delete category')
                                            <button type="submit"
                                                class="btn btn-danger btn-sm">{{ __('home.Delete') }}</button>
                                        @endcan
                                    </form>
                                    @can('update category')
                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class="btn btn-primary btn-sm">{{ __('home.edit') }}</a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </html>
