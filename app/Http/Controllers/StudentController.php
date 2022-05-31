<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'stdEmail'=>'required',
            'subject'=>'required',
        ]);
        
        $student =  new Student();     
        $student->firstName = $request->firstName;
        $student->lastName  = $request->lastName;
        $student->stdEmail  = $request->stdEmail; 
        $student->save();
        $student=Student::orderBy('id', 'desc')->first();
        foreach($request->subject as $row){
            $subject = new Subject();
            $subject->name=$row['name'];
            $subject->priority=$row['priority'];
            $subject->student_id=$student->id;
            $subject->save();

        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return Student::where('id','=',$student->id)->with('subjects')->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
