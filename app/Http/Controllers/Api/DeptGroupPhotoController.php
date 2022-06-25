<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Resources\DeptGroupPhotoResource;

class DeptGroupPhotoController extends Controller
{
    public  function index(Request $request)
    {

        $dept = Department::where('short_name', $request->query('dept', Department::first()->short_name))->first();
        $per_page = $request->query('per_page', 12);
        if ($dept) {

            return DeptGroupPhotoResource::collection($dept->deptGroupPhoto()->paginate($per_page));
        }
    }
}
