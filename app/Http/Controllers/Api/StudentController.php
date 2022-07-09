<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
use App\Models\Department;
use App\Models\School;
use App\Models\Student;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $school = School::where('short_name', $request->query('school'))->first();
        $dept = Department::where('short_name', $request->query('dept'))->first();
        $searchTerm = Str::of($request->query('search'))->explode(' ');


        $per_page = $request->query('per_page', 14);

        if ($school) {

            return StudentResource::collection($school->students()->orderBy('first_name')->paginate($per_page));
        }

        if ($dept) {
            return StudentResource::collection($dept->students()->orderBy('first_name')->paginate($per_page));
        }


        if ($searchTerm->count() == 1) {
            return StudentResource::collection(Student::where('first_name', 'LIKE', "%{$searchTerm[0]}%")->orderBy('first_name')->paginate($per_page));
        }
        if ($searchTerm->count() == 2) {
            $fn = $searchTerm[0];
            $ln = $searchTerm[1];
            $students = Student::where('first_name', 'LIKE', "%{$fn}%")
                ->where('last_name', 'LIKE', "%{$ln}%")
                ->orderBy('first_name')->paginate($per_page);
            return StudentResource::collection($students);
        }

        return StudentResource::collection(Student::orderBy('first_name')->paginate($per_page));
    }

    public function show(Student $student)
    {
        return new StudentResource($student);
    }
}
