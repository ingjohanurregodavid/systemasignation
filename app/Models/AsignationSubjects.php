<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignationSubjects extends Model
{
    use HasFactory;
    protected $fillable=['idStudent','idSubject','idProfessor'];
}
