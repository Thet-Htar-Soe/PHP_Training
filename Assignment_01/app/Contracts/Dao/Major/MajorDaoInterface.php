<?php

namespace App\Contracts\Dao\Major;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of major
 */
interface MajorDaoInterface
{
    /**
     * To show majors view
     * 
     * @return View majors
     */
    public function index();

    /**
     * To submit majors create 
     * @param Request $request
     * @return View majors with create success msg
     */
    public function store($request);

    /**
     * Show majors edit
     * 
     * @param $majorId
     * @return View majors edit
     */
    public function edit($id);

    /**
     * Submit majors update
     * @param Request $request
     * @param $majorId
     * @return View majors with update success msg
     */
    public function update($request, $id);

    /**
     * To delete major by id
     * @param $majorId
     * @return View majors with delete success msg
     */
    public function delete($id);
}
