<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Traits\ImageUpload;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    use ResponseTrait,ImageUpload;

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
//            return $this->returnData($request->all(),'100','200');
        $validator=Validator::make($request->all(),[
            'content'        => 'required|string|min:3|max:255',
            'correct_answer' => 'required',
            'full_mark'      => 'required|numeric',
            'image'          => 'nullable|file|mimes:png,jpg,jpeg,svg',


        ]);
        if ($validator->fails()){
            return $this->returnError($validator->errors()->all(),400);
        }
        if ($request->has('image')){
            $image=$this->uploadImage($request->file('image'),'uploaded/questions/' .$id,50);
        }else{
            $image=null;
        }

        try {
          $question =  Question::create([
                'content'   => $request['content'],
                'full_mark' => $request['full_mark'],
                'image'     => $image,
                'quiz_id'   => $id,


            ]);

            Answer::create([
                'question_id' => $question->id,
                'content'      => $request['content'],
                'is_correct'  => 1,


            ]);
            foreach ($request->answers as $answer){
            Answer::create([
                'question_id' => $question->id,
                'content'      => $request['content'],
                'is_correct'  => 0,


            ]);
            }

            return  $this->returnSuccess('تم اضافة السؤال بنجاح',201);

        }catch (\Exception $exception){
            return  $this->returnError($exception->getMessage(),500);
            return  $this->returnError('حدث خطأ ما برجاء المحاولة لاحقا',500);
        }
    }
}
