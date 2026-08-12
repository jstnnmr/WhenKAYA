<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Income extends Model
{
    //
    use HasUuids;
    protected $fillable = [
        'user_id',
        'salary',
        'allowance',
        'effective_date',
    ];

    protected $casts = [
        'salary' => 'decimal:2',
        'allowance' => 'decimal:2',
        'effective_date' => 'date',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}

