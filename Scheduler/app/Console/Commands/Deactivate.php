<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Deactivate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:deactivate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set user status to pending if their end_date has passed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Import Carbon
        $expired_users = User::where('end_date', '<=', Carbon::now())->get();

        foreach ($expired_users as $user) {
            $user->status = 'pending';
            $user->save();

            // Log the action
            $this->info("User ID {$user->id} status set to pending.");
        }

        $this->info('Deactivation process completed.');
    }
}
