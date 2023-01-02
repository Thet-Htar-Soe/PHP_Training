<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentApiDaoInterface;
use App\Contracts\Services\Student\StudentApiServiceInterface;
use Illuminate\Http\Request;

/**
 * Service class for student
 */
class StudentApiServices implements StudentApiServiceInterface
{
    /**
     * student dao
     */
    private $studentApiDao;

    /**
     * Class Constructor
     * @param studentDaoInterface
     */
    public function __construct(StudentApiDaoInterface $studentDao)
    {
        $this->studentApiDao = $studentDao;
    }

    /**
     * To show students view
     * 
     * @return View students
     */
    public function index()
    {
        return $this->studentApiDao->index();
    }

    /**
     * To get majors
     */
    public function showMajors()
    {
        return $this->studentApiDao->showMajors();
    }

    /**
     * To submit students create 
     * @param Request $request
     * @return View students with create success msg
     */
    public function store($request)
    {
        return $this->studentApiDao->store($request);
    }

    /**
     * Show students edit with majors' datas
     * @param $id
     * @return View students edit
     */
    public function show($id)
    {
        return $this->studentApiDao->show($id);
    }

    /**
     * Submit students update
     * @param Request $request
     * @param $id
     * @return View students with update success msg
     */
    public function update($request, $id)
    {
        return $this->studentApiDao->update($request, $id);
    }

    /**
     * To delete student by id
     * @param $id
     * @return View students with delete success msg
     */
    public function destroy($id)
    {
        return $this->studentApiDao->destroy($id);
    }

    /**
     * to show respective email
     *
     * @param  int  $id
     * @return send email form 
     */
    public function getPdf($id)
    {
        return $this->studentApiDao->getPdf($id);
    }

    /**
     * to send email with generated pdf file
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return send email with success msg
     */
    public function sendMail($request, $id)
    {
        return $this->studentApiDao->sendMail($request, $id);
    }
}
