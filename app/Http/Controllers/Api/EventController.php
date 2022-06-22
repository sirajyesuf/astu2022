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
        if ($day) {
            return EventResource::collection(Event::where('day_id', $day->id)->paginate(2));
        }

        return EventResource::collection(Event::paginate(2));
    }
}
