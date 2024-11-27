<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payyy extends Model
{
    use HasFactory;
    // The table associated with the model (if different from the default table name)
    protected $table = 'payyy';

    // The attributes that are mass assignable
    protected $fillable = [
        'classid',
        'studid',
        'payid',
        'amt',
        'sessid',
        'termid',
       
    ];

    public function paymenttype()
{
    return $this->belongsTo(Paymenttype::class, 'payid', 'id');
}



public function seszion()
{
    return $this->belongsTo(seszion::class, 'sessid','id');
}


public function student()
{
    return $this->belongsTo(student::class, 'studid','id');
}

}

