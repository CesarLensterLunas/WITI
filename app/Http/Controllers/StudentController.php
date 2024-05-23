<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersStudent;
use App\Models\User;
use App\Models\ClassModel;
use App\Mail\CreateAccountMail;
use Hash;
use Auth;
use Str;
use Mail;

class StudentController extends Controller
{



    public function list()
    {
        $data['getRecord'] = UsersStudent::getStudent();
        $data['header_title'] = 'Student List';
        return view('admin.student.list', $data);

    }
    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = 'Add New Student';
        return view('admin.student.add', $data);

    }


    public function insert(Request $request)
    {

        request()->validate([
            'email' => 'required|email|unique:users',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => ['nullable', 'string', 'regex:/^(09|\+639)\d{9}$/'],
            'admission_number' => 'max:50',
            'roll_number' => 'max: 50',
            'height' => 'max: 10',
        ]);





        $student = new UsersStudent;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {

            $student->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->file('profile_pic'))) {

            // $ext = $request->file('profile_pic')->getClientOriginalExtension();
            // $file = $request->file('profile_pic');
            // $randomStr = date('Ymdhis').Str::random(20);
            // $filename = strtolower($randomStr).'.'.$ext;
            // $file->move('upload/profile/', $filename);

            // $student->profile_pic = $filename;
        }


        $student->mobile_number = trim($request->mobile_number);

        if (!empty($request->admission_date)) {
            $student->admission_date = trim($request->admission_date);
        }

        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        // Assuming status is a property of User model
        $student->email = trim($request->email);
        $student->password = Hash::make('Password123!!!'); // Hash the password before saving
        $student->user_type = 3;
        $student->save(); // Save the student record to the database


        $students = new User;
        $students->name = trim($request->name);
        $students->last_name = trim($request->last_name);
        $students->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {

            $students->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->file('profile_pic'))) {

            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);

            $students->profile_pic = $filename;
        }


        $students->mobile_number = trim($request->mobile_number);

        if (!empty($request->admission_date)) {
            $students->admission_date = trim($request->admission_date);
        }

        $student->blood_group = trim($request->blood_group);
        $students->height = trim($request->height);
        $students->weight = trim($request->weight);
        // Assuming status is a property of User model
        $students->email = trim($request->email);
        $students->password = Hash::make('Password123!!!'); // Hash the password before saving
        $students->user_type = 3;
        $students->save();
        Mail::to($student->email)->send(new CreateAccountMail($student));

        return redirect('/login')->with('success', "Student Successfully enrolled to our system  please check you email ");

    }


    public function edit($id)
    {


        $data['getRecord'] = UsersStudent::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = "Edit Student";
            return view('admin.student.edit', $data);
        } else {

            abort(404);
        }

    }


    // app/Http/Controllers/StudentController.php
    public function update($id, Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:usersstudent,email,' . $id,
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => ['nullable', 'string', 'regex:/^(09|\+639)\d{9}$/'],
            'admission_number' => 'max:50',
            'roll_number' => 'max:50',
            'caste' => 'max:50',
            'religion' => 'max:50',
            'height' => 'max:10'
        ]);

        $students = User::findOrFail($id);
        $students->name = trim($request->name);
        $students->last_name = trim($request->last_name);
        $students->admission_number = trim($request->admission_number);
        $students->roll_number = trim($request->roll_number);
        $students->class_id = trim($request->class_id);
        $students->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $students->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->file('profile_pic'))) {
            if (!empty($students->profile_pic)) {
                unlink('upload/profile/' . $students->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);
            $students->profile_pic = $filename;
        }

        $students->mobile_number = trim($request->mobile_number);

        if (!empty($request->admission_date)) {
            $students->admission_date = trim($request->admission_date);
        }

        $students->blood_group = trim($request->blood_group);
        $students->height = trim($request->height);
        $students->weight = trim($request->weight);
        $students->status = trim($request->status);
        $students->email = trim($request->email);
        if (!empty($request->password)) {
            $students->password = Hash::make($request->password);
        }

        $students->user_type = 3;
        $students->save();

        $student = UsersStudent::findOrFail($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->file('profile_pic'))) {
            if (!empty($student->profile_pic)) {
                unlink('upload/profile/' . $student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);
            $student->profile_pic = $filename;
        }

        $student->mobile_number = trim($request->mobile_number);

        if (!empty($request->admission_date)) {
            $student->admission_date = trim($request->admission_date);
        }

        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        if (!empty($request->password)) {
            $student->password = Hash::make($request->password);
        }

        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with('success', "Student Successfully Updated");
    }

    public function delete($id)
    {
        $getRecord = UsersStudent::getSingle($id);
        if (!empty($getRecord)) {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success', "Student Successfully Deleted");

        } else {
            abort(404);
        }
    }
    public function MyStudent()
    {
        $data['getRecord'] = UsersStudent::getTeacherStudent(Auth::user()->id);
        $data['header_title'] = "My Student List";
        return view('teacher.my_student', $data);
    }


}























