<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::allows('isAdmin')){
            $subjects = Subject::all();
            return view('subject.index', compact('subjects'));
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subject = new Subject();
        $lecturer = Lecturer::all();

        if(auth()->user()->can('create', Subject::class)){
            return view("subject.create", compact('subject','lecturer'));
        }else{
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:subjects,code',
            'name' => 'required|string|max:255',
            'creditHours'=> 'required|integer',
            'type' => 'required|string|max:255',
            'lecturer_id' => 'nullable',
            ]);
            
            $subject = new Subject();
            $subject->fill($request->all());
            $subject->save();
            return redirect()->route('scm.subject.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        return view('subject.show',compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
