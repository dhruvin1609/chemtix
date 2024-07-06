<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToModel, WithHeadingRow
{
     /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'customer_name' => $row['customer_name'],
            'customer_type' => $row['customer_type'],
            'customer_city' => $row['customer_city'],
            'customer_address' => $row['customer_address'],
            'customer_state' => $row['customer_state'],
            'customer_country' => $row['customer_country'],
            'customer_phone' => $row['customer_phone'],
            'customer_phone_alter' => $row['customer_phone_alter'],
            'customer_fax' => $row['customer_fax'],
            'customer_email' => $row['customer_email'],
            'customer_website' => $row['customer_website'],
            'customer_gst_no' => $row['customer_gst_no'],
            'customer_msme' => $row['customer_msme'],
            'customer_pan_no' => $row['customer_pan_no'],
            'customer_drug_lic_no' => $row['customer_drug_lic_no'],
        ]);
    }
}
