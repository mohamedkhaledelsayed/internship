<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css?family-Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<div class="modal fade" id="AddProductModal" tabindex="-1" aria-labelledby="AddProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddProductModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="save_msgList"></ul>
                <div class="form-group mb-3">
                    <label for="product_name">Product Name</label>
                    <input type="text" id="product_name" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="product_description">Description</label>
                    <textarea id="product_description" required class="form-control"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="product_price">Price</label>
                    <input type="number" id="product_price" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="product_image">Image URL</label>
                    <input type="text" id="product_image" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="category_id">Category</label>
                    <select id="category_id" required class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_product">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="EditProductModal" tabindex="-1" aria-labelledby="EditProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="update_msgList"></ul>
                <input type="hidden" id="product_id">
                <form method="POST" action="/products" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="edit_product_name">Product Name</label>
                    <input type="text" id="edit_product_name" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="edit_product_description">Description</label>
                    <textarea id="edit_product_description" required class="form-control"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="edit_product_price">Price</label>
                    <input type="number" name="price" id="edit_product_price" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="edit_product_image">Image</label>
                    <input type="file" name="image" id="edit_product_image" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="edit_category_id">Category</label>
                    <select id="edit_category_id" required class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_product">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete Product Modal -->
<div class="modal fade" id="DeleteProductModal" tabindex="-1" aria-labelledby="DeleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteProductModalLabel">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Confirm to Delete Product?</h4>
                <input type="hidden" id="deleting_product_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_product">Yes Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div id="success_message"></div>
            <div class="card">
                <div class="card-header">
                    <h4>
                        Product Data
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#AddProductModal">Add Product</button>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td><img src="{{ $product->image }}" width="50" height="50" alt="Image"></td>
                                    <td>{{ $product->category->name }}</td>
                                    <td><button type="button" value="{{ $product->id }}" class="btn btn-primary editbtn btn-sm">Edit</button></td>
                                    <td><button type="button" value="{{ $product->id }}" class="btn btn-danger deletebtn btn-sm">Delete</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        // Add product
        $(document).on('click', '.add_product', function (e) {
            e.preventDefault();
            var data = {
                'name': $('#product_name').val(),
                'description': $('#product_description').val(),
                'price': $('#product_price').val(),
                'image': $('#product_image').val(),
                'category_id': $('#category_id').val(),
            };

            $.ajax({
                type: "POST",
                url: "/products",
                data: data,
                dataType: "json",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_product').text('Save');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddProductModal').find('input, textarea, select').val('');
                        $('.add_product').text('Save');
                        $('#AddProductModal').modal('hide');
                        fetchProducts();
                    }
                }
            });
        });

        // Edit product
        $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var product_id = $(this).val();
            $('#EditProductModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit-product/" + product_id,
                success: function (response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                        $('#EditProductModal').modal('hide');
                    } else {
                        $('#edit_product_name').val(response.product.name);
                        $('#edit_product_description').val(response.product.description);
                        $('#edit_product_price').val(response.product.price);
                        $('#edit_product_image').val(response.product.image);
                        $('#edit_category_id').val(response.product.category_id);
                        $('#product_id').val(product_id);
                    }
                }
            });
        });

        // Update product
        $(document).on('click', '.update_product', function (e) {
            e.preventDefault();
            var id = $('#product_id').val();

            var data = {
                'name': $('#edit_product_name').val(),
                'description': $('#edit_product_description').val(),
                'price': $('#edit_product_price').val(),
                'image': $('#edit_product_image').val(),
                'category_id': $('#edit_category_id').val(),
            };

            $.ajax({
                type: "PUT",
                url: "/update-product/" + id,
                data: data,
                dataType: "json",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if (response.status == 400) {
                        $('#update_msgList').html("");
                        $('#update_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.update_product').text('Update');
                    } else {
                        $('#update_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#EditProductModal').find('input, textarea, select').val('');
                        $('.update_product').text('Update');
                        $('#EditProductModal').modal('hide');
                        fetchProducts();
                    }
                }
            });
        });

        // Delete product
        $(document).on('click', '.deletebtn', function () {
            var product_id = $(this).val();
            $('#DeleteProductModal').modal('show');
            $('#deleting_product_id').val(product_id);
        });

        $(document).on('click', '.delete_product', function (e) {
            e.preventDefault();
            var id = $('#deleting_product_id').val();

            $.ajax({
                type: "DELETE",
                url: "/delete-product/" + id,
                dataType: "json",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#DeleteProductModal').modal('hide');
                        fetchProducts();
                    }
                }
            });
        });

        // Fetch products
        function fetchProducts() {
            $.ajax({
                type: "GET",
                url: "/fetch-products",
                dataType: "json",
                success: function (response) {
                    $('tbody').html("");
                    $.each(response.products, function (key, item) {
                        $('tbody').append('<tr>\
                            <td>' + item.id + '</td>\
                            <td>' + item.name + '</td>\
                            <td>' + item.description + '</td>\
                            <td>' + item.price + '</td>\
                            <td><img src="' + item.image + '" width="50" height="50" alt="Image"></td>\
                            <td>' + item.category.name + '</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        </tr>');
                    });
                }
            });
        }

        fetchProducts();
    });
</script>

</body>
</html>
