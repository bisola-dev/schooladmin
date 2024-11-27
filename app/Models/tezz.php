<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tezz extends Model
{
    use HasFactory;

    protected $table = 'tezz';

    protected $fillable = ['id', 'classid','subid','studid','testscore','sessid','termid','examscore','toal']; 



    public function subby()
{
    return $this->belongsTo(subby::class, 'subid','id');
}


    public function seszion()
{
    return $this->belongsTo(seszion::class, 'sessid','id');
}


public function student()
{
    return $this->belongsTo(Student::class, 'studid','id');
}

}
