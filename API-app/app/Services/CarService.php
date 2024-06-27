<?php

namespace App\Services;

use App\Models\Car;
use App\Repository\CarRepositoryInterface;

class CarService
{
    public function __construct(
        protected CarRepositoryInterface $carrepository
    ){}
    public function index(){
        return $this->carrepository->index();
    }



    public function store($request){
        return $this->carrepository->store($request);

    }

    public function show( $car){
        return $this->carrepository->show($car);

    }



    public function update($request,$car){
        return $this->carrepository->update($request,$car);

    }

    public function destroy($car){
        return $this->carrepository->destroy($car);

    }
}
