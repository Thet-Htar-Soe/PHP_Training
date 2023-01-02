<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Majors;

class StudentController extends Controller
{
    public function index() {
        $students = Students::with('major')->get();
        return view('student.index',compact('students'));
    }
}
