<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;

    protected $table = "numbers";

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }

    public function subject()
    {
        return $this->hasOne(Subject::class);
    }
}
