<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Block extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'difficulty', 'description'];

    /**
     * Get the users who have climbed this block.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'climbs')->withTimestamps();
    }

    /**
     * Get the score for the block based on the number of users who have climbed it.
     */
    public function getScoreAttribute()
    {
        $userCount = $this->users()->count();
        return $userCount > 0 ? 100 / $userCount : 100;
    }
}
