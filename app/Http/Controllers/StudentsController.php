<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class StudentsController extends Controller
{
    public function index()
    {
        $students=Students::all();
        return  Inertia::render('Students/Index',['students'=>$students]);
    }

    public function create()
    {
        return  Inertia::render('Students/Create');
    }

    public function store(Request $request)
    {
        $request->validate(['Document'=>'required|max:15']);
        $students=new Students($request->input());
        $students->save();
        return redirect('Students');
    }
    public function show(Students $students)
    {
        //
    }
    public function edit($id)
    {
        $students = Students::findOrFail($id);
        return  Inertia::render('Students/Edit',['students'=>$students]);
    }
    public function update(Request $request,$id)
    {
        $request->validate(['Document'=>'required|max:15']);
        $students = Students::findOrFail($id);
        $students->update($request->all());
        return redirect('Students');
    }
    public function destroy($id)
    {
        $students = Students::findOrFail($id);
        $students->delete();
        return redirect('Students');
    }
}
