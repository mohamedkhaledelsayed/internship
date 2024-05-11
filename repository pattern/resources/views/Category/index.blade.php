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
    <nav class="navbar">
        <div class="container-fluid">
            <h1>Category</h1>
            <div class="justify-end ">
                <div class="col ">

                    <a class="btn btn-sm btn-success" href={{ route('category.create') }}>Add category</a>
                </div>
            </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <label>الاسم</label>
                        <p class="card-text">{{ $category->name_ar }}</p>
                        <label>Name</label>
                        <p class="card-text">{{$category->name_en }}</p>



                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <form action="{{ route('category.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>