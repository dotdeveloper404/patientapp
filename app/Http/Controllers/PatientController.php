<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients  = Patient::get();
        return view('portal.patient.list', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portal.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'notes' => 'required',
        ]);

        $data = array_merge($data, ['user_id' => auth()->user()->id]);

        Patient::create($data);

        return redirect()->route('portal.patient.index')->with('alert', [
            'type' => 'success',
            'message' => 'Patient Added Successfully.'
        ]);
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
         $patient = Patient::find($id);
         return view('portal.patient.edit',['patient'=> $patient]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $data = $request->validate([
            'name' => 'required',
            'notes' => 'required',
        ]);

        $data = array_merge($data, ['user_id' => auth()->user()->id]);

        $patient->update($data);

        return redirect()->route('portal.patient.index')->with('alert', [
            'type' => 'success',
            'message' => 'Patient Updated Successfully.'
        ]);
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
