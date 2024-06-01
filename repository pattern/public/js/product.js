$(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        // fetch product
        fetchProduct();
        function fetchProduct()
        {
            $.ajax({
                type: "GET",
                url: "/fetch-product",
                dataType: "json",
                success: function (response) {
                    $('tbody').html("");
                    $.each(response.products, function(key, item) {
                        let row = '<tr>\
                            <td>' + item.name_ar + '</td>\
                            <td>' + item.name_en + '</td>\
                            <td>' + item.description + '</td>\
                            <td>' + item.price + '</td>\
                            <td>' + item.category.name + '</td>\
                            <td><img src="' + item.image + '" width="50px" height="50px" alt="Image"></td>';
                        if (item.canUpdate) {
                            row += '<td><button type="button" value="' + item.id + '" class="edit_btn btn btn-success btn-sm">Edit</button></td>';
                        }
                        if (item.canDelete) {
                            row += '<td><button type="button" value="' + item.id + '" class="delete_btn btn btn-danger btn-sm">Delete</button></td>';
                        }
                        row += '</tr>';
                        $('tbody').append(row);
                    });
                }
            });
        }
        // show delete modal
        $(document).on('click', '.delete_btn',function (e) {
            e.preventDefault();
            var product_id =$(this).val();
            $('#DeleteProductModal').modal('show');
            $('#deleting_product_id').val(product_id);
        });

        $(document).on('click','.delete_product_btn' ,function (e) {
            e.preventDefault();
            var id =$('#deleting_product_id').val();
            $.ajax({
                type: "Delete",
                url: "product/"+id,
                dataType: "json",
                success: function (response) {
                    fetchProduct();
                    alertify.set('notifier','position', 'top-right');
                    alertify.success('Product Deleted successfully!');
                }
            });

        });

        // show form to edit product

        $(document).on('click', '.edit_btn',function (e) {
            e.preventDefault();
            var product_id =$(this).val();
            $('#EDITProductModal').modal('show');
            $.ajax({
                type: "GET",
                url: "product/"+product_id+"/edit",
                success: function (response) {
                    if(response.status==200)
                        {

                            $('#edit_name_ar').val(response.product.name_ar)
                            $('#product_id').val(product_id)
                            $('#edit_name_en').val(response.product.name_en)
                            $('#edit_description').val(response.product.description)
                            $('#edit_price').val(response.product.price)
                            $('#edit_category_id').val(response.product.category_id);
                        }
                }
            });
        });

        // update product
        $(document).on('submit','#UpdateProductFORM' ,function (e) {
            e.preventDefault();
            var id = $('#product_id').val()
            let EditFormData = new FormData($('#UpdateProductFORM')[0]);
            EditFormData.append('_method', 'PUT');
            $.ajax({
                type: "POST",
                url: "product/"+id,
                data: EditFormData,
                contentType: false,
                processData: false,
                success: function (response) {
                    fetchProduct();
                    alertify.set('notifier','position', 'top-right');
                    alertify.success('Product Updated successfully!');
                },
                error: function (error) {
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(' error Update!'); }
            });
        });

        // create product
    $(document).on('submit','#AddProductFORM',function(e){
        e.preventDefault();


        let formData = new FormData($('#AddProductFORM')[0]);
        let url = $('#productStoreRoute').val();
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                fetchProduct();
                alertify.set('notifier','position', 'top-right');
                alertify.success('Product Added successfully!');
            },
            error: function (error) {
                alertify.set('notifier','position', 'top-right');
                alertify.success('Error adding product.');
            }
        });

    });
});
