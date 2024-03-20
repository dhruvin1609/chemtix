<?php

namespace App\Exports;

use App\Models\Enquiry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class EnquiryExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Enquiry::with('getproduct')->get();
    }

    /**
    * @var Enquiry $enquiry
    */
    public function map($enquiry): array
    {
        return [
            'Name' => $enquiry->name,
            'Phone' => $enquiry->phone,
            'email' => $enquiry->email,
            'Product Name' => $enquiry->getproduct->title,
            'CAS Number' => $enquiry->cas_number,
            'Country' => $enquiry->country,
            'Company Name' => $enquiry->company_name,
            'Note' => $enquiry->note,
            'status' => $enquiry->status,
            'Remarks' => $enquiry->remarks,
            'Date' => $enquiry->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Phone',
            'email',
            'Product Name',
            'CAS Number',
            'Country',
            'Company Name',
            'Note',
            'status',
            'Remarks',
            'Date',
           
        ];
    }
}
