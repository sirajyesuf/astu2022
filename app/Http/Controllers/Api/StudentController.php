<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
use App\Models\Day;
use App\Models\Department;
use App\Models\School;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $school = School::where('short_name', $request->query('school'))->first();
        $dept = Department::where('short_name', $request->query('dept'))->first();

        if ($school) {

            return StudentResource::collection($school->students()->paginate(2));
        }

        if ($dept) {
            return StudentResource::collection($dept->students()->paginate(2));
        }

        return StudentResource::collection(Student::paginate(2));
    }
}
