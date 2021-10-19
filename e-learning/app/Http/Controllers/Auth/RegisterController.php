<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\levels;
use App\Models\Students;
use App\Models\Teachers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function studentRegister(){
        $levels=levels::all();
        return view('auth.student-register',compact('levels'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      if(array_key_exists('code',$data)){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'job' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:255'],
            'code'=>[
               function($attribute,$value,$fail){
                 $code=Code::where('code',$value)->first();
                 if (! is_null($code)){
                     $code_registered=Teachers::where('code',$code)->first();
                     if (! is_null($code_registered)){
                         $fail('الكود مستخدم من قبل');
                     }
                 }else{
                     $fail('الكود غير صحيح');
                 }

               }

            ],

        ]);
      }else{
          return Validator::make($data, [
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
              'password' => ['required', 'string', 'min:8', 'confirmed'],
              'phone_number' => ['required'],
              'level_id' => ['required'],
              ]);
      }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
//     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        if (array_key_exists('code',$data)){

            DB::beginTransaction();

            try {
                $user=User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'role' =>'teacher',

                ]);
                Teachers::create([
                    'user_id' => $user->id,
                    'code' => $data['code'],
                    'bio' => $data['bio'],
                    'job' => $data['job'],

                ]);

                DB::commit();
                return $user;
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                return back()->with('error','something wrong');
            }



        }else{

            DB::beginTransaction();

            try {
                $user=User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'role' =>'student',

                ]);
                Students::create([
                    'user_id' => $user->id,
                    'phone_number' => $data['phone_number'],
                    'level_id' => $data['level_id'],


                ]);

                DB::commit();
                return $user;
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                return back()->with('error','something wrong');
            }


        }
    }
}
