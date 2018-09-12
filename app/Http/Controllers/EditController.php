<?php

namespace App\Http\Controllers;

use App\ApprovedParticipant;
use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EditController extends Controller
{
    public function edit(Request $request)
    {
    	$participant = Participant::whereId($request->edit)->first();
    	return response()->json(['participant' => $participant], Response::HTTP_OK);
    }

    public function save(Request $request)
    {
	    $participant = Participant::whereId($request->id)->first();

	    $participant->name = $request->name;
	    $participant->phone = $request->phone;
	    $participant->address = $request->address;
	    $participant->email = $request->email;

	    $participant->save();

	    return response()->json(['success' => 'Данные успешно изменены'], Response::HTTP_OK);
    }

    public function saveApproved(Request $request)
    {
        $participant = ApprovedParticipant::whereId($request->id)->first();

        $participant->name = $request->name;
        $participant->phone = $request->phone;
        $participant->address = $request->address;
        $participant->email = $request->email;

        $participant->save();

        return response()->json(['success' => 'Данные успешно изменены'], Response::HTTP_OK);
    }

}
