<?php

namespace App\Imports;

use App\Models\Products;
use App\Models\Supplier;
use App\Models\SupplierProduct;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SupplierProductImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $product = Products::where('title', $row['product_name'])->first();
        $supplier = Supplier::where('supplier_name', $row['supplier_name'])->first();

        if (!$product || !$supplier) {
            return null;
        }

        return new SupplierProduct([
            'product_id' => $product->id,
            'supplier_id' => $supplier->id,
            'cas_number' => $row['cas_number'],
        ]);
    }
}
