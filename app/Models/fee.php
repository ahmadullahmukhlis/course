<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fee extends Model
{
    protected $fillable = [
        'amount', 'payment_date', 'subject_id', 'student_id',
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
