<?php

namespace App\Dao\Major;

use App\Models\Majors;
use App\Contracts\Dao\Major\MajorDaoInterface;
use Illuminate\Http\Request;

/**
 * Data accessing object for major
 */
class MajorDao implements MajorDaoInterface
{

    /**
     * To show majors view
     * 
     * @return View majors
     */
    public function index()
    {
        $majors = Majors::all();
        return $majors;
    }

    /**
     * To submit majors create 
     * @param Request $request
     * @return View majors with create success msg
     */
    public function store(Request $request)
    {
        $name = $request->name;
        Majors::create([
            'name' => $name,
        ]);
        return $name;
    }

    /**
     * Show majors edit
     * 
     * @param $majorId
     * @return View majors edit
     */
    public function edit($id)
    {
        $major = Majors::where('id', $id)->first();
        return $major;
    }

    /**
     * Submit majors update
     * @param Request $request
     * @param $majorId
     * @return View majors with update success msg
     */
    public function update(Request $request, $id)
    {
        $name = $request->name;
        Majors::where('id', $id)->update([
            'name' => $name,
        ]);
        return $name;
    }

    /**
     * To delete major by id
     * @param $majorId
     * @return View majors with delete success msg
     */
    public function delete($id)
    {
        return Majors::where('id', $id)->delete();
    }
}
