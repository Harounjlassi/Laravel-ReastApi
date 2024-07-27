<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    public function store(Request $request){
        $validatedData=$request->validate([
            'name'=>'required|unique:students|max:255',
            'email'=>'required|unique:students|max:255',


        ]);
        Student::insert([

            'class_id'=>$request->class_id,
            'section_id'=>$request->section_id,
            'name'=>$request->name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'photo'=>$request->photo,
            'gender'=>$request->gender,
            'created_at'=>Carbon::Now(),
        
           


        ]);
        return response('Student Inserted successfully');
    }
    //
    public function Index()
    {
         //Eloqeunt ORM
         $Subject=Student::latest()->get();
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
        $Student=Student::findOrFail($id);
        return response()->json( $Student);
    }
    public function update(Request $request, string $id)
    {
        Student::findOrFail($id)->update([
            'class_id'=>$request->class_id,
            'section_id'=>$request->section_id,
            'name'=>$request->name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'photo'=>$request->photo,
            'gender'=>$request->gender,
        


        ]);
        return response('Student  Updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Student=Student::findOrFail($id)->delete();
        return response('Student  deleted successfully');
        
    }
}
