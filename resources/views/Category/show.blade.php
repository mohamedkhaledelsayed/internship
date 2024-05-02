<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>category</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <a class="navbar-brand h1" href={{ route('category.index') }}>category</a>
        <div class="justify-end ">
            <div class="col ">
            </div>
        </div>
</nav>
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">

        <div class="card">
            <div class="card-body">
                <p class="card-title">{{ $category->name_ar }}</p>
                <p class="card-text">{{ $category->name_en }}</p>
            </div>


            <div class="card-footer">
                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>

                <form action="{{ route('category.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <br>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>
