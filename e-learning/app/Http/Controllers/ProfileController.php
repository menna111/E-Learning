<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Traits\ImageUpload;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    use ImageUpload;

    public function updateTeacher(Request $request)
    {
//        dd('dadads');
        $user = Auth::user();
        $teacher = $user->teacher;

         $request->validate( [
                'name' => ['required', 'string', 'min:5', 'max:255'],
                'email' => ['required', 'email', 'unique:users,id,' . Auth::id()],
                'image' => ['nullable','file', 'mimes:png,jpeg,svg,jpg', 'max:4069'],
                'job' => ['required', 'string', 'min:5', 'max:255'],
                'bio' => ['required', 'string', 'min:5', 'max:255'],

            ]
        );

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->has('image')) {
            $user->image = $this->UploadImage($request->image, 'profile/teacher', 50);
        }
        $user->save();

        $teacher->job = $request->job;
        $teacher->bio = $request->bio;





        $teacher->save();
        return redirect()->back()->with('success','تم نعديل البيانات بنجاح ');
    }
}
