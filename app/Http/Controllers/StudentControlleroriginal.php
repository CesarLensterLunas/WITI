<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersStudent;
use App\Models\ClassModel;
use Hash;
use Auth;
use Str;


class StudentController extends Controller
{


    
    public function list(){
        $data['getRecord'] = UsersStudent::getStudent();
        $data['header_title']='Student List';
        return view('admin.student.list',$data);

    }
    public function add(){
        $data['getClass']= ClassModel::getClass();
        $data['header_title']='Add New Student';
        return view('admin.student.add',$data);

    }
   
    
    public function insert(Request $request)
    {
       
request()->validate([
    'email' => 'required|email|unique:usersstudent', 
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
    $student->admission_number = trim($request->admission_number);
    $student->roll_number = trim($request->roll_number);
    $student->class_id = trim($request->class_id); 
    $student->gender = trim($request->gender);
    
    if(!empty($request->date_of_birth))
    {
    
    $student->date_of_birth = trim($request->date_of_birth);
    }
    if(!empty($request->file('profile_pic')))
    
    {
    
    $ext = $request->file('profile_pic')->getClientOriginalExtension(); 
    $file = $request->file('profile_pic'); 
    $randomStr = date('Ymdhis').Str::random(20);
    $filename = strtolower($randomStr).'.'.$ext; 
    $file->move('upload/profile/', $filename);
   
    $student->profile_pic = $filename;
}
     
    
    $student->mobile_number = trim($request->mobile_number);
    
    if(!empty($request->admission_date))
    {
    $student->admission_date = trim($request->admission_date);
    }

    $student->blood_group = trim($request->blood_group);
    $student->height = trim($request->height);
    $student->weight = trim($request->weight);
    $student->status = trim($request->status); // Assuming status is a property of User model
    $student->email = trim($request->email);
    $student->password = Hash::make($request->password); // Hash the password before saving
    $student->user_type = 3;
    $student->save(); // Save the student record to the database

    return redirect('admin/student/list')->with('success', "Student Successfully Created");

    }

    
public function edit($id)
{
   

    $data['getRecord'] = UsersStudent::getSingle($id); 
    if(!empty($data['getRecord']))
    {
     $data['getClass'] = ClassModel::getClass(); 
        $data['header_title'] = "Edit Student"; 
        return view('admin.student.edit',$data);
    }
    else
    {
       
    abort (404);
    }
    
}
 

public function update($id, Request $request)
{
request()->validate([
'email' => 'required|email|unique:usersstudent,email,' .$id, 
'weight' => 'max:10',
'blood_group' => 'max:10',
'mobile_number' => ['nullable', 'string', 'regex:/^(09|\+639)\d{9}$/'], 
'admission_number' => 'max:50',
'roll_number' => 'max:50',
'caste' => 'max:50',
'religion' => 'max: 50',
'height' => 'max:10'
]);

$student = UsersStudent::getSingle($id);  // Instantiate a new User model
$student->name = trim($request->name);
$student->last_name = trim($request->last_name);
$student->admission_number = trim($request->admission_number);
$student->roll_number = trim($request->roll_number);
$student->class_id = trim($request->class_id); 
$student->gender = trim($request->gender);

if(!empty($request->date_of_birth))
{

$student->date_of_birth = trim($request->date_of_birth);
}
if(!empty($request->file('profile_pic')))
{

if(!empty($student->getProfile()))
{
    unlink('upload/profile/'.$student->profile_pic);
}
$ext =$request->file('profile_pic')->getClientOriginalExtension();
$file = $request->file('profile_pic');
$randomStr = date('Ymdhis'). Str::random(20); 
$filename = strtolower($randomStr). '.'.$ext; 
$file->move('upload/profile/', $filename); 
$student->profile_pic = $filename;

 
}
 

$student->mobile_number = trim($request->mobile_number);

if(!empty($request->admission_date))
{
$student->admission_date = trim($request->admission_date);
}

$student->blood_group = trim($request->blood_group);
$student->height = trim($request->height);
$student->weight = trim($request->weight);
$student->status = trim($request->status); // Assuming status is a property of User model
$student->email = trim($request->email);
$student->password = Hash::make($request->password); // Hash the password before saving
$student->user_type = 3;
$student->save(); // Save the student record to the database

return redirect('admin/student/list')->with('success', "Student Successfully Updated");

}


public function delete($id)
{
$getRecord = UsersStudent::getSingle($id); 
if(!empty($getRecord))
{
$getRecord->is_delete = 1; 
$getRecord->save();
return redirect()->back()->with('success', "Student Successfully Deleted");

}
else
{
abort (404);
}
}
public function MyStudent()
{
    $data['getRecord'] = UsersStudent::getTeacherStudent(Auth::user()->id);
    $data['header_title'] = "My Student List";
    return view('teacher.my_student', $data);
}

    
}























 