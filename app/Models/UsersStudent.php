<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;

class UsersStudent extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'usersstudent';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];




    static public function getsingle($id)
    {
        return self::find($id);

    }

    // get student

    static public function getTeacherStudent($teacher_id)
    {
        $return = self::select('usersstudent.*', 'class.name as class_name')
            ->join('class', 'class.id', '=', 'usersstudent.class_id')
            ->join('assign_class_teacher', 'assign_class_teacher.class_id', '=', 'class.id')
            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
            ->where('usersstudent.user_type', '=', 3)
            ->where('usersstudent.is_delete', '=', 0);
        $return = $return->orderBy('usersstudent.id', 'desc')
            ->groupBy('usersstudent.id')
            ->paginate(20);

        return $return;
    }




    static public function getStudent()
    {
        $return = self::select('usersstudent.*', 'class.name as class_name')
            ->join('class', 'class.id', '=', 'usersstudent.class_id', 'left')
            ->where('usersstudent.user_type', '=', 3)
            ->where('usersstudent.is_delete', '=', 0);

        if (!empty(Request::get('name'))) {
            $return = $return->where('usersstudent.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('last_name'))) {
            $return = $return->where('last_name', 'like', '%' . Request::get('last_name') . '%');
        }

        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }

        if (!empty(Request::get('admission_number'))) {
            $return = $return->where('admission_number', 'like', '%' . Request::get('admission_number') . '%');
        }

        if (!empty(Request::get('roll_number'))) {
            $return = $return->where('roll_number', 'like', '%' . Request::get('roll_number') . '%');
        }

        if (!empty(Request::get('class_name'))) {
            $return = $return->where('class_name', 'like', '%' . Request::get('class_name') . '%');
        }
        if (!empty(Request::get('status'))) {
            $status = (Request::get('status') == 0) ? null : 1;
            $return = $return->where('usersstudent.status', '=', $status);
        }


        $return = $return->orderBy('usersstudent.id', 'desc')
            ->paginate(20);
        return $return;


    }



    static public function getEmailSingle($email)
    {

        return UsersStudent::where('email', '=', $email)->first();
    }
    static public function getTokenSingle($remember_token)
    {

        return UsersStudent::where('remember_token', '=', $remember_token)->first();
    }


    public function getProfile()
    {
        if (!empty($this->profile_pic) && file_exists('upload/profile/' . $this->profile_pic)) {
            return url('upload/profile/' . $this->profile_pic);

        } else {
            return "";
        }
    }
}
