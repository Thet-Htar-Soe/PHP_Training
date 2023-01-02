<?php

namespace App\Contracts\Services\Student;

use Illuminate\Http\Request;

/**
 * Interface for student service
 */
interface StudentApiServiceInterface
{
    /**
     * To show students view
     * 
     * @return View students
     */
    public function index();

    /**
     * To get majors
     */
    public function showMajors();

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
    public function show($id);

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
    public function destroy($id);

    /**
     * to show respective email
     *
     * @param  int  $id
     * @return send email form 
     */
    public function getPdf($id);

    /**
     * to send email with generated pdf file
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return send email with success msg
     */
    public function sendMail($request, $id);
}
