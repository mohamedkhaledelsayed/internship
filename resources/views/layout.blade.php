<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <!-- Image and text -->
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                Bootstrap
            </a>

            <div class="d-flex">
                <select class="form-select" onchange="window.location.href=this.value">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <option value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" 
                            {{ App::getLocale() == $localeCode ? 'selected' : '' }}>
                            @if($localeCode == 'ar')
                                🇸🇦 {{ $properties['native'] }}
                            @elseif($localeCode == 'en')
                                🇺🇸 {{ $properties['native'] }}
                            @else
                                {{ $properties['native'] }}
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>
    </div>
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRkXO8C4c6iqO0TtYfFhECmYbBPGGnUq+WW9AOsTF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2LcOHd4KVC2Lvri0z4zR0vx7tx+2w4XD2RNaxZ6p6b" crossorigin="anonymous"></script>
</body>

</html>
