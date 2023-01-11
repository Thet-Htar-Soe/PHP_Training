<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Majors;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Student\StudentApiServiceInterface;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    /**
     * studentApi interface 
     * */
    private $studentApiInterface;
    /**
     * Create a new controller instance.
     */
    public function __construct(StudentApiServiceInterface $studentServiceInterface)
    {
        $this->studentApiInterface = $studentServiceInterface;
    }

    /**
     * To show students view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentApiInterface->index();
        return response()->json($students, 200);
    }

    /**
     * Display majors
     *
     * @return \Illuminate\Http\Response
     */
    public function showMajors()
    {
        $majors = $this->studentApiInterface->showMajors();
        return response()->json($majors, 200);
    }

    /**
     * To submit students create 
     *
     * @param  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //Validation For Students Name
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'major_id' => 'required',
        ], [
            'name.required' => 'Please Enter Your Name!!!',
            'email.required' => 'Please Enter Your Email!!!',
            'phone.required' => 'Please Enter Your Phone!!!',
            'address.required' => 'Please Enter Your Address!!!',
            'major_id.required' => 'Please Enter Your Major!!!',
        ]);
        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()], 200);
        } else {
            $students = $this->studentApiInterface->store($request);
            $majorId = $request->major_id;
            $majors = Majors::find($majorId);
            return response()->json([$students, $majors, 'msg' => 'Student Created Successfully!!!'], 200);
        }
    }

    /**
     * Display the created student
     *
     * @param  $id
     * @return Response
     */
    public function show($id)
    {
        $student = $this->studentApiInterface->show($id);
        return response()->json($student, 200);
    }

    /**
     * Submit students update
     *
     * @param  $request
     * @param  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //Validation For Students Name
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|regex:/^([0]){1}([9]){1}([0-9]){9}/u|digits:11',
            'address' => 'required',
            'major_id' => 'required',
        ], [
            'name.required' => 'Please Enter Your Name!!!',
            'email.required' => 'Please Enter Your Email!!!',
            'email.email' => 'Invalid Email!!!',
            'phone.required' => 'Please Enter Your Phone!!!',
            'phone.numeric' => 'Invalid Phone Number!!!',
            'phone.regex' => 'Invalid Phone Format!!!',
            'address.required' => 'Please Enter Your Address!!!',
            'major_id.required' => 'Please Enter Your Major!!!',
        ]);
        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()], 200);
        } else {
            $major = $this->studentApiInterface->update($request, $id);
        }
        return response()->json([$major, 'msg' => 'Student Updated Successfully!!!'], 200);
    }

    /**
     * To delete student by id
     *
     * @param  $id
     * @return Response
     */
    public function destroy($id)
    {
        $student = $this->studentApiInterface->destroy($id);
        return response()->json(['deletedStudent' => $student, 'msg' => 'Student Deleted Successfully!!!'], 200);
    }

    /**
     * to show respective email
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPdf($id)
    {
        $student = $this->studentApiInterface->getPdf($id);
        return response()->json(['pdfStudent' => $student, 'msg' => 'Students Datas Send To Pdf'], 200);
    }

    /**
     * to send email with generated pdf file
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendMail(Request $request, $id)
    {
        $userEmail = $request->sendEmail;
        $student = $this->studentApiInterface->sendMail($request, $id);
        return response()->json(['userEmail' => $userEmail, 'studentDetails' => $student, 'msg' => "Email Has Sent Successfully!!!"], 200);
    }
}
