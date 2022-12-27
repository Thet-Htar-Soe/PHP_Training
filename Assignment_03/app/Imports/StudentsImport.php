<?php

namespace App\Imports;

use App\Models\Students;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $students = new Students([
            "name" => $row[0],
            "email" => $row[1],
            "phone" => $row[2],
            "address" => $row[3],
            "major_id" => $row[4],
        ]);
        return $students;
    }
}
