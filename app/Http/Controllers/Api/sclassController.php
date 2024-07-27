<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sclass;

class sclassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Index()
    {
         //Eloqeunt ORM
         $sclass=Sclass::latest()->get();
         return response()->json($sclass);


        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData= $request->validate([

            'class_name'=>'required|unique:sclasses'
        ]);

        Sclass::insert([
            'class_name'=>$request->class_name,
        ]);
        return response('Student class Inserted successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function Edit( string $id)
    {
        $sclass=Sclass::findOrFail($id);
        return response()->json( $sclass);
    }
    public function update(Request $request, string $id)
    {
     Sclass::findOrFail($id)->update([
            'class_name'=>$request->class_name,


        ]);
        return response('Student class Updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sclass=Sclass::findOrFail($id)->delete();
        return response('Student class deleted successfully');
        
    }
}
