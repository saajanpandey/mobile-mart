<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OrderExport implements FromView, ShouldAutoSize
{
    public function __construct($results, $title)
    {
        $this->result = $results;
        $this->title = $title;
    }
    public function view(): View
    {

        return view('exports.order', [
            'titles' => $this->title,
            'order' =>   $this->result
        ]);
    }
}
