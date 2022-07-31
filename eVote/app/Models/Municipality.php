<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $table = "municipalities";

    public function region()
    {
        return $this->belongsTo(AdministrativeRegion::class, 'region_id');
    }

    public function voters()
    {
        return $this->hasMany(User::class);
    }

    public function election()
    {
        return $this->hasOne(Election::class);
    }

}
