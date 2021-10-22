<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Teachers;
use App\Traits\ImageUpload;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    use ResponseTrait;
    use ImageUpload;
    public function updateTeacher(Request $request){
//        dd('dadads');
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'min:5', 'max:255'],
                'email' => ['required', 'email', 'unique:users,id,' . Auth::id()],
                'image' => [ 'file', 'mimes:png,jpeg,svg,jpg', 'max:4069'],
            ]
        );
        if($validator->fails()){
            return $this->returnError($validator->errors()->toJson(), 400);
        }

        $user->name= $request->name;
        $user->email= $request->email;


        if($request->has('image')){
            $img_validator=Validator::make($request->all(),[
                'image' => ['required', 'file', 'mimes:png,jpeg,svg,jpg', 'max:4069']
            ]);

            if($img_validator->fails()){
                return $this->returnError('only allowed jpg,jpeg,svg,png', 400);
            }
            $user->image=$this->uploadImage($request['image'],"profile",40);
        }
        $user->save();
//        $teachers->save();

        return redirect()->back();
    }
}
