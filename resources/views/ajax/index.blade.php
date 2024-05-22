<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel CRUD </title>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- ضمين مكتبة Swal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- JavaScript -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    <!-- CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- ضمين مكتبة Swal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</head>

<body dir="rtl">
    <div class="container">


        <h1>CRUD WITH AJAX</h1>
        @include('ajax.form')



        <br><br>

        @include('ajax.show')

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // START CREATE
        $("#add_product_form").submit(function(e) {
            e.preventDefault();
            if ($('#name').val() === '' || $('#descripation').val() === '' || $('#category').val() === '' || $(
                    '#price').val() === '' || !$('#image').val()) {
                showErrorAlert('يرجى تعبئة جميع الحقول');
                return;
            }

            const fd = new FormData(this);
            const $btnSave = $("#btn-save");
            $btnSave.text('جاري الإضافة...').prop('disabled', true);

            $.ajax({
                url: '{{ route('product.store') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.status && response.status === 200) {
                        Swal.fire({
                            title: 'تمت العملية  بنجاح!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        });

                        $('#add_product_form')[0].reset();
                        setTimeout(function() {
                            window.location.href = '/product';
                        }, 2000);
                    } else {
                        showErrorAlert(response.error);
                    }
                    $btnSave.text('حفظ التغييرات').prop('disabled', false);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    showErrorAlert('حدثت مشكلة أثناء إضافة المنتج');
                    $btnSave.text('حفظ التغييرات').prop('disabled', false);
                }
            });
        });

        function showErrorAlert(message) {
            Swal.fire({
                title: 'خطأ',
                text: message,
                icon: 'error',
                confirmButtonText: 'حسنًا'
            });
        }

        // END CREATE


        ////////////ُEDIT///////////
        $(document).on('click', '.editIcon', function(e) {
            e.preventDefault();
            let id = $(this).data('id');

            $.ajax({
                url: `/product/${id}/edit`,
                method: 'GET',
                success: function(response) {
                    $('#name').val(response.name);
                    $('#descripation').val(response.descripation);
                    $('#category').val(response.category);
                    $('#price').val(response.price);
                    $('#product_id').val(id);

                    if (response.image) {
                        $('#current-image').attr('src', '/image/' + response.image).show();
                    } else {
                        $('#current-image').hide();
                    }

                    $('#exampleModal').modal('show');
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });

        ////////////END EDIt///////////

        ////////////UPDATE///////////
        $("#add_product_form").submit(function(e) {
            e.preventDefault();

            const fd = new FormData(this);
            const productId = $('#product_id').val();


            if (productId) {
                url = `/product/${productId}`;
                method = 'post';
                fd.append('_method', 'PUT');
            }

            $("#btn-save").text('جاري الحفظ...');

            $.ajax({
                url: url,
                method: method,
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status && response.status === 200) {
                        Swal.fire({
                            title: response.success,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        });

                        $('#add_product_form')[0].reset();
                        $("#btn-save").text('حفظ التغييرات');
                        setTimeout(function() {
                            window.location.href = '/product';
                        }, 2000);
                    } else {
                        showErrorAlert();
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    showErrorAlert();
                }
            });
        });

        function showErrorAlert() {
            Swal.fire({
                title: 'حدثت مشكلة أثناء حفظ المنتج',
                text: 'يرجى المحاولة مرة أخرى.',
                icon: 'error',
                confirmButtonText: 'حسنًا'
            });
            $("#btn-save").text('حفظ التغييرات');
        }


        ///////////////////////

        $(document).on('click', '.deleteIcon', function(e) {
    e.preventDefault();
    let id = $(this).data('id');
    let csrf = '{{ csrf_token() }}';

    Swal.fire({
        title: 'حذف منتج؟',
        text: 'هل أنت متأكد أنك تريد الحذف؟',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم، احذفه!'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteProduct(id, csrf);
        }
    });
});

function deleteProduct(id, csrf) {
    $.ajax({
        url: `/product/${id}`,
        method: 'DELETE',
        data: {
            _token: csrf
        },
        success: function(response) {
            if (response.status === 200) {
                Swal.fire('تم الحذف!', 'تم حذف المنتج بنجاح.', 'success');
                $('#row-' + id).remove(); 
            } else {
                showDeleteError();
            }
        },
        error: function(xhr) {
            console.error(xhr.responseText);
            showDeleteError();
        }
    });
}

function showDeleteError() {
    Swal.fire('خطأ!', 'حدثت مشكلة أثناء حذف المنتج.', 'error');
}

    </script>
