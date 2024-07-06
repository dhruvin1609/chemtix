<?php

namespace App\Imports;

use App\Models\ProductCategory;
use App\Models\Products;
use Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImport implements ToModel, WithHeadingRow
{
   
    public function model(array $row)
    {
        $product_cat = ProductCategory::where('name','like','%'. $row['category'].'%')->first();
        if (!$product_cat) {
            return null;
        }
        return new Products([
            'title' => $row['title'],
            'category_id' => $product_cat->id??"",
            'cas_number' => $row['cas_number'],
            'hsn_code' => $row['hsn_code'],
            'slug'=> 'tested',
        ]);
    }
}
