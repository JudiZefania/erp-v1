<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Personnel::all();
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
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'poste' => 'required',
            'departement' => 'required'
        ]);

        return Personnel::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Personnel $personnel)
    {
        return $personnel;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personnel $personnel)
    {
      //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personnel $personnel)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'poste' => 'required',
            'departement' => 'required'
        ]);
    
        $personnel->update($request->all());
    
        return $personnel;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personnel $personnel)
    {
        $personnel->delete();
        
        return response()->json(['message' => 'Personnel deleted successfully']); 
    }
}
