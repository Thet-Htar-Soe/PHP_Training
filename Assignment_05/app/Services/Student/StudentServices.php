<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport;
use Illuminate\Support\Facades\Session;

/**
 * Service class for student
 */
class StudentServices implements StudentServiceInterface
{
    /**
     * student dao
     */
    private $studentDao;

    /**
     * Class Constructor
     * @param studentDaoInterface
     */
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    /**
     * To show students view
     * 
     * @return View students
     */
    public function index()
    {
        return $this->studentDao->index();
    }

    /**
     * To show students create
     *   * 
     * @return View students create
     */
    public function create()
    {
        return $this->studentDao->create();
    }

    /**
     * To submit students create 
     * @param Request $request
     * @return View students with create success msg
     */
    public function store($request)
    {
        return $this->studentDao->store($request);
    }

    /**
     * Show students edit with majors' datas
     * @param $studentId
     * @return View students edit
     */
    public function edit($id)
    {
        return $this->studentDao->edit($id);
    }

    /**
     * Submit students update
     * @param Request $request
     * @param $studentId
     * @return View students with update success msg
     */
    public function update($request, $id)
    {
        return $this->studentDao->update($request, $id);
    }

    /**
     * To delete student by id
     * @param $studentId
     * @return View students with delete success msg
     */
    public function delete($id)
    {
        return $this->studentDao->delete($id);
    }

    /**
     * To upload csv file for post
     * @param Request $request
     * @return view students 
     */
    public function uploadStudents($request)
    {
        return $this->studentDao->uploadStudents($request);
    }

    /**
     * To download students csv file
     * @return File Download CSV file
     */
    public function exportStudents()
    {
        return Excel::download(new StudentsExport, 'students.csv');
    }

    /**
     * To search students information with name,email,majors 
     * @param Request $request
     * @return View students with students datas
     */
    public function search($request)
    {
        return $this->studentDao->search($request);
    }
}
