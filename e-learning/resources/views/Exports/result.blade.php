
<div class="row justify-content-around my-4">
                        <div class="col-11">
                            <table class="table text-light text-center">
                                <thead>
                                   <tr>
                                    <th class="text-right" scope="col">اسم الطالب</th>
                                    <th scope="col">الدرجة</th>
                                       <th scope="col">الدرجة النهائية</th>



                                   </tr>

                                </thead>
                                <tbody>

@forelse($result as $item)
    <tr>
        <th class="text-right">{{$item->student->user->name}}</th>
        <td>{{$item->result}}</td>
        <td>{{$full_mark}}</td>

    </tr>
@empty
    <tr><td colspan="7">لا يوجد نتائج حتى الان</td></tr>
    @endforelse
    </tbody>
    </table>
    </div>
    </div>














