<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Mail;
use Str;
use App\Notifications\UserLogin;
use Illuminate\Support\Facades\RateLimiter;
class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) { // 5 attempts allowed
            return redirect()->back()->with('error', 'Too many login attempts. Please try again later.');
        }
        //dd(Hash::make(12345));
       if(!empty(Auth::check())){

            if(Auth::user()->user_type == 1){
                // $user=Auth::user();
                // $message = 'my awesome message';
                // $user->notify(new UserLogin($message));
                return redirect('admin/dashboard');
            }
            elseif(Auth::user()->user_type == 2)
            {
                // $user=Auth::user();
                // $message = 'my awesome message';
                // $user->notify(new UserLogin($message));

                return redirect('teacher/dashboard');
            }
            elseif(Auth::user()->user_type == 3)
            {
                // $user=Auth::user();
                // $message = 'my awesome message';
                // $user->notify(new UserLogin($message));

                return redirect('student/dashboard');
            }
            elseif(Auth::user()->user_type == 4)
            {
                return redirect('parent/dashboard');
            }
        }

        return view('auth.login');
    }

    public function Authlogin(Request $request)
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) { // 5 attempts allowed
            return redirect()->back()->with('error', 'Too many login attempts. Please try again later.');
        }

        $remember = !empty($request->remember) ? true : false;

        if (Auth::attempt(['email'=> $request->email, 'password'=> $request->password], $remember))
        {
            if(Auth::user()->user_type == 1)

            {
                $user=Auth::user();
                return redirect('admin/dashboard');
            }
            elseif(Auth::user()->user_type == 2)
            {
                $user=Auth::user();
                return redirect('teacher/dashboard');
            }
            elseif(Auth::user()->user_type == 3)
            {
                $user=Auth::user();
                // $message = 'my awesome message';
                // $user->notify(new UserLogin($message));
                return redirect('student/dashboard');
            }




        }
        else{
            RateLimiter::hit($this->throttleKey($request));
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
    }
    protected function throttleKey(Request $request)
    {
        return mb_strtolower($request->input('email')) . '|' . $request->ip();
    }

    public function forgotpassword()
    {
        return view('auth.forgot');
    }
    public function PostForgotPassword(Request $request)
    {
       // dd($request->all());

       $user = User::getEmailSingle($request->email);
       if (!empty($user)){

        $user->remember_token=Str::random(30);
        $user->save();
        Mail::to($user->email)->send(new ForgotPasswordMail($user));

        return redirect()->back()->with('success', "Please check your email and reset your password");

           }
       else{
        return redirect()->back()->with('error', "Email not found in the system.");
       }
    }


    public function reset($remember_token)
    {

       $user =  User::getTokenSingle($remember_token);
       if(!empty($user))
       {
            $data['user'] = $user;
            return view('auth.reset', $data);
       }
       else{
        abort(404);
       }

    }

    public function PostReset($token, Request $request)
    {
         if ($request->password == $request->cpassword)
         {
        $user = User::getTokenSingle($token);
        $user->password = Hash::make($request->password);
        $user->remember_token=Str::random(30);
        $user->save();


        return redirect(url('/login'))->with('success', "Password successfully reset");
    }
        else
        {
            return redirect()->back()->with('error', "Password and confirm password does not match");
        }

    }


    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}


