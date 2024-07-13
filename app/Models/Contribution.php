<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;
    protected $fillable = [
        'contribution_type',
        'contribution_address',
        'name',
        'description',
        'starts',
        'ends',
        'frequency',
        'duration',
        'duration_type',
        'amount',
        'amount_type',
        'status',
        'reminder'
    ];

    public function pay_schedules()
    {
        return $this->hasMany(PaySchedule::class);
    }
}
