<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Albums</h1>
@can('album-create')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createAlbumModal">

        Create Album
    </button>
    @endcan
    <div id="albumsList">
        @include('albums.partials.album_list', ['albums' => $albums])
    </div>
</div>

@include('albums.partials.create_album_modal')
@include('albums.partials.edit_album_modal')
</body>
</html>
<script>
    var storeAlbumRoute = "{{ route('albums.store') }}";


</script>

<script type="text/javascript" src="{{ asset('js/createAlbum.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/editAlbum.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/deletAlbum.js') }}"></script>


