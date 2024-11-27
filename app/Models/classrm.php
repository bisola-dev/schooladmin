<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classrm extends Model
{
    use HasFactory;
    protected $table = 'classrm';
    
  
    protected $fillable = ['id', 'classname']; 


    public function student()
{
    return $this->hasMany(student::class, 'classid','id');
}
}

