<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class subject extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsToMany(student::class);
    }
    public function fees()
    {
        return $this->hasMany(fee::class);
    }
    public function exam()
    {
        return $this->HasMany(exam::class);
    }
}
