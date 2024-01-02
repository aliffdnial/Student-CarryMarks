<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::allows('isStudent')){
            $students = Student::all();
            return view('student.index', compact('students'));
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = new Student();
        if(auth()->user()->can('create', Student::class)){
            return view('student.create', compact('student'));
        }else{
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Student::create($request->all());
        // return redirect()->route('student.index')->withSuccess('New student record added successfully.');      

         $this->validate($request, [
            'studID' => 'required|unique:students,studID',
            'name' => 'required|string|max:255',
            'email'=> 'required|string|email|unique:users,email',
            ]);
            
            $student = new Student();
            $student->fill($request->all());
            $student->save();
            return redirect()->route('scm.student.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $subjects = Subject::all();
        return view('student.show', compact('student','subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        // $students = Student::all();
        return view('student.create', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email'=> 'required|string|email|unique:students,email',
            'studID'=> 'required|string|min:10', //OPTIONAL TO CHANGE STUDENT ID OR NOT
            ]);
            $student->fill($request->all());
     
            $student->save();
            return redirect()->route('scm.student.index')->withSuccess('Student record deleted successfully.');     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('scm.student.index')->withSuccess('Student record deleted successfully.');
    }
    
    public function addSubject(Request $request, Student $student){
        $student->subject()->attach($request->subject_id);
        return redirect('scm/student/'.$student->id);
    }
    public function dropSubject(Request $request, Student $student){
        // $student->subject()->detach($request->subject_id);
        $student->subject()->detach();
        return redirect('scm/student/'.$student->id);
    }
}
