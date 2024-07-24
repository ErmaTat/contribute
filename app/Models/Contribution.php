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

    public function users()
    {
        return $this->belongsToMany(User::class,'user_contributions')->withTimestamps();
    }

    public function payments()
    {
        return $this->belongsToMany(User::class,'pay_schedules')->withTimestamps();
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    
}
