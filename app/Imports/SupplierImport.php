<?php

namespace App\Imports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SupplierImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Supplier([
            'supplier_name' => $row['supplier_name'],
            'supplier_type' => $row['supplier_type'],
            'supplier_id' => $row['supplier_id'],
            'supplier_city' => $row['supplier_city'],
            'supplier_address' => $row['supplier_address'],
            'supplier_state' => $row['supplier_state'],
            'supplier_country' => $row['supplier_country'],
            'supplier_phone' => $row['supplier_phone'],
            'supplier_phone_alter' => $row['supplier_phone_alter'],
            'supplier_fax' => $row['supplier_fax'],
            'supplier_email' => $row['supplier_email'],
            'supplier_website' => $row['supplier_website'],
            'contact_name' => $row['contact_name'],
            'contact_phone' => $row['contact_phone'],
            'contact_designation' => $row['contact_designation'],
            'contact_email' => $row['contact_email'],
            'supplier_gst_no' => $row['supplier_gst_no'],
            'supplier_msme' => $row['supplier_msme'],
            'supplier_pan_no' => $row['supplier_pan_no'],
            'supplier_drug_lic_no' => $row['supplier_drug_lic_no'],
        ]);
    }
}
