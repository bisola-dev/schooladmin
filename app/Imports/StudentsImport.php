<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class StudentsImport implements ToModel, WithValidation, WithHeadingRow
{
    protected $classid;
    protected $sessid;
    protected $termid;

    public function __construct($classid, $sessid, $termid)
    {
        $this->classid = $classid;
        $this->sessid = $sessid;
        $this->termid = $termid;
    }

    public function model(array $row)
    {
        // Log row data for debugging
        Log::info('Processing Row Data:', $row);

        // Clean and validate data
        $dob = isset($row['dob(yyyy-mm-dd)']) ? trim($row['dob(yyyy-mm-dd)']) : null;
        $parentno = isset($row['parentno']) ? trim($row['parentno']) : null;

        Log::info('DOB:', $dob);
        Log::info('Parent Number:', $parentno);
    
    

        return new Student([
            'sname' => $row['sname'] ?? null,
            'onames' => $row['onames'] ?? null,
            'addy' => $row['addy'] ?? null,
            'dob' => $dob,
            'parentname' => $row['parentname'] ?? null,
            'parentno' => $parentno,
            'parentemail' => $row['parentemail'] ?? null,
            'classid' => $this->classid,
            'sessid' => $this->sessid,
            'termid' => $this->termid,
        ]);
    }

    public function rules(): array
    {
        return [
            'sname' => 'required|string',
            'onames' => 'required|string',
            'addy' => 'required|string',
            'dob(yyyy-mm-dd)' => 'date_format:Y-m-d',
            'parentname' => 'required|string',
            'parentemail' => 'required|email',
        ];
    }
}
