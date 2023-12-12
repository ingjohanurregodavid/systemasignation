<?php

namespace App\Http\Controllers;

use App\Models\AsignationSubjects;
use App\Models\Students;
use App\Models\Professors;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class AsignationSubjectsController extends Controller
{
    public function index()
    {
        $asignationSubjects = AsignationSubjects::select(
            'asignation_subjects.id',
            'students.id AS student_id',
            'students.names AS student_names',
            'professors.id AS professor_id',
            'professors.names AS professor_names',
            'subjects.id AS subject_id',
            'subjects.names AS subject_names'
        )
        ->join('professors', 'professors.id', '=', 'asignation_subjects.idprofessor')
        ->join('students', 'students.id', '=', 'asignation_subjects.idstudent')
        ->join('subjects', 'subjects.id', '=', 'asignation_subjects.idsubject')
        ->paginate(10);
    
        $students = Students::all();
        $professors = Professors::all();
        $subjects = Subjects::all();
    
        return Inertia::render('AsignationSubjects/Index', [
            'asignation_subjects' => $asignationSubjects,
            'students' => $students,
            'subjects' => $subjects,
            'professors' => $professors
        ]);
    }

    public function create()
    {
        return Inertia::render('AsignationSubjects/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'idStudent' => 'required',
            'idSubject' => 'required',
            'idProfessor' => 'required',
        ]);

        // Simulación de la creación de una asignatura
        AsignationSubjects::create($request->all());

        return redirect()->route('asignationSubjects.index');
    }

    public function show($id)
    {
        $assignment = AsignationSubjects::findOrFail($id);
        return Inertia::render('AsignationSubjects/Show', ['asignationSubjects' => $asignationaubjects]);
    }

    public function edit($id)
    {
        $assignment = AsignationSubjects::findOrFail($id);
        return Inertia::render('AsignationSubjects/Edit', ['asignationSubjects' => $asignationaubjects]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idStudent' => 'required',
            'idSubject' => 'required',
            'idProfessor' => 'required',
        ]);

        // Simulación de la actualización de una asignatura
        $asignationaubjects = AsignationSubjects::findOrFail($id);
        $asignationaubjects->update($request->all());

        return redirect()->route('asignationSubjects.index');
    }

    public function destroy($id)
    {
        // Simulación de la eliminación de una asignatura
        $asignationaubjects = AsignationSubjects::findOrFail($id);
        $asignationaubjects->delete();

        return redirect()->route('asignationSubjects.index');
    }
    public function assignmentsByStudent()
    {
        $data = Student::with('asignationSubjects.subject', 'asignationSubjects.professor')->get();
    
        // Renderizar una vista con la información de los estudiantes y sus asignaturas/profesores
        return Inertia::render('AsignationSubjects/ByStudent', ['students' => $data]);
    }

}
