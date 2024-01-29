<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcontractors;

class SubcontractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Subcontractors::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Subcontractors::create($request -> all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Subcontractors::find($id);
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
        if(Subcontractors::where('id', $id) -> exists()){
            $subcon = Subcontractors::find($id);
            $subcon->subconName = $request->subconName;
            $subcon->suconActivities = $request->suconActivities;
            $subcon->startDate = $request->startDate;
            
            $subcon->save();
            return response()->json([
                "message" => "Subcontractors updated successfully"
            ], 200);
        }else{
            return response()->json([
                "message" => "Subcontractors not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Subcontractors::where('id', $id)->exists()){
            $subcon = Subcontractors::find($id);
            $subcon->delete();

            return response()->json([
                "message" => "Record deleted"
            ], 200);
        }else{
            return response()->jason([
                "message" => "Subcontractors not found"
            ], 404);
        }
    
    }
}
