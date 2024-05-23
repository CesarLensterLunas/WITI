<?php

namespace App\Http\Controllers;

use App\Models\StudentAddFeesModel; 
use App\Models\User;  // Add this line to import the User model
use Illuminate\Http\Request;
use Auth;

class FeesCollectionController extends Controller
{
    public function collect_fees_add($student_id)
    {
        $data['getFees'] = StudentAddFeesModel::getFees($student_id);
        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = "Add Collect Fees";
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);
        return view('admin.fees_collection.add_collect_fees', $data);
    }

    public function CollectFeesStudent(Request $request)
    {
        $student_id = Auth::user()->id;

        $data['getFees'] = StudentAddFeesModel::getFees($student_id);

        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        
        $data['header_title'] = "Fees Collection";

        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount(Auth::user()->id, Auth::user()->class_id);

        return view('student.my_fees_collection', $data);
    }
}
