<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    public function lecture()
    {
        // return $this->belongsTo(User::class, 'lecture_id');
        return $this->belongsTo(User::class);
    }
}
