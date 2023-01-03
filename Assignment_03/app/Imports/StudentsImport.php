<?php

namespace App\Imports;

use App\Models\Students;
use App\Models\Majors;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToModel,WithHeadingRow,WithValidation
{
    private $majors;

    public function __construct()
    {
        $this->majors = Majors::select("id","name")->get();
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $major = $this->majors->where("name",$row["majors"])->first();
        $students = new Students([
            "name" => $row["name"],
            "email" => $row["email"],
            "phone" => $row["phone"],
            "address" => $row["address"],
            "major_id" => $major->id ?? null,
        ]);
        return $students;
    }

    public function rules():array
    {
        return [
            "name" => "required",
            "email" => "required|email|unique:students,email",
            "phone" => "required",
            "address" => "required",
        ];
    }
}

