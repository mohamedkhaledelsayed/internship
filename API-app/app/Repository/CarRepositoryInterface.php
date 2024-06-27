<?php

namespace App\Repository;

use App\Models\Car;

interface CarRepositoryInterface
{
    public function index();

    public function store($request);

    public function show($car);

    public function update($request, $car);

    public function destroy($car);
}
