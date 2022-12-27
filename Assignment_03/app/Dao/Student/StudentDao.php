<?php

namespace App\Dao\Student;

use App\Models\Students;
use App\Models\Majors;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Data accessing object for major
 */
class StudentDao implements StudentDaoInterface
{
    /**
     * To show students view
     * 
     * @return View students
     */
    public function index()
    {
        $students = Students::all();
        return $students;
    }

    /**
     * To show students create
     *   * 
     * @return View students create
     */
    public function create()
    {
        $majors = Majors::all();
        return $majors;
    }

    /**
     * To submit students create 
     * @param Request $request
     * @return View students with create success msg
     */
    public function store($request)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $majorId = $request->major_id;
        Students::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'major_id' => $majorId
        ]);
    }

    /**
     * Show students edit with majors' datas
     * @param $studentId
     * @return View students edit
     */
    public function edit($id)
    {
        $student = Students::where('id', $id)->first();
        return $student;
    }

    /**
     * Submit students update
     * @param Request $request
     * @param $studentId
     * @return View students with update success msg
     */
    public function update($request, $id)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $majorId = $request->major_id;
        Students::where('id', $id)->update([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'major_id' => $majorId,
        ]);
    }

    /**
     * To delete student by id
     * @param $studentId
     * @return View students with delete success msg
     */
    public function delete($id)
    {
        Students::where('id', $id)->delete();
    }

    /**
     * To upload csv file for post
     * @param Request $request
     * @return view students 
     */
    public function uploadStudents($request)
    {
        return  Excel::import(new StudentsImport, $request->file('file'));
    }

    /**
     * To search students information with name,email,majors 
     * @param Request $request
     * @return View students with students datas
     */
    public function search($request)
    {
        $searchName = $request->get('search');
        $students = Students::join('majors', 'majors.id', 'students.major_id')
        ->where('students.name','LIKE','%'.$searchName.'%')
        ->orWhere('students.email','LIKE','%'.$searchName.'%')
        ->orWhere('majors.name','LIKE','%'.$searchName.'%')
        ->get(['students.*','majors.name as majorName']);
        return $students;
    }
}
