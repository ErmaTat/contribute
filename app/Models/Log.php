<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable=['user_id','contribution_id','event'];

    public function scopeOfContribution($query, $contributionId)
    {
        return $query->where('contribution_id', $contributionId);
    }
}
