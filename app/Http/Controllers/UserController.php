<?php

namespace App\Http\Controllers;

use App\Models\Usersteacher;
use App\Models\UsersStudent;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;



class UserController extends Controller
{
    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";

        if (Auth::user()->user_type == 1) {
            return view('admin.my_account', $data);
        } elseif (Auth::user()->user_type == 2) {
            return view('teacher.my_account', $data);
        } elseif (Auth::user()->user_type == 3) {
            return view('student.my_account', $data);
        }
    }

    public function UpdateMyAccountAdmin(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255', // Assuming last_name is nullable
            'email' => 'required|email|unique:users,email,' . $id,
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
            // Add more validation rules as needed
        ]);

        $admin = User::getSingle($id);
        $admin->name = trim($request->name);
        $admin->last_name = trim($request->last_name);
        $admin->email = trim($request->email);

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $filename = strtolower(date('Ymdhis') . Str::random(20)) . '.' . $file->getClientOriginalExtension();
            $file->move('upload/profile/', $filename);
            $admin->profile_pic = $filename;
        }

        $admin->save();

        return redirect()->back()->with('success', "Account Successfully Updated");
    }






    public function UpdateMyAccount(Request $request)
    {
        $id = Auth::user()->id;

        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'weight' => 'nullable|numeric|max:300', // Assuming weight is in kilograms
            'height' => 'nullable|numeric|max:250', // Assuming height is in centimeters
            'blood_group' => 'required|max:10',
            'mobile_number' => ['required', 'regex:/^(09|\+639)[\d -]{9,11}$/'], // Validate Philippine mobile numbers
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }



        $teacher->marital_status = trim($request->marital_status);
        $teacher->address = trim($request->address);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->email = trim($request->email);
        $teacher->save();

        $teachers = Usersteacher::getSingle($id);
        $teachers->name = trim($request->name);
        $teachers->last_name = trim($request->last_name);
        $teachers->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $teachers->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);
            $teachers->profile_pic = $filename;
        }


        $teachers->marital_status = trim($request->marital_status);
        $teachers->address = trim($request->address);
        $teachers->mobile_number = trim($request->mobile_number);
        $teachers->permanent_address = trim($request->permanent_address);
        $teachers->qualification = trim($request->qualification);
        $teachers->work_experience = trim($request->work_experience);
        $teachers->email = trim($request->email);
        $teachers->save();

        return redirect()->back()->with('success', "Account Successfully Updated");
    }







    public function UpdateMyAccountStudent(Request $request)
    {

        $id = Auth::user()->id;

        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'weight' => 'nullable|numeric|max:300', // Assuming weight is in kilograms
            'height' => 'nullable|numeric|max:250', // Assuming height is in centimeters
            'blood_group' => 'required|max:10',
            'mobile_number' => ['required', 'regex:/^(09|\+639)[\d -]{9,11}$/'], // Validate Philippine mobile numbers
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $student = User::getSingle($id);

        if (!empty($request->file('profile_pic'))) {

            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }



        $student->mobile_number = trim($request->mobile_number);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);

        $student->save();
        $students = UsersStudent::getSingle($id);
        //     if(!empty($request->file('profile_pic')))
        //     {
        //     $ext = $request->file('profile_pic')->getClientOriginalExtension();
        //     $file = $request->file('profile_pic');
        //     $randomStr = date('Ymdhis').Str::random(20);
        //     $filename = strtolower($randomStr).'.'.$ext;
        //     $file->move('upload/profile/', $filename);
        //     $students->profile_pic = $filename;
        // }

        $students->name = trim($request->name);
        $students->last_name = trim($request->last_name);
        $students->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        $students->mobile_number = trim($request->mobile_number);
        $students->blood_group = trim($request->blood_group);
        $students->height = trim($request->height);
        $students->weight = trim($request->weight);
        $students->email = trim($request->email);

        $students->save();

        return redirect()->back()->with('success', "Account Successfully Updated");
    }


    public function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data);
    }



    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', "Password successfully updated");
        } else {
            return redirect()->back()->with('error', "Old Password is not Correct");
        }
    }
}
