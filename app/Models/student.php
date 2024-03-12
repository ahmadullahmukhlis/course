<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'father_name',
        'g_f_name',
        'phone',
        'address'
    ];
    public function subject()
    {
        return $this->belongsToMany(subject::class);
    }
    public function fees()
    {
        return $this->hasMany(fee::class);
    }
    public function exam()
    {
        return $this->hasMany(exam::class);
    }
}
