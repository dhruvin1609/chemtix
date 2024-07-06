<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Products;

class UniqueProduct implements Rule
{
    protected $title;
    protected $categoryId;
    protected $casNumber;
    protected $productId;

    public function __construct($title, $categoryId, $casNumber,$productId = null)
    {
        $this->title = $title;
        $this->categoryId = $categoryId;
        $this->casNumber = $casNumber;
        $this->productId = $productId;
    }

    public function passes($attribute, $value)
    {
        $query = Products::where('title', $this->title)
            ->where('category_id', $this->categoryId)
            ->where('cas_number', $this->casNumber);

        if ($this->productId) {
            $query->where('id', '!=', $this->productId);
        }

        return !$query->exists();
    }

    public function message()
    {
        return 'The combination of title, category, and CAS number already exists.';
    }
}
