<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fess extends Model
{
    protected $fillable = [
        'amount', 'paydate', 'subject_id', 'student_id',
    ];
    use HasFactory;
    public function subject()
    {
        return $this->belongsTo(subject::class);
    }
    public function student()
    {
        return $this->belongsTo(student::class);
    }
}
