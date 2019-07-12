<?php

namespace App\Exports;

use App\AccessFirewall;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AccessExport implements FromCollection,WithHeadings
{
    public function headings(): array
    {
        return [
            'id', 'Requester Name', 'Source', 'Destination', 'Port', 'Access Period', 'Project Name', 'Description', 'Request Date', 'Worked Date', 'Checked Date', 'Approved Date', 'Checked By', 'Status Checked', 'Worked By', 'Status Worked', 'Approved By', 'Status Approval', 'Step', 'Created At', 'Updated At'
        ];
    }

    public function collection()
    {
        return AccessFirewall::all();
    }
}
