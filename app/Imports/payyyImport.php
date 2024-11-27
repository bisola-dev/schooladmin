<?php

namespace App\Imports;

use App\Models\payyy;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Log;

class payyyImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        Log::info('Processing row:', $row);
        
        // Trim any extra spaces from the values
        $row = array_map('trim', $row);

        // Ensure 'id' is present and is a number
        if (!isset($row['id']) || !is_numeric($row['id'])) {
            Log::error('Missing or invalid studid in row:', $row);
            return null; // Skip invalid rows
        }

        return new payyy([
            'studid' => (int) $row['id'], // Convert to integer
            'classid' => (int) $row['classid'],
            'payid' => (int) $row['payid'],
            'termid' => (int) $row['termid'],
            'sessid' => trim($row['sessid']),
            'amt' => (float) $row['amt'],
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            '*.id' => 'required|integer|exists:students,id', // Ensure 'id' from CSV is validated
            '*.classid' => 'required|exists:classrm,id',
            '*.payid' => 'required|exists:paymenttype,id',
            '*.termid' => 'required|integer|in:1,2,3',
            '*.sessid' => 'required|exists:seszion,id',
            '*.amt' => 'nullable|numeric',
        ];
    }

    /**
     * Custom validation messages
     *
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            'id.exists' => 'The student ID does not exist in the students table.',
            'classid.exists' => 'The class ID does not exist in the classrm table.',
            'payid.exists' => 'The payment ID does not exist in the paymenttype table.',
            'sessid.exists' => 'The session ID does not exist in the seszion table.',
        ];
    }
}


