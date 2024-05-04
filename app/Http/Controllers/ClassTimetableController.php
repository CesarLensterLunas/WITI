<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;

class ClassTimetableController extends Controller
{
    public function list()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Class Timetable List";
        return view('admin.class_timetable.list', $data);
    }
}
