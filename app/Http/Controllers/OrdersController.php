<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Users;
use Illuminate\Support\Facades\Session;
class OrdersController extends Controller
{
  

   public function destroy($id,Orders $orders)  {
    $orders  = Orders::where('id',$id)->where('user_id',Session::get('user_id'))->first();
    $orders->delete();

    if (!$orders) {
      return redirect()->route('carts.index');
    }
   
   return to_route('checkouts');
   }


   public function searchOrders(Request $request) {
  
    $search = $request->input('search');
    
   return to_route('dashboard',compact('orders'));
   }

}
