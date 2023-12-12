<?php

namespace App\Http\Controllers;

use App\Models\Professors;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class ProfessorsController extends Controller
{
    
    public function index()
    {
        $professors=Professors::all();
        return  Inertia::render('Professors/Index',['professors'=>$professors]);
    }

    public function create()
    {
        return  Inertia::render('Professors/Create');
    }

   
    public function store(Request $request)
    {
        $request->validate(['Document'=>'required|max:15']);
        $professors=new Professors($request->input());
        $professors->save();
        return redirect('Professors');
    }

   
    public function show(Professors $professors)
    {
       
    }

    
    public function edit($id)
    {
        $Professors = Professors::findOrFail($id);
        return  Inertia::render('Professors/Edit',['professors'=>$Professors]);
    }

    
    public function update(Request $request,$id)
    {
        $request->validate(['Document'=>'required|max:15']);
        $professors = Professors::findOrFail($id);
        $professors->update($request->all());
        return redirect('Professors');
    }

    
    public function destroy($id)
    {
        $professors = Professors::findOrFail($id);
        $professors->delete();
        return redirect('Professors');
    }
}
