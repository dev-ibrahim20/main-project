<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email notify for all Users Every day';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $emails = User::pluck('email')->toArray();
        $data = ['title' => 'programing', 'body' => 'php'];

        foreach ($emails as $email) {
            try {
                Mail::to($email)->send(new NotifyEmail($data));
                $this->info("Email sent to: " . $email);
            } catch (\Exception $e) {
                $this->error("Failed to send email to: " . $email);
                $this->error($e->getMessage());
            }
        }
        

        $this->info('All notification emails have been sent successfully!');
    }
}
