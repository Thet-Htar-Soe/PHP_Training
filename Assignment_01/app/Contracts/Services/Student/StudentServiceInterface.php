<?php

namespace App\Contracts\Services\Student;

use Illuminate\Http\Request;

/**
 * Interface for student service
 */
interface StudentServiceInterface
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
    public function store(Request $request);

    /**
     * Show students edit with majors' datas
     * @param $studentId
     * @return View students edit
     */
    public function edit($id);

    /**
     * Submit students update
     * @param Request $request
     * @param $studentId
     * @return View students with update success msg
     */
    public function update(Request $request, $id);
    
    /**
     * To delete student by id
     * @param $studentId
     * @return View students with delete success msg
     */
    public function delete($id);
}
