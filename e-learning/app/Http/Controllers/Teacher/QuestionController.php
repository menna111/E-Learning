<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    use ResponseTrait;

    public  function index($id){
        $user=Auth::user();
        $teacher=$user->teacher;
        $quiz=Quiz::findOrFail($id);
        $questions=$quiz->questions()->paginate(10);
        return view('teacher.quiz.question.index',compact('questions','user','teacher','quiz'));

    }

    public function create($id){
            return view('teacher.quiz.question.create',compact('id'));
    }


    public function store(Request $request,$id){
            return $this->returnData($request,'100','200');
        $validator=Validator::make($request->all(),[


        ]);
        if ($validator->fails()){
            return $this->returnError($validator->errors()->all(),400);
        }
        try {
            Quiz::create($request->all());
            return  $this->returnSuccess('تم اضافة الكويز بنجاح',201);

        }catch (\Exception $exception){
//            return  $this->returnError($exception->getMessage(),500);
            return  $this->returnError('حدث خطأ ما برجاء المحاولة لاحقا',500);
        }
    }
}
