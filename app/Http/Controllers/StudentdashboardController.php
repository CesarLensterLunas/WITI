<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectModel; // Update the import to use your SubjectModel
use App\Models\StudentAddFeesModel;

class StudentdashboardController extends Controller
{
    public function dashboard()
    {
        // Fetch the total number of subjects using your SubjectModel
        $totalSubjects = SubjectModel::count();

        // Fetch the remaining balance in student fees
        $remainingBalance = StudentAddFeesModel::orderByDesc('created_by') // Assuming you want the latest record
        ->value('remaining_balance');
    


        // You can pass these variables to your dashboard view
        return view('student.dashboard', [
            'totalSubjects' => $totalSubjects,
            'remainingBalance' => $remainingBalance,
        ]);
        
    }
}

