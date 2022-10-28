<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'day_part_tags',
        'location',
        'from_time',
        'until_time',
        'active',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}

