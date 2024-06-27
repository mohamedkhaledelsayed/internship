<?php

namespace App\Repository;

use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Traits\MangeImage;
use Symfony\Component\HttpFoundation\Response;

class CarRepository implements CarRepositoryInterface
{
    use MangeImage;
    public function index()
    {
        $cars= Car::with('Category')->get();
        return  CarResource::collection($cars);
    }

    public function store($request)
    {
        $validated = $request->validated();
        $filepath=$this->addImage($request,'image','public');

        $validated['image'] =  $filepath;
        $car=Car::create($validated);
        return response(new CarResource($car),200);

    }

    public function show($car)
    {
        return new CarResource($car);
    }

    public function update($request, $car)
    {
        $validated = $request->validated();

        $old_image=$car->image;

        if ($request->hasfile('image')){
            $filePath=$this->updateImage($old_image,'image','public');
            $validated['image'] = $filePath;
        }
        $car->update($validated);
        return response(new CarResource($car),202);
    }

    public function destroy($car)
    {
        $img=$car->image;
        $this->deleteImage($img,'public');
        $car->delete();
        return response(null,Response::HTTP_NO_CONTENT);

    }
}
