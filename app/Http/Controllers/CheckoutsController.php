<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Users;
use App\Models\Carts;
use Illuminate\Support\Facades\Session;
class CheckoutsController extends Controller
{
    public function index(Request $request)  { 
        $user_id = Session::get('user_id');  
        $carts = Carts::where('user_id', $user_id)->get(); 
        $orders = Orders::where('user_id',$user_id)->with('products.categories','users')->get();
        $orderIds = $orders->pluck('id'); // Mengambil hanya kolom ID
        $orderIdString = $orderIds->implode(',');
        $item_details = [];
        foreach ($orders as $order) {
            $item_details[] = [
                 'id'=>$order->products->id,
                 'price'=>$order->products->price,
                 'quantity'=>$order->Jumlah,
                 'name'=>$order->products->product_name,
                 'category'=>$order->products->categories->name,
            ];
        }

        if (!$item_details) {
            return to_route('shop');
        }

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-WZjTlQA9kNRFsepi-D5SqxRg';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

$params = array(
    'transaction_details' => array(
        'order_id' => 'ORD-'.$orderIdString,
        'gross_amount' => $orders->sum('total_price'),
    ),
    'item_details'=>$item_details,
    'customer_details' => array(
        'first_name' => $orders[0]->users->username,
        'email' => $orders[0]->users->email,
        'phone' => $orders[0]->users->telp,
        'address' => $orders[0]->users->address,
    ),
);




 $snapToken = \Midtrans\Snap::getSnapToken($params); 
                                 
        return view('pages.checkouts',compact('orders','snapToken'));
    }

}
