<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::allows('isALecturer')){
            $lecturers = Lecturer::all();
            return view('lecturer.index', compact('lecturers'));
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lecturer = new Lecturer();
        if(auth()->user()->can('create', Lecturer::class)){
            return view ('lecturer.create', compact('lecturer'));
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
            'lectID' => 'nullable|unique:lecturers,lectID',
            'name' => 'required|string|max:255',
            'email'=> 'required|string|email|unique:lecturers,email',
            ]);
            
            $lecturer = new Lecturer();
            $lecturer->fill($request->all());
            $lecturer->save();
            return redirect()->route('scm.lecturer.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecturer $lecturer)
    {
        return view('lecturer.show', compact('lecturer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
        // $lecturer = Lecturer::all();
        return view('lecturer.create', compact('lecturer'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email'=> 'required|string|email|unique:lecturers,email',
            'lectID'=> 'nullable|string|min:5', //OPTIONAL TO CHANGE lecturrer ID OR NOT
            ]);
            $lecturer->fill($request->all());
     
            $lecturer->save();
            return redirect()->route('scm.lecturer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();
        return redirect()->route('scm.lecturer.index')->withSuccess('Lecturer record deleted successfully.');

    }
}
