<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
       public function store(Request $request){
        $validateData= $request->validate([

            'class_id'=>'required',
            'subject_name'=>'required|unique:subjects|max:255'
        ]);

        Subject::insert([
            'class_id'=>$request->class_id,
            'subject_name'=>$request->subject_name,
            'subject_code'=>$request->subject_code,
        ]);
        return response('subject Inserted successfully');


       }




        /**
     * Display a listing of the resource.
     */
 

     public function Index()
    {
         //Eloqeunt ORM
         $Subject=Subject::latest()->get();
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
        $Subject=Subject::findOrFail($id);
        return response()->json( $Subject);
    }
    public function update(Request $request, string $id)
    {
     Subject::findOrFail($id)->update([
            'class_name'=>$request->class_name,


        ]);
        return response('Student class Updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Subject=Subject::findOrFail($id)->delete();
        return response('Student class deleted successfully');
        
    }
}
