<?php

namespace App\Http\Controllers;

use App\Models\GradeModel; 
use App\Models\User;  // Add this line to import the User model
use Illuminate\Http\Request;
use Auth;

class GradesController extends Controller
{
    public function my_grades($student_id)
    {
        $data['grades'] = GradeModel::getGrades($student_id);
        $student = User::find($student_id);
        $data['student'] = $student;
        $data['header_title'] = "View Student Grades";
        return view('admin.grade.view_student_grades', $data);
    }

    public function ViewMyGrades(Request $request)
    {
        $student_id = Auth::user()->id;
        $getGrades = GradeModel::getGrades($student_id);
        $student = User::find($student_id);
        $data['student'] = $student;
        $data['getGrades'] = $getGrades;
        $data['header_title'] = "My Grades";
    
        return view('student.my_grades', $data);
    }
}    