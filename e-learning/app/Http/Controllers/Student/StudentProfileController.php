<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Traits\ImageUpload;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentProfileController extends Controller
{
    use ResponseTrait,ImageUpload;

    public function updateStudent(Request $request){
        $user = Auth::user();
        $student = $user->student;

        $request->validate( [
                'name' => ['required', 'string', 'min:5', 'max:255'],
                'email' => ['required', 'email', 'unique:users,id,' . Auth::id()],
                'image' => ['nullable','file', 'mimes:png,jpeg,svg,jpg', 'max:4069'],
                'phone_number' => 'required',

            ]
        );

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->has('image')) {
            $user->image = $this->UploadImage($request->image, 'profile/student', 50);
        }
        $user->save();

        $student->phone_number = $request->phone_number;

        $student->save();
        return redirect()->back()->with('success','تم نعديل البيانات بنجاح ');
    }

}
