$(document).ready(function () {
    $(document).on('click', '.edit-album-button', function () {
        var albumId = $(this).data('id');
        $.ajax({
            url: `/albums/${albumId}/edit`,
            method: 'GET',
            success: function (response) {
                console.log(response); // Log the response to check its structure

                if (response && response.pictures) {
                    $('#edit-album-id').val(response.id);
                    $('#edit-name').val(response.name);

                    var existingPicturesHtml = '';
                    response.pictures.forEach(function (picture, index) {
                        existingPicturesHtml += `<div class="form-group existing-picture" data-id="${picture.id}">
                                                    <img src="${picture.image_path}" alt="${picture.name}" class="picture-image" style="max-width: 150px;">
                                                    <input type="text" name="existing_pictures[${index}][name]" class="form-control" value="${picture.name}" placeholder="Picture Name">
                                                    <input type="file" name="existing_pictures[${index}][image]" class="form-control">
                                                    <input type="hidden" name="existing_pictures[${index}][id]" value="${picture.id}">
                                                </div>`;
                    });
                    $('#existing-pictures-container').html(existingPicturesHtml);
                    $('#editAlbumModal').modal('show');
                } else {
                    console.error("Unexpected response structure", response);
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // Update album
    $('#editAlbumForm').on('submit', function (event) {
        event.preventDefault();
        var albumId = $('#edit-album-id').val();
        var formData = new FormData(this);
        $.ajax({
            url: `/albums/${albumId}`,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#editAlbumModal').modal('hide');
                $('#editAlbumForm')[0].reset();

                var updatedAlbumHtml = `<li class="list-group-item" id="album_id_${response.id}">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="album-name">${response.name}</span>
                                                <button class="btn btn-primary btn-sm edit-album-button" data-id="${response.id}">Edit</button>
                                
                                            </div>
                                            <div class="pictures mt-3">`;
                response.pictures.forEach(function (picture) {
                    updatedAlbumHtml += `<div class="picture" data-id="${picture.id}">
                                             <img src="${picture.image_path}" alt="${picture.name}" class="picture-image" style="max-width: 150px;">
                                             <span class="picture-name">${picture.name}</span>
                                         </div>`;
                });
                updatedAlbumHtml += `</div></li>`;

                $('#album_id_' + albumId).replaceWith(updatedAlbumHtml);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // Add new picture inputs dynamically
    $('#addNewPicture').click(function () {
        var newPictureIndex = $('#new-pictures-container .form-group').length;
        var newPictureHtml = `<div class="form-group">
                                 <label for="pictures">Picture</label>
                                 <input type="file" name="pictures[${newPictureIndex}][image]" class="form-control">
                                 <input type="text" name="pictures[${newPictureIndex}][name]" class="form-control" placeholder="Picture Name">
                             </div>`;
        $('#new-pictures-container').append(newPictureHtml);
    });

});
