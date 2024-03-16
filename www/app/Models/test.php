<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    use HasFactory;
    protected $fillable=[
        'subject_id',
        'test_score',
        'student_id',
        'test_date'
    ];
    public function subject()
    {
        return $this->belongsTo(subject::class);
    }
    public function student()
    {
        return $this->hasMany(student::class);
    }
}
