<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\OrderLink;

class OrderLinkExport implements FromCollection,WithHeadings
{
    public function headings(): array
    {
        return [
            'id', 'Requester Name', 'Nama Perusahaan', 'Alamat', 'No Telepon', 'Nama PIC', 'No PIC', 'Email PIC', 'Provider Link', 'Jenis Link', 'Bakchaul', 'Bandwidth Link', 'Beban Instalasi Kabel Gedung', 'Delivery Target Date', 'Request Date', 'Worked By', 'Worked Date', 'Checked By', 'Checked Date', 'Approved By', 'Approved Date',  'Step', 'Status Checked', 'Status Worked', 'Status Approval', 'Created At', 'Updated At'
        ];
    }

    public function collection()
    {
        return OrderLink::all();
    }
}
