<?php
namespace App\Repositories;

use App\Models\Album;
use App\Models\Picture;
use App\Http\Requests\StoreAlbumRequest;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageTrait;

class AlbumRepository
{
 use ImageTrait;
    public function all(){
        $albums = Album::all();
        return $albums ;
    }

    public function create()
    {
        if (request()->ajax()) {
            return view('albums.partials.create_album')->render();
        }

        return view('albums.create');
    }


    public function createAlbum($data)
    {
        $album = Album::create([
            'name' => $data['name'],
        ]);

        return $album;
    }


    public function updateAlbum($album, $data)
    {
        $album->update(['name' => $data['name']]);
        if (isset($data['existing_pictures'])) {
        $this->updatExistingPicture($data);
        }



    }

    public function deleteAlbum($album)
    {
        foreach ($album->pictures as $picture) {
            Storage::delete(public_path($picture->image_path));
            $picture->delete();
        }
        $album->delete();
    }


}
