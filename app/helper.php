<?php 
use App\Models\GeneralSetting;
use App\Models\ProductCategory;
use App\Models\Products;

function getCategory(){
    return ProductCategory::where('show_on_home','yes')->get();
}

function genrealSetting(){
    return GeneralSetting::all()->first();
}

function getProducts(){
    return Products::latest()->take(6)->get();
}