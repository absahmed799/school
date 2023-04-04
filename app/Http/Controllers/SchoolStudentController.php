<?php

namespace App\Http\Controllers;

use App\Models\SchoolStudent;
use App\Models\SchoolCity;
use Illuminate\Http\Request;

class SchoolStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students= SchoolStudent::select()->paginate(10);
       
        
        return view('student.index', ['students' => $students]);
        
    }
    public function home()
    {
        return view('student.home');
    }
    public function about()
    {
        return view('student.about');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities= SchoolCity::all();
        return view('student.create',['cities'=>$cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schoolStudent = SchoolStudent::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'phone' => $request->phone,
            'adresse' => $request->adresse,
            'ville_id' => $request->ville_id,
            
       ]);
       return redirect(route('student.index', $schoolStudent->id))->withSuccess('Post Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolStudent  $schoolStudent
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolStudent $schoolStudent)
    {
        return view('student.show', ['schoolStudent' => $schoolStudent]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolStudent  $schoolStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolStudent $schoolStudent)
    {
        $cities= SchoolCity::all();
        return view('student.edit', ['schoolStudent' => $schoolStudent,'cities'=>$cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolStudent  $schoolStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolStudent $schoolStudent)
    {
        $schoolStudent->update([
            'nom' => $request->nom,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'phone' => $request->phone,
            'adresse' => $request->adresse,
            'ville_id' => $request->ville_id,
            
       ]);
       return redirect(route('student.index', $schoolStudent->id))->withSuccess('Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolStudent  $schoolStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolStudent $schoolStudent)
    {
        $schoolStudent->delete();
        return redirect(route('student.index'))->withSuccess('Post Deleted');
    }
 
}
