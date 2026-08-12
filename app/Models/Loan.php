<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Loan extends Model
{
    use HasUuids;
    
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'principal',
        'annual_interest_rate',
        'term_months',
        'start_date',
        'monthly_payment',
        'total_paid',
    ];

    protected $casts = [
        'amount',
        'principal' => 'decimal:2',
        'annual_interest_rate' => 'decimal:2',
        'monthly_payment' => 'decimal:2',
        'total_paid' => 'decimal:2',
        'date' => 'datetime',
    ];
}
