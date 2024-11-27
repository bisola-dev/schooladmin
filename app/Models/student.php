<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    // The table associated with the model (if different from the default table name)
    protected $table = 'students';

    // The attributes that are mass assignable
    protected $fillable = [
    
        'sname',
        'onames',
        'addy',
        'dob',
        'studimg',
        'parentno',
        'parentname',
        'parentemail',
        'ppass',
        'sessid',
        'termid',
        'classid',
        'studimg'
,    ];

    // In Student model
public function tezz()
{
    return $this->hasMany(Tezz::class, 'studid','id');
}


public function seszion()
{
    return $this->belongsTo(Seszion::class, 'sessid', 'id');
}


public function payyy()
    {
        return $this->hasMany(payyy::class, 'studid', 'id');
    }

}
