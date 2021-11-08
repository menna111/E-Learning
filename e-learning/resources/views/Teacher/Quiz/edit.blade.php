<h5 class="text-yellow text-center"> تعديل الكويز</h5>
<div class="container w-lg-75">
    <form id="add_new_quiz">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="text-light float-right" for="title">العنوان</label>
                    <input class="form-control input-circle" id="title" name="title" type="text" value="{{$quiz->title}}">
                </div>
            </div>
            @php
                $subject = \App\Models\Subject::findOrFail($quiz->subject_id);
            @endphp
            <div class="col-lg-6 col-12">
                <div class="form-group">
                    <label class="text-light float-right" for="level_id">الفرقة</label>
                    <select class="form-control dark-input" name="level_id" id="level_id">
                        <option></option>

                        @foreach($levels as $level)
                            <option value="{{$level->id}}" @if($level_id == $level->id) selected @endif>{{$level->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <div class="form-group">
                    <label class="text-light float-right" for="subject_id">المادة</label>
                    <select class="form-control dark-input" name="subject_id" id="subject_id">

                        @foreach(\App\Models\Subject::where('level_id',$subject->level_id)->get() as $subjects)
                            <option @if ($subjects->id == $quiz->subject_id) selected @endif value="{{$subjects->id}}">{{$subjects->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label class="text-light float-right" for="duration">المدة</label>
                    <input class="form-control input-circle" id="duration" name="duration" type="number" value="{{ $quiz->duration }}">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label class="text-light float-right" for="expire_at">تنتهي صلاحية الكويز في:</label>
                    <input class="form-control input-circle" id="expire_at" name="expire_at" type="datetime-local" value="{{$quiz->expire_at}}">
                </div>
            </div>

            <div class="col-12 text-right">
                <button class="btn btn-edit" id="submit_form">
                    حفظ
                </button>

            </div>
        </div>
    </form>
</div>

<script>
    $('#level_id').change(function (){
        $.ajax({
            type: "POST",
            url: `{{url('quiz/choose-subject')}}/${this.value}`,
            success:function (response){
                console.log(response)
                if(response.status == true){

                    let subjects=document.getElementById('subject_id');
                    subjects.innerHTML="";
                    response.data.forEach(function (e){
                        subjects.innerHTML +=`<option value="${e.id}">${e.name} </option>`;
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'خطأ',
                        text: response.msg,

                    });
                }

            }

        } )
    });

    $('#submit_form').click(function (e){
        e.preventDefault()
        $.ajax({
            type: "POST",
            url: `{{route('quiz.update',$quiz->id)}}`,
            data:{
                title: $('#title').val(),
                duration: $('#duration').val(),
                subject_id: $('#subject_id').val(),
                expire_at: $('#expire_at').val(),


            },
            success:function (response){
                console.log(response)
                if(response.status == true){

                    Swal.fire({
                        icon: 'success',
                        title: 'تم بنجاح',
                        text: response.msg,



                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'خطأ',
                        text: response.msg,

                    });
                }



            }

        } )
    })

</script>
