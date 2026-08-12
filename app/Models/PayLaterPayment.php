<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class PayLaterPayment extends Model
{
    //
    use HasUuids;
    protected $fillable = [
        'pay_later_item_id',
        'amount',
        'paid_at',
    ];
    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
    ];

    public function payLaterItem()  {
        return $this->belongsTo(PayLaterItem::class);
    }

}
