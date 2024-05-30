$(document).ready(function () {
    $('.delete-album-button').click(function (e) {
        e.preventDefault();

        // Get the album ID from the data attribute
        var albumId = $(this).data('id');

        // Confirm deletion
        if (confirm('Are you sure you want to delete this album?')) {
            // Send AJAX request to delete the album
            $.ajax({
                url: '/albums/' + albumId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    // Check if the deletion was successful
                    if (response.success) {
                        alert('Album deleted successfully');
                        // Optionally, you can remove the album from the UI
                        $('#album_id_' + albumId).remove();
                    } else {
                        alert('Failed to delete album');
                    }
                },
                error: function (xhr) {
                    alert('An error occurred while deleting the album');
                    console.error(xhr.responseText); // Log the error response for debugging
                }
            });
        }
    });
});
