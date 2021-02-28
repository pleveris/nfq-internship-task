<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Status;

class StatusController extends Controller
{
    public function get_status ()
    {
        $status = Status::all();
        if(count($status) ==0) return response()->json(array('id' => 0, 'message' => 'No status message was found.'), 200);
        $stat_max_id = Status::where('id','>',0)->max('id');
        $status = Status::find($stat_max_id);
        return response()->json(array('id' => $status->id, 'message' => $status->status_message), 200);
    }
}