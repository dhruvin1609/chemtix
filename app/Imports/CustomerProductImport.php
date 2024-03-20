<?php

namespace App\Imports;

use App\Models\Customer;
use App\Models\CustomerProduct;
use App\Models\Products;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use App\Rules\UniqueCasNumber;


class CustomerProductImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $product = Products::where('title', $row['product_name'])->first();
        $customer = Customer::where('customer_name', $row['customer_name'])->first();

        if (!$product || !$customer) {
            return null;
        }

        

        return new CustomerProduct([
            'product_id' => $product->id,
            'supplier_id' => $customer->id,
            'cas_number' => $row['cas_number'],
        ]);
    }
}
