<?php

namespace App\Http\Controllers;

use App\Models\UsersStudent;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use App\Notifications\UserLogin;
use App\Mail\CreateAccountMail;
use app\Models\User;
use Hash;
use Auth;
use Mail;
use Str;

class AdminController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getAdmin();
        $data['header_title']='Admin List';
        return view('admin.admin.list',$data);

    }
    public function add(){

        $data['header_title'] = 'Add New Admin';
        return view('admin.admin.add',$data);

    }
    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users'

        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make('Password123!!!');
        $user->user_type = 1;
        $user->save();
        Mail::to($user->email)->send(new CreateAccountMail($user));

        return redirect('admin/admin/list')->with('success', "Admin Sucessfully Created");
    }




    public function edit($id)
    {
        $data['getRecord'] = UsersStudent::getSingle($id);
        if (!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Admin";
        return view('admin.admin.edit',$data);

        }
        else
        {
            abort(404);

        }

    }
    public function update($id, Request $request)
    {
                            request()->validate([
                                'email' => 'required|email|unique:users,email,'.$id

                            ]);
                        $user = User::getSingle($id);
                        $user->name = trim($request->name);
                        $user->last_name = trim($request->last_name);
                        $user->email = trim($request->email);
                        if(!empty($request->file('profile_pic')))

                        {

                        $ext = $request->file('profile_pic')->getClientOriginalExtension();
                        $file = $request->file('profile_pic');
                        $randomStr = date('Ymdhis').Str::random(20);
                        $filename = strtolower($randomStr).'.'.$ext;
                        $file->move('upload/profile/', $filename);

                        $user->profile_pic = $filename;
                    }
                        $user->save();
                        return redirect('admin/admin/list')->with('success', "Admin Sucessfully updated");
}


public function Delete($id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Admin not found.');
    }

    // Permanently delete the admin
    $user->forceDelete();

    return redirect('admin/admin/list')->with('success', 'Admin successfully deleted.');
}
public function school_year(){
    $data['getRecord'] = UsersStudent::getStudent();
    $data['header_title']='Academic Year';
    return view('admin.school_year.list',$data);


}
}


