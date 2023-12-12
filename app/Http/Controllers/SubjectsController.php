<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class SubjectsController extends Controller
{
  
    public function index()
    {
        $subjects=Subjects::all();
        return  Inertia::render('Subjects/Index',['subjects'=>$subjects]);
    }
    public function create()
    {
        return  Inertia::render('Subjects/Create');
    }

    public function store(Request $request)
    {
        
        $subjects=new Subjects($request->input());
        $subjects->save();
        return redirect('Subjects');
    }
    public function show(Subjects $subjects)
    {
        //
    }
    public function edit($id)
    {
        $subjects = Subjects::findOrFail($id);
        return  Inertia::render('Subjects/Edit',['subjects'=>$subjects]);
    }
    public function update(Request $request,$id)
    {
        $subjects = Subjects::findOrFail($id);
        $subjects->update($request->all());
        return redirect('Subjects');
    }
    public function destroy($id)
    {
        $subjects = Subjects::findOrFail($id);
        $subjects->delete();
        return redirect('Subjects');
    }
}
