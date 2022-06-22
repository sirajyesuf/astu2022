<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
use App\Models\Day;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request)
    {


        return StudentResource::collection(Student::paginate(2));
    }
}
