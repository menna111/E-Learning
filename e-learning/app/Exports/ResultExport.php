<?php
namespace App\Exports;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ResultExport implements FromView
{
    protected $result;
    protected $full_mark;
    public function __construct($result,$full_mark)
    {
        $this->result=$result;
        $this->full_mark=$full_mark;

    }

     public function view() :View
     {
        return view('exports.result',[
            'result' =>$this->result ,
            'full_mark' => $this->full_mark
        ]);
     }


}















?>
