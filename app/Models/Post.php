<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Console\Command\MailReminder;



class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'meta_title', 'body', 'user_id', 'firstname',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
    return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

}
