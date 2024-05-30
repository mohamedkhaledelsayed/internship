<div class="modal fade" id="editAlbumModal" tabindex="-1" role="dialog" aria-labelledby="editAlbumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAlbumModalLabel">Edit Album</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editAlbumForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="edit-album-id">
                    <div class="form-group">
                        <label for="edit-name">Album Name:</label>
                        <input type="text" class="form-control" name="name" id="edit-name" placeholder="Album Name" required>
                    </div>
                    <div id="existing-pictures-container">
                        <h3>Existing Pictures</h3>
                    </div>
                    <div id="new-pictures-container">
                        <h3>Add New Pictures</h3>
                        <div class="form-group">
                            <label for="pictures">Picture</label>
                            <input type="file" name="pictures[0][image]" class="form-control">
                            <input type="text" name="pictures[0][name]" class="form-control" placeholder="Picture Name">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="addNewPicture">Add Another Picture</button>
                    <br><br>
                    <button type="submit" class="btn btn-primary">Update Album</button>
                </form>
            </div>
        </div>
    </div>
</div>
