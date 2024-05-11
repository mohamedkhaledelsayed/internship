@extends('layout')

@section('content')
    <main class="container">
        <!-- START FORM -->
        <form action='{{ route('products.update', $product->id) }}' method='post' enctype="multipart/form-data">


            @csrf
            @method('PATCH')
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">Nama ar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $product->name_ar }}" name='name_ar'
                            id="name_ar">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama en</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $product->name_en }}" name='name_en'
                            id="name_en">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label"> Category</label>
                    <div class="col-sm-10">
                      <select id="category_id" class="form-control" name="category_id" style="color: black; background-color: white;">
                        <option disabled {{ $product->category->name_ar == null ? 'selected' : '' }}>اختر تصنيفًا</option>
                        @foreach ($categories as $category)
                            <option value="{{ $product->category->id }}" {{ $product->category->name_ar == $category ? 'selected' : '' }}>
                                {{ $product->category->name_ar }}
                            </option>
                        @endforeach
                    </select>
                    
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" value="{{ $product->price }}" name="price" id="price">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" value="{{ $product->image }}" class="form-control" name="image" id="image">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Edit</button></div>
            </div>
        </form>
        </div>

    </main>
@endsection
