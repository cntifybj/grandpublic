<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        /* 'email',
        'phone_number', */
        'transaction_id',
        'video_id',
        'subscription_id',
        'user_id',
        'isPaymentSucces'
        //'acheved'
    ];


    /**
     * Get the user associated with the Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    /**
     * Get the video associated with the Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne | null
     */
    public function video(): HasOne
    {
        return $this->hasOne(Video::class, 'id', 'video_id');
    }

    /**
     * Get the subscription associated with the Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne | null
     */
    public function subscription(): HasOne | null
    {
        return $this->subscription_id
            ? $this->hasOne(Subscription::class, 'subscription_id', 'id')
            : null;
    }
}
