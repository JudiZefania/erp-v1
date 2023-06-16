<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Personnel;
class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personnel = Personnel::all();
        return response()->json($personnel);
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
        $personnel = new Personnel([
            'nom' => $request->input('nom'),
            'poste' => $request->input('poste'),
            'departement' => $request->input('departement'),
            'compagnie' => $request->input('compagnie'),
        ]);
        $personnel->save();
        return response()->json('Personnel created!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = Personnel::find($id);
        return response()->json($contact);
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
    public function update(Request $request, $id)
    {
        $personnel = Personnel::find($id);
       $personnel->update($request->all());
       return response()->json('Personnel updated'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $personnel = Personnel::find($id);
        $personnel->delete();
        return response()->json(' deleted!');  
    }
}
