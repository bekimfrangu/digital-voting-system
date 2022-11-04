<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeRegion extends Model
{
    use HasFactory;

    protected $table = "administrative_regions";

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
}
