$(document).ready(function () {
    // Prevent form submission and handle it via AJAX
    $('#createAlbumForm').on('submit', function (event) {
        event.preventDefault(); // Prevent the form from submitting the default way

        var formData = new FormData(this); // Get the form data
        $.ajax({
            url: storeAlbumRoute,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#createAlbumModal').modal('hide');
                $('#createAlbumForm')[0].reset();

                console.log('Response:', response); // Log the response object to inspect its structure and contents

                // Construct the HTML for the new album
                var newAlbumHtml = '<li class="list-group-item" id="album_id_' + response.id + '">' +
                                        '<div class="d-flex justify-content-between align-items-center">' +
                                            '<span>' + response.name + '</span>' +
                                            '<button class="btn btn-primary btn-sm edit-album-button" data-id="' + response.id + '">Edit</button>' +

                                            '<button class="btn btn-danger btn-sm delete-album-button" data-id="' + response.id + '">Delet</button>'+



                                        '</div>' +
                                        '<div class="pictures mt-3"></div>' + // Container for pictures
                                    '</li>';

                // Prepend the new album to the albums list
                $('#albums-list').prepend(newAlbumHtml);

                // Append pictures to the newly added album, if any
                if (response.pictures.length > 0) {
                    var picturesHtml = '';
                    response.pictures.forEach(function(picture) {
                        picturesHtml += '<div class="picture" data-id="' + picture.id + '">' +
                                            '<img src="' + picture.image_path + '" alt="' + picture.name + '" class="picture-image" style="max-width: 150px;">' +
                                            '<span class="picture-name">' + picture.name + '</span>' +
                                        '</div>';
                    });
                    $('#album_id_' + response.id + ' .pictures').append(picturesHtml);
                }
            },

            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Handle error
            }
        });
    });

    // Attach a click event listener to the save button
    $('#submitAlbum').click(function () {
        $('#createAlbumForm').submit(); // Trigger the form submission
    });

    // Delete album
    $(document).on('click', '.btn-delete', function () {
        var albumId = $(this).data('id');
        var albumContainer = $(this).closest('.list-group-item');
        $.ajax({
            url: '/albums/' + albumId,
            method: 'DELETE',
            success: function () {
                albumContainer.remove(); // Remove the deleted album directly from the DOM
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Handle error
            }
        });
    });
});
