<div class="modal fade" id="createAlbumModal" tabindex="-1" role="dialog" aria-labelledby="createAlbumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createAlbumModalLabel">Create New Album</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createAlbumForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Album Name:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Album Name" required>
                    </div>
                    <div id="pictures-container">
                        <div class="form-group picture-input">
                            <label for="pictures">Upload Pictures:</label>
                            <input type="file" class="form-control" name="pictures[0][image]" required>
                            <input type="text" class="form-control mt-2" name="pictures[0][name]" placeholder="Picture Name" required>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="addPicture">Add Another Picture</button>
                    <br><br>
                    <button type="submit" class="btn btn-primary">Create Album</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/addPicture.js') }}"></script>
