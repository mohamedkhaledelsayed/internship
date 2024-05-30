<!-- resources/views/albums/partials/album_list.blade.php -->
<ul class="list-group" id="albums-list">
    @foreach ($albums as $album)
        <li class="list-group-item" id="album_id_{{ $album->id }}">
            <div class="d-flex justify-content-between align-items-center">
                <span>{{ $album->name }}</span>
                @can('album-edit')
                <button class="btn btn-primary btn-sm edit-album-button" data-id="{{ $album->id }}">Edit</button>
                @endcan
                @can('album-delete')
                <button class="btn btn-danger btn-sm delete-album-button" data-id="{{ $album->id }}">Delete</button>
                @endcan


            </div>
            <div class="pictures mt-3">
                <div class="row">
                    @foreach ($album->pictures as $picture)
                        <div class="col-md-3 mb-3 picture" data-id="{{ $picture->id }}">
                            <div class="card">
                                <img src="{{ asset($picture->image_path) }}" alt="{{ $picture->name }}" class="card-img-top picture-image" style="max-width: 100%;">
                                <div class="card-body">
                                    <p class="card-text picture-name">{{ $picture->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>
    @endforeach
</ul>
