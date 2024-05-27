<?php
namespace App\Traits;
//use App\Models\Album;
use App\Models\Picture;
trait ImageTrait {

    public function addPicturesToAlbum($album, $pictures)
    {
        foreach ($pictures as $pictureData) {
            if (isset($pictureData['image']) && isset($pictureData['name'])) {
                $image = $pictureData['image'];
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $album->pictures()->create([
                    'name' => $pictureData['name'],
                    'image_path' => '/images/' . $imageName,
                ]);
            }
        }}

        public function updatExistingPicture($data){

                foreach ($data['existing_pictures'] as $existingPictureData) {
                    $picture = Picture::find($existingPictureData['id']);
                    if ($picture) {
                        $picture->name = $existingPictureData['name'];

                        if (isset($existingPictureData['image'])) {
                            Storage::delete(public_path($picture->image_path));
                            $imageName = time() . '_' . $existingPictureData['image']->getClientOriginalName();
                            $existingPictureData['image']->move(public_path('images'), $imageName);
                            $picture->image_path = '/images/' . $imageName;
                        }

                        $picture->save();
                    }}

    }}
