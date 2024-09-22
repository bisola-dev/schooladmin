<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seszion extends Model
{
    use HasFactory;
    
    protected $table = 'seszion';
    protected $fillable = ['id', 'sessname'];


    public function payyy()
{
    return $this->hasMany(payyy::class, 'sessid', 'id');
}

      public function restoreSlashes($cleanedSessname) {
    // If the name already contains a slash, assume it's correctly formatted
    if (strpos($cleanedSessname, '/') !== false) {
        return $cleanedSessname; // No changes needed
    }
    
    // If no slash present, format as YYYY/YYYY
    if (strlen($cleanedSessname) >= 8) {
        return substr($cleanedSessname, 0, 4) . '/' . substr($cleanedSessname, 4);
    }

    // Handle cases where the length is less than expected
    return $cleanedSessname; // Return as-is if it doesn’t meet the expected format
}


    public function getRestoredSessnameAttribute()
    {
        return $this->restoreSlashes($this->sessname);
    }


// In Seszion.php
public function students()
{
    return $this->hasMany(Student::class, 'sessid', 'id');
}



}
