<?php

namespace App\Contracts\Dao\Student;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of student
 */
interface StudentDaoInterface
{
    /**
     * To show students view
     * 
     * @return View students
     */
    public function index();

    /**
     * To show students create
     *   * 
     * @return View students create
     */
    public function create();

    /**
     * To submit students create 
     * @param Request $request
     * @return View students with create success msg
     */
    public function store($request);

    /**
     * Show students edit with majors' datas
     * @param $id
     * @return View students edit
     */
    public function edit($id);

    /**
     * Submit students update
     * @param Request $request
     * @param $id
     * @return View students with update success msg
     */
    public function update($request, $id);

    /**
     * To delete student by id
     * @param $id
     * @return View students with delete success msg
     */
    public function delete($id);

    /**
     * To upload csv file for post
     * @param Request $request
     * @return view students 
     */
    public function uploadStudents($request);
}
