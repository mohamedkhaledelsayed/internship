<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>{{ __('home.Add category') }}</title>
</head>

<body>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <div class="justify-end ">
                    <div class="col ">
                        <x-language-selector></x-language-selector>
                    </div>
                </div>
                <h3>{{ __('home.Add category') }}</h3>
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">{{ __('home.name_ar') }}</label>
                        <input type="text" class="form-control" name="ar[name]" required>
                        @if ($errors->has('ar[name]'))
                            <div class="alert alert-danger">{{ $errors->first('ar[name]') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">{{ __('home.name_en') }}</label>
                        <input type="text" class="form-control" name="en[name]" required>
                        @if ($errors->has('en[name]'))
                            <div class="alert alert-danger">{{ $errors->first('en[name]') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">{{ __('home.description') }}</label>
                        <textarea type="text" class="form-control" name="description">
                                </textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">{{ __('home.Create category') }}</button>
                    <a href="{{ route('category.index') }}" class="btn btn-success ">{{ __('home.back') }}</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
