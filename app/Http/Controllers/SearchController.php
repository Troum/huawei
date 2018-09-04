<?php

namespace App\Http\Controllers;

use App\ApprovedParticipant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$results = ApprovedParticipant::wherePhone($request->needle)->get();
    	return response()->json(['results' => $results], Response::HTTP_OK);
    }
}
