<?php

namespace App\Listeners;


use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\UserMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class NotifyUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        // $users= User::get();
        
        // foreach($users as $user){
        //     Mail::to($user->email)->send(new UserMail($event->post));
        // }
        Mail::to('user@stalktechie.com')->send(new UserMail($event->post));
    }
}