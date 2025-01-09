<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class RemoveAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:remove-admin {email : Email of the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email {$email} not found.");
            return Command::FAILURE;
        }

        if (!$user->is_admin) {
            $this->info("User with email {$email} is already not an admin.");
            return Command::SUCCESS;
        }

        $user->is_admin = false;
        $user->save();

        $this->info("User with email {$email} is not admin not.");
        return Command::SUCCESS;
    }
}
