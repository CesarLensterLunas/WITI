<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignClassTeacherModel; // Import your User model
use App\Models\ClassModel;

class TeacherdashboardController extends Controller
{
    public function dashboard()
    {
        // Fetch the total number of students using your User model
        $totalStudents = AssignClassTeacherModel::count();

        // Fetch the latest class subject using your ClassSubjectModel
        $classSubject = ClassModel::orderByDesc('created_at')
            ->value('id');

        // Pass these variables to your dashboard view
        return view('teacher.dashboard', [
            'totalStudents' => $totalStudents,
            'classSubject' => $classSubject,
        ]);
    }
}
