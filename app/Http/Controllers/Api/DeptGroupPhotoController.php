<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Resources\DeptGroupPhotoResource;
use App\Models\School;
use Illuminate\Support\Arr;

class DeptGroupPhotoController extends Controller
{
    public  function index(Request $request)
    {

        $dept = Department::where('short_name', $request->query('dept'))->first();
        $school = School::where('short_name', $request->query('school'))->first();
        if ($dept) {
            return new DeptGroupPhotoResource($dept->deptGroupPhoto);
        }
        if ($school) {
            $school_group_photos  = collect($school->groupPhotos()->get()->pluck('images')->all())
                ->flatten()->toArray();
            $number_school_group_photos = count($school_group_photos);
            if ($number_school_group_photos > 10) {
                $school_group_photos = Arr::random($school_group_photos, 10);
            } else {
                $school_group_photos = Arr::random($school_group_photos, $number_school_group_photos);
            }

            return new DeptGroupPhotoResource(['school' => $school, 'images' => $school_group_photos]);
        }


        return response()->json([
            'message' => "query parameter is required."
        ], 402);
    }
}
