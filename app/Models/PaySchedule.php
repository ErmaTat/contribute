<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaySchedule extends Model
{
    use HasFactory;
    protected $fillable=['user_id','contribution_id','status','amount','paid_on'];
    protected $attributes=[
       

    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function contributions()
    {
        return $this->belongsTo(Contribution::class)->withTimestamps();
    }
}
