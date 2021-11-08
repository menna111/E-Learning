<h5 class="text-yellow text-center">اضافة سؤال</h5>
<div class="container w-lg-75">
    <form id="add_new_question">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="text-light float-right" for="content">العنوان</label>
                    <input class="form-control input-circle" id="content" type="text" name="content" required>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group ">
                    <label class="text-light float-right" for="image">الصورة(اختيارى)</label>
                    <input class="form-control dark-input" type="file" id="image" name="image">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group ">
                    <label class="text-light float-right" for="full_mark">درجة السؤال</label>
                    <input class="form-control dark-input" required type="text" id="full_mark" name="full_mark">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group ">
                    <div id="error_msg"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group ">
                    <label class="text-light float-right" for="correct_answer">الاجابة الصيحيحة</label>
                    <input id="correct_answer"
                           class="form-control input-circle w-98"
                           name="correct_answer"
                           type="text"
                           required>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="text-light float-right" for="answers">الاجابات الخاطئة</label>
                </div>
            </div>
            <div class="col-12">
                <div class="slides-container">
                    <div class="slides bm-y mt-2">
                        <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <input id="answers"
                                           class="form-control input-circle w-98"
                                           name="answers[]"
                                           type="text" required>
                                </div>

                            </div>
                            <div class="col-2">
                                <button class="btn btn-danger radius-50 sq-btn remove_slide" type="button" onclick="removeAnswer(this)">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="btn btn-info radius-50 sq-btn mt-2" id="add_slide" type="button"><i class="fa fa-plus"></i></button>
            </div>
            <div class="col-4">
                <input class="btn btn-outline-delete" type="submit" value="حفظ">
            </div>
        </div>
    </form>
</div>

<script>
    $('#add_slide').on('click', function () {
        let more_answers = `
                <div class="slides bm-y mt-2">
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group">
                                <input id="correct_index"
                                       class="form-control input-circle w-98"
                                       name="answers[]"
                                       type="text">

                            </div>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-danger radius-50 sq-btn remove_slide" type="button" onclick="removeAnswer(this)">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `
        $('.slides-container').append(more_answers)
    })

    function removeAnswer(me) {
        let divs_length = $('.slides-container').children().length;
        let error_place = $('#error_msg')

        if (divs_length === 1) {
            let errorMsg = '<div class="alert alert-danger text-right">يجب الا يقل عدد الاجابات الخاطئة عن واحدة</div>';
            error_place.html(errorMsg).promise().done(function(){
                setTimeout(function () {
                    // Closing the alert
                    $('.alert').fadeOut('slow');
                }, 2500);
            })
        } else {
            $(me).parent().parent().parent().remove()
        }
    }

    $('#add_new_question').submit(function (e) {
        e.preventDefault()
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: `{{ route('question.store', $id) }}`,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status == true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'تم بنجاح!',
                        text: response.msg,

                    })
                    $('#content').modal('hide');

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'خطأ',
                        text: response.msg,
                    })
                }
            }
        });
    })
</script>
