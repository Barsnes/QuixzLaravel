<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClubForm;
use App\Mail\formSubmission;
use Mail;
use PDF;

class ClubFormController extends Controller
{

    public function showForm(){
      return view('forms.club');
    }

    public function store(Request $request)
    {
      if ($request->agree != true) {
        $error = 'You have to agree to the terms.';
        return back()->withError($error);
      } else {

        $this->validate($request, array(
          'first_name' => 'required',
          'last_name' => 'required',
          'player_name' => 'required',
          'email' => 'required|email|unique:club_form',
          'phone' => '',
          'date_of_birth' => 'required|date',
          'country' => 'required',
          'city' => 'required',
          'zip' => 'required|integer',
          'street' => 'required',
        ));

        $form = new ClubForm;

        $form->first_name = $request->first_name;
        $form->last_name = $request->last_name;
        $form->player_name = $request->player_name;
        $form->email = $request->email;
        if (isset($request->phone)) {
          $form->phone = $request->phone;
        }
        $form->date_of_birth = $request->date_of_birth;
        $form->country = $request->country;
        $form->city = $request->city;
        $form->zip_code = $request->zip;
        $form->street = $request->street;

        $data = $request;

        $pdf = PDF::loadView('pdf.form', $data);
        $pdf->save('pdf/' . $request->first_name . '-' . $request->last_name . '.pdf');
        $pdf->stream();

        $form->pdf = $request->first_name . '-' . $request->last_name . '.pdf';

        $form->save();

        Mail::to('board@quixz.eu')->send(new formSubmission($form));

        return back()->withSuccess('Information successfully sent!');

      };
    }
}
