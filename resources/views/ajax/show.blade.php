<div class="col-md-12">
    <table id="products-table" class="table table-stribed text-right" width="100%" cellspacing="0">
        <thead>
            <tr>
               
                <th>اسم المنتج</th>
                <th>الوصف</th>
                <th>التصنيف</th>
                <th>السعر</th>
                <th>الصورة</th>
                <th>خيارات</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    {{-- <td><a href="">{{ $product->id }}</a></td> --}}
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->descripation }}</td>
                    <td>{{ $product->category }}</td>

                    <td>{{ $product->price }}$</td>
                    <td>
                        <img src="{{ asset('image/' . $product->image) }}" class="img-responsive"
                            style="max-height:50px; max-width:50px" alt="{{ $product->name }}">
                    </td>
                    <td><a class="btn btn-info ml-3 editIcon" data-id="{{ $product->id }}"
                            data-toggle="modal" data-target="#exampleModal">
                            تعديل
                        </a>

                        <button class="btn btn-outline-danger deleteIcon" data-id="{{ $product->id }}"
                            type="button">حذف</button>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>