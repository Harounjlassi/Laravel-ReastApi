<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Carbon\Carbon;

class SectionController extends Controller
{
    public function store(Request $request){
        Section::insert([

            'class_id'=>$request->class_id,
            'section_name'=>$request->section_name,
            'created_at'=>Carbon::now(),


        ]);
        return response('Section Inserted successfully');
    }
    //
    public function Index()
    {
         //Eloqeunt ORM
         $Subject=Section::latest()->get();
         return response()->json($Subject);


        
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
        $Section=Section::findOrFail($id);
        return response()->json( $Section);
    }
    public function update(Request $request, string $id)
    {
        Section::findOrFail($id)->update([
            'section_name'=>$request->section_name,
            'class_id'=>$request->class_id,


        ]);
        return response('section  Updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Section=Section::findOrFail($id)->delete();
        return response('Section  deleted successfully');
        
    }
}
