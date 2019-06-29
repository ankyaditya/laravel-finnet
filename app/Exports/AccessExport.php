<?php

namespace App\Exports;

use App\AccessFirewall;
use Maatwebsite\Excel\Concerns\FromCollection;

class AccessExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AccessFirewall::all();
    }
}
