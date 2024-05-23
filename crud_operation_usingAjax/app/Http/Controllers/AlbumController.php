<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Repositories\AlbumRepository;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Http\Requests\DeleteOrMovePicturesRequest;
use App\Services\SearchByName;
use App\Services\PictureService;

class AlbumController extends Controller
{
    protected $albumRepository;


    public function __construct(AlbumRepository $albumRepository)
    {
        $this->albumRepository = $albumRepository;

    }

    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }


    public function create()
    {
        return view('albums.create');
    }

    public function store(StoreAlbumRequest $request)
    {
        $album = $this->albumRepository->createAlbum($request->only('name'));

        if ($request->has('pictures')) {
            $this->albumRepository->addPicturesToAlbum($album, $request->pictures);
        }

        return response()->json($album->load('pictures'));
    }



    public function edit(Album $album)
{
    return response()->json($album->load('pictures'));
}


    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $this->albumRepository->updateAlbum($album, $request->all());
        return response()->json($album->load('pictures'));
    }


    public function destroy(Album $album)
    {
        $this->albumRepository->deleteAlbum($album);
        return response()->json(['success' => true]);
    }




}
