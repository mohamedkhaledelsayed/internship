<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>{{ __('home.Categories') }}</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">

        <div class="container-fluid">
            <h1>{{ __('home.Categories') }}</h1>
            <div class="justify-end ">
                <div class="col ">
                    <x-language-selector></x-language-selector>
                </div>
            </div>
        </div>
    </nav>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>{{ __('home.Edit category') }}</h3>
                <form action="{{ route('category.update', $category->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="body">{{ __('home.name_en') }}</label>
                        <input type="text" class="form-control" id="title" name="name_en"
                            value="{{ $category->name_en }}">
                    </div>

                    <div class="form-group">
                        <label for="title">{{ __('home.name_ar') }}</label>
                        <input type="text" class="form-control" id="title" name="name_ar"
                            value="{{ $category->name_ar }}">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('home.Update category') }}</button>
                </form>
                <a href="{{ route('category.index') }}" class="btn btn-success ">{{ __('home.back') }}</a>

            </div>

        </div>

    </div>

</body>

</html>
