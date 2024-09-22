<?php

namespace App\Exports;

use App\Models\tiyi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tiyi::select(
        "sname" ,
        "onames",
        "addy" ,
        "dob",
        "parentname" ,
        "parentno" ,
        "parentemail")->where('classid','=','$classid')->get();
    }
    public function headings(): array
    {
     return["sname" ,
        "onames",
        "addy" ,
        "dob",
        "parentname" ,
        "parentno" ,
        "parentemail"];
    }
}
