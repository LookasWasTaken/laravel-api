<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\NewLead;
use App\Mail\NewLeadMarkdown;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        // Dump payload onto the page

        // dd($request->all());
        $data = $request->all();

        // validate the request fields
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // check if validation fails and returns the validation error messages
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // save the lead into the database
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        // send the mailable
        //Mail::to('info@lookas.dev')->send(new NewLead($newLead));
        // send the MARKDOWN mailable
        Mail::to('info@lookas.dev')->send(new NewLeadMarkdown($newLead));
        // return a success response
        return response()->json([
            'success' => true
        ]);
    }
}
