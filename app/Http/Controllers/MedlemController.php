<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medlem;
use App\Mail\nyttMedlem;
use Mail;
use PDF;

class MedlemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

         public function store(Request $request)
         {
           if ($request->agree != true) {
             $error = 'You have to agree to all the terms.';
             return back()->withError($error);
           } else {

             $this->validate($request, [
               'first_name' => 'required',
               'last_name' => 'required',
               'email' => 'required|email|unique:medlem',
               'phone' => '',
               'date_of_birth' => 'required|date',
               'adress' => 'required',
               'steam_id' => '',
               'discord' => '',
             ]);

             $form = new Medlem;

             $form->first_name = $request->first_name;
             $form->last_name = $request->last_name;
             $form->email = $request->email;
             if (isset($request->phone)) {
               $form->phone = $request->phone;
             }
             $form->date_of_birth = $request->date_of_birth;
             $form->adress = $request->adress;
             if (isset($request->steam_id)) {
               $form->steam_id = $request->steam_id;
             }
             if (isset($request->discord)) {
             $form->discord = $request->discord;
             }

             $data = $request;

             $pdf = PDF::loadView('pdf.medlem', $data);
             $pdf->save('pdf/' . $request->first_name . '-' . $request->last_name . '.pdf');
             $pdf->stream();

             $form->pdf = $request->first_name . '-' . $request->last_name . '.pdf';

             $form->save();

             Mail::to('board@quixz.eu')->send(new nyttMedlem($form));
             Mail::to($form->email)->send(new nyttMedlemTakk($form));

             return back()->withSuccess('Information successfully sent!');

           };
         }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
