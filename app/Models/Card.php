<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'title',
        'bank',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
