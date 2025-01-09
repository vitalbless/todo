<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:make-admin {email : Email of the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email $email not found.");
            return Command::FAILURE;
        }

        $user->is_admin = true;
        $user->save();

        $this->info("User with email $email admin now.");
        return Command::SUCCESS;
    }
}
