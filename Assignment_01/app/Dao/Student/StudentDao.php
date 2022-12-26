<?php

namespace App\Dao\Student;

use App\Models\Students;
use App\Models\Majors;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;

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
    public function store(Request $request)
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
    public function update(Request $request, $id)
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
}
