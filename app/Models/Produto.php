<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'user_id','image'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
