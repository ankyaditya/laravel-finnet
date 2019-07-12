<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Server;

class ServerExport implements FromCollection,WithHeadings
{
    public function headings(): array
    {
        return [
            'id', 'Requester Name', 'Operating System', 'RAM', 'CPU', 'Disk', 'Environtment', 'Aplikasi', 'Description', 'File', 'Request Date', 'Worked By', 'Worked Date', 'Checked By', 'Checked Date', 'Approved By', 'Approved Date', 'Step',  'Status Checked', 'Status Worked', 'Status Approval', 'Created At', 'Updated At'
        ];
    }

    public function collection()
    {
        return Server::all();
    }
}
