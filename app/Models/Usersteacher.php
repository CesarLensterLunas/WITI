<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;



class Usersteacher extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'usersteacher';
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


    static public function getTeacher()
    {
        $return = self::select('usersteacher.*')
            ->where('usersteacher.user_type', '=', 2)
            ->where('usersteacher.is_delete', '=', 0);

        if (!empty(Request::get('name'))) {
            $return = $return->where('usersteacher.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('last_name'))) {
            $return = $return->where('usersteacher.last_name', 'like', '%' . Request::get('last_name') . '%');
        }

        if (!empty(Request::get('email'))) {
            $return = $return->where('usersteacher.email', 'like', '%' . Request::get('email') . '%');
        }

        if (!empty(Request::get('gender'))) {
            $return = $return->where('usersteacher.gender', '=', Request::get('gender'));
        }

        if (!empty(Request::get('mobile_number'))) {
            $return = $return->where('usersteacher.mobile_number', 'like', '%' . Request::get('mobile_number') . '%');
        }

        if (!empty(Request::get('marital_status'))) {
            $return = $return->where('usersteacher.marital_status', 'like', '%' . Request::get('marital_status') . '%');
        }
        if (!empty(Request::get('address'))) {
            $return = $return->where('usersteacher.address', 'like', '%' . Request::get('address') . '%');
        }

        if (!empty(Request::get('admission_date'))) {
            $return = $return->whereDate('usersteacher.admission_date', '=', Request::get('admission_date'));
        }

        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('usersteacher.created_at', '=', Request::get('date'));
        }

        if (!empty(Request::get('status'))) {
            $status = (Request::get('status') == 0) ? null : 1;
            $return = $return->where('usersteacher.status', '=', $status);
        }


        $return = $return->orderBy('usersteacher.id', 'desc')
            ->paginate(20);
        return $return;
    }

    static public function getTeacherClass()
    {
        $return = self::select('usersteacher.*')
            ->where('usersteacher.user_type', '=', 2)
            ->where('usersteacher.is_delete', 0)
            ->orderBy('usersteacher.id', 'desc')
            ->get();

        return $return;
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
