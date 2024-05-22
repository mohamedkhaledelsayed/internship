<a class="btn btn-info ml-3" data-toggle="modal" data-target="#exampleModal">
    اضافة منتج
</a>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> مرحبا بك</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST" id="add_product_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">الاسم</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripation" class="col-sm-2 control-label">الوصف</label>
                        <div class="col-sm-12">
                            <textarea name="descripation" id="descripation" cols="40" rows="5" class="form-control" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">التصنيف</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">السعر</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">الصورة الحالية</label>
                        <div class="col-sm-12">
                            <img id="current-image" src="" alt="صورة المنتج" class="img-fluid" style="max-height: 200px; margin-bottom: 10px;">
                            <input id="image" type="file" name="image" accept="image/*">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button class="btn btn-primary" id="btn-save" value="create"> متايعة </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
