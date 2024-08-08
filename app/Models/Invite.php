<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;
    protected $fillable=['user_id','contribution_id','status'];


    public function contribution()
    {
        return $this->belongsTo(Contribution::class);
    }
}
