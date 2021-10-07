<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'status', 'start_date', 'end_date',
        'cover_letter', 'user_id'
    ];

    const STATUS_PENDING  = 1;
    const STATUS_APPROVED = 2;
    const STATUS_REJECTED = 3;
    const STATUS_DONE     = 4;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
