<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
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
    protected $description = 'send email notify to all users every day';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emails = User::select('email')->get()->pluck('email')->toArray();
       // $users= User::where('email');
       //$emails = DB::table('users')->;
      
        $data = ['title' => 'Programming', 'body' => 'php'];
        foreach($emails as $email){
Mail::to($email)->send(new NotifyEmail($data));
        }
        ;
        return Command::SUCCESS;
    }
}
