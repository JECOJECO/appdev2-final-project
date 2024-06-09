<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bio',
        'image',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function story()
    {
        return $this->hasMany(Story::class)->latest();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follower_user', 'user_id', 'follower_id')->withTimestamps();
    }

    public function follows(User $user)
    {
        return $this->followings()->where('user_id', $user->id)->exists();
    }

    public function getImageURL()
    {
        if($this->image)
        {
            return url('storage/'. $this->image);
        }
        return "https.//api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}";
        // return "https://media.discordapp.net/attachments/1063455048778121266/1246824193996226670/Kafka_3.png?ex=665dcb04&is=665c7984&hm=efa8ca890a81e8fc15bebabdd60a3a919446a2705adeb32bd5019487c9193c58&=&format=webp&quality=lossless&width=349&height=349";
    }
}
