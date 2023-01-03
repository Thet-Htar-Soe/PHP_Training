<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Models\Majors;

/**
 * This is Student controller.
 * This handles Student CRUD processing.
 */
class StudentController extends Controller
{
    /**
     * student interface 
     * */
    private $studentInterface;
    /**
     * Create a new controller instance.
     */
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }

    /**
     * To show students view
     * 
     * @return View students
     */
    public function index()
    {
        $students = $this->studentInterface->index();
        return view('student.index', compact('students'));
    }

    /**
     * To show students create
     *   * 
     * @return View students create
     */
    public function create()
    {
        $majors = $this->studentInterface->create();
        return view('student.create', compact('majors'));
    }

    /**
     * To submit students create 
     * @param Request $request
     * @return View students with create success msg
     */
    public function store(StudentRequest $request)
    {
        $this->studentInterface->store($request);
        return redirect('/student')->with('success', 'Student Created Successfully!!!');
    }

    /**
     * Show students edit with majors' datas
     * @param $studentId
     * @return View students edit
     */
    public function edit($id)
    {
        $majors = Majors::all();
        $student = $this->studentInterface->edit($id);
        return view('student.edit', compact('student', 'majors'));
    }

    /**
     * Submit students update
     * @param Request $request
     * @param $studentId
     * @return View students with update success msg
     */
    public function update(StudentRequest $request, $id)
    {
        $this->studentInterface->update($request, $id);
        return redirect('/student')->with('update', 'Student Updated Successfully!!!');
    }

    /**
     * To delete student by id
     * @param $id
     * @return View students with delete success msg
     */
    public function delete($id)
    {
        $this->studentInterface->delete($id);
        return redirect('/student')->with('delete', 'Student Deleted Successfully!!!');
    }

    /**
     * To show import csv files
     *   * 
     * @return View students import
     */
    public function import()
    {
        return view("student.import");
    }

    /**
     * To upload csv file for post
     * @param Request $request
     * @return view students 
     */
    public function uploadStudents(Request $request)
    {
        //Validation For CSV file
        $request->validate([
            'file' => 'required|csv', 
        ], [
            'file.required' => 'Please Choose Your CSV File',
        ]);
        $this->studentInterface->uploadStudents($request);
        return redirect('/student')->with('import', 'Students CSV File Imported Successfully!!!');
    }

    /**
     * To download students csv file
     * @return File Download CSV file
     */
    public function exportStudents()
    {
        return $this->studentInterface->exportStudents();
    } 
}
