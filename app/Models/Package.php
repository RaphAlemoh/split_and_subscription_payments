<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'amount', 'author',
        'description', 'user_id',
        'type', 'status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
