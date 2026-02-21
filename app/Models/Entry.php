<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; 

class Entry extends Model
{
    
    protected $fillable = [
        'name',
        'email',
        'amount',
        'staff_id',
        'image'
    ];

  
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}