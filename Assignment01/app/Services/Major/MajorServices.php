<?php

namespace App\Services\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Contracts\Services\Major\MajorServiceInterface;
use Illuminate\Http\Request;

/**
 * Service class for major
 */
class MajorServices implements MajorServiceInterface
{
    /**
     * major dao
     */
    private $majorDao;

    /**
     * Class Constructor
     * @param majorDaoInterface
     */
    public function __construct(MajorDaoInterface $majorDao)
    {
        $this->majorDao = $majorDao;
    }

    /**
     * To show majors view
     * 
     * @return View majors
     */
    public function index()
    {
        return $this->majorDao->index();
    }

    /**
     * To submit majors create 
     * @param Request $request
     * @return View majors with create success msg
     */
    public function store(Request $request)
    {
        return $this->majorDao->store($request);
    }

    /**
     * Show majors edit
     * 
     * @param $majorId
     * @return View majors edit
     */
    public function edit($id)
    {
        return $this->majorDao->edit($id);
    }

    /**
     * Submit majors update
     * @param Request $request
     * @param $majorId
     * @return View majors with update success msg
     */
    public function update(Request $request, $id)
    {
        return $this->majorDao->update($request, $id);
    }

    /**
     * To delete major by id
     * @param $majorId
     * @return View majors with delete success msg
     */
    public function delete($id)
    {
        return $this->majorDao->delete($id);
    }
}
