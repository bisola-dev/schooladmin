<?php

namespace App\Imports;

use App\Models\student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel
{

    private $classid;

    public function __construct($classid)
    {
        $this->classid = $classid;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
           // Log the row data for debugging
           \Log::info('Importing row: ' . json_encode($row));

        return new student([
         'classid' => $this->classid, // Use the class ID passed from the controller
            'sname' => $row['sname'] ?? null,
            'onames' => $row['onames'] ?? null,
            'dob' => $row['dob'] ?? null,
            'addy' => $row['addy'] ?? null,
            'parentname' => $row['parentname'] ?? null,
            'parentno' => $row['parentno'] ?? null,
            'parentemail' => $row['parentemail'] ?? null
        ]);
    }
}
