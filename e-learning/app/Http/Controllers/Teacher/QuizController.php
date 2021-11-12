<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\level;
use App\Models\Quiz;
use App\Models\QuizStudent;
use App\Models\Subject;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    use ResponseTrait;

    public function index(){
        $user=Auth::user();
        $teacher=$user->teacher;
        $quizzes=Quiz::paginate(10);


        return view('teacher.quiz.index',compact('user','teacher','quizzes'));
    }


    public function create(){
        $levels=level::all();
        return view('teacher.quiz.create',compact('levels'));
    }


    public function chooseSubject($id){
        $subjects= Subject::select('id','name')->where('level_id',$id)->get();
        if ($subjects->count()==0){
            return $this->returnError('لا يوجد مواد في هذا القسم',404);
        }
        return $this->returnData('هذه مواد الفرقة المختارة',$subjects,200);

    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'title' =>'required|string|min:3|max:255|unique:quizzes',
            'subject_id' =>'required',
            'duration' =>'required|numeric',
            'expire_at' =>'required',

        ]);
        if ($validator->fails()){
            return $this->returnError($validator->errors()->all(),400);
        }
        try {
            Quiz::create($request->all());
            return  $this->returnSuccess('تم اضافة الكويز بنجاح',201);

        }catch (\Exception $exception){
            return  $this->returnError($exception->getMessage(),500);
            return  $this->returnError('حدث خطأ ما برجاء المحاولة لاحقا',500);
        }
    }

    public function edit(int $id){
        $quiz=Quiz::whereId($id)->first();
//        $subject=Subject::whereId($quiz->subject_id);
        $level_id=$quiz->subject->level_id;

        if (is_null($quiz)){
            return  $this->returnError('لم يتم العثور على الكويز',404);
        }
        $levels=level::select('id', 'name')->get();
        return view('teacher.quiz.edit',compact('levels','quiz','level_id'));
    }

    public function update(Request $request,$id){
        $quiz=Quiz::whereId($id)->first();
        $validator=Validator::make($request->all(),[
            'title' =>['required','string','min:|max:255','unique:quizzes,id,'. $id],
            'subject_id' =>'required',
            'duration' =>['required','numeric'],
            'expire_at' =>'required',

        ]);
        if ($validator->fails()){
            return $this->returnError($validator->errors()->all(),400);
        }
        try {
            $quiz->update($request->all());
            return  $this->returnSuccess('تم تحديث الكويز بنجاح',201);

        }catch (\Exception $exception){
//            return  $this->returnError($exception->getMessage(),500);
            return  $this->returnError('حدث خطأ ما برجاء المحاولة لاحقا',500);
        }
    }

    public function deleteQuiz($id){
        $quiz=Quiz::whereId($id)->first();

        if (is_null($quiz)){
            return  $this->returnError('لم يتم العثور على الكويز',404);
        }
//        QuizStudent::destroy($id);
        $quiz->delete();

    }
}

