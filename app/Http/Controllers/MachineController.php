<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Machine;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $machine = Machine::all();
        return response()->json($machine);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $machine = new Machine([
            'nomMachine' => $request->input('nomMachine'),
            'type' => $request->input('type'),
            'marque' => $request->input('marque'),
            'nomUtilisateur' => $request->input('nomUtilisateur'),
            'departement' => $request->input('departement'),
            'compagnie' => $request->input('compagnie'),
            'date' => $request->input('date'),
            'dateLimite' => $request->input('dateLimite'),
        ]);
        $machine->save();
        return response()->json('Machine created!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = Machine::find($id);
        return response()->json($contact);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machine $machine)
    {
      //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $machine = Machine::find($id);
       $machine->update($request->all());
       return response()->json('Machine updated'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $machine = Machine::find($id);
        $machine->delete();
        return response()->json(' deleted!');  
    }
}
