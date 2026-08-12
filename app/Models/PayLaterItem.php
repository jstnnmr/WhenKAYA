<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class PayLaterItem extends Model
{
    //
    use HasUuids;
    protected $fillable = [
        'user_id',
        'name',
        'amount',
        'paid_amount',
        'due_date',
        'paid',
        'paid_at',
        'description',
        'group_key',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'paid' => 'boolean',
        'due_date' => 'date',
        'paid_at' => 'datetime',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function payments() : HasMany {
        return $this->hasMany(PayLaterPayment::class);
    }
}
