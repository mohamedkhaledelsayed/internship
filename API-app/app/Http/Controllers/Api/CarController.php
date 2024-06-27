<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Services\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct(
        protected CarService $carService
    ) {
    }
    public function index()
    {
        return $this->carService->index();

    }



    public function store(CarRequest $request)
    {

        $validated = $request->validated();

        return $this->carService->store($request);

    }


    public function show(Car $car)
    {
        return $this->carService->show($car);

    }


    public function update(CarRequest $request, Car $car)
    {
        return $this->carService->update($request,$car);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        return $this->carService->destroy($car);

    }
}
