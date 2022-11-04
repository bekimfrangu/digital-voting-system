<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $table = "candidates";

    public function voter()
    {
        return $this->belongsTo(User::class, 'voter_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
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
