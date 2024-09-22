<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subby extends Model
{
    use HasFactory;

    protected $table = 'subby';

    protected $fillable = ['id', 'subjectname']; 




    public function subby()
{
    return $this->hasMany(subby::class, 'subid', 'id');
}

}
