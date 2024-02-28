<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rams;

class RamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Rams::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Rams::create($request -> all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Rams::find($id);
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
        if(Rams::where('id', $id) -> exists()){
            $rams = Rams::find($id);
            $rams->ramsTitle = $request->ramsTitle;
            $rams->ramsSubcon = $request->ramsSubcon;
            $rams->revNumber = $request->revNumber;
            $rams->revDate = $request->revDate;
            $rams->ramsStatus = $request->ramsStatus;

            $rams->save();
            return response()->json([
                "message" => "Rams updated successfully"
            ], 200);
        }else{
            return response()->json([
                "message" => "Rams not found"
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
        if(Rams::where('id', $id)->exists()){
            $rams = Rams::find($id);
            $rams->delete();

            return response()->json([
                "message" => "Record deleted"
            ], 200);
        }else{
            return response()->json([
                "message" => "Rams not found"
            ], 404);
        }
    
    }

    public function countrams()
    {
        $countTotal = Rams::count(); 
        $countOfApp= Rams::where('ramsStatus', 'Approved')->count();
        $countOfAm= Rams::where('ramsStatus', 'Require amendments')->count();
        $countOfRe= Rams::where('ramsStatus', 'Require reapproval')->count();

        return [
            "tot" => $countTotal,
            "total_ap" => $countOfApp,
            "total_am" => $countOfAm,
            "total_re" => $countOfRe
        ];
       
    }
}
