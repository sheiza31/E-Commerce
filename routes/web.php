<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartsController;
use App\Models\Orders;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Users;
use App\Http\Middleware\CheckUsers;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CheckoutsController;
use Illuminate\Support\Facades\Session;


Route::get('login', function () {
    return view('login');
})->name('login');


Route::get('shops', function () {
    $categories = Categories::paginate();
    $products = Products::paginate();
    return view('pages.shop',compact('categories','products'));
})->name('shop');

Route::get('single_product', function () { 
    return view('pages.single-product');
})->name('single_product');
Route::get('about', function () {
    $categories = Categories::paginate();
    return view('pages.about',compact('categories'));
})->name('about');

Route::get('contact', function () {
    $categories = Categories::paginate();
    return view('pages.contact',compact('categories'));
})->name('contact');



Route::get('/', function () {
    $categories = Categories::paginate();
    $products_high = Products::where('price', '>=', 100000.00)->with('categories')->get();
    $products_cheapest = Products::where('price', '<', 100000.00)->with('categories')->get();
    $top_product = Products::with('categories')
    ->join('orders', 'products.id', '=', 'orders.product_id')
    ->select('products.*') 
    ->groupBy('products.id','products.product_name','products.price','products.description','products.image','products.stock','products.category_id','products.created_at','products.updated_at') // Kelompokkan berdasarkan ID produk
    ->orderByRaw('COUNT(orders.product_id) DESC') // Urutkan berdasarkan jumlah pesanan terbanyak
    ->get();

    return view('pages.index',compact('categories','products_cheapest','products_high','top_product'));
})->name('home');

Route::get('register', function () {
    return view('register');
})->name('register');

Route::middleware(CheckUsers::class.':admin')->group(function () {
    Route::get('dashboard', function () {
        $orders = Orders::with(['users','products'])->get();
        $users = Users::count();
        $products = Products::count();
        $categories = Categories::count();
        $order = Orders::count();
        return view('dashboard.index',compact('orders','users','products','categories','order'));
    })->name('dashboard');
   
});
Route::get('/search/users', [UsersController::class, 'searchUsers'])->name('search.users'); 
Route::get('logout', [LogoutController::class, 'Logout'])->name('logout'); 
Route::get('/search/products', [ProductsController::class, 'searchProducts'])->name('search.products'); 
Route::get('/search/categories', [CategoriesController::class, 'searchCategories'])->name('search.categories'); 
Route::get('/search/orders', [OrdersController::class, 'searchOrders'])->name('search.orders'); 
Route::get('/search/product', [ProductsController::class, 'searchProduct'])->name('search.product'); 
Route::resource('products', ProductsController::class);

Route::get('/checkouts', [CheckoutsController::class, 'index'])->name('checkouts'); 
Route::post('/checkouts/product', [CheckoutsController::class, 'checkouts'])->name('checkouts.create'); 
Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email'); 
Route::post('/register/account', [RegisterController::class, 'Register'])->name('register/account'); 
Route::post('/login/account', [LoginController::class, 'login'])->name('login/account'); 
Route::resource('carts', CartsController::class);
Route::post('orders/delete', [OrdersController::class,'delete_order'])->name('delete_order');
Route::resource('orders', OrdersController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('users', UsersController::class);

Route::fallback(function () {
    return view('pages.404');
});

Route::get('/thank-you', function () {
    return view('pages.thankyou');
})->name('thankyou');

Route::get('/generate-pdf/users', [ReportController::class, 'reportUsers'])->name('report.users');
Route::get('/generate-pdf/categories', [ReportController::class, 'reportCategories'])->name('report.categories');
Route::get('/generate-pdf/order', [ReportController::class, 'generatePDF'])->name('report.orders');
Route::get('/generate-pdf/product', [ReportController::class, 'reportProduct'])->name('report.products');


