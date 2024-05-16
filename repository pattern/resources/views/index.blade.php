<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>{{ __('home.Home') }}</title>
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <h1>{{ __('home.Categories and Products') }}</h1>
            <div class="justify-end ">
                <div class="col ">
                    <x-language-selector></x-language-selector>
                </div>
            </div>
    </nav>
    <div class="container mt-5">
        <div class="row">

            <div class="col-sm">
                <div class="card">
                    <div class="card-body">

                        <a class="btn btn-sm btn-success"
                            href={{ route('category.index') }}>{{ __('home.Categories') }}</a>

                        <a class="btn btn-sm btn-success"
                            href={{ route('product.index') }}>{{ __('home.Products') }}</a>

                    </div>

                </div>

            </div>
        </div>
</body>

</html>
