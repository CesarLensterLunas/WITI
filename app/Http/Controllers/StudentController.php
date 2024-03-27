<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
use Hash;
use Auth;

class StudentController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getStudent();
        $data['header_title']='Student List';
        return view('admin.student.list',$data);

    }
    public function add(){
        $data['getClass']= ClassModel::getClass();
        $data['header_title']='Add New Student';
        return view('admin.student.add',$data);

    }
        public function insert (Request $request)
        {
            $student = new User(); // Instantiate a new User model

        // Assign values to the properties of the $student object
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        $student->date_of_birth = !empty($request->date_of_birth) ? trim($request->date_of_birth) : null; // Handle empty date_of_birth
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = trim($request->admission_date);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status); // Assuming status is a property of User model
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password); // Hash the password before saving

        $student->save(); // Save the student record to the database

        return redirect('admin/student/list')->with('success', "Student Successfully Created");

        }
        
    }
