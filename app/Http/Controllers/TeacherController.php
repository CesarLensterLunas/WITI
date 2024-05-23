<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Usersteacher;
use App\Models\User;

use Hash;
use Auth;
use Str;

class TeacherController extends Controller
{
    public function MyAccount()
    {
        $data['getRecord'] = Usersteacher::getSingle(Auth::usersteacher()->id);
        $data['header_title'] = "My Account";

        if (Auth::usersteacher()->user_type == 2) {
            return view('teacher.my_account', $data);
        }
    }






    //
    public function list()
    {
        $data['getRecord'] = Usersteacher::getTeacher();
        $data['header_title'] = "Teacher List";
        return view('admin.teacher.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Teacher";
        return view('admin.teacher.add', $data);
    }

    public function insert(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'mobile_number' => 'max:15|min:8',
            'marital_status' => 'max:50',
        ]);

        // Create a new User instance
        $teacher = new Usersteacher;

        // Assign values from the request to the User instance
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->admission_date)) {
            $teacher->admission_date = trim($request->admission_date);
        }

        // Handle profile picture upload
        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);
            $teacher->profile_pic = $filename;
        }

        $teacher->marital_status = trim($request->marital_status);
        $teacher->address = trim($request->address);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->note = trim($request->note);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password);
        $teacher->user_type = 2;

        $teacher->save();

        return redirect('admin/teacher/list')->with('success', "Teacher Successfully Created");

    }


    public function edit($id)
    {
        $data['getRecord'] = Usersteacher::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Edit Subject";
            return view('admin.teacher.edit', $data);
        } else {
            abort(404);
        }
    }


    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:usersteacher,email,' . $id,
            'mobile_number' => 'max:15|min:8',
            'marital status' => 'max:50',
        ]);

        $teacher = Usersteacher::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->admission_date)) {
            $teacher->admission_date = trim($request->admission_date);
        }

        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);
            $teacher->profile_pic = $filename;
        }
        $teacher->marital_status = trim($request->marital_status);
        $teacher->address = trim($request->address);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->note = trim($request->note);
        $teacher->status = trim($request->status);

        $teacher->email = trim($request->email);



        $teacher->save();

        $teachers = User::getSingle($id);
        $teachers->name = trim($request->name);
        $teachers->last_name = trim($request->last_name);
        $teachers->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $teachers->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->admission_date)) {
            $teachers->admission_date = trim($request->admission_date);
        }

        // if (!empty($request->file('profile_pic'))) {
        //     $ext = $request->file('profile_pic')->getClientOriginalExtension();
        //     $file = $request->file('profile_pic');
        //     $randomStr = date('Ymdhis') . Str::random(20);
        //     $filename = strtolower($randomStr) . '.' . $ext;
        //     $file->move('upload/profile/', $filename);
        //     $teachers->profile_pic = $filename;
        // }
        $teachers->marital_status = trim($request->marital_status);
        $teachers->address = trim($request->address);
        $teachers->mobile_number = trim($request->mobile_number);
        $teachers->permanent_address = trim($request->permanent_address);
        $teachers->qualification = trim($request->qualification);
        $teachers->work_experience = trim($request->work_experience);
        $teachers->note = trim($request->note);
        $teachers->status = trim($request->status);

        $teachers->email = trim($request->email);
        $teachers->save();

        return redirect('admin/teacher/list')->with('success', "Teacher Successfully Updated");
    }
    public function delete($id)
    {
        $getRecord = Usersteacher::getSingle($id);
        if (!empty($getRecord)) {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success', "Teacher Successfully Deleted");
        } else {
            abort(404);
        }
    }

}





