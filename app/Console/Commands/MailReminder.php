<?php

namespace App\Console\Commands;

use App\Mail\LastDayPost;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class MailReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send post an email to all the users at midnight';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        // $post=Post::whereDate('created_at', now()->subDays(1))->get(); 
        //     Mail::to('user@admin.com')->send(new LastDayPost($post));

        $post=Post::whereDate('created_at', Carbon::now()->subDays(1)->setTime(0, 0, 0)->toDateTimeString())->get();
        //$users = User::all();
        
            // foreach($users as $user)
            // {
            //     Mail::to($user->email)->send(new LastDayPost($post));
            // }
        Mail::to('user@namastetechie.com')->send(new LastDayPost($post));

        }
    
}
