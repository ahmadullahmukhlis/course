<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
   
  protected  $fillable=['name','father_name','age','phone','address','subject_id'];
  public function fees()
  {
      return $this->hasMany(fess::class);
  }
  public function test()
  {
      return $this->hasMany(test::class);
  }
  public function subject(){
    return $this->belongsTo(subject::class);
  }
}
