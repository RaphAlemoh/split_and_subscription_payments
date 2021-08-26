<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id', 'subscription_status',
        'status', 'subcribed_for', 'subscription_code',
        'subscribed_on', 'next_charged_date'
    ];
}
