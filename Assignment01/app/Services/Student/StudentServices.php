<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;

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
    public function store(Request $request)
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
    public function update(Request $request, $id)
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
}
