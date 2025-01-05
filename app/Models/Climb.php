<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Climb extends Pivot
{
    use HasFactory;

    // You can add additional attributes if necessary, for example, the time when the block was climbed
    protected $fillable = ['user_id', 'block_id'];
}
