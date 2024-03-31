<?php

use App\Http\Controllers\Admin\About\AboutUsController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Customer\CustomerProductController;
use App\Http\Controllers\Admin\Enquiry\EnquiryController;
use App\Http\Controllers\Admin\Home_description\DescriptionController;
use App\Http\Controllers\Admin\Industry\IndustryController;
use App\Http\Controllers\Admin\Industry\IndustryServedController;
use App\Http\Controllers\Admin\Our_service\ServiceController;
use App\Http\Controllers\Admin\PO\PurchaseOrderController;
use App\Http\Controllers\Admin\Product_category\CategoryController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\Setting\GeneralSettingController;
use App\Http\Controllers\Admin\slider\SliderController;
use App\Http\Controllers\Admin\Supplier\SupplierController;
use App\Http\Controllers\Admin\Supplier\SupplierProductController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Frontend routes
Route::get('/',[FrontController::class,'index'])->name('front.index');
Route::get('/about',[FrontController::class,'about'])->name('front.about');
Route::get('/industry',[FrontController::class,'industry'])->name('front.industry');
Route::get('/product',[FrontController::class,'product'])->name('front.product');
Route::get('/contact',[FrontController::class,'contact'])->name('front.contact');
Route::get('/all-category',[FrontController::class,'all_category'])->name('front.all-cat');
Route::get('/{slug}/category-products',[FrontController::class,'category_product'])->name('front.cate-prod');
Route::post('/contact/submit',[FrontController::class,'contactSubmit'])->name('contact.submit');
Route::get('/login',[AuthController::class,'index'])->name('admin.login');
Route::post('/authenticate',[AuthController::class,'authenticate'])->name('admin.authenticate');

Route::middleware('auth')->group(function(){
  Route::prefix('admin')->group(function () {
      Route::get('/dashboard',[AuthController::class,'dashboard'])->name('admin.dashboard');
      Route::get('/logout',[AuthController::class,'logout'])->name('admin.logout');

      // Slider routes
      Route::get('/slider/create',[SliderController::class,'create'])->name('slider.create'); 
      Route::post('/slider/store',[SliderController::class,'store'])->name('slider.store');
      Route::get('/slider',[SliderController::class,'list'])->name('slider.list');
      Route::get('/slider/edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
      Route::post('/slider/update/{id}',[SliderController::class,'update'])->name('slider.update');
      Route::delete('/slider/delete/{id}',[SliderController::class,'destroy'])->name('slider.delete');

      // Home Page Description
      Route::get('/home/description/create',[DescriptionController::class,'index'])->name('description.create');
      Route::post('/home/description/stote',[DescriptionController::class,'store'])->name('description.store');
      Route::get('/home/description',[DescriptionController::class,'list'])->name('description.list');
      Route::get('/home/description/edit/{id}',[DescriptionController::class,'edit'])->name('description.edit');
      Route::post('/home/description/update/{id}',[DescriptionController::class,'update'])->name('description.update');

      // Our Services Routes
      Route::get('/our-service',[ServiceController::class,'list'])->name('service.list');
      Route::get('/our-service/create',[ServiceController::class,'create'])->name('service.create');
      Route::post('/our-service/store',[ServiceController::class,'store'])->name('service.store');
      Route::get('/our-service/edit/{id}',[ServiceController::class,'edit'])->name('service.edit');
      Route::post('/our-service/update/{id}',[ServiceController::class,'update'])->name('service.update');
      Route::delete('/our-service/delete/{id}',[ServiceController::class,'destroy'])->name('service.delete');

      // Category Routes
      Route::get('/product-category',[CategoryController::class,'list'])->name('category.list');
      Route::get('/product-category/create',[CategoryController::class,'create'])->name('category.create');
      Route::post('/product-category/store',[CategoryController::class,'store'])->name('category.store');
      Route::get('/product-category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
      Route::post('/product-category/update/{id}',[CategoryController::class,'update'])->name('category.update');
      Route::delete('/product-category/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete');

      // Product Routes
      Route::get('/products',[ProductController::class,'list'])->name('products.list');
      Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
      Route::post('/products/store',[ProductController::class,'store'])->name('products.store');
      Route::get('/products/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
      Route::post('/products/update/{id}',[ProductController::class,'update'])->name('products.update');
      Route::delete('/products/delete/{id}',[ProductController::class,'destroy'])->name('products.delete');

      // Industry Routes
      Route::get('/industry',[IndustryController::class,'create'])->name('industry.create');
      Route::post('/industry/store',[IndustryController::class,'store'])->name('industry.store');

      Route::get('/industry/served/create',[IndustryServedController::class,'create'])->name('served.create');
      Route::post('/industry/served/store',[IndustryServedController::class,'store'])->name('served.store');
      Route::get('/industry/served',[IndustryServedController::class,'list'])->name('served.list');
      Route::get('/industry/served/edit/{id}',[IndustryServedController::class,'edit'])->name('served.edit');
      Route::post('/industry/served/update/{id}',[IndustryServedController::class,'update'])->name('served.update');
      Route::delete('/industry/served/delete/{id}',[IndustryServedController::class,'destroy'])->name('served.delete');

      // About Us Routes
      Route::get('/about/create',[AboutUsController::class,'create'])->name('about.create');
      Route::post('/about/store',[AboutUsController::class,'store'])->name('about.store');

      // General Setting Routes
      Route::get('/general-setting',[GeneralSettingController::class,'create'])->name('setting.create');
      Route::post('/general-setting/store',[GeneralSettingController::class,'store'])->name('setting.store');
      Route::post('/search/product',[GeneralSettingController::class,'searchProduct'])->name('search.product');
      Route::get('/search/supplier/product/{id}',[GeneralSettingController::class,'searchSupplierProduct'])->name('search.supplier.product');
      Route::get('/search/customer/product/{id}',[GeneralSettingController::class,'searchCustomerProduct'])->name('search.customer.product');

      // Enquiry Routes
      Route::get('/all-enquiry/{status?}',[EnquiryController::class,'index'])->name('enquiry.index');
      Route::get('/enquiry/create',[EnquiryController::class,'create'])->name('enquiry.create');
      Route::post('/enquiry/store',[EnquiryController::class,'store'])->name('enquiry.store');
      Route::post('/change-status/{id}',[EnquiryController::class,'change_status'])->name('enquiry.status');
      Route::post('/enquiry/remarks/{id}',[EnquiryController::class,'addRemark'])->name('enquiry.remark');
      Route::get('/enquiry/export',[EnquiryController::class,'fileExport'])->name('enquiry.export');

      // Supplier Routes
      Route::get('/supplier',[SupplierController::class,'list'])->name('supplier.list');
      Route::get('/supplier/create',[SupplierController::class,'create'])->name('supplier.create');
      Route::post('/supplier/store',[SupplierController::class,'store'])->name('supplier.store');
      Route::get('/supplier/edit/{id}',[SupplierController::class,'edit'])->name('supplier.edit');
      Route::post('/supplier/update/{id}',[SupplierController::class,'update'])->name('supplier.update');
      Route::delete('/supplier/delete/{id}',[SupplierController::class,'delete'])->name('supplier.delete');
      Route::post('supplier/csv/import/',[SupplierController::class,'csv_import'])->name('supplier.import');

      // Supplier Product Routes
      Route::get('/supplier/product',[SupplierProductController::class,'list'])->name('supplier_product.list');
      Route::get('/supplier/product/create',[SupplierProductController::class,'create'])->name('supplier_product.create');
      Route::post('/supplier/product/store',[SupplierProductController::class,'store'])->name('supplier_product.store');
      Route::get('/getcasnumber',[SupplierProductController::class,'getCasNumber'])->name('getCasNumber');
      Route::get('/supplier/product/edit/{id}',[SupplierProductController::class,'edit'])->name('supplier_product.edit');
      Route::post('/supplier/product/update/{id}',[SupplierProductController::class,'update'])->name('supplier_product.update');
      Route::delete('/supplier/product/delete/{id}',[SupplierProductController::class,'delete'])->name('supplier_product.delete');
      Route::post('supplier/product/import/',[SupplierProductController::class,'csv_import'])->name('supplier_product.import');

      Route::get('/search/suppliers',[SupplierProductController::class,'search_supplier'])->name('supplier.search');
      Route::post('/get/product/data',[SupplierProductController::class,'getProductData'])->name('supplier.get');

      // Customer Routes
      Route::get('/customer',[CustomerController::class,'list'])->name('customer.list');
      Route::get('/customer/create',[CustomerController::class,'create'])->name('customer.create');
      Route::post('/customer/store',[CustomerController::class,'store'])->name('customer.store');
      Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
      Route::post('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');
      Route::delete('/customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');
      Route::post('customer/csv/import/',[CustomerController::class,'customer_import'])->name('customer.import');

      // Customer Product Routes
      Route::get('/customer/product',[CustomerProductController::class,'list'])->name('customer_product.list');
      Route::get('/customer/product/create',[CustomerProductController::class,'create'])->name('customer_product.create');
      Route::post('/customer/product/store',[CustomerProductController::class,'store'])->name('customer_product.store');
      Route::get('/customer/product/edit/{id}',[CustomerProductController::class,'edit'])->name('customer_product.edit');
      Route::post('/customer/product/update/{id}',[CustomerProductController::class,'update'])->name('customer_product.update');
      Route::delete('/customer/product/delete/{id}',[CustomerProductController::class,'delete'])->name('customer_product.delete');
      Route::post('/customer/product/import/',[CustomerProductController::class,'customer_product_import'])->name('customer_product.import');

      Route::get('/search/customers',[CustomerProductController::class,'search_customer'])->name('customer.search');
      Route::post('/search/data',[CustomerProductController::class,'getData'])->name('customer.get');

      Route::get('/po',[PurchaseOrderController::class,'index'])->name('po.index');

      
  });
});