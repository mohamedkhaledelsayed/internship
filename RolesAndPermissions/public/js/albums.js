// public/js/albums.js
$(document).ready(function() {
    // Load the create album form via AJAX
    $('#create-album-button').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: '/albums/create',
            method: 'GET',
            success: function(response) {
                $('#modal-body').html(response);
                $('#modal').modal('show');
            },
            error: function() {
                alert('Failed to load the create album form.');
            }
        });
    });

    // Submit the create album form via AJAX
    $(document).on('submit', '#create-album-form', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#modal').modal('hide');
                $('#albums-list').html(response);
            },
            error: function() {
                alert('Failed to create album.');
            }
        });
    });
});
