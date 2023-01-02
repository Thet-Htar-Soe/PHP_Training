<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\Major\MajorServiceInterface;

/**
 * This is Major controller.
 * This handles Major CRUD processing.
 */
class MajorController extends Controller
{
    /**
     * major interface 
     * */
    private $majorInterface;
    /**
     * Create a new controller instance.
     */
    public function __construct(MajorServiceInterface $majorServiceInterface)
    {
        $this->majorInterface = $majorServiceInterface;
    }

    /**
     * To show majors view
     * 
     * @return View majors
     */
    public function index()
    {
        $majors = $this->majorInterface->index();
        return view("major/index", compact('majors'));
    }

    /**
     * To show majors create
     *   * 
     * @return View majors create
     */
    public function create()
    {
        return view("major/create");
    }

    /**
     * To submit majors create 
     * @param Request $request
     * @return View majors with create success msg
     */
    public function store(Request $request)
    {
        //Validation For Majors Name
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Please Enter Your Major!!!'
        ]);
        $this->majorInterface->store($request);
        return redirect('/major')->with('success', 'Major Created Successfully!!!');
    }

    /**
     * Show majors edit
     * 
     * @param $majorId
     * @return View majors edit
     */
    public function edit($id)
    {
        $major = $this->majorInterface->edit($id);
        return view('major/edit', compact('major'));
    }

    /**
     * Submit majors update
     * @param Request $request
     * @param $majorId
     * @return View majors with update success msg
     */
    public function update(Request $request, $id)
    {
        //Validation For Majors Name
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Please Enter Your Major!!!',
        ]);

        $this->majorInterface->update($request, $id);
        return redirect('/major')->with('update', 'Major Updated Successfully!!!');
    }

    /**
     * To delete major by id
     * @param $majorId
     * @return View majors with delete success msg
     */
    public function delete($id)
    {
        $this->majorInterface->delete($id);
        return redirect('/major')->with('delete', 'Major Deleted Successfully!!!');
    }
}
