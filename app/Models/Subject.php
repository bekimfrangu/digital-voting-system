<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = "subjects";

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function number()
    {
        return $this->belongsTo(Number::class, 'number_id');
    }

    public function vote()
    {
        return $this->hasOne(Vote::class);
    }
}
