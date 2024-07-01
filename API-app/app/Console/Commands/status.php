<?php

namespace App\Console\Commands;

use App\Models\Car;
use App\Models\User;
use Illuminate\Console\Command;

class status extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'car:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'change status for car ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cars=Car::where('status',true)->get();
        foreach ($cars as $car){
            $car->delete();
        }

    }
}
