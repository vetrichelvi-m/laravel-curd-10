<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function index()
    {
       $students = Student::all();



       return view('students.index',compact('students'));

    //    return $students;
    }


    public function create()
    {
        return view('students.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required'
        ]);

        $students = new Student;
        $students->name = $request->name ;
        $students->mobile = $request->mobile ;
        $students->email = $request->email ;
        $students->save();

        if($students){
            return redirect()->route('students.index')
            ->with('success','students created successfully.');
            // return view('students.index');

        }
    }

    public function update(Request $request, string $id)
    {
        // return $id;
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required'
        ]);

        $students =  Student::find($id);
        // return $students;
        $students->name = $request->name ;
        $students->mobile = $request->mobile ;
        $students->email = $request->email ;
        $students->save();
        if($students){
            return view('students.index',compact('students'));
        }

    }

    public function show(string $id)
    {
        $students =  Student::find($id);
        return view('students.create',compact('students'));


    }


    public function edit(string $id)
    {
        $students =  Student::find($id);

        return view('students.edit',compact('students'));

    }





    public function destroy(string $id)
    {

    }
}
