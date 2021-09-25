<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'subaccount_code', 'is_verified', 'reference',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
