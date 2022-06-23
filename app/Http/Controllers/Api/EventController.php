<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Day;

class EventController extends Controller
{
    public function index(Request $request)
    {


        $day = Day::where('name', $request->query('day'))->first();
        $per_page = $request->query('per_page', 14);
        if ($day) {
            return EventResource::collection(Event::where('day_id', $day->id)->paginate($per_page));
        }

        return EventResource::collection(Event::paginate($per_page));
    }
}
