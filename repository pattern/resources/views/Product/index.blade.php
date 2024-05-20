<x-layout title="{{ __('home.Products') }}">
    <input type="hidden" id="productStoreRoute" value="{{ route('product.store') }}">

    <!-- Modal -->
    <div class="modal fade" id="AddProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('home.Add Product') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="AddProductFORM" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-groub mb-3">
                            <label>{{ __('home.name_ar') }}</label>
                            <input type="text" name="name_ar" class="form-control">
                        </div>
                        <div class="form-groub mb-3">
                            <label>{{ __('home.name_en') }}</label>
                            <input type="text" name="name_en" class="form-control">
                        </div>
                        <div class="form-groub mb-3">
                            <label>{{ __('home.description') }}</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-groub mb-3">
                            <label>{{ __('home.price') }}</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <div class="form-groub mb-3">
                            <label>{{ __('home.Category') }}</label>
                            <select name="category_id" class="form-control">
                                <option>{{ __('home.Select category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ app()->getLocale() === 'ar' ? $category->translate('ar')->name : $category->translate('en')->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-groub mb-3">
                            <label>{{ __('home.image') }}</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('home.back') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('home.Create Product') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- edit - prouct modal --}}
    <div class="modal fade" id="EDITProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('home.Edit Product') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="UpdateProductFORM" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="product_id" id="product_id">
                        <div class="form-groub mb-3">
                            <label>{{ __('home.name_ar') }}</label>
                            <input type="text" name="name_ar" id = "edit_name_ar" class="form-control">
                        </div>
                        <div class="form-groub mb-3">
                            <label>{{ __('home.name_en') }}</label>
                            <input type="text" name="name_en" id = "edit_name_en" class="form-control">
                        </div>
                        <div class="form-groub mb-3">
                            <label>{{ __('home.description') }}</label>
                            <input type="text" name="description" id = "edit_description" class="form-control">
                        </div>
                        <div class="form-groub mb-3">
                            <label>{{ __('home.price') }}</label>
                            <input type="text" name="price" id = "edit_price" class="form-control">
                        </div>
                        <div class="form-groub mb-3">
                            <label>{{ __('home.Category') }}</label>
                            <select name="category_id" id="edit_category_id" class="form-control">
                                <option>{{ __('home.Select category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ app()->getLocale() === 'ar' ? $category->translate('ar')->name : $category->translate('en')->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-groub mb-3">
                            <label>{{ __('home.image') }}</label>
                            <input type="file" name="image" id = "edit_image" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('home.back') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('home.Update Product') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End edit - prouct modal --}}

    {{-- Delete Product modal --}}
    <div class="modal fade" id="DeleteProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('home.Delete Product') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Are you sure? you want to delete this data?</h4>
                    <input type="hidden" id="deleting_product_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('home.back') }}</button>
                    <button type="submit"
                        class="delete_product_btn btn btn-primary">{{ __('home.Delete') }}</button>
                </div>
            </div>
        </div>
    </div>

    {{-- End- Delete Product Modal --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('home.Products') }}</h4>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#AddProductModal"
                            class="btn btn-primary btn-sm float-end">{{ __('home.Add Product') }}</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('home.name_ar') }}</th>
                                        <th>{{ __('home.name_en') }}</th>
                                        <th>{{ __('home.description') }}</th>
                                        <th>{{ __('home.price') }}</th>
                                        <th>{{ __('home.Category') }}</th>
                                        <th>{{ __('home.image') }}</th>
                                        <th>{{ __('home.edit') }}</th>
                                        <th>{{ __('home.Delete') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
