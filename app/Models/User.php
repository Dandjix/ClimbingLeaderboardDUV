<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
        'profile_picture'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function blocks()
    {
        return $this->belongsToMany(Block::class, 'climbs');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getScoreAttribute()
    {
        // Fetch all blocks the user has climbed
        $blocks = $this->blocks;

        // Sum up the score of each block
        $totalScore = $blocks->sum(function ($block) {
            return $block->score; // This will call the getScoreAttribute() method from the Block model
        });

        return $totalScore;
    }
}
