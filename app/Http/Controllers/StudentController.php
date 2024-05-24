<?php

namespace App\Http\Controllers;

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
        $request->validate([
            'email' => 'required|email|unique:users',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => ['nullable', 'string', 'regex:/^(09|\+639)\d{9}$/'],
            'admission_number' => 'max:50',
            'roll_number' => 'max:50',
            'height' => 'max:10',
        ]);

        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        $student->date_of_birth = trim($request->date_of_birth);
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = trim($request->admission_date);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
        $student->password = Hash::make('Password123!!!');
        $student->user_type = 3;

        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $request->file('profile_pic')->move('upload/profile/', $filename);
            $student->profile_pic = $filename;
        }

        $student->save();
        Mail::to($student->email)->send(new CreateAccountMail($student));

        return redirect('admin/student/list')->with('success', "Student Successfully Updated");
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

        $student = UsersStudent::find($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        $student->date_of_birth = trim($request->date_of_birth);
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = trim($request->admission_date);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = 3;

        if (!empty($request->file('profile_pic'))) {
            if (!empty($student->profile_pic)) {
                unlink('upload/profile/' . $student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $request->file('profile_pic')->move('upload/profile/', $filename);
            $student->profile_pic = $filename;
        }

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
