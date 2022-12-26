<?php

namespace App\Contracts\Services\Major;

use Illuminate\Http\Request;

/**
 * Interface for major service
 */
interface MajorServiceInterface
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
    public function store(Request $request);

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
    public function update(Request $request, $id);

    /**
     * To delete major by id
     * @param $majorId
     * @return View majors with delete success msg
     */
    public function delete($id);
}
