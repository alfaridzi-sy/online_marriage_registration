<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarriageApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'spouse_name', 'spouse_birth_date', 'spouse_religion', 'marriage_date', 'venue', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
