<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable=['contribution_id','paid_on','amount'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_schedules')->withTimestamps();
    }

    public function contribution()
    {
        return $this->belongsTo(Contribution::class)->withTimestamps();
    }
}
