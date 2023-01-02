<?php

namespace App\Dao\Student;

use App\Models\Students;
use App\Models\Majors;
use App\Contracts\Dao\Student\StudentApiDaoInterface;
use Illuminate\Http\Request;


/**
 * Data accessing object for major
 */
class StudentApiDao implements StudentApiDaoInterface
{
    /**
     * To show students view
     * 
     * @return View students with Majors
     */
    public function index()
    {
        $students = Students::with('major')->get();
        return $students;
    }

    /**
     * To get majors
     */
    public function showMajors()
    {
        $majors = Majors::all();
        return  $majors;
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
        $students = Students::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'major_id' => $majorId
        ]);
        return  $students;
    }

    /**
     * Show students edit with majors' datas
     * @param $id
     * @return View students edit
     */
    public function show($id)
    {
        $student = Students::with('major')->where('id', $id)->first();
        return  $student;
    }

    /**
     * Submit students update
     * @param Request $request
     * @param $id
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
        $major = Majors::find($majorId);
        return $major;
    }

    /**
     * To delete student by id
     * @param $id
     * @return View students with delete success msg
     */
    public function destroy($id)
    {
        $student = Students::find($id);
        $student->delete();
        return $student;
    }
}
