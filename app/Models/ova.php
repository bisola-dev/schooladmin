<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ova extends Model
{
    use HasFactory;

       protected $table = 'ova';
    
        // Specify the primary key if it differs from the default 'id'
        protected $primaryKey = 'id';
      
        public $timestamps = true;
    
        protected $fillable = ['id','classid', 'termid', 'sessid', 'scori'];


    public function seszion()
    {
        return $this->belongsTo(seszion::class, 'sessid','id');
    }
    

    public function classrm()
    {
        return $this->belongsTo(classrm::class, 'classid','id');
    }
    
    

}
